module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    /**
     * Set project info
     */
    project: {
      css: ['assets/scss/*'],
      js: ['assets/js/vendor/modernizr-2.6.2.js', 'assets/js/plugins/*', 'assets/js/scripts.js']
    },

    /**
     * Project banner
     * Dynamically appended to CSS/JS files
     * Inherits text from package.json
     */
    tag: {
      banner: '/*!\n' +
              ' * @author <%= pkg.author %> <<%= pkg.email %>>\n' +
              ' * <%= pkg.title %>\n' +
              ' * <%= pkg.url %>\n' +
              ' * @version <%= pkg.version %>\n' +
              ' * Copyright <%= pkg.copyright %>. <%= pkg.license %> licensed.\n' +
              ' */\n'
    },
    /**
     * Smushit
     * Optimize images using Yahoo Smushit
     * https://github.com/heldr/grunt-smushit
     */
    smushit: {
      images: {
        src: ['assets/images/*']
      }
    },
    /**
     * Compass
     * Compile Sass to CSS using Compass
     * https://github.com/gruntjs/grunt-contrib-compass
     */
    compass: {
      dist: {
        options: {
          sassDir: 'assets/scss',
          cssDir: 'assets/css',
          imagesDir: 'assets/images',
          httpGeneratedImagesPath: '../images',
          outputStyle: 'expanded'
        }
      }
    },
    /**
     * CSSMin
     * CSS minification
     * https://github.com/gruntjs/grunt-contrib-cssmin
     */
    cssmin: {
      add_banner: {
        options: {
          banner: '<%= tag.banner %>',
          keepSpecialComments: 0
        },
        files: {
          'assets/css/global.min.css': ['assets/css/global.css']
        }
      }
    },
    /**
     * Uglify (minify) JavaScript files
     * https://github.com/gruntjs/grunt-contrib-uglify
     * Compresses and minifies all JavaScript files into one
     */
    uglify: {
      options: {
        banner: '<%= tag.banner %>'
      },
      dist: {
        files: {
          'assets/js/scripts.min.js': '<%= project.js %>'
        }
      }
    },
    /**
     * Runs tasks against changed watched files
     * https://github.com/gruntjs/grunt-contrib-watch
     * Watching development files and run concat/compile tasks
     * Livereload the browser once complete
     */
    watch: {
      js: {
        files: '<%= project.js %>',
        tasks: ['uglify']
      },
      css: {
        files: '<%= project.css %>',
        tasks: ['compass', 'cssmin']
      },
      images: {
        files: ['assets/images/*'],
        tasks: ['smushit']
      },
      livereload: {
        options: { livereload: true },
        files: [
          'assets/css/*.css'
        ]
      }
    }
  });

  /**
   * Dynamically load npm tasks
   */
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  /**
   * Default task
   * Run `grunt` on the command line
   */
  grunt.registerTask('default', ['uglify', 'compass', 'cssmin']);

  /**
   * Image Optimization task
   * Run `grunt optim` on the command line
   */
  grunt.registerTask('optim', ['smushit']);

};