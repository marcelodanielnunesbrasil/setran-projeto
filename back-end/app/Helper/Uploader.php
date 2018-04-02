<?php

namespace App\Helper;

class Uploader
{
    /**
     * Dependency container provided by Slim
     * @var \Slim\Container
     */
    protected $container;

    private $uploadDirectory       = __DIR__ . "/../../storage/uploads/";
    private $uploadDirectoryPublic = "/uploads/";

    /**
     * Save dependency container
     * @param \Slim\App $app slim application
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function validate($file)
    {
        if ($file->getError() === UPLOAD_ERR_OK) {
            return true;
        }

        return false;
    }

    public function sendFile($file, $type)
    {
        $newName = $this->generateFileName();

        $ext = strtolower(strrchr($file->getClientFilename(), '.'));
        $path = $this->uploadDirectory . $newName . $ext;

        $save = $file->moveTo($path);

        $isValid = $this->validateFileType($path, $type);

        if ($isValid === false) {
            return false;
        }

        return $this->uploadDirectoryPublic . $newName . $ext;
    }

    public function generateFileName($prefix = false)
    {
        $name = md5(uniqid(rand(), true));
        $name = substr($name, 0, 10);

        if (!$prefix) {
            return $name;
        }

        return $prefix . '-' . $name;
    }

    private function validateFileType($filePath, $type)
    {
        if ($type == 'image') {
            $validTypes = ['image/jpeg', 'image/png', 'image/gif'];
        }

        $fileinfo = finfo_open(FILEINFO_MIME_TYPE);

        if (!in_array(finfo_file($fileinfo, $filePath), $validTypes)) {
            return false;
        }

        return true;
    }
}
