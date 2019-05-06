'use strict';

var gulp          = require('gulp'),
    sourcemaps    = require('gulp-sourcemaps'),
    autoprefixer  = require('gulp-autoprefixer'),
    concat        = require('gulp-concat'),
    sass          = require('gulp-sass'),
    cleanCSS      = require('gulp-clean-css'),
    livereload    = require('gulp-livereload');

var themeDir = "public/wp-content/themes/zilmet/",
    sassDir  = "frontend/sass/";

gulp.task('watch', function(){
  livereload.listen();
  gulp.watch( sassDir + '*.(sass|scss)', gulp.series( 'sass'));
  gulp.watch( themeDir + '**/*.php').on('change', livereload.changed);
  gulp.watch( themeDir + 'css/*.css').on('change', livereload.changed);
  gulp.watch( themeDir + 'js/*.js').on('change', livereload.changed);
});

// Откл. concat, т.к. все файлы объединены в один ч/з @import внутри sass
// Откл. поддержку ie8 для CleanCSS
gulp.task('sass', function () {
  return gulp.src('frontend/sass/style.sass')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest( themeDir + 'css/') );
});

// Продакшн без Sourcemap
// Объединяем с Бутстрапом +concat
gulp.task('production-sass', function () {
  return gulp.src( ['../node_modules/bootstrap/scss/bootstrap-zilmet.scss', sassDir + 'style.sass'] )
    .pipe( sass().on( 'error', sass.logError ) )
    .pipe( autoprefixer() )
    .pipe( concat('concat.min.css') )
    .pipe( cleanCSS( {compatibility: 'ie8'} ) )
    .pipe( gulp.dest( themeDir + 'css/' )) ;
});

gulp.task( 'default',
  gulp.series( 'watch' )
);