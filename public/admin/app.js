/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 165);
/******/ })
/************************************************************************/
/******/ ({

/***/ 165:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(19);


/***/ }),

/***/ 19:
/***/ (function(module, exports) {

eval("var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nvar AdminArchitect = function () {\n    function AdminArchitect() {\n        _classCallCheck(this, AdminArchitect);\n\n        ['SidebarNavigation', 'Panels', 'Collections', 'BatchActions', 'DateControls', 'LiveSearch', 'Fancybox'].map(function (method) {\n            AdminArchitect['handle' + method].call();\n        });\n    }\n\n    _createClass(AdminArchitect, null, [{\n        key: 'handleSidebarNavigation',\n        value: function handleSidebarNavigation() {\n            var toggleMenu = function toggleMenu(marginLeft, marginMain) {\n                var emailList = $(window).width() <= 768 && $(window).width() > 640 ? 320 : 360;\n\n                if ($('.mainpanel').css('position') === 'relative') {\n                    $('.logopanel, .leftpanel').animate({ left: marginLeft }, 'fast');\n                    $('.headerbar, .mainpanel').animate({ left: marginMain }, 'fast');\n\n                    $('.emailcontent, .email-options').animate({ left: marginMain }, 'fast');\n                    $('.emailpanel').animate({ left: marginMain + emailList }, 'fast');\n\n                    var $body = $('body');\n                    if ('hidden' === $body.css('overflow')) {\n                        $body.css({ overflow: '' });\n                    } else {\n                        $body.css({ overflow: 'hidden' });\n                    }\n                } else {\n                    $('.logopanel, .leftpanel').animate({ marginLeft: marginLeft }, 'fast');\n                    $('.headerbar, .mainpanel').animate({ marginLeft: marginMain }, 'fast');\n\n                    $('.emailcontent, .email-options').animate({ left: marginMain }, 'fast');\n                    $('.emailpanel').animate({ left: marginMain + emailList }, 'fast');\n                }\n            };\n\n            $('#menuToggle').click(function () {\n                var $panel = $('.mainpanel');\n                var collapsedMargin = $panel.css('margin-left');\n                var collapsedLeft = $panel.css('left');\n\n                if (collapsedMargin === '220px' || collapsedLeft === '220px') {\n                    toggleMenu(-220, 0);\n                } else {\n                    toggleMenu(0, 220);\n                }\n            });\n\n            $('.nav-parent > a').on('click', function () {\n                var gran = $(this).closest('.nav');\n                var parent = $(this).parent();\n                var sub = parent.find('> ul');\n\n                if (sub.is(':visible')) {\n                    sub.slideUp(200);\n                    if (parent.hasClass('nav-active')) {\n                        parent.removeClass('nav-active');\n                    }\n                } else {\n                    $(gran).find('.children').each(function () {\n                        $(this).slideUp();\n                    });\n\n                    sub.slideDown(200);\n\n                    if (!parent.hasClass('active')) {\n                        parent.addClass('nav-active');\n                    }\n                }\n                return false;\n            });\n        }\n    }, {\n        key: 'handlePanels',\n        value: function handlePanels() {\n            // Close panel\n            $('.panel-remove').click(function () {\n                $(this).closest('.panel').fadeOut(function () {\n                    $(this).remove();\n                });\n            });\n\n            // Minimize panel\n            $('.panel-minimize').click(function () {\n                var parent = $(this).closest('.panel');\n\n                parent.find('.panel-body').slideToggle(function () {\n                    var panelHeading = parent.find('.panel-heading');\n\n                    if (panelHeading.hasClass('min')) {\n                        panelHeading.removeClass('min');\n                    } else {\n                        panelHeading.addClass('min');\n                    }\n                });\n            });\n        }\n    }, {\n        key: 'handleCollections',\n        value: function handleCollections() {\n            $(document).on('click', '.toggle-collection', function () {\n                var fn = $(this);\n\n                $('input[type=checkbox].collection-item').each(function () {\n                    $(this).prop('checked', fn.prop('checked'));\n                });\n            });\n        }\n    }, {\n        key: 'handleBatchActions',\n        value: function handleBatchActions() {\n            function selected() {\n                return $('input[type=checkbox]:checked.collection-item');\n            }\n\n            $(document).on('click', '.batch-actions a[data-action]', function () {\n                if (!selected().length) {\n                    return false;\n                }\n\n                if ((msg = $(this).data('confirmation')) && !window.confirm(msg)) {\n                    return false;\n                }\n\n                $('#batch_action').val($(this).data('action'));\n                $('#collection').submit();\n\n                return false;\n            });\n        }\n    }, {\n        key: 'handleDateControls',\n        value: function handleDateControls() {\n            $('[data-filter-type=\"date\"]').datepicker({\n                format: 'yyyy-mm-dd',\n                clearBtn: false,\n                multidate: false\n            });\n\n            $('[data-filter-type=\"daterange\"]').daterangepicker({\n                format: 'YYYY-MM-DD',\n                ranges: {\n                    'Today': [moment(), moment()],\n                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],\n                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],\n                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],\n                    'This Month': [moment().startOf('month'), moment().endOf('month')],\n                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]\n                },\n                startDate: moment().subtract(29, 'days'),\n                endDate: moment()\n            });\n        }\n    }, {\n        key: 'handleLiveSearch',\n        value: function handleLiveSearch() {\n            $('[data-type=\"livesearch\"]').selectize({\n                valueField: 'id',\n                labelField: 'name',\n                searchField: ['name'],\n                create: false,\n                loadThrottle: 500,\n                maxOptions: 100,\n                load: function load(query, callback) {\n                    if (!query.length >= 3) return callback();\n\n                    var selectize = $($(this)[0].$input);\n\n                    var baseUrl = selectize.data('url');\n                    var url = baseUrl + (-1 === baseUrl.indexOf('?') ? '?' : '&');\n                    url += 'query=' + query;\n\n                    $.ajax({\n                        url: url,\n                        type: 'GET',\n                        error: callback,\n                        success: function success(res) {\n                            if (!res.hasOwnProperty('items')) {\n                                console.error('Livesearch response should have \"items\" collection. ' + 'Each element in collection must have at least 2 keys: \"id\" and \"name\"');\n\n                                return false;\n                            }\n\n                            return callback(res.items);\n                        }\n                    });\n                }\n            });\n        }\n    }, {\n        key: 'handleFancybox',\n        value: function handleFancybox() {\n            $('.fancybox').fancybox({\n                afterLoad: function afterLoad() {\n                    var width = void 0,\n                        height = void 0;\n                    if (width = $(this.element).data('width')) {\n                        this.width = width;\n                    }\n\n                    if (height = $(this.element).data('height')) {\n                        this.height = height;\n                    }\n                }\n            });\n        }\n    }]);\n\n    return AdminArchitect;\n}();\n\n$(function () {\n    new AdminArchitect();\n});//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMTkuanMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vcmVzb3VyY2VzL2Fzc2V0cy9hZG1pbmlzdHJhdG9yL2pzL2FwcC5qcz84YTljIl0sInNvdXJjZXNDb250ZW50IjpbImNsYXNzIEFkbWluQXJjaGl0ZWN0IHtcbiAgICBjb25zdHJ1Y3RvcigpIHtcbiAgICAgICAgW1xuICAgICAgICAgICAgJ1NpZGViYXJOYXZpZ2F0aW9uJywgJ1BhbmVscycsICdDb2xsZWN0aW9ucycsICdCYXRjaEFjdGlvbnMnLFxuICAgICAgICAgICAgJ0RhdGVDb250cm9scycsICdMaXZlU2VhcmNoJywgJ0ZhbmN5Ym94J1xuICAgICAgICBdLm1hcCgobWV0aG9kKSA9PiB7XG4gICAgICAgICAgICBBZG1pbkFyY2hpdGVjdFsnaGFuZGxlJyArIG1ldGhvZF0uY2FsbCgpO1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBzdGF0aWMgaGFuZGxlU2lkZWJhck5hdmlnYXRpb24oKSB7XG4gICAgICAgIGNvbnN0IHRvZ2dsZU1lbnUgPSAobWFyZ2luTGVmdCwgbWFyZ2luTWFpbikgPT4ge1xuICAgICAgICAgICAgbGV0IGVtYWlsTGlzdCA9ICgkKHdpbmRvdykud2lkdGgoKSA8PSA3NjggJiYgJCh3aW5kb3cpLndpZHRoKCkgPiA2NDApID8gMzIwIDogMzYwO1xuXG4gICAgICAgICAgICBpZiAoJCgnLm1haW5wYW5lbCcpLmNzcygncG9zaXRpb24nKSA9PT0gJ3JlbGF0aXZlJykge1xuICAgICAgICAgICAgICAgICQoJy5sb2dvcGFuZWwsIC5sZWZ0cGFuZWwnKS5hbmltYXRlKHtsZWZ0OiBtYXJnaW5MZWZ0fSwgJ2Zhc3QnKTtcbiAgICAgICAgICAgICAgICAkKCcuaGVhZGVyYmFyLCAubWFpbnBhbmVsJykuYW5pbWF0ZSh7bGVmdDogbWFyZ2luTWFpbn0sICdmYXN0Jyk7XG5cbiAgICAgICAgICAgICAgICAkKCcuZW1haWxjb250ZW50LCAuZW1haWwtb3B0aW9ucycpLmFuaW1hdGUoe2xlZnQ6IG1hcmdpbk1haW59LCAnZmFzdCcpO1xuICAgICAgICAgICAgICAgICQoJy5lbWFpbHBhbmVsJykuYW5pbWF0ZSh7bGVmdDogbWFyZ2luTWFpbiArIGVtYWlsTGlzdH0sICdmYXN0Jyk7XG5cbiAgICAgICAgICAgICAgICBsZXQgJGJvZHkgPSAkKCdib2R5Jyk7XG4gICAgICAgICAgICAgICAgaWYgKCdoaWRkZW4nID09PSAkYm9keS5jc3MoJ292ZXJmbG93JykpIHtcbiAgICAgICAgICAgICAgICAgICAgJGJvZHkuY3NzKHtvdmVyZmxvdzogJyd9KTtcbiAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICAkYm9keS5jc3Moe292ZXJmbG93OiAnaGlkZGVuJ30pO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgJCgnLmxvZ29wYW5lbCwgLmxlZnRwYW5lbCcpLmFuaW1hdGUoe21hcmdpbkxlZnQ6IG1hcmdpbkxlZnR9LCAnZmFzdCcpO1xuICAgICAgICAgICAgICAgICQoJy5oZWFkZXJiYXIsIC5tYWlucGFuZWwnKS5hbmltYXRlKHttYXJnaW5MZWZ0OiBtYXJnaW5NYWlufSwgJ2Zhc3QnKTtcblxuICAgICAgICAgICAgICAgICQoJy5lbWFpbGNvbnRlbnQsIC5lbWFpbC1vcHRpb25zJykuYW5pbWF0ZSh7bGVmdDogbWFyZ2luTWFpbn0sICdmYXN0Jyk7XG4gICAgICAgICAgICAgICAgJCgnLmVtYWlscGFuZWwnKS5hbmltYXRlKHtsZWZ0OiBtYXJnaW5NYWluICsgZW1haWxMaXN0fSwgJ2Zhc3QnKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfTtcblxuICAgICAgICAkKCcjbWVudVRvZ2dsZScpLmNsaWNrKGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgbGV0ICRwYW5lbCA9ICQoJy5tYWlucGFuZWwnKTtcbiAgICAgICAgICAgIGxldCBjb2xsYXBzZWRNYXJnaW4gPSAkcGFuZWwuY3NzKCdtYXJnaW4tbGVmdCcpO1xuICAgICAgICAgICAgbGV0IGNvbGxhcHNlZExlZnQgPSAkcGFuZWwuY3NzKCdsZWZ0Jyk7XG5cbiAgICAgICAgICAgIGlmIChjb2xsYXBzZWRNYXJnaW4gPT09ICcyMjBweCcgfHwgY29sbGFwc2VkTGVmdCA9PT0gJzIyMHB4Jykge1xuICAgICAgICAgICAgICAgIHRvZ2dsZU1lbnUoLTIyMCwgMCk7XG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgIHRvZ2dsZU1lbnUoMCwgMjIwKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG5cbiAgICAgICAgJCgnLm5hdi1wYXJlbnQgPiBhJykub24oJ2NsaWNrJywgZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICBsZXQgZ3JhbiA9ICQodGhpcykuY2xvc2VzdCgnLm5hdicpO1xuICAgICAgICAgICAgbGV0IHBhcmVudCA9ICQodGhpcykucGFyZW50KCk7XG4gICAgICAgICAgICBsZXQgc3ViID0gcGFyZW50LmZpbmQoJz4gdWwnKTtcblxuICAgICAgICAgICAgaWYgKHN1Yi5pcygnOnZpc2libGUnKSkge1xuICAgICAgICAgICAgICAgIHN1Yi5zbGlkZVVwKDIwMCk7XG4gICAgICAgICAgICAgICAgaWYgKHBhcmVudC5oYXNDbGFzcygnbmF2LWFjdGl2ZScpKSB7IHBhcmVudC5yZW1vdmVDbGFzcygnbmF2LWFjdGl2ZScpOyB9XG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICQoZ3JhbikuZmluZCgnLmNoaWxkcmVuJykuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICAgICAgJCh0aGlzKS5zbGlkZVVwKCk7XG4gICAgICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgICAgICBzdWIuc2xpZGVEb3duKDIwMCk7XG5cbiAgICAgICAgICAgICAgICBpZiAoIXBhcmVudC5oYXNDbGFzcygnYWN0aXZlJykpIHtcbiAgICAgICAgICAgICAgICAgICAgcGFyZW50LmFkZENsYXNzKCduYXYtYWN0aXZlJyk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfVxuICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBzdGF0aWMgaGFuZGxlUGFuZWxzKCkge1xuICAgICAgICAvLyBDbG9zZSBwYW5lbFxuICAgICAgICAkKCcucGFuZWwtcmVtb3ZlJykuY2xpY2soZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAkKHRoaXMpLmNsb3Nlc3QoJy5wYW5lbCcpLmZhZGVPdXQoZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgJCh0aGlzKS5yZW1vdmUoKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcblxuICAgICAgICAvLyBNaW5pbWl6ZSBwYW5lbFxuICAgICAgICAkKCcucGFuZWwtbWluaW1pemUnKS5jbGljayhmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIGxldCBwYXJlbnQgPSAkKHRoaXMpLmNsb3Nlc3QoJy5wYW5lbCcpO1xuXG4gICAgICAgICAgICBwYXJlbnQuZmluZCgnLnBhbmVsLWJvZHknKS5zbGlkZVRvZ2dsZShmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICBsZXQgcGFuZWxIZWFkaW5nID0gcGFyZW50LmZpbmQoJy5wYW5lbC1oZWFkaW5nJyk7XG5cbiAgICAgICAgICAgICAgICBpZiAocGFuZWxIZWFkaW5nLmhhc0NsYXNzKCdtaW4nKSkge1xuICAgICAgICAgICAgICAgICAgICBwYW5lbEhlYWRpbmcucmVtb3ZlQ2xhc3MoJ21pbicpO1xuICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgIHBhbmVsSGVhZGluZy5hZGRDbGFzcygnbWluJyk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIHN0YXRpYyBoYW5kbGVDb2xsZWN0aW9ucygpIHtcbiAgICAgICAgJChkb2N1bWVudCkub24oJ2NsaWNrJywgJy50b2dnbGUtY29sbGVjdGlvbicsIGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgbGV0IGZuID0gJCh0aGlzKTtcblxuICAgICAgICAgICAgJCgnaW5wdXRbdHlwZT1jaGVja2JveF0uY29sbGVjdGlvbi1pdGVtJykuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICAkKHRoaXMpLnByb3AoJ2NoZWNrZWQnLCBmbi5wcm9wKCdjaGVja2VkJykpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIHN0YXRpYyBoYW5kbGVCYXRjaEFjdGlvbnMoKSB7XG4gICAgICAgIGZ1bmN0aW9uIHNlbGVjdGVkKCkge1xuICAgICAgICAgICAgcmV0dXJuICQoJ2lucHV0W3R5cGU9Y2hlY2tib3hdOmNoZWNrZWQuY29sbGVjdGlvbi1pdGVtJyk7XG4gICAgICAgIH1cblxuICAgICAgICAkKGRvY3VtZW50KS5vbignY2xpY2snLCAnLmJhdGNoLWFjdGlvbnMgYVtkYXRhLWFjdGlvbl0nLCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIGlmICghc2VsZWN0ZWQoKS5sZW5ndGgpIHtcbiAgICAgICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIGlmICgobXNnID0gJCh0aGlzKS5kYXRhKCdjb25maXJtYXRpb24nKSkgJiYgIXdpbmRvdy5jb25maXJtKG1zZykpIHtcbiAgICAgICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICQoJyNiYXRjaF9hY3Rpb24nKS52YWwoJCh0aGlzKS5kYXRhKCdhY3Rpb24nKSk7XG4gICAgICAgICAgICAkKCcjY29sbGVjdGlvbicpLnN1Ym1pdCgpO1xuXG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIHN0YXRpYyBoYW5kbGVEYXRlQ29udHJvbHMoKSB7XG4gICAgICAgICQoJ1tkYXRhLWZpbHRlci10eXBlPVwiZGF0ZVwiXScpLmRhdGVwaWNrZXIoe1xuICAgICAgICAgICAgZm9ybWF0OiAneXl5eS1tbS1kZCcsXG4gICAgICAgICAgICBjbGVhckJ0bjogZmFsc2UsXG4gICAgICAgICAgICBtdWx0aWRhdGU6IGZhbHNlLFxuICAgICAgICB9KTtcblxuICAgICAgICAkKCdbZGF0YS1maWx0ZXItdHlwZT1cImRhdGVyYW5nZVwiXScpLmRhdGVyYW5nZXBpY2tlcih7XG4gICAgICAgICAgICBmb3JtYXQ6ICdZWVlZLU1NLUREJyxcbiAgICAgICAgICAgIHJhbmdlczoge1xuICAgICAgICAgICAgICAgICdUb2RheSc6IFttb21lbnQoKSwgbW9tZW50KCldLFxuICAgICAgICAgICAgICAgICdZZXN0ZXJkYXknOiBbbW9tZW50KCkuc3VidHJhY3QoMSwgJ2RheXMnKSwgbW9tZW50KCkuc3VidHJhY3QoMSwgJ2RheXMnKV0sXG4gICAgICAgICAgICAgICAgJ0xhc3QgNyBEYXlzJzogW21vbWVudCgpLnN1YnRyYWN0KDYsICdkYXlzJyksIG1vbWVudCgpXSxcbiAgICAgICAgICAgICAgICAnTGFzdCAzMCBEYXlzJzogW21vbWVudCgpLnN1YnRyYWN0KDI5LCAnZGF5cycpLCBtb21lbnQoKV0sXG4gICAgICAgICAgICAgICAgJ1RoaXMgTW9udGgnOiBbbW9tZW50KCkuc3RhcnRPZignbW9udGgnKSwgbW9tZW50KCkuZW5kT2YoJ21vbnRoJyldLFxuICAgICAgICAgICAgICAgICdMYXN0IE1vbnRoJzogW21vbWVudCgpLnN1YnRyYWN0KDEsICdtb250aCcpLnN0YXJ0T2YoJ21vbnRoJyksIG1vbWVudCgpLnN1YnRyYWN0KDEsICdtb250aCcpLmVuZE9mKCdtb250aCcpXSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICBzdGFydERhdGU6IG1vbWVudCgpLnN1YnRyYWN0KDI5LCAnZGF5cycpLFxuICAgICAgICAgICAgZW5kRGF0ZTogbW9tZW50KCksXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIHN0YXRpYyBoYW5kbGVMaXZlU2VhcmNoKCkge1xuICAgICAgICAkKCdbZGF0YS10eXBlPVwibGl2ZXNlYXJjaFwiXScpLnNlbGVjdGl6ZSh7XG4gICAgICAgICAgICB2YWx1ZUZpZWxkOiAnaWQnLFxuICAgICAgICAgICAgbGFiZWxGaWVsZDogJ25hbWUnLFxuICAgICAgICAgICAgc2VhcmNoRmllbGQ6IFsnbmFtZSddLFxuICAgICAgICAgICAgY3JlYXRlOiBmYWxzZSxcbiAgICAgICAgICAgIGxvYWRUaHJvdHRsZTogNTAwLFxuICAgICAgICAgICAgbWF4T3B0aW9uczogMTAwLFxuICAgICAgICAgICAgbG9hZDogZnVuY3Rpb24ocXVlcnksIGNhbGxiYWNrKSB7XG4gICAgICAgICAgICAgICAgaWYgKCFxdWVyeS5sZW5ndGggPj0gMykgcmV0dXJuIGNhbGxiYWNrKCk7XG5cbiAgICAgICAgICAgICAgICBsZXQgc2VsZWN0aXplID0gJCgkKHRoaXMpWzBdLiRpbnB1dCk7XG5cbiAgICAgICAgICAgICAgICBsZXQgYmFzZVVybCA9IHNlbGVjdGl6ZS5kYXRhKCd1cmwnKTtcbiAgICAgICAgICAgICAgICBsZXQgdXJsID0gYmFzZVVybCArICgtMSA9PT0gYmFzZVVybC5pbmRleE9mKCc/JykgPyAnPycgOiAnJicpO1xuICAgICAgICAgICAgICAgIHVybCArPSAncXVlcnk9JyArIHF1ZXJ5O1xuXG4gICAgICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICAgICAgdXJsOiB1cmwsXG4gICAgICAgICAgICAgICAgICAgIHR5cGU6ICdHRVQnLFxuICAgICAgICAgICAgICAgICAgICBlcnJvcjogY2FsbGJhY2ssXG4gICAgICAgICAgICAgICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uKHJlcykge1xuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCFyZXMuaGFzT3duUHJvcGVydHkoJ2l0ZW1zJykpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmVycm9yKFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAnTGl2ZXNlYXJjaCByZXNwb25zZSBzaG91bGQgaGF2ZSBcIml0ZW1zXCIgY29sbGVjdGlvbi4gJyArXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICdFYWNoIGVsZW1lbnQgaW4gY29sbGVjdGlvbiBtdXN0IGhhdmUgYXQgbGVhc3QgMiBrZXlzOiBcImlkXCIgYW5kIFwibmFtZVwiJyxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICApO1xuXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgICAgICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4gY2FsbGJhY2socmVzLml0ZW1zKTtcbiAgICAgICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH0sXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIHN0YXRpYyBoYW5kbGVGYW5jeWJveCgpIHtcbiAgICAgICAgJCgnLmZhbmN5Ym94JykuZmFuY3lib3goe1xuICAgICAgICAgICAgYWZ0ZXJMb2FkOiBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICBsZXQgd2lkdGgsIGhlaWdodDtcbiAgICAgICAgICAgICAgICBpZiAod2lkdGggPSAkKHRoaXMuZWxlbWVudCkuZGF0YSgnd2lkdGgnKSkge1xuICAgICAgICAgICAgICAgICAgICB0aGlzLndpZHRoID0gd2lkdGg7XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgaWYgKGhlaWdodCA9ICQodGhpcy5lbGVtZW50KS5kYXRhKCdoZWlnaHQnKSkge1xuICAgICAgICAgICAgICAgICAgICB0aGlzLmhlaWdodCA9IGhlaWdodDtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9LFxuICAgICAgICB9KTtcbiAgICB9XG59XG5cbiQoZnVuY3Rpb24oKSB7XG4gICAgbmV3IEFkbWluQXJjaGl0ZWN0O1xufSk7XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9hZG1pbmlzdHJhdG9yL2pzL2FwcC5qcyJdLCJtYXBwaW5ncyI6Ijs7OztBQUFBO0FBQ0E7QUFBQTtBQUNBO0FBQUE7QUFJQTtBQUNBO0FBQ0E7QUFDQTs7O0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFBQTtBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBSEE7QUFDQTtBQUtBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQU5BO0FBUUE7QUFDQTtBQVhBO0FBYUE7OztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBSUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQWZBO0FBaUJBO0FBakNBO0FBbUNBOzs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQVZBO0FBWUE7Ozs7OztBQUdBO0FBQ0E7QUFDQSIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ })

/******/ });