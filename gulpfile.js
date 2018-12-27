var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');

var gulp = require('gulp');
var uglify = require('gulp-uglify');

var uglifyjs = require('uglify-js'); // can be a git checkout
                                     // or another module (such as `uglify-es` for ES6 support)
var composer = require('gulp-uglify/composer');
var pump = require('pump');
 
var minify = composer(uglifyjs, console);
 
// Task: sass
gulp.task('sass', function () {
  return gulp.src('./assets/scss/global.scss')
  .pipe(sass().on('error', sass.logError))
  .pipe(minifyCss({
    keepSpecialComments: 0
  }))
  .pipe(rename({
    extname: '.min.css'
  }))
  .pipe(gulp.dest('./assets/dist'));
});

// Task: js
gulp.task('compress', function (cb) {
  // return gulp.src('./assets/js/script.js')
  // .pipe(uglify().on('error', uglify.logError))
  // .pipe(uglify())
  // .pipe(rename({
  //   extname: '.min.js'
  // }))
  // .pipe(gulp.dest('./assets/dist'));

  pump([
    gulp.src('./assets/js/script.js'),
    minify(),
    gulp.dest('./assets/dist')
  ],
  cb
  );
});

// Task: watch
gulp.task('watch', function () {
  gulp.watch('./assets/scss/**/*', ['sass']);
  gulp.watch('./assets/js/script.js', ['compress']);
});