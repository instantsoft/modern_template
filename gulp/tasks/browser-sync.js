var gulp = require('gulp');
var config = require('../config.js');
var browserSync = require('browser-sync').create();

gulp.task('browser-sync', ['watch'], function () {
    browserSync.init({
        proxy: config.server,
        logConnections: true,
        notify: true,
        reloadDebounce: 500
    });
    gulp.watch(config.path.browser.style).on("change", browserSync.reload);
    gulp.watch(config.path.browser.styleControllers).on("change", browserSync.reload);
    gulp.watch(config.path.browser.js).on("change", browserSync.reload);
    gulp.watch(config.path.browser.php).on('change', browserSync.reload);
});