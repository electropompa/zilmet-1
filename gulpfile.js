var gulp      = require('gulp'),
  livereload  = require('gulp-livereload'),
  sass        = require('gulp-sass'),
  cleanCSS    = require('gulp-clean-css');

gulp.task('default', ['sass', 'watch']);

gulp.task('watch', function(){
  livereload.listen();
  gulp.watch('frontend/sass/*.scss', ['sass']);
  gulp.watch('public/wp-content/themes/zilmet/*.php').on('change', livereload.changed);
  gulp.watch('public/wp-content/themes/zilmet/css/*.css').on('change', livereload.changed);
});

gulp.task('sass', function () {
  gulp.src('frontend/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('public/wp-content/themes/zilmet/css/'));
});