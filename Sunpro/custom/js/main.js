//Filter-btn
if (jQuery('.filter--btn').length > 0) {
    jQuery('.filter--btn').click(function() {
        jQuery('body').toggleClass('filter-offcanvas');
    });
};
jQuery(document).ready(function() {

    jQuery('.multiple-items').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
    });
    jQuery('.cs--select').selectpicker();

    const inputs = document.querySelectorAll('.js_form-input');

    jQuery("input[name$='sort_by_category']").click(function() {
        var url = jQuery(this).data('url');
        window.location.href = url;

    });

    jQuery(".js_form-input").focus(function() {
        jQuery(this).parent().addClass("text--full");
    }).blur(function() {
        jQuery(this).parent().removeClass("text--full");
    })

    inputs.forEach(input => {
        if (input.value == "") {
            input.parentElement.classList.remove("text--full");
        } else {
            input.parentElement.classList.add("text--full");
        }
    });

});

if (jQuery(window).width() > 1200) {
    jQuery(function() {
        updateDivsMargins();
        jQuery(window).resize(updateDivsMargins);

        function updateDivsMargins() {
            marginLeft = jQuery(".container").css("margin-left");
            jQuery('.slider__larger').each(function() {
                jQuery(this).css({
                    'margin-left': marginLeft
                });
            });
        }

    });
}

/* Form Input JS */
const inputs = document.querySelectorAll('.js_form-input');
inputs.forEach(input => {
    input.addEventListener('blur', (event) => {
        if (event.target.value.length) {
            event.target.classList.add("text--full");
        } else {
            event.target.classList.remove("text--full");
        }
    });
});

inputs.forEach(input => {
    if (input.value == "") {
        input.classList.remove("text--full");
    } else {
        input.classList.add("text--full");
    }
});
/* Form Input JS */


/* Equipment Detail Page */
// Number JS Init
(function($) {

    $.fn.number = function(customOptions) {

        var options = {

            'containerClass': 'number-style',
            'minus': 'decreaseQty',
            'plus': 'increaseQty',
            'containerTag': 'div',
            'btnTag': 'button'

        };

        options = $.extend(true, options, customOptions);

        var input = this;

        input.wrap('<' + options.containerTag + ' class="' + options.containerClass + '">');

        var wrapper = input.parent();

        wrapper.prepend('<' + options.btnTag + ' class="' + options.minus + '">-</' + options.btnTag + '>');

        var minus = wrapper.find('.' + options.minus);

        wrapper.append('<' + options.btnTag + ' class="' + options.plus + '">+</' + options.btnTag + '>');

        var plus = wrapper.find('.' + options.plus);

        var min = input.attr('min');

        var max = input.attr('max');

        if (input.attr('step')) {

            var step = +input.attr('step');

        } else {

            var step = 1;

        }

        if (+input.val() <= +min) {

            minus.addClass('disabled');

        }

        if (+input.val() >= +max) {

            plus.addClass('disabled');

        }

        minus.click(function() {

            var input = $(this).parent().find('input');

            var value = input.val();

            if (+value > +min) {

                input.val(+value - step);

                if (+input.val() === +min) {

                    input.prev('.' + options.minus).addClass('disabled');

                }

                if (input.next('.' + options.plus).hasClass('disabled')) {

                    input.next('.' + options.plus).removeClass('disabled')

                }

            } else if (!min) {

                input.val(+value - step);

            }

            var variationid = jQuery(input).attr("data-variationid");
            jQuery('.quantity_' + variationid).val(+value - step);

        });

        plus.click(function() {

            var input = $(this).parent().find('input');

            var value = input.val();

            if (+value < +max) {

                input.val(+value + step);

                if (+input.val() === +max) {

                    input.next('.' + options.plus).addClass('disabled');

                }

                if (input.prev('.' + options.minus).hasClass('disabled')) {

                    input.prev('.' + options.minus).removeClass('disabled')

                }

            } else if (!max) {

                input.val(+value + step);

            }
            var variationid = jQuery(input).attr("data-variationid");
            jQuery('.quantity_' + variationid).val(+value + step);


        });

    };

})(jQuery);

// Number JS Init
$('.qtyValue').each(function() {

    $(this).number();

    //input change event
    $(this).on('change keyup paste', function() {
        var bg = $(this).val();
        var mx = $(this);
        var parentElm = $(this).parents(".number-style");
        var descBtn = parentElm.find(".decreaseQty");
        var incrBtn = parentElm.find(".increaseQty");

        if (mx.val() > 1) {
            descBtn.removeClass('disabled');
        } else if (mx.val() === 1) {
            descBtn.addClass('disabled');
        } else {
            incrBtn.removeClass('disabled');
        }
        if (mx.val() === '') {
            incrBtn.addClass('disabled');
            descBtn.addClass('disabled');
        } else {
            incrBtn.removeClass('disabled');
        }
    });

});
/* Equipment Detail Page */

//Slider Bar
var nonLinearStepSlider = document.getElementById('slider-non-linear-step');
var current_url = new URL(window.location.href);
//console.log(current_url);
var search_params = current_url.searchParams;
var startValues;

if (hasQueryParams(current_url.href)) {
    if ((current_url.href.indexOf('min_price=') != -1) && (current_url.href.indexOf('max_price=') != -1)) {
        console.log('hello');
        startValues = [search_params.get('min_price'), search_params.get('max_price')];
    } else {
        console.log('yhello');
        startValues = [0, 10000];
    }
} else {
    startValues = [0, 10000];
}
noUiSlider.create(nonLinearStepSlider, {
    start: startValues,
    limit: 10000,
    margin: 100,
    step: 100,
    behaviour: 'drag',
    connect: true,
    range: {
        'min': 100,
        'max': 10000
    }
});
var nonLinearStepSliderValueElement = document.getElementById('slider-non-linear-step-value');

nonLinearStepSlider.noUiSlider.on('update', function(values) {
    //console.log(values);
    nonLinearStepSliderValueElement.innerHTML = parseFloat(values[0]).toFixed(0) + ' - ' + parseFloat(values[1]).toFixed(0);
});

nonLinearStepSlider.noUiSlider.on('end', function(values) {

    var min = parseFloat(values[0]).toFixed(0);
    var max = parseFloat(values[1]).toFixed(0);


    //console.log('max', max);
    if (min >= 100) {

        if (hasQueryParams(current_url.href)) {
            //console.log('mini', min);
            if (current_url.href.indexOf('min_price=') != -1) {
                search_params.delete('min_price');
                search_params.set('min_price', min);
            } else {
                search_params.set('min_price', min);
            }
        } else {
            //console.log('minim', min);
            search_params.set('min_price', min);
        }
    }

    if (max <= 10000) {
        if (hasQueryParams(current_url.href)) {
            if (current_url.href.indexOf('max_price=') != -1) {
                search_params.delete('max_price');
                search_params.set('max_price', max);
            } else {
                search_params.set('max_price', max);
            }
        } else {
            search_params.set('max_price', max);
        }
    }

    current_url.search = search_params.toString();
    var new_url = current_url.toString();
    window.location.href = new_url;
    //console.log(new_url);
    //console.log(current_url);
    //nonLinearStepSliderValueElement.innerHTML = values.join(' - ');
});

function hasQueryParams(url) {
    return url.includes('?');
}