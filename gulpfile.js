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
        maps = require('gulp-sourcemaps'),

//style paths
   sassFiles = 'sass/**/*.scss',  
     cssDest = 'css/build';

/* =========== Development Tasks =========== */

// SASS
gulp.task('preClean', function() {
    del([
         // 'css/build/main.pure.css', 
         // 'css/build/main.compiled.css',
         // 'css/build/main.compiled.css.map'
        ]);
});
gulp.task('compileSass', ['preClean'], function() {
    return gulp.src('sass/main.scss')
        .pipe(maps.init())
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(rename('main.compiled.css'))
        .pipe(gulp.dest('css/build'));
});

gulp.task('purifyCss', ['compileSass'], function() {
  return gulp.src('css/build/main.compiled.css')
    .pipe(purify(['./views/*.php']))
    .pipe(rename('main.pure.css'))
    .pipe(gulp.dest('css/build'))
});

gulp.task('prefixCss', ['purifyCss'], function() {
    return gulp.src('css/build/main.pure.css')
        .pipe(maps.init())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: true,
        }))
        .pipe(rename('main.prefixd.css'))
        .pipe(maps.write('./'))
        .pipe(gulp.dest('css/build'));
});

gulp.task('minifyCss', ['prefixCss'], function() {
    return gulp.src('css/build/main.prefixd.css')
        .pipe(cssmin())
        .pipe(rename('main.min.css'))
        .pipe(gulp.dest('css/dist'))
});

gulp.task('removeCss', ['minifyCss'], function() {
    del([
         'css/build/main.pure.css',
         'css/build/main.compiled.css', 
         'css/build/main.compiled.css.map'
        ]);
});

gulp.task('devStyles', ['removeCss'], function() {

});


/* =========== Development Tasks =========== */

gulp.task('watch',function() {  
    gulp.watch(sassFiles,['devStyles']);
});

// Below are older dev tasks brought in from a different project. Don't want to throw them away just yet.
// gulp.task('watch', function() {
//     return gulp.watch('sass/**/*.scss', ['compileSass']).on('change', browserSync.reload);
//     return gulp.watch('js/**/*.js', ['devlint']).on('change', browserSync.reload);
//     return gulp.watch("/application/views/**/*.php").on("change", browserSync.reload);
// });

// gulp.task('serve', ['watch'], function() {
//     browserSync.init({
//         proxy: 'localhost:8888'
//     });
// });


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
