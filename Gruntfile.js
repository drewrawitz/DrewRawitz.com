module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    imageoptim: {
      myTask: {
        options: {
          jpegMini: false,
          imageAlpha: true,
          quitAfter: true
        },
        src: ['assets/images']
      }
    }
  });

  grunt.loadNpmTasks('grunt-imageoptim');

  // Tasks.
  grunt.registerTask('default', ['imageoptim']);

};