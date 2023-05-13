var format = function (str, col) {
    col = typeof col === 'object' ? col : Array.prototype.slice.call(arguments, 1);

    return str.replace(/\{\{|\}\}|\{(\w+)\}/g, function (m, n) {
        if (m === "{{") {
            return "{";
        }
        if (m === "}}") {
            return "}";
        }
        return col[n];
    });
};
var template = '<div class="card" style="width: 18rem;">\n' +
    '  <img src="{image}" class="card-img-top" alt="...">\n' +
    '  <div class="card-body">\n' +
    '    <h5 class="card-title">{name}</h5>\n' +
    '    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>\n' +
    '    <a href="#" class="btn btn-primary">Go somewhere</a>\n' +
    '  </div>\n' +
    '</div>'

$('#promocompany-products').on('select2:select', function (e) {
    var data = e.params.data;
    var object = $(format(template, {
        name: data.name,
        image: data.image
    }));
    console.log(e);
    $('#con').append(object);


});
/*
$(this).trigger({
    type: 'select2:select',
    params: {
        data: e.params.data
    }
});*/

$('#promocompany-products').on('select2:selecting', function (e) {

    console.log(e);


});


function switchInputPass(that) {
    var target = $(that).data('target');
    var input = $(target);
    var state = (input.attr('type') === 'input');
    if (state) {
        $(that).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
    } else {
        $(that).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
    }
    input.attr('type', state ? 'password' : 'input');
}

function changeCSS(cssFile, cssLinkIndex) {

    var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);

    var newlink = document.createElement("link");
    newlink.setAttribute("rel", "stylesheet");
    newlink.setAttribute("type", "text/css");
    newlink.setAttribute("href", cssFile);

    document.getElementsByTagName("head").item(cssLinkIndex).replaceChild(newlink, oldlink);
}

function changeCSS2(cssFile, cssLinkIndex) {
    $.loadCSS(cssFile);
    //var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);

    /* var newlink = document.createElement("link");
     newlink.setAttribute("rel", "stylesheet");
     newlink.setAttribute("type", "text/css");
     newlink.setAttribute("id", "theme-dark");
     newlink.setAttribute("href", cssFile);

     document.getElementsByTagName("head").item(cssLinkIndex).replaceChild(newlink, oldlink);*/
}

jQuery(document).ready(function ($) {
    "use strict";

    $(window).on('load', function (event) {
        $('.pre-loader-container').delay(500).fadeOut("fast");

        setTimeout(function () {
            $('.pre-loader-container').remove();
        }, 2000);

/*
        $('.side-nav-item').interactive({
            size: 50,
            textPosition: {
                bottom: '50px'
            },
            text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ',

        })
            .then(function () {
                return $('.import-products span').interactive({
                    size: 10,
                    textPosition: {
                        bottom: '100px'
                    },
                    text: '123123123',

                })
            })
            .then(function () {
                return $('.button-menu-mobile').interactive({
                    size: 10,
                    textPosition: {
                        bottom: '100px'
                    },
                    text: 'сварачивай меню',
                    author: ''
                })
            })
            .then(function () {
                return $('.topbar-dropdown').interactive({
                    size: 50,
                    textPosition: {
                        bottom: '100px'
                    },
                    text: 'Изменение языка интерфейса',
                    author: 'Panix'
                })
            })
            .then(function () {
                return $('.help-box').interactive({
                    size: 10,
                    textPosition: {
                        bottom: '100px'
                    },
                    text: 'Будут вопросы обращайтесь в поддержку.',
                    author: 'Panix'
                });
                console.log('sad');
            })*/


    });


});

var xhrTheme;
$(document).on('change', '#switch-theme', function () {
    var theme = $(this).is(':checked') ? 'light' : 'dark';
    $.loadCSS($(this).data('css'));

    if (xhrTheme !== undefined)
        xhrTheme.abort();

    xhrTheme = $.ajax({
        type: 'POST',
        url: '/admin/admin/ajax/switch-theme',
        data: {theme: theme},
        dataType: 'json',
        success: function (data) {

        }
    });
});

jQuery.loadCSS = function (url) {
    var selector = $('link[href="' + url + '"]');
    if (!selector.length) {
        $('head').append('<link rel="stylesheet" type="text/css"  href="' + url + '">');
    } else {
        selector.remove();
    }
}
