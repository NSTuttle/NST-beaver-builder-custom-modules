/*!
 * Bootstrap v3.3.7 (http://getbootstrap.com)
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

/*!
 * Beaver Builder Tabs (Toggle Column ID) is a modified version of Bootstrap 3 transition.js + tab.js
 * Changes: Renamed all relevant functions with 'p3' for noConflict
 + added !!container.find('> .fl-col-content > .fade').length to support Beaver Builder Column Generation
 *
 * Generated using the Bootstrap Customizer (http://getbootstrap.com/customize/?id=949f5f3cd0b9221f770ac05eaf80354c)
 * Config saved to config.json and https://gist.github.com/949f5f3cd0b9221f770ac05eaf80354c
 */
if (typeof jQuery === 'undefined') {
    throw new Error('P3nguin\'s Tabs JavaScript requires jQuery')
}
+function ($) {
    'use strict';
    var version = $.fn.jquery.split(' ')[0].split('.')
    if ((version[0] < 2 && version[1] < 9) || (version[0] == 1 && version[1] == 9 && version[2] < 1) || (version[0] > 3)) {
        throw new Error('P3nguin\'s Tabs JavaScript requires jQuery version 1.9.1 or higher, but lower than version 4')
    }
}(jQuery);

/* ========================================================================
 * Bootstrap: tab.js v3.3.7
 * http://getbootstrap.com/javascript/#tabs
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // TABp3 CLASS DEFINITION
    // ====================

    var Tabp3 = function (element) {
        // jscs:disable requireDollarBeforejQueryAssignment
        this.element = $(element);
        // jscs:enable requireDollarBeforejQueryAssignment
    };

    Tabp3.VERSION = '3.3.7';

    Tabp3.TRANSITION_DURATION = 150;

    Tabp3.prototype.show = function () {
        var $this    = this.element;
        var $ul      = $this.closest('ul:not(.dropdown-menu)');
        var selector = $this.data('target');

        if (!selector) {
            selector = $this.attr('href');
            selector = selector && selector.replace(/.*(?=#[^\s]*$)/, ''); // strip for ie7
        }

        if ($this.parent('li').hasClass('active')) return;

        var $previous = $ul.find('.active:last a');
        var hideEvent = $.Event('hide.bs.tabp3', {
            relatedTarget: $this[0]
        })
        var showEvent = $.Event('show.bs.tabp3', {
            relatedTarget: $previous[0]
        })

        $previous.trigger(hideEvent);
        $this.trigger(showEvent);

        if (showEvent.isDefaultPrevented() || hideEvent.isDefaultPrevented()) return;

        var $target = $(selector);

        this.activate($this.closest('li'), $ul);
        this.activate($target, $target.parent(), function () {
            $previous.trigger({
                type: 'hidden.bs.tabp3',
                relatedTarget: $this[0]
            });
            $this.trigger({
                type: 'shown.bs.tabp3',
                relatedTarget: $previous[0]
            })
        })
    };

    Tabp3.prototype.activate = function (element, container, callback) {
        var $active    = container.find('> .active');
        var transition = callback
            && $.support.transitionp3
            && ($active.length && $active.hasClass('fade') || (!!container.find('> .fade').length || !!container.find('> .fl-col-content > .fade').length) )

        function next() {
            $active
                .removeClass('active')
                .find('> .dropdown-menu > .active')
                .removeClass('active')
                .end()
                .find('[data-toggle="tab"]')
                .attr('aria-expanded', false);

            element
                .addClass('active')
                .find('[data-toggle="tab"]')
                .attr('aria-expanded', true);

            if (transition) {
                element[0].offsetWidth // reflow for transition
                element.addClass('in')
            } else {
                element.removeClass('fade')
            }

            if (element.parent('.dropdown-menu').length) {
                element
                    .closest('li.dropdown')
                    .addClass('active')
                    .end()
                    .find('[data-toggle="tab"]')
                    .attr('aria-expanded', true)
            }

            callback && callback()
        }

        $active.length && transition ?
            $active
                .one('bsTransitionEndp3', next)
                .emulateTransitionEndp3(Tabp3.TRANSITION_DURATION) :
            next();

        $active.removeClass('in')
    };


    // TAB PLUGINp3 DEFINITION
    // =====================

    function Pluginp3(option) {
        return this.each(function () {
            var $this = $(this);
            var data  = $this.data('bs.tabp3');

            if (!data) $this.data('bs.tabp3', (data = new Tabp3(this)));
            if (typeof option == 'string') data[option]()
        })
    }

    var old = $.fn.tabp3;

    $.fn.tabp3            = Pluginp3;
    $.fn.tabp3.Constructor = Tabp3;


    // TABp3 NO CONFLICT
    // ===============

    $.fn.tabp3.noConflict = function () {
        $.fn.tabp3 = old;
        return this
    };


    // TABp3 DATA-API
    // ============

    var clickHandler = function (e) {
        e.preventDefault();
        Pluginp3.call($(this), 'show')
    };

    $(document)
        .on('click.bs.tabp3.data-api', '[data-toggle="tab"]', clickHandler)
        .on('click.bs.tabp3.data-api', '[data-toggle="pill"]', clickHandler)

}(jQuery);

/* ========================================================================
 * Bootstrap: transition.js v3.3.7
 * http://getbootstrap.com/javascript/#transitions
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // CSS TRANSITION SUPPORT (Shoutout: http://www.modernizr.com/)
    // ============================================================

    function transitionEndp3() {
        var el = document.createElement('bootstrapp3');

        var transEndEventNamesp3 = {
            WebkitTransition : 'webkitTransitionEndp3',
            MozTransition    : 'transitionendp3',
            OTransition      : 'oTransitionEndp3 otransitionendp3',
            transition       : 'transitionendp3'
        };

        for (var name in transEndEventNamesp3) {
            if (el.style[name] !== undefined) {
                return { end: transEndEventNamesp3[name] }
            }
        }

        return false; // explicit for ie8 (  ._.)
    }

    // http://blog.alexmaccaw.com/css-transitions
    $.fn.emulateTransitionEndp3 = function (duration) {
        var called = false;
        var $el = this;
        $(this).one('bsTransitionEndp3', function () { called = true });
        var callback = function () { if (!called) $($el).trigger($.support.transitionp3.end) };
        setTimeout(callback, duration);
        return this
    };

    $(function () {
        $.support.transitionp3 = transitionEndp3();

        if (!$.support.transitionp3) return;

        $.event.special.bsTransitionEndp3 = {
            bindType: $.support.transitionp3.end,
            delegateType: $.support.transitionp3.end,
            handle: function (e) {
                if ($(e.target).is(this)) return e.handleObj.handler.apply(this, arguments)
            }
        }
    })

}(jQuery);


//if("undefined"==typeof jQuery)throw new Error("P3nguin's Tabs JavaScript requires jQuery");+function(t){"use strict";var n=t.fn.jquery.split(" ")[0].split(".");if(n[0]<2&&n[1]<9||1==n[0]&&9==n[1]&&n[2]<1||n[0]>3)throw new Error("P3nguin's Tabs JavaScript requires jQuery version 1.9.1 or higher, but lower than version 4")}(jQuery),+function(t){"use strict";function n(n){return this.each(function(){var a=t(this),i=a.data("bs.tabp3");i||a.data("bs.tabp3",i=new e(this)),"string"==typeof n&&i[n]()})}var e=function(n){this.element=t(n)};e.VERSION="3.3.7",e.TRANSITION_DURATION=150,e.prototype.show=function(){var n=this.element,e=n.closest("ul:not(.dropdown-menu)"),a=n.data("target");if(a||(a=n.attr("href"),a=a&&a.replace(/.*(?=#[^\s]*$)/,"")),!n.parent("li").hasClass("active")){var i=e.find(".active:last a"),r=t.Event("hide.bs.tabp3",{relatedTarget:n[0]}),s=t.Event("show.bs.tabp3",{relatedTarget:i[0]});if(i.trigger(r),n.trigger(s),!s.isDefaultPrevented()&&!r.isDefaultPrevented()){var o=t(a);this.activate(n.closest("li"),e),this.activate(o,o.parent(),function(){i.trigger({type:"hidden.bs.tabp3",relatedTarget:n[0]}),n.trigger({type:"shown.bs.tabp3",relatedTarget:i[0]})})}}},e.prototype.activate=function(n,a,i){function r(){s.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!1),n.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded",!0),o?(n[0].offsetWidth,n.addClass("in")):n.removeClass("fade"),n.parent(".dropdown-menu").length&&n.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!0),i&&i()}var s=a.find("> .active"),o=i&&t.support.transitionp3&&(s.length&&s.hasClass("fade")||!!a.find("> .fade").length||!!a.find("> .fl-col-content > .fade").length);s.length&&o?s.one("bsTransitionEndp3",r).emulateTransitionEndp3(e.TRANSITION_DURATION):r(),s.removeClass("in")};var a=t.fn.tabp3;t.fn.tabp3=n,t.fn.tabp3.Constructor=e,t.fn.tabp3.noConflict=function(){return t.fn.tabp3=a,this};var i=function(e){e.preventDefault(),n.call(t(this),"show")};t(document).on("click.bs.tabp3.data-api",'[data-toggle="tab"]',i).on("click.bs.tabp3.data-api",'[data-toggle="pill"]',i)}(jQuery),+function(t){"use strict";function n(){var t=document.createElement("bootstrapp3"),n={WebkitTransition:"webkitTransitionEndp3",MozTransition:"transitionendp3",OTransition:"oTransitionEndp3 otransitionendp3",transition:"transitionendp3"};for(var e in n)if(void 0!==t.style[e])return{end:n[e]};return!1}t.fn.emulateTransitionEndp3=function(n){var e=!1,a=this;t(this).one("bsTransitionEndp3",function(){e=!0});var i=function(){e||t(a).trigger(t.support.transitionp3.end)};return setTimeout(i,n),this},t(function(){t.support.transitionp3=n(),t.support.transitionp3&&(t.event.special.bsTransitionEndp3={bindType:t.support.transitionp3.end,delegateType:t.support.transitionp3.end,handle:function(n){if(t(n.target).is(this))return n.handleObj.handler.apply(this,arguments)}})})}(jQuery);