module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    /**
     * Set project info
     */
    project: {
      css: ['assets/css'],
      sass: ['assets/scss'],
      images: ['assets/images'],
      js: ['assets/js']
    },

    /**
     * Project banner
     * Dynamically appended to CSS/JS files
     * Inherits text from package.json
     */
    tag: {
      banner: '/*!\n' +
              ' * <%= pkg.title %>\n' +
              ' * <%= pkg.description %>\n' +
              ' * <%= pkg.url %>\n' +
              ' * @author <%= pkg.author %> <<%= pkg.email %>>\n' +
              ' * @version <%= pkg.version %>\n' +
              ' * Copyright <%= pkg.copyright %>. <%= pkg.license %> licensed.\n' +
              ' */\n'
    },

    /**
     * Build bower components
     * https://github.com/yatskevich/grunt-bower-task
     */
    bower: {
      dist: {
        dest: '<%= project.js %>/vendor/'
      }
    },

    /**
     * Minify PNG and JPEG images.
     * https://github.com/gruntjs/grunt-contrib-imagemin
     */
    imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: 'assets/images/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'assets/images/'
        }]
      }
    },

    /**
     * Smushit
     * Optimize images using Yahoo Smushit
     * https://github.com/heldr/grunt-smushit
     */
    smushit: {
      images: {
        src: ['<%= project.images %>/*']
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
          sassDir: '<%= project.sass %>',
          cssDir: '<%= project.css %>',
          imagesDir: '<%= project.images %>',
          httpGeneratedImagesPath: '../images',
          outputStyle: 'expanded',
          noLineComments: true
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
          '<%= project.css %>/global.min.css': ['<%= project.css %>/global.css']
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
          '<%= project.js %>/scripts.min.js': ['<%= project.js %>/plugins/*', '<%= project.js %>/scripts.js']
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
        files: ['<%= project.js %>/plugins/*', '<%= project.js %>/scripts.js'],
        tasks: ['uglify']
      },
      css: {
        files: '<%= project.sass %>/*',
        tasks: ['compass', 'cssmin']
      },
      images: {
        files: ['<%= project.images %>/*'],
        tasks: ['smushit']
      },
      livereload: {
        options: { livereload: true },
        files: [
          '<%= project.css %>/*.css'
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
  grunt.registerTask('default', ['bower', 'uglify', 'compass', 'cssmin']);

  /**
   * Image Optimization task
   * Run `grunt optim` on the command line
   */
  grunt.registerTask('optim', ['smushit']);

};