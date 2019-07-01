;(function (root, factory) {
    if ((!(window && window.document) && !(root && root.document))) {
        throw new Error("ImageMap requires a window with a document");
    }
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof exports === 'object' && typeof exports.nodeName !== 'string') {
        // CommonJS
        module.exports = factory(require('jquery'));
    } else {
        // Browser globals
        root.ImageMap = factory(root.jQuery);
    }
}(this || window, function ($) {
    'use strict';

    var ImageMap = function (selector) {
        var self = this;

        if (!self) { return new ImageMap(selector); }

        self.selector = selector instanceof Array ? selector : [].slice.call(document.querySelectorAll(selector));
        self.start = function(){ return this.update()};
        (self.update = function () {
            $(".mission_link").remove();
            self.selector.forEach(function (val) {
                var img = val,
                    newImg = document.createElement('img');

                if (typeof img.getAttribute('usemap') === 'undefined') { return; }

                newImg.addEventListener('load', function () {
                    var clone = new Image();
                    clone.src = img.getAttribute('src');

                    var w = img.getAttribute('width') || clone.width,
                        h = img.getAttribute('height') || clone.height,
                        wPercent = img.offsetWidth / 100,
                        hPercent = img.offsetHeight / 100,
                        map = img.getAttribute('usemap').replace('#', ''),
                        c = 'coords';


                    [].forEach.call(document.querySelectorAll('map[name="' + map + '"] area'), function (val) {

                        var area = val,
                            coordsS = area.dataset[c] = area.dataset[c] || area.getAttribute(c),
                            coordsA = coordsS.split(','),
                            coordsPercent = Array.apply(null, Array(coordsA.length));

                        coordsPercent.forEach(function (val, i) {
                            coordsPercent[i] = i % 2 === 0 ? Number(((coordsA[i] / w) * 100) * wPercent) : Number(((coordsA[i] / h) * 100) * hPercent);
                        });
                        area.setAttribute(c, coordsPercent.toString());
                        var pos = coordsPercent.toString().split(",");
                        var image_map="#img-maps-1";
                        if($(area).data("type")==="mobile"){
                            var image_map="#img-maps-2";
                        }

                        var marg = $(image_map).css("margin-left").split("p");
                        if(marg[0]>0){
                        pos[0] = parseFloat(pos[0])+parseFloat(marg[0]);
                        }

                        $("#imagemap").append("<a class=\"mission_link "+$(area).data("type")+"\"  href=\"#/mission/" + $(area).data("mission") + "\">" +
                            "<div style='top:"+pos[1]+"px;left:"+pos[0]+"px' class=\"mission-item donut-chart-block block\">"+
                            " <div class=\"donut-chart\">"+

                                    "<input type=\"text\" value =\""+$(area).data("progress")+"\" data-fgColor=\"#ffec03\" readonly id=\"#myKnob\" class=\"knob\">" +

                                    "<p class=\"title center-date\">"+$(area).data("name")+"</p>"+
                                    "<svg class=\"mission-new\" xmlns =\"http://www.w3.org/2000/svg\" viewBox=\"0 0 25 25\"> " +
                                    " <defs></defs>"+
                                    "   <title>mision</title>" +
                                    "   <g id=\"Capa_2\" data-name=\"Capa 2\">" +
                                        "   <g id=\"Layer_1\" data-name=\"Layer 1\">" +
                                        "       <rect class=\"cls-1\" width=\"25\" height=\"25\"/> " +
                                        "       <path class=\"cls-2\" d=\"M22.74,5.29c-3.89,0-11.35-3.95-18.5-4.61V.58H2.11v23H4.24V14.92c8.2.59,14.72,4.7,18.5,4.7ZM11.45,11.52,4.24,13.45V2s6.3,2.83,7.21,4.11L5.14,7.83C6.91,8.66,10.75,10.55,11.45,11.52Zm3.15-1.18a1.53,1.53,0,1,1,1.53-1.53A1.53,1.53,0,0,1,14.6,10.34Zm3.94,1.07a1.54,1.54,0,1,1,1.54-1.54A1.54,1.54,0,0,1,18.54,11.41Z\" / > " +
                                            "</g>"+
                                        "</g>"+
                                    "</svg>"+

                            " </div>"+

                            "</div>"+

                        "</router-link>");
                        $('.knob').knob();
                        $('.knob').trigger(
                            'configure', {
                                "fgColor": "#FFC31D",
                                "min": "0",
                                "max": "100",
                                "height": "140",
                                "width": "140"
                            });
                    });
                });

                newImg.setAttribute('src', img.getAttribute('src'));
            });

        })();

        window.addEventListener('resize', self.update);


        return self;
    };

    if ($ && $.fn) {
        $.fn.imageMap = function () {
            var self = this;
            return new ImageMap(self.toArray());
        };
    }

    ImageMap.ImageMap = ImageMap;

    return ImageMap;
}));
