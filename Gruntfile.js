module.exports = function(grunt) {

    var scripts = ['js/all.js','js/global.js','js/jquery.eventCalendar.js'];

    // To support SASS/SCSS or Stylus, just install
    // the appropriate grunt package and it will be automatically included
    // in the build process, Sass is included by default:
    //
    // * for SASS/SCSS support, run `npm install --save-dev grunt-contrib-sass`
    // * for Stylus/Nib support, `npm install --save-dev grunt-contrib-stylus`

    grunt.initConfig({

        // Watches for changes and runs tasks
        watch : {
            js : {
                files : ['js/**/*.js'],
                options : {
                    livereload : true
                }
            },
            php : {
                files : ['**/*.php'],
                options : {
                    livereload : true
                }
            },
            css : {
                files : ['css/**/*.css'],
                options : {
                    livereload : true
                }
            }
        },
        cssmin:{
            production:{
                files:{
                    'dist/css/styles.min.css':['css/**/*.css']
                }
            }

        },

        // JsHint your javascript
        jshint : {
            all : ['js/*.js'],
            options : {
                browser: true,
                curly: false,
                eqeqeq: false,
                eqnull: true,
                expr: true,
                immed: true,
                newcap: true,
                noarg: true,
                smarttabs: true,
                sub: true,
                undef: false
            }
        },

        // Dev and production build for sass
        // sass : {
        //     production : {
        //         files : {
        //             'dist/css/styles.min.css':'scss/build.scss'
        //         },
        //         options : {
        //             style : 'compressed'
        //         }
        //     },
        //     dev : {
        //         files : [
        //             {
        //                 src : ['**/*.scss','!founcations/*.scss', '!**/_*.scss','!**/build.scss'],
        //                 cwd : 'scss',
        //                 dest : 'css',
        //                 ext : '.css',
        //                 expand : true
        //             }
        //         ],
        //         options : {
        //             style : 'expanded'
        //         }
        //     }
        // },

        // Image min
        imagemin : {
            production : {
                files : [
                    {
                        expand: true,
                        cwd: 'img',
                        src: '**/*.{png,jpg,jpeg,gif}',
                        dest: 'dist/img'
                    }
                ]
            }
        },

        copy: {
            production: {
                files: [{
                    expand:true,
                    cwd:'./',
                    src:['**/*','!**/dist/**','!**/js/**','!**/img/**','!**/css/**','!stylesheets','!package.json','!bower.json','!**/bower_components/**','!node_modules/**','!**/scss/**','!Gruntfile.js','!old.index.php'],
                    dest: 'dist'
                }]
            }
        },
        concat:{
            options:{
                separator:';\n',
            },
            production:{
                src:scripts,
                dest:"dist/js/scripts.js",
            }
        },
        uglify:{
            production:{
                files:{
                    'dist/js/scripts.min.js':["dist/js/scripts.js"]
                }
            }
        },
        "ftp-deploy":{
            production:{
                auth:{
                    host:'murphyspubsalem.com',
                    port:21,
                    authKey:'murphysKey'
                },
                src:"dist",
                dest:"public_html",
                serverSep: '/',
                concurrency: 4,
                progress: true
            }
        }
    });

    // Default task
    grunt.registerTask('default', ['watch','copy:dev']);

    // Build task
    grunt.registerTask('build',['cssmin:production','concat','uglify','imagemin:production','copy:production']);


    grunt.registerTask('cp',['copy']);
    grunt.registerTask('concat',['concat']);
    grunt.registerTask('uglify',['ugilfy']);
    grunt.registerTask('image',['imagemin']);
    grunt.registerTask('deploy',['ftp-deploy']);

    // Load up tasks
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-ftp-deploy');

};
