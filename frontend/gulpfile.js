"use strict";

require('es6-promise').polyfill();
var browserSync = require('browser-sync').create();
var jade = require('gulp-jade');
var inject = require('gulp-inject');
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var eslint = require('gulp-eslint');
var  bower = require('bower');
var $ = require('gulp-load-plugins')();
var autoprefixer = require('gulp-autoprefixer');
var watch = require('gulp-watch');
var wiredep = require('wiredep').stream;
var _ = require('lodash');


var paths = {
    sass : {
        src: 'assets/sass/'
    },
    fonts: 'assets/fonts/',
    css: 'assets/css/',
    js: 'assets/js/',
    bower: 'bower_components/',
    npm: 'node_modules/',
    app: 'app/',
    root: '.'
};

var config = {
    sassOptions: {
        includePaths: [
            paths.sass.src + '*.scss',
            paths.bower + 'compass-mixins/lib',
            paths.bower + 'bourbon/app/assets/stylesheets/',
            paths.bower + 'bootstrap-sass/assets/stylesheets',
            paths.bower + 'font-awesome/scss'
        ],
        style: 'expanded'
    },    
    autoprefixer: {
        browsers: ['last 3 versions'], 
        cascade: false
    },
    injectOptions: {
        //ignorePath: paths.app,
        addRootSlash: false
    },
      wiredep: { 
       // exclude: [/\/bootstrap\.js$/, /\/bootstrap\.css/],
        directory: paths.bower
    }
}

gulp.task('watch', ['styles', 'scripts', 'fonts', 'inject'], function () {
    gulp.watch(paths.root + '/index.html');
    gulp.watch(paths.sass.src + '*.scss', ['styles']);
    gulp.watch([paths.app + '**/*.js', paths.js+'*.js'], ['scripts']);
   
});

gulp.task('styles', function(){

    return gulp.src(paths.sass.src + '*.scss')
    .pipe($.sass(config.sassOptions))
    .pipe(plumber())
    .pipe(autoprefixer(config.autoprefixer))
    .pipe(gulp.dest(paths.css))
    .pipe(browserSync.stream());
});

gulp.task('scripts', function () {

    return gulp.src([paths.app + '**/*.js', paths.js+'*.js'])
    .pipe($.eslint())
    .pipe($.eslint.format())
    .pipe($.size())
    .pipe(browserSync.stream());
});


console.log(wiredep);
gulp.task('inject', ['scripts', 'styles'], function () {
  var injectStyles = gulp.src(paths.css + '*.css');

  var injectScripts = gulp.src([
    paths.app + '**/*.module.js',
    paths.app + '**/*.js',
    paths.js + '**/*.module.js',
    paths.js + '**/*.js',
    paths.bower + 'bootstrap-sass/assets/javascripts/bootstrap.min.js',
      paths.bower + 'angularUtils-pagination/dirPagination.js',

    '!' + paths.app + '**/*.spec.js',
    '!' + paths.app + '**/*.mock.js'
  ]).pipe($.angularFilesort());
  
 
  return gulp.src(paths.root + '/index.html')

    .pipe($.inject(injectStyles, config.injectOptions))
    .pipe($.inject(injectScripts, config.injectOptions))
    .pipe(wiredep(_.extend({}, config.wiredep)))
    .pipe(gulp.dest(paths.root));
});

gulp.task('fonts', function() {
   gulp.src(paths.bower + 'font-awesome/fonts/*.*')
    .pipe(gulp.dest(paths.fonts));
});


gulp.task('default', ['styles', 'scripts', 'fonts', 'inject']);

gulp.task('serve', ['watch'], function () {
         browserSync.init({
            server: paths.root,
             open:false
    });
});