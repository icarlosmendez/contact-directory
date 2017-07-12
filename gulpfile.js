'use strict';

/* =========== Require Modules =========== */

var

// utility modules
         del = require('del'),
        path = require('path'),
        gulp = require('gulp'),
      rename = require('gulp-rename'),

// sass compilation, prefixing, minification
        sass = require('gulp-sass'),
autoprefixer = require('gulp-autoprefixer'),
      purify = require('gulp-purifycss'),
      cssmin = require('gulp-cssmin'),

// mapping for js and sass/css files
// easing troubleshooting in the browser
        maps = require('gulp-sourcemaps');


/* =========== Development Tasks =========== */

// SASS
/*gulp.task('compileSass', function() {
    return gulp.src('sass/main.scss')
        .pipe(maps.init())
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(rename('main.vanilla.css'))
        .pipe(maps.write('./'))
        .pipe(gulp.dest('css/dist'));
});*/

gulp.task('prefixCss', /*['compileSass'],*/ function() {
    return gulp.src('css/build/main.vanilla.css')
        .pipe(maps.init())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: true,
        }))
        .pipe(rename('main.prefixd.css'))
        .pipe(maps.write('./'))
        .pipe(gulp.dest('css/dist'));
});

gulp.task('purifyCss', ['prefixCss'], function() {
  return gulp.src('css/dist/main.prefixd.css')
    .pipe(purify(['./views/*.php']))
    .pipe(rename('main.pure.css'))
    .pipe(gulp.dest('css/dist'))
});

gulp.task('minifyCss', ['purifyCss'], function() {
    return gulp.src('css/dist/main.pure.css')
        .pipe(cssmin())
        .pipe(rename('main.min.css'))
        .pipe(gulp.dest('css/dist'))
});

gulp.task('removeCss', ['minifyCss'], function() {
    del(['css/dist/main.vanilla.css', 
         'css/dist/main.vanilla.css.map',
         'css/dist/main.prefixd.css',
         'css/dist/main.prefixd.css.map', 
         'css/dist/main.pure.css'
        ]);
});

gulp.task('devStyles', ['removeCss'], function() {

});


/* =========== Development Tasks =========== */

gulp.task('watch', function() {
    return gulp.watch('sass/**/*.scss', ['compileSass']).on('change', browserSync.reload);
    return gulp.watch('js/**/*.js', ['devlint']).on('change', browserSync.reload);
    return gulp.watch("/application/views/**/*.php").on("change", browserSync.reload);
});

gulp.task('serve', ['watch'], function() {
    browserSync.init({
        proxy: 'localhost:8888'
    });
});


/* =========== Deployment tasks =========== */

gulp.task('dist', ['devScripts', 'devStyles', 'imageOp'], function() {
    return gulp.src([
      'css/main.min.css',
      'js/app.min.js',
      'img/opt/**'
      ], {base: './'})
        .pipe(gulp.dest('dist'));
});

gulp.task('clean', function() {
    del(['dist', 'coverage', 'img/opt', 'css/dist', 'js/app*.js*']);
});

gulp.task('default', ['clean'], function() {
    gulp.start('dist');
});
