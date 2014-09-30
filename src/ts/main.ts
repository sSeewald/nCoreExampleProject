interface appIRootScope extends ng.IScope {
    windowWidth:number;
}

class config {

    static $inject = ['$interpolateProvider'];

    constructor($interpolateProvider:ng.IInterpolateProvider) {
        $interpolateProvider.startSymbol('{$').endSymbol('$}');
    }
}

class bootStrap {

    static $inject = ['$rootScope', '$window', 'smoothScroll'];

    constructor($rootScope:appIRootScope, $window, smoothScroll) {
        $rootScope.windowWidth = $window.outerWidth;

        angular.element($window).bind('resize', function () {

            $rootScope.windowWidth = $window.outerWidth;
            $rootScope.$apply('windowWidth');

        });

        angular.element(document).ready(function () {
            var h = window.location.hash.substring(1);
            if (h) {
                smoothScroll(document.getElementById(h), 0);
            }
        });

    }

}

angular.module('app.dependencies', ['ngAnimate', 'ui.bootstrap', 'smoothScroll', 'ngStorage']);

angular.module('app', ['app.dependencies', 'app.controllers', 'app.services', 'app.directives'])
    .config(<Function>config).run(<Function>bootStrap);
