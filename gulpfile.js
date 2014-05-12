// Include gulp
var gulp = require('gulp');

// Include our plugins
var autoprefixer = require('gulp-autoprefixer'),
    sass = require('gulp-ruby-sass'),
    minifycss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    livereload = require('gulp-livereload');

// Define some project variables
var projectApp = 'public',
    projectCSS = projectApp + '/assets/css',
    projectSASS = projectApp + '/assets/scss',
    projectJS = projectApp + '/assets/js',
    projectImages = projectApp + '/assets/images';

// Styles task
gulp.task('styles', function() {
    return gulp.src(''+projectSASS+'/styles.scss')
      .pipe(sass({ style: 'expanded' }))
      .pipe(autoprefixer('last 2 version'))
      .pipe(minifycss())
      .pipe(gulp.dest(projectCSS))
      .pipe(notify({ message: 'Styles task complete' }));
});

// Scripts task
gulp.task('scripts', function() {
    return gulp.src([
        ''+projectJS+'/plugins/*.js',
        ''+projectJS+'/main.js'
      ])
      .pipe(concat('scripts.min.js'))
      .pipe(uglify())
      .pipe(gulp.dest(projectJS))
      .pipe(notify({ message: 'Scripts task complete' }));
});

// Images task
gulp.task('images', function() {
  return gulp.src(''+projectImages+'/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 8, progressive: true, interlaced: true })))
    .pipe(gulp.dest(projectImages))
    .pipe(notify({ message: 'Images task complete' }));
});

// Sprite Generator task
gulp.task('sprite', function () {
  var spriteData = gulp.src('public/assets/images/technologies/*.png').pipe(spritesmith({
    imgName: 'sprite.png',
    cssName: '_sprite.scss',
    cssFormat: 'scss'
  }));
  spriteData.img.pipe(gulp.dest(projectImages+'/'));
  spriteData.css.pipe(gulp.dest(projectSASS+'/'));
});


// Default task
gulp.task('default', ['styles', 'scripts', 'images']);

// Watch
gulp.task('watch', function() {
  // Watch .scss files
  gulp.watch(''+projectSASS+'/**/*.scss', ['styles']);

  // Watch .js files
  gulp.watch(''+projectJS+'/**/*.js', ['scripts']);

  // Watch image files
  //gulp.watch(''+projectImages+'/**/*', ['images']);

  // Create LiveReload server
  var server = livereload();

  // Watch any files in dist/, reload on change
  gulp.watch([''+projectApp+'/**']).on('change', function(file) {
    server.changed(file.path);
  });
});
