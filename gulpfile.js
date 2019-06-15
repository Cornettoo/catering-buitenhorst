// Packages
var gulp            = require('gulp');
var concat          = require('gulp-concat');
var notify          = require('gulp-notify');
var rename          = require('gulp-rename');
var include         = require('gulp-include');
var sass            = require('gulp-sass');
var uglify          = require('gulp-uglify');

// Paths
var cssSrc          = './assets/scss/global.scss';
var cssDist         = './assets/dist/';
var jsSrc           = './assets/js/script.js';
var jsDist          = './assets/dist/';



// Task: sass
gulp.task('sass', function() {
  return gulp.src(cssSrc)
  .pipe(include())
  .pipe(sass({outputStyle: 'compressed'}).on("error", notify.onError(function (error) {
      return "Error: " + error.message;
    })))
  .pipe(rename('global.min.css'))
  .pipe(gulp.dest(cssDist));
});

// Task: scripts
gulp.task('scripts', function() {
  return gulp.src(jsSrc)
  .pipe(include())
  .pipe(concat('script.js'))
  .pipe(uglify())
  .pipe(rename('script.min.js'))
  .pipe(gulp.dest(jsDist));
});


// Task: watch
gulp.task('watch', function() {
    gulp.watch("./assets/scss/**/*.scss", ['sass']);
    gulp.watch("./assets/js/script.js", ['scripts']);
});

// Run task: sass, scripts, images, fonts, templates & svgstore
gulp.task('default', ['sass', 'scripts']);
