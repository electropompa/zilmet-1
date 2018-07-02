'use strict';

var gulp      = require('gulp'),
    sourcemaps    = require('gulp-sourcemaps'),
    autoprefixer  = require('gulp-autoprefixer'),
    concat        = require('gulp-concat'),
    sass        = require('gulp-sass'),
    cleanCSS    = require('gulp-clean-css'),
    livereload  = require('gulp-livereload');


gulp.task('watch', function(){
  livereload.listen();
  gulp.watch('frontend/sass/*.scss', gulp.series( 'sass'));
  gulp.watch('public/wp-content/themes/zilmet/*.php').on('change', livereload.changed);
  gulp.watch('public/wp-content/themes/zilmet/css/*.css').on('change', livereload.changed);
});

gulp.task('sass', function () {
  return gulp.src('frontend/sass/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('public/wp-content/themes/zilmet/css/'));
});

gulp.task(
  'default',
  gulp.series(
    'watch'
  )
);