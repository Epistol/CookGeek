/*
 * Toasty v0.1.2
 * Show Dan Forden's Toasty from Mortal Kombat as an Easter Egg for your website
 * (c)2014 Ruben Torres - rubentdlh@gmail.com
 * Released under the MIT license
 */

(function ($) {

    //singleton
    var singleToasty;

    function Toasty(elem, options)
    {
        this.options = options;
    }

    Toasty.prototype = {

        //initialize including neccesary elements in DOM
        init: function () {
            //Add to dom needed elements
            $("body").append('<div id="cdg_t"><img src="' + this.options.image + '" alt="toasty"></div>');

            $("#cdg_t").css({
                position: 'fixed',
                right: '-100%',
                bottom: '0px',
                display: 'flex',
            });
            if (this.options.sound) {
                $("body").append('<audio id="toasty-audio"><source src="' + this.options.sound + '" type="audio/mpeg"></source></audio>');
            }
        },

        pop: function () {
            var audio = document.getElementById('toasty-audio');
            audio.volume = 0.5;
            audio.play();
            $("#cdg_t").addClass("show-dan");
            setTimeout(function () {
                $("#cdg_t").removeClass("show-dan");
            }, 1000);
        }

    };

    $.fn.toasty = function (options) {

        this.each(function () {
            // Check if we should operate with some method
            if (/^(pop)$/i.test(options)) {
                // Normalize method's name
                options = options.toLowerCase();
                switch (options) {
                    case 'pop':
                        singleToasty.pop();
                        break;
                }
            } else if (typeof options == 'object' || !options) {
                options = $.extend({}, $.fn.toasty.defaults, options);
                if (!singleToasty) {
                    singleToasty = new Toasty($(this), options);
                    singleToasty.init();
                }
            }
        });

    };



    $.fn.toasty.defaults = {
        sound: true,
        image: toast_png,
        sound: toast_mp3
    };

})(jQuery);
