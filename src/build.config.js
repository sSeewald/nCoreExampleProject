module.exports = {

    distPath: {
        root: '../public',
        js: '<%= distPath.root %>/js',
        css: '<%= distPath.root %>/css'
    },

    liveReload: {
        port: 9001
        /*key: grunt.file.read('path/to/ssl.key'),
         cert: grunt.file.read('path/to/ssl.crt')*/
    },
    phpConf: {
        hostname: 'localhost',
        bin: '/usr/local/zend/bin/php',
        router: '../routing.php',
        port: 5002,
        keepAlive: false,
        openBrowser: true
    },
    files_build: {
        ts: [
            'ts/**/*.ts'
        ],
        ts_html: [
            'ts/**/*.html'
        ],
        js: [
            'js/**/*.js'
        ],
        vendor: [
            'vendor/**/*.js'
        ]
    },
    files_vendor: {
        js: [
            'vendor/angular/angular.js',
            'vendor/**/*.js',
            '!vendor/**/*.min.js',
            '!vendor/**/test/*.js'
        ],
        css: []
    }

};