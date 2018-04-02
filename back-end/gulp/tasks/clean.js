/**
 * COMPILADOR FRONT-END CSS MINIFY, IMAGES COMPRESSED, FONTS AND JS MINIFY
 * Marcelo Daniel 2018
 *
 * Delete previously generated assets
 *
 */

var paths = require('../config').paths;

var gulp = require('gulp');
var del  = require('del');

gulp.task('clean', function() {
    return del([paths.dist.fonts, paths.dist.images, paths.dist.scripts, paths.dist.css, paths.srcFolder.scss + '/_sprite.scss']);
});
