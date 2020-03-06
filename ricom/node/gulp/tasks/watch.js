var gulp = require('gulp'),
watch = require('gulp-watch'),
browserSync = require('browser-sync').create();


gulp.task('watch', function() {

  browserSync.init({
    notify: false,
    proxy: 'https://ricomcustom.local/'
    //server: {
      //baseDir: "app"
    //}
  });

  watch('.././*.php', function() {
    browserSync.reload();
  });

  watch('.././template-parts/*.php', function() {
    browserSync.reload();
  });

  watch('./app/assets/styles/**/*.css', function() {
    gulp.start('cssInject');
  });

  watch('./app/assets/scripts/**/*.js', function() {
    gulp.start('scriptsRefresh');
  })

});

gulp.task('cssInject', ['styles'], function() {
  return gulp.src('.././style.css')
    .pipe(browserSync.stream());
});

gulp.task('scriptsRefresh', ['scripts'], function() {
  browserSync.reload();
});