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
    livereload = require('gulp-livereload'),
    newer = require('gulp-newer'),
    clean = require('gulp-clean'),
    spritesmith = require('gulp.spritesmith'),
    runSequence = require('run-sequence'),
    revHash = require('gulp-rev-hash'),
    rsync = require('rsyncwrapper').rsync,
    secrets = require('./secrets.json');

// Define some project variables
var destApp = 'public',
    srcApp = 'src',
    destCSS = destApp + '/assets/css',
    destJS = destApp + '/assets/js',
    destImages = destApp + '/assets/images',
    srcSASS = srcApp + '/assets/scss',
    srcJS = srcApp + '/assets/js',
    srcImages = srcApp + '/assets/images';

// Define my src files
function srcFiles(path) {
  var srcFiles = [
    path+'/.htaccess',
    path+'/*.php',
    path+'/assets/font/**',
    path+'/libs/**',
    path+'/scripts/**',
    path+'/includes/**',
    path+'/robots.txt',
    path+'/sitemap.xml'
  ];

  return srcFiles;
}

// Styles task
gulp.task('styles', function() {
    return gulp.src(srcSASS+'/styles.scss')
      .pipe(sass({ style: 'compact', sourcemap: true }))
      .pipe(autoprefixer('last 2 version'))
      .pipe(gulp.dest(destCSS))
      .pipe(notify({ message: 'Styles task complete' }));
});

// Scripts task
gulp.task('scripts', function() {
    return gulp.src([
        ''+srcJS+'/plugins/*.js',
        ''+srcJS+'/main.js'
      ])
      .pipe(concat('scripts.min.js'))
      .pipe(uglify())
      .pipe(gulp.dest(destJS))
      .pipe(notify({ message: 'Scripts task complete' }));
});

// Images task
gulp.task('images', function() {
  return gulp.src(srcImages+'/**/*')
      .pipe(newer(destImages))
      .pipe(imagemin())
      .pipe(gulp.dest(destImages));
});

// Copy files from src to public
gulp.task('copy', ['cleanApp'], function() {
  return gulp.src(srcFiles(srcApp), { base: './src' })
    .pipe(gulp.dest(destApp))
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
      .pipe(gulp.dest(destCSS))
      .pipe(notify({ message: 'Minification task complete' }));
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
  runSequence(['styles', 'scripts', 'images'],'copy','rev-hash', 'minify',cb);
});

// Watch
gulp.task('watch', function() {
  // Watch .scss files
  gulp.watch(srcSASS+'/**/*.scss', ['styles', 'rev-hash']);

  // Watch .js files
  gulp.watch(srcJS+'/**/*.js', ['scripts']);

  // Watch PHP files
  gulp.watch(srcFiles(srcApp), ['copy']);

  // Watch image files
  gulp.watch(srcImages+'/**/*', ['images']);

  // Create LiveReload server
  var server = livereload();

  // Watch any files in dist/, reload on change
  gulp.watch([srcApp+'/**']).on('change', function(file) {
    server.changed(file.path);
  });
});
