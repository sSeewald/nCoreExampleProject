module.exports = function (grunt) {
    "use strict";

    grunt.loadNpmTasks("grunt-php");
    grunt.loadNpmTasks("grunt-ts");
    grunt.loadNpmTasks("grunt-sass");
    grunt.loadNpmTasks("grunt-contrib-concat");
    grunt.loadNpmTasks("grunt-contrib-copy");
    grunt.loadNpmTasks("grunt-contrib-clean");
    grunt.loadNpmTasks("grunt-contrib-uglify");
    grunt.loadNpmTasks("grunt-contrib-cssmin");
    grunt.loadNpmTasks("grunt-contrib-copy");
    grunt.loadNpmTasks("grunt-ng-annotate");
    grunt.loadNpmTasks("grunt-contrib-watch");

    var buildConfig = require("./build.config.js");

    var taskConfig = {
        pkg: grunt.file.readJSON("package.json"),

        ts: {
            options: {
                compile: true,                 // perform compilation. [true (default) | false]
                comments: false,               // same as !removeComments. [true | false (default)]
                target: "es3",                 // target javascript language. [es3 (default) | es5]
                module: "amd",                 // target javascript module style. [amd (default) | commonjs]
                sourceMap: true,               // generate a source map for every output js file. [true (default) | false]
                sourceRoot: "",                // where to locate TypeScript files. [(default) "" == source ts location]
                mapRoot: "",                   // where to locate .map.js files. [(default) "" == generated js location.]
                declaration: false             // generate a declaration .d.ts file for every output js file. [true | false (default)]

            },
            dist: {
                src: "<%= files_build.ts  %>",
                html: "<%= files_build.ts_html  %>",
                reference: "./ts/reference.ts",
                out: "<%= distPath.js %>/app.js"
            }
        },

        ngAnnotate: {
            options: {
                singleQuotes: true
            },
            app: {
                files: [
                    {
                        src: ["<%= distPath.js %>/app.js"],
                        ext: ".js",
                        extDot: "last",
                        dest: "<%= distPath.js %>/app.js"
                    }
                ]
            }
        },

        sass: {
            dist: {
                options: {
                    sourceMap: true
                },
                files: {
                    "<%= distPath.css %>/default.css": "sass/default.scss"
                }
            }
        },

        // minimize task
        uglify: {
            options: {
                sourceMap: true
            },
            dist: {
                options: {
                    preserveComments: false
                },
                files: [
                    {
                        src: ["<%= distPath.js %>/app.js"],
                        dest: "<%= distPath.js  %>/app.min.js"
                    }
                ]
            },
            vendor: {
                options: {
                    preserveComments: "some"
                },
                files: [
                    {
                        src: ["<%= distPath.js %>/vendor.js"],
                        dest: "<%= distPath.js %>/vendor.min.js"
                    }
                ]
            },
            extra: {
                options: {
                    preserveComments: false
                },
                files: [
                    {
                        expand: true,
                        flatten: true,
                        cwd: "js/",
                        src: "**/*.js",
                        dest: "<%= distPath.js %>/",
                        ext: ".min.js"
                    }
                ]
            }

        },

        copy: {
            extra: {
                files: [
                    {
                        src: ["<%= files_build.js %>"],
                        dest: "<%= distPath.js %>/",
                        cwd: ".",
                        expand: true,
                        flatten: true
                    }
                ]
            }
        },

        concat: {
            options: {
                separator: "\n",
                sourceMap: true
            },
            vendor: {
                src: ["<%= files_vendor.js %>", "<%= files_vendor.js_ui_bootstrap %>"],
                dest: "<%= distPath.js %>/vendor.js"
            }
        },

        cssmin: {
            minify: {
                expand: true,
                cwd: "<%= distPath.css %>",
                src: ["*.css", "!*.min.css"],
                dest: "<%= distPath.css %>",
                ext: ".min.css"
            }
        },
        clean: {
            options: {
                "no-write": false,
                force: true
            },
            js: {
                src: ["<%= distPath.js %>/*.js",
                    "<%= distPath.js %>/*.js.map",
                    "!<%= distPath.js %>/*.min.js",
                    "<%= distPath.css %>/*.css",
                    "<%= distPath.css %>/*.css.map",
                    "!<%= distPath.css %>/*.min.css"]
            }
        },

        watch: {
            options: {
                livereload: {
                    port: "<%= liveReload.port %>"
                }
            },
            ts: {
                files: ["ts/**/*.ts"],
                tasks: ["ts:dist"]
            },
            extra: {
                files: ["<%= files_build.js %>"],
                tasks: ["uglify:extra"]
            },
            vendor: {
                files: ["<%= files_build.vendor %>"],
                tasks: ["concat:vendor"]
            },
            sass: {
                options: {
                    livereload: false
                },
                files: ["sass/**/*.{scss,sass}"],
                tasks: ["sass:dist"]
            },
            css: {
                files: ["<%= distPath.css %>/**/*.css"],
                tasks: []
            }
        },

        php: {
            dev: {
                options: {
                    hostname: "<%= phpConf.hostname %>",
                    port: "<%= phpConf.port %>",
                    base: "<%= distPath.root %>",
                    bin: "<%= phpConf.bin %>",
                    keepalive: "<%= phpConf.keepAlive %>",
                    router: "<%= phpConf.router %>",
                    open: "<%= phpConf.openBrowser %>"
                }
            }
        }

    };

    grunt.initConfig(grunt.util._.extend(taskConfig, buildConfig));


    grunt.registerTask("minify", ["cssmin", "ngAnnotate:app", "uglify"]);

    grunt.registerTask("build", ["ts:dist", "sass:dist", "concat", "minify", "clean"]);

    grunt.registerTask("prep", ["ts:dist", "sass:dist", "concat", "minify"]);

    grunt.registerTask("watchAll", ["php", "watch"]);


};