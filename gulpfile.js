// Include gulp
var gulp = require('gulp');

// Include our plugins
var autoprefixer = require('gulp-autoprefixer'),
    sass         = require('gulp-sass'),
    minifycss    = require('gulp-minify-css'),
    uglify       = require('gulp-uglify'),
    imagemin     = require('gulp-imagemin'),
    rename       = require('gulp-rename'),
    concat       = require('gulp-concat'),
    header       = require('gulp-header'),
    livereload   = require('gulp-livereload'),
    newer        = require('gulp-newer'),
    clean        = require('gulp-clean'),
    spritesmith  = require('gulp.spritesmith'),
    runSequence  = require('run-sequence'),
    replace      = require('gulp-replace'),
    revHash      = require('gulp-rev-hash'),
    rsync        = require('rsyncwrapper').rsync,
    secrets      = require('./secrets.json'),
    package      = require('./package.json');

// Define some project variables
var destApp    = 'public',
    srcApp     = 'src',
    destCSS    = destApp + '/assets/css',
    destJS     = destApp + '/assets/js',
    destImages = destApp + '/assets/images',
    bowerDir   = srcApp + '/libs',
    srcSASS    = srcApp + '/assets/scss',
    srcJS      = srcApp + '/assets/js',
    srcImages  = srcApp + '/assets/images';

// Banner that gets injected at the top of my assets
var banner = [
  '/*!\n' +
  ' * <%= package.title %>\n' +
  ' * <%= package.url %>\n' +
  ' * @author <%= package.author %> <<%= package.email %>>\n' +
  ' * @version <%= package.version %>\n' +
  ' * Copyright ' + new Date().getFullYear() + '. <%= package.license %> licensed.\n' +
  ' */',
  '\n'
].join('');

// Define my src files
function srcFiles(path) {
  var srcFiles = [
    path+'/.htaccess',
    path+'/*.php',
    path+'/assets/font/**/*',
    path+'/libs/**',
    path+'/instagram/**/*',
    path+'/robots.txt',
    path+'/sitemap.xml'
  ];

  return srcFiles;
}

// Styles task
gulp.task('styles', function() {
    return gulp.src(srcSASS+'/styles.scss')
      .pipe(sass())
      .pipe(autoprefixer('last 2 version'))
      .pipe(gulp.dest(destCSS))
});

// Scripts task
gulp.task('scripts', function() {
    return gulp.src([
        ''+bowerDir+'/lodash/lodash.js',
        ''+srcJS+'/plugins/*.js',
        ''+srcJS+'/main.js'
      ])
      .pipe(concat('scripts.min.js'))
      .pipe(uglify())
      .pipe(header(banner, { package : package }))
      .pipe(gulp.dest(destJS))
});

// Images task
gulp.task('images', function() {
  return gulp.src(srcImages+'/**/*')
      .pipe(newer(destImages))
      .pipe(imagemin())
      .pipe(gulp.dest(destImages));
});

// Copy files from src to public
gulp.task('copy', function() {
  return gulp.src(srcFiles(srcApp), { base: './src' })
    .pipe(gulp.dest(destApp))
});

// Replace any strings
gulp.task('replace', ['copy'], function() {
  return gulp.src([
      srcApp+'/instagram/*.php'
    ])
    .pipe(replace(/{{instagramAccessToken}}/g, secrets.instagram.accessToken))
    .pipe(gulp.dest(destApp+'/instagram'));
});

// Clean out the public folder
gulp.task('cleanApp',function() {
  return gulp.src(srcFiles(destApp))
    .pipe(clean())
});

// Cache-busting our assets
gulp.task('rev-hash', function () {
    gulp.src(srcApp+'/index.php')
        .pipe(revHash({assetsDir: destApp}))
        .pipe(gulp.dest(destApp));
});

// Minify our CSS
gulp.task('minify', function() {
    return gulp.src(destCSS+'/styles.css')
      .pipe(minifycss())
      .pipe(header(banner, { package : package }))
      .pipe(gulp.dest(destCSS))
});

// Sprite Generator task
gulp.task('sprite', function () {
  var spriteData = gulp.src(srcImages+'/technologies/*.png').pipe(spritesmith({
    imgName: 'technologies-sprite.png',
    cssName: 'partials/_technologies.scss',
    cssFormat: 'css',
    imgPath: '../images/technologies-sprite.png',
    cssOpts: {
      cssClass: function (item) {
        return '.technologies-' + item.name;
      }
    }
  }));
  spriteData.img.pipe(gulp.dest(srcImages+'/'));
  spriteData.css.pipe(gulp.dest(srcSASS+'/'));
});

// Deploy task
gulp.task('deploy', function() {
  rsync({
    src: 'public/',
    dest: secrets.servers.live.rsyncDest,
    ssh: true,
    recursive: true,
    syncDest: true,
  }, function(error, stdout, stderr, cmd) {
    if(error) {
      console.log(error.message);
    } else {
      console.log('Successfully Deployed!');
    }
  });
});

// Default task
gulp.task('build', function(cb) {
  runSequence(['styles', 'scripts', 'images'],'replace','rev-hash', 'minify',cb);
});

// Watch
gulp.task('watch', function() {
  // Watch .scss files
  gulp.watch(srcSASS+'/**/*.scss', ['styles', 'rev-hash']);

  // Watch .js files
  gulp.watch(srcJS+'/**/*.js', ['scripts']);

  // Watch PHP files
  gulp.watch(srcFiles(srcApp), ['replace']);

  // Watch image files
  gulp.watch(srcImages+'/**/*', ['images']);
});
