'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');

// compile
gulp.task('sass', function () {
  return gulp.src('./assets/scss/global.scss')
  .pipe(sass().on('error', sass.logError))
  .pipe(minifyCss({
    keepSpecialComments: 0
  }))
  .pipe(rename({
    extname: '.min.css'
  }))
  .pipe(gulp.dest('./assets/css'));
});

// compile watch
gulp.task('watch', function () {
  gulp.watch('./assets/scss/global.scss', ['sass']);
});