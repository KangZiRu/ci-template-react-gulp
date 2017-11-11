"use strict";

/**
Anderlyne CSS Framework



MIT License

Copyright (c) 2017 Prasna Lukito

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/

var contextMenu,
    $context = [];

$(document).ready(function() {
    $("[data-watch='height']").anderlyne("height");

    $(".dropdown").click(function() {
        var that = $(this),
            dDId = that.attr("data-dropdown-id");

        $("*[data-dropdown='" + dDId + "']").slideToggle();
    });

    $.each($(".select-group"), function(i) {
        if ($(this).find("[data-selected]").length == 0) {
            $(this).find("[data-value]:first-of-type").attr("data-selected", true);
        }
    });

    $(".select-group *[data-group]").click(function() {
        $(this).parent().find("*").removeAttr("data-selected");
        $(this).attr("data-selected", true);
    });

    $(".slider-item").click(function() {}).mousemove(function() {
        console.log("dmqwoidw");
    });

    $("body").append('\
<div id="rev-notif" class="modal" data-modal>\
<div class="content">\
<div class="header"><h2 align="center">Notification</h2><span data-modal-close>X</span></div>\
<div class="body">\
<p>This is notification</p>\
</div>\
</div>\
</div>\
<div id="anderlyne-notif-bar">\
<h3>Notification</h3>\
<span data-dismiss>x</span>\
<p>This is notification</p>\
</div>\
<div id="anderlyne-notif-fly">\
<p>This is notification</p>\
</div>\
<div id="anderlyne-title"></div>');

    $("#anderlyne-notif-bar *[data-dismiss]").click(function() {
        $("#anderlyne-notif-bar").css("left", "-1000px");
    });
    $(document).anderlyne("main");
});

jQuery.fn.extend({
    anderlyne: function anderlyne(func, param1) {
        var a = this;

        var main = {
            modal: function modal(x) {
                if (typeof x == 'undefined') {
                    x = "n";
                }
                if (x == "n") {
                    a.fadeToggle();
                    a.children('.content').slideToggle();
                } else if (x == "open") {
                    a.fadeIn();
                    a.children('.content').slideDown();
                    $(a).trigger("modalOpened");
                } else if (x == "close") {
                    a.fadeOut();
                    a.children('.content').slideUp();
                    $(a).trigger("modalClosed");
                }
                return a;
            },
            height: function height() {
                var el = a.children();
                var z = el.map(function() {
                    return $(this).height();
                }).get();

                var max = Math.max.apply(null, z);

                return el.height(max);
            },
            clearInput: function clearInput() {
                a.find("input[type='text'], input[type='password'], input[type='number'], input[type='date'], input[type='datetime'],textarea").val("");
                a.find("select").find("option").removeAttr("selected");
                a.find("select").find("option:first-child").attr("selected", true);
            },
            main: function main(x) {
                if (typeof x == "undefined") {
                    x = document;
                }

                $(x).on("click", "div[data-modal]", function(event) {
                    var that = $(this);
                    if (event.target.id == $(this).attr("id")) {
                        that.anderlyne("modal", "close");
                    }
                });

                $(x).on("click", "[data-modal-close]", function() {
                    var modal = $(this).parents("[data-modal]");
                    modal.anderlyne("modal", "close");
                    return false;
                });

                $(x).on("click", "[data-open-modal]", function() {
                    var modal = $(this).attr("data-open-modal");
                    $("#" + modal).anderlyne("modal", "open");
                });

                $(x).on("mouseenter", "[data-title]", function(e) {
                    $("#anderlyne-title").html($(this).attr("data-title"));
                    $("#anderlyne-title").show();
                    if (e.pageX >= window.innerWidth - 150) {
                        var leftPos = e.pageX - $("#anderlyne-title").width();
                    } else {
                        var leftPos = e.pageX + 15;
                    }
                    $("#anderlyne-title").offset({
                        left: leftPos,
                        top: e.pageY + 15
                    });
                });

                $(x).on("mousemove", '[data-title]', function(e) {
                    if (e.pageX >= window.innerWidth - $("#anderlyne-title").width() - 40) {
                        var leftPos = e.pageX - $("#anderlyne-title").width();
                    } else {
                        var leftPos = e.pageX + 15;
                    }
                    $("#anderlyne-title").offset({
                        left: leftPos,
                        top: e.pageY + 15
                    });
                });

                $(x).on("mousemove", "#anderlyne-title", function(e) {
                    if (e.pageX >= window.innerWidth - $(this).width()) {
                        var leftPos = e.pageX - $("#anderlyne-title").width() - 10;
                    } else {
                        var leftPos = e.pageX + 15;
                    }
                    $("#anderlyne-title").offset({
                        left: leftPos,
                        top: e.pageY + 15
                    });
                });

                $(x).on("mouseleave", '[data-title]', function() {
                    $("#anderlyne-title").hide();
                    $("#anderlyne-title").html("");
                });

                $(document).keyup(function(event) {
                    if (event.which == 27 && $("div[data-modal]:visible").length > 0 && $("input:focus, select:focus").length == 0) {
                        $("div[data-modal]:visible").anderlyne("modal", "close");
                    }
                });

                $(x).on("contextmenu", "[data-open-context]", function(e) {
                    contextMenu = $("#" + $(this).attr("data-open-context"))[0];

                    $context.currentTarget = e.currentTarget;
                    $context.index = $(e.currentTarget).index();
                    x = e.pageX;
                    y = e.pageY;
                    var width = $(contextMenu).width;

                    if (x + width >= $(document).width()) {
                        x = $(document).width() - width - 10;
                    }

                    $(contextMenu).css({
                        left: x,
                        top: y
                    }).show();

                    return false;
                });

                $(document).on("click", "[data-dropdown-menu]", function(e) {
                    var att = $(this).attr("data-dropdown-menu");
                    var t = $("#" + att), that = $(this);
                    t.css({
                        top: that.position().top + 4,
                        left: that.position().left
                    });

                    $("[data-dropdown][id!='" + att + "']").hide();
                    t.toggle();

                    return false;
                });

                $(window).click(function(e) {
                    $("[data-dropdown]").hide();
                    $("[data-context-menu]").hide().offset({
                        x: 0,
                        y: 0
                    });
                });

                $(document).on("click", "[data-discoverable]", function() {
                    if ($(this).attr("data-discoverable") == "open") {
                        $(this).attr("data-discoverable", true);
                        $("#" + $(this).attr("data-list")).slideUp(300);
                    } else {
                        $(this).attr("data-discoverable", "open");
                        $("#" + $(this).attr("data-list")).slideDown(300);
                    }
                });

                $.each($("[data-discoverable='open']"), function(i, v) {
                    var attr = $(v).attr("data-list");
                    $("#" + attr).show();
                });

                // $("[data-dropdown] li").click(function() {
                //     $(this).parent("[data-dropdown]").slideUp();
                // })
            }
        };

        if (typeof param1 == 'undefined') {
            main[func]();
        } else {
            main[func](param1);
        }
    }
});

var Input = function Input() {
        var that = this;

        function keyboard(event) {
            var key = event.which;
            if (key >= 48 && key <= 222 || key == 8 || key == 36) {
                return true;
            } else {
                return false;
            }
        }

        function Validate() {
            this.alphanum = function(val) {
                return (/^[a-zA-Z0-9\x20]+$/.test(val));
            };

            this.alpha = function(val) {
                return (/^[a-zA-Z\x20]+$/.test(val));
            };

            this.number = function(val) {
                return (/^[0-9]+$/.test(val));
            };
        }

        function Write() {
            this.error = function(a) {
                a.css("borderColor", "red");
                return a;
            };

            this.success = function(a) {
                a.css("borderColor", "#00FF00");
                return a;
            };

            this.normal = function(a) {
                a.css("borderColor", "#AAAAFF");
                return a;
            };
        }

        return {
            keyboard: keyboard,
            Validate: Validate,
            Write: Write
        };
    },
    anderlyne = function() {
        var that = this;

        function notifWindow(str, title) {
            if (typeof title == 'undefined') {
                title = null;
            }

            if (title != null) {
                $("#rev-notif").find(".title").html("<h2>" + str + "</h2>");
            }

            if (str != null) {
                $("#rev-notif").find(".body").html("<p>" + str + "</p>");
                $("#rev-notif").anderlyne('modal', "open");
            }

            return that;
        }

        function notifBar(str, title, style) {
            if (typeof title == "undefined") {
                title = null;
                style = "default";
            }

            if (typeof style == "undefined") {
                style = "default";
            }

            var a = "#anderlyne-notif-bar";
            if (title == null) {
                title = "Notification";
            }
            $(a).removeClass();
            $(a).addClass(style);
            $(a + " h3").html(title);
            $(a + " p").html(str);
            $(a).css("left", "0");

            countDownTimer({
                count: 0,
                limit: 5,
                time: 1000,
                success: function success() {
                    $(a).css("left", "-1000px");
                }
            });

            return that;
        }

        function notifFly(str, style) {
            if (typeof style == "undefined") {
                style = "default";
            }

            var a = "#anderlyne-notif-fly";
            $(a).removeClass();
            $(a).addClass(style);
            $(a + " p").html(str);
            $(a).css("top", "30px");
            countDownTimer({
                count: 0,
                limit: 5,
                time: 1000,
                success: function success() {
                    $("#anderlyne-notif-fly").css("top", "-100px");
                }
            });

            return that;
        }

        function contextMenu(config) {
            $("body").append('<table id="' + config.id + '" data-context-menu>\
                        <tbody>\
                            \
                        </tbody>\
                    </table>');

            var t;

            if (typeof config.init != 'undefined') {
                config.init();
            }

            var x = config.items;
            $.each(x, function(i, v) {
                var icon = '';
                if (typeof v['icon'] != "undefined") icon = '<td class="ico">' + v['icon'] + '</td>';

                t = $("#" + config.id + " tbody").append('<tr>' + icon + '<td>' + v['name'] + '</td>\
                            </tr>');

                var curItem = $(t)[0],
                    child = $(curItem).children()[i];

                if (typeof v['action'] != 'undefined') {
                    $(child).click(function() {
                        var y = v['action'];
                        y($($context.currentTarget));
                    });
                }
            });

            return that;
        }

        return {
            notifWindow: notifWindow,
            notifBar: notifBar,
            notifFly: notifFly,
            contextMenu: contextMenu
        };
    }();

var input = new Input();

function countDownTimer(setup) {
    setup.count++;
    if (setup.count < setup.limit) {
        setTimeout(function() {
            countDownTimer(setup);
        }, setup.time);
    } else if (setup.count >= setup.limit) {
        setup.success();
    }
}
