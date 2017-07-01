var Architector = angular.module('Architector', ['templates', 'ngCookies', 'ngSanitize', 'angularFileUpload'], function () {
    //
});

$(function () {
    angular.bootstrap(document, ['Architector']);
});
(function () {
    'use strict';

    /**
     * @param {Scope} scope
     * @param {Function} callback
     */
    angular.safeApply = function (scope, callback) {
        scope[(scope.$$phase || scope.$root.$$phase)
            ? '$eval'
            : '$apply'](callback || function () {
                //
            });
    };

    /**
     * Detects if application is loaded under mobile device
     *
     * @todo: optimize method to increase detecting accuracy.
     */
    angular.isMobile = (function (a) {
        return /((iP([oa]+d|(hone)))|Android|WebOS|BlackBerry|windows (ce|phone))/i.test(a);
    })(navigator.userAgent || navigator.vendor || window.opera);

    /**
     * Detects device's online|offline status
     *
     * @returns {WorkerNavigator|Navigator|boolean}
     */
    angular.isOnline = function isOnline() {
        return (window.navigator && window.navigator.onLine);
    };

    /**
     * Find a parent scope containing property {prop}.
     * @param scope
     * @param prop
     * @returns {*}
     */
    angular.findScopeWithProperty = function (scope, prop) {
        var $parent = scope.$parent;
        do {
            if ($parent && $parent.hasOwnProperty(prop)) {
                break;
            } else if (!$parent) {
                return null;
            }
            $parent = $parent.$parent;
        } while (true);

        return $parent;
    };
})(angular);
angular
    .module('templates', [])
    .run(['$templateCache', function ($templateCache) {
        $templateCache.put('alert.html',
            '<div class="alert">alert</div>'
        );
    }]);

Architector.controller('MediaController', [
    '$scope', '$timeout', 'FileStorage', 'Selection', 'FileUploader',
    function($scope, $timeout, FileStorage, Selection, FileUploader) {
        var $response = {};

        $scope.$tmpFile = null;

        $scope.uploadUrl = function(path) {
            var url = window.UPLOADER_URL;
            var params = $.param({path: (path && path.length) ? path : window.REQUEST_PATH});

            return url + '?' + params;
        };

        $scope.dropZoneOptions = function(file) {
            return {
                url: $scope.uploadUrl(file.path),
                autoUpload: true,
            };
        };

        $scope.uploader = new FileUploader({
            url: $scope.uploadUrl(),
            headers: {
                'X-CSRF-TOKEN': window.XSRF_TOKEN,
            },
            autoUpload: false,
            onCompleteItem: function(item, response, status, headers) {
                if (201 === status) {
                    $scope.files.push(response.path);
                    item.remove();
                }

                if (302 === status) {
                    item.remove();
                }
            },
        });

        var $files = (window.mediaFiles || []);

        $scope.directories = [];
        $scope.files = [];

        if (window.REQUEST_PATH.length) {
            $scope.directories.push('../');
        }
        $files.forEach(function(file) {
            if (file.isDir) {
                $scope.directories.push(file);
            } else {
                $scope.files.push(file);
            }
        });

        $scope.selection = Selection;

        $timeout(function() {
            $scope.loading = false;
        }, 500);

        $scope.loading = true;

        $scope.open = function(file) {
            if ('../' === file) {
                var path = window.REQUEST_PATH.split('/');
                path = path.splice(0, path.length - 1).join('/');
                window.location.href = '?path=' + path;

                return false;
            }

            var isDir = !!file.isDir;

            if (isDir) {
                $scope.loading = true;
                window.location.href = '?path=' + file.path;
            }

            return false;
        };

        $scope.makeDirectory = function(name) {
            $response = {};

            FileStorage.mkdir(name).then(setResponse).then(function(response) {
                if ($scope.responseOk()) {
                    angular.safeApply($scope, function($scope) {
                        $scope.directories.push(response.data.data);
                        $scope.name = '';
                    });
                }
            }).catch(function(response) {
                $response = response;
            });
        };

        $scope.move = function(target) {
            FileStorage.move($scope.selection.all(), target).then(setResponse).then(function(response) {
                if ($scope.responseOk()) {
                    angular.safeApply($scope, function($scope) {
                        angular.forEach($scope.selection.all(), function(file) {
                            $scope.files.splice($scope.files.indexOf(file), 1);
                        });

                        $('#move').modal('toggle');

                        $timeout($scope.selection.clean, 500);
                    });
                }
            });
        };

        $scope.rename = function(toName) {
            var renaming = $scope.selection.first();
            if (!(renaming && toName)) {
                setResponse({
                    statusText: 400,
                    data: {message: 'Missing name.'},
                });

                return;
            }

            FileStorage.rename(renaming, toName).then(setResponse).then(function(response) {
                if ($scope.responseOk()) {
                    // Replace renamed file.
                    $scope.files = $scope.files.map(function(file) {
                        if (file.basename === renaming.basename) {
                            return response.data.file;
                        }
                        return file;
                    });

                    $('#rename').modal('toggle');

                    $timeout($scope.selection.clean, 500);
                }
            }).catch(function(response) {
                setResponse({
                    statusText: response.status,
                    data: {message: response.data.message},
                });
            });
        };

        $scope.remove = function(object) {
            if (!window.confirm('Delete! Are you sure?')) {
                return false;
            }

            var selected = object ? [object] : $scope.selection.all();
            FileStorage.removeSelected(selected).then(setResponse).then(function(response) {
                selected.forEach(function(file) {
                    var index;

                    index = $scope.files.indexOf(file);
                    if (index > -1) {
                        $scope.files.splice(index, 1);
                    }

                    index = $scope.directories.indexOf(file);
                    if (index > -1) {
                        $scope.directories.splice(index, 1);
                    }
                });

            }).then($scope.selection.clean());
        };

        $scope.upload = function() {
            $('[nv-file-select]').trigger('click');
        };

        $(document).on('dragleave', '[nv-file-over]', function() {
            $(this).removeClass('file-over');
        });

        $scope.responseOk = function() {
            return String($response.status).match(/^20\d+/g);
        };

        $scope.responseMessage = function() {
            return $response.hasOwnProperty('data') && $response.data.hasOwnProperty('message')
                ? $response.data.message
                : $response.statusText;
        };

        var setResponse = function(response) {
            $response = response;

            $timeout(function() {
                $response = {};
            }, 3000);

            return $response;
        };
    }]);
