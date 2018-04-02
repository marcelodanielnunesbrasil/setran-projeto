<?php

namespace App\Helper;

class Util
{
    /**
     * Dependency container provided by Slim
     * @var \Slim\Container
     */
    protected $container;

    /**
     * Save dependency container
     * @param \Slim\App $app slim application
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function clearString($content)
    {
        if (is_array($content)) {
            return filter_var_array($content, FILTER_SANITIZE_STRING);
        } else {
            return filter_var($content, FILTER_SANITIZE_STRING);
        }
    }

    public function timestampToDatetime(int $timestamp = 0)
    {
        if (empty($timestamp)) {
            $timestamp = time();
        }

        return date('Y-m-d H:i:s', $timestamp);
    }

    public function datetimeToTimestamp($datetime)
    {
        if ($datetime == 0) {
            $datetime = date('Y-m-d H:i:s');
        }

        $d = \DateTime::createFromFormat('Y-m-d H:i:s', $datetime);

        if (!$d || $d->format('Y-m-d H:i:s') !== $datetime) {
            $datetime = date('Y-m-d H:i:s');
        }

        return strtotime($datetime);
    }

    public function getGeolocation()
    {
        $geolocation = isset($_SERVER['HTTP_CF_IPCOUNTRY']) ? $_SERVER['HTTP_CF_IPCOUNTRY'] : "Unknown";

        return $geolocation;
    }

    public function dashesToCamelCase($string, $capitalizeFirstCharacter = false)
    {
        $str = str_replace('-', '', ucwords($string, '-'));

        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }

    public function camelCaseToDashes($str)
    {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $str));
    }

    public function saveRemoteImage($url, $prefix = false)
    {
        $fileName = $this->container->uploader->generateFileName($prefix);

        $ch = curl_init($url);
        $fp = fopen(__DIR__ . '/../../storage/uploads/' . $fileName . '.png', 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        return '/uploads/' . $fileName . '.png';
    }

    /**
     * Get CPF numbers-only (without any mask)
     * @param  string $cpf masked cpf
     * @return string      numbers-only cpf
     */
    public function getCpfNumber($cpf)
    {
        return str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
    }

    /**
     * Validate CPF
     * @param  string $cpf user CPF
     * @return boolean     valid or not
     */
    public function validateCpf($cpf)
    {
        $cpf = $this->getCpfNumber($cpf);

        if (
            strlen($cpf) != 11 ||
            $cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999'
        ) {
            return false;
        } else {
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }

                $d = ((10 * $d) % 11) % 10;

                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }

    public function getAge($born, $compare = null){
        $born = explode('-', date('d-m-Y', $born));
        $compare = explode('-', date('d-m-Y', empty($compare)? time(): $compare));
        $age = $compare[2] - $born[2];

        if($compare[1] > $born[1]) return $age;
        if($compare[1] == $born[1] && $compare[0] > $born[0]) return $age;

        return --$age;
    }

    public function getPhoneNumber($string) {
        return trim(
            str_replace('/', '',
                str_replace(' ', '',
                    str_replace('-', '',
                        str_replace(')', '',
                            str_replace('(', '', $string)
                        )
                    )
                )
            )
        );
    }

    public function validatePhoneNumber($string) {
        $number = $this->getPhoneNumber($string);

        $regex = '/^[0-9]{11}$/';

        if (preg_match($regex, $number)) {
            return true;
        } else {
            return false;
        }
    }
}
