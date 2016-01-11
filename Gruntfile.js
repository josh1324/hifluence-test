module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {

      dist: {
        options: {
          style: 'compressed',
          sourcemap: 'none'
        },
        files: {
          'css/main.css': 'scss/main.scss'
        }
      }
    },

    concat: {
      options: {
        separator: ';',
      },
      dist: {
        src: [

        // Vendor Components (js files)
          // foundation core
          'js/vendor/foundation.js',
          // foundation components
          'js/vendor/foundation/foundation.alert.js',

          // Facebook init and fb.api(/me)
          'js/vendor/jquery-fblogin/jquery.fblogin.js',

        // All Custom js files
        'js/custom/*.js'

        ],
        // Concat all the files above into one single file
        dest: 'js/main.js',
      },
    },

    uglify: {
      dist: {
        files: {
          // Shrink the file size by removing spaces
          'js/main.js': ['js/main.js']
        }
      }
    },

    watch: {
      grunt: {
        options: {
          reload: true
        },
        files: ['Gruntfile.js']
      },

      sass: {
        files: 'scss/**/*.scss',
        tasks: ['sass'],
        // om alles live te reloaden
        options: {
          livereload:true,
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('build', ['sass', 'concat', 'uglify']);
  grunt.registerTask('default', ['build','watch']);
}
