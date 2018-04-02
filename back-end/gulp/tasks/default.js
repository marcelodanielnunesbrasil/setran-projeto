/**
 * COMPILADOR FRONT-END CSS MINIFY, IMAGES COMPRESSED, FONTS AND JS MINIFY
 * Marcelo Daniel 2018
 *
 * Default task - Run other tasks in the correct sequence
 *
 */

var gulp        = require('gulp');
var runSequence = require('run-sequence');

gulp.task('default', function(callback) {
    runSequence(
        'clean',
        'browserSync',
        ['build:sprites', 'build:images'],
        ['build:pluginsCSS', 'build:pluginsJS', 'build:pluginsIMG', 'build:scss', 'build:js-concat', 'build:js-each', 'build:fonts'],
        'watch',
        callback
        );
});
