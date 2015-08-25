module.exports = function(grunt) {

    //Initializing the configuration object
    grunt.initConfig({

        // Task configuration
        concat: {
            options: {
                separator: ';'
            },
            js: {
                src: [
                    './bower_components/jquery/dist/jquery.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js',
                    './bower_components/jquery-validation/dist/jquery.validate.js',
                    './bower_components/jquery-ui/ui/core.js',
                    './bower_components/jquery-ui/ui/datepicker.js',
                    './bower_components/jquery-ui/ui/i18n/datepicker-en-AU.js',
                    './bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js',
                    './node_modules/bootbox/bootbox.js',
                    './resources/assets/js/plugins/*.js',
                    './resources/assets/js/app.js',
                    './resources/assets/js/flash_messages.js'
                ],
                dest: './public/assets/js/app.js'
            },
            css_third_party: {
                options: {
                  separator: ''
                },
                src: [
                    './bower_components/jquery-ui/themes/ui-darkness/jquery-ui.css',
                    './bower_components/jquery-ui/themes/ui-darkness/theme.css',
                    './resources/assets/css/libs/select2.min.css',
                    './resources/assets/css/libs/timepicker.css',
                    "./resources/assets/css/libs/ionicons.css"
                ],
                dest:'./public/assets/css/third-party.css'
            },
            css_theme: {
                src: [
                    "./resources/assets/css/theme.css",
                    "./resources/assets/css/fixes.css"

                ],
                dest: "./public/assets/css/theme.css"
            }
        },
        less: {
            development: {
                options: {
                    compress: true
                },
                files : {
                    "./resources/assets/css/fixes.css":"./resources/assets/less/fixes.less",
                    "./resources/assets/css/libs/timepicker.css":"./bower_components/bootstrap-timepicker/less/timepicker.less",
                    "./resources/assets/css/libs/ionicons.css":"./bower_components/ionicons/less/ionicons.less",
                    "./resources/assets/css/theme.css":"./resources/assets/less/themes/superhero/bootswatch.less"
                    //"./resources/assets/css/theme.css":"./bower_components/bootstrap/less/bootstrap.less"
                }
            }
        },
        uglify: {
        },
        phpunit: {
            classes: {

            },
            options: {

            }
        },
        watch: {
            js: {
                files: [
                    './bower_components/jquery/dist/jquery.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js',
                    './resources/assets/js/plugins/select2.min.js',
                    './resources/assets/js/panels.js',
                    './resources/assets/js/flash_messages.js',
                    './resources/assets/js/app.js'
                ],
                tasks: ['concat:js'],
                options: {
                    livereload: true
                }
            },
            less: {
                files: ['./resources/assets/stylesheets/*.less'],
                tasks: ['less'],
                options: {
                    livereload: true
                }
            }
        }
    });

    // Plugin loading
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    //grunt.loadNpmTasks('grunt-contrib-uglify');
    //grunt.loadNpmTasks('grunt-phpunit');

    // Task definition
    grunt.registerTask('default', ['watch']);

};