Architector.factory('FileStorage', ['$http', function ($http) {
    var factory = {};
    var basedir = window.REQUEST_PATH || '';

    function toFilename(file) {
        return file.basename;
    }

    factory.mkdir = function (name) {
        return $http.post('/admin/media', {
            basedir: basedir,
            name: name
        }).then(function (response) {
            return response;
        });
    };

    factory.move = function (files, target) {
        return $http.post('/admin/media/move', {
            files: files.map(toFilename),
            target: target,
            basedir: basedir
        }).then(function (response) {
            return response;
        });
    };

    factory.rename = function (from, to) {
        return $http.post('/admin/media/rename', {
            from: from.path,
            to: to
        });
    };

    factory.removeSelected = function (files) {
        return $http.post('/admin/media/remove', {
            files: files.filter(function (file) {
                return file.isFile;
            }).map(toFilename),
            directories: files.filter(function (file) {
                return file.isDir;
            }).map(toFilename)
        });
    };

    return factory;
}]);
Architector.factory('Selection', [
    function() {
        var $selected = [];

        var $factory = {
            all: function() {
                return $selected;
            },
            first: function() {
                return $selected.length ? $selected[0] : null;
            },
            has: function(file) {
                return !!$selected.filter(function(f) {
                    return f.basename === file.basename;
                }).length;
            },
            exists: function() {
                return $selected.length;
            },
            multiple: function() {
                return $selected.length > 1;
            },
            count: function() {
                return $selected.length;
            },
            toggle: function(file) {
                return this.has(file)
                    ? $selected.splice($selected.indexOf(file), 1)
                    : $selected.push(file);
            },
            clean: function() {
                $selected = [];
            },
            info: function(attribute) {
                if ($selected.length !== 1) {
                    return;
                }

                return (attribute && $selected[0].hasOwnProperty(attribute)) ? $selected[0][attribute] : $selected;
            },
        };

        return $factory;
    }]);