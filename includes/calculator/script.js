jQuery(document).ready(function ($) {


    var hiweb_calculator = {

        $wraps: $('.hiweb-calculator-wrap'),
        current_total_price: 0,

        init: function () {
            hiweb_calculator.$wraps.each(function () {
                hiweb_calculator.make($(this));
            });
        },

        make: function ($wrap) {
            hiweb_calculator.updateTotal($wrap);
            $wrap.on('click', '[data-click-reselect], [data-click-select]', function () {
                let $this = $(this);
                let $section = $this.closest('.item-section');
                if ($this.is('[data-click-reselect]')) {
                    $section.find('[data-selected]').attr('data-selected', 'false').prop('checked', false);
                    $this.attr('data-selected', 'true').prop('checked', true);
                }
                hiweb_calculator.updateTotal($wrap);
            });
            $wrap.on('change keyup', '[data-change], [data-multiplication]', function () {
                // let $this = $(this);
                // let $section = $this.closest('.item-section');
                hiweb_calculator.updateTotal($wrap);
            });
            let $tooltips = $wrap.find('[data-toggle="tooltip"]');
            if ($tooltips.length > 0 && $tooltips.tooltip) {
                $tooltips.tooltip();
            } else {
                console.warn('bootstrap tooltip не подключен...');
            }
        },

        collect: function ($wrap) {
            var total = 0;
            hiweb_calculator.current_total_price = 0;
            $wrap.find('.item-section').each(function () {
                if ($(this).find('[data-multiplication]').length > 0) {
                    total += hiweb_calculator.collect_multiplication_section($(this));
                } else {
                    total += hiweb_calculator.collect_section($(this));
                }
                hiweb_calculator.current_total_price = total;
            });
            return total;
        },

        collect_section: function ($section) {
            var section_total = 0;
            $section.find('[data-price][data-selected="true"], [data-price]:checked').each(function () {
                let $el = $(this);
                if (!$el.is('[data-price]')) return;
                let price_raw = $(this).attr('data-price');
                let price = parseFloat(price_raw);
                if (isNaN(price)) price = 0;
                if (price_raw.indexOf('%') > -1) {
                    price = hiweb_calculator.current_total_price * (price / 100);
                }
                section_total += price;
            });
            return section_total;
        },

        collect_multiplication_section: function ($section) {
            let section_total = 0;
            let section_total_percent = 0;
            $section.find('[data-multiplication]').each(function () {
                let $el = $(this);
                let price_raw = $el.attr('data-price');
                let price = parseFloat(price_raw);
                let val = parseFloat($el.val());
                let step = parseFloat($el.attr('step'));
                if (isNaN(price)) price = 0;
                if (isNaN(val)) val = 0;

                let prices = $.parseJSON($el.attr('data-price'));
                let prev_val = 0;
                let last_index = prices.length - 1;
                let match = false;
                for (let index in prices) {
                    let val_point = parseFloat(prices[index][0]);
                    if (isNaN(val_point)) val_point = 0;
                    if ((val >= prev_val && val <= val_point) || (last_index == index && !match)) {
                        match = true;
                        let dest_value = prices[index][1];
                        let dest_value_float = parseFloat(prices[index][1]);
                        if (dest_value.indexOf('%') > -1) {
                            section_total_percent += dest_value_float;
                        } else {
                            section_total += dest_value_float;
                        }
                        break;
                    }
                    prev_val = val_point;
                }

                // let default_min = parseFloat($el.attr('data-default-min'));
                // let default_max = parseFloat($el.attr('data-default-max'));
                // if (isNaN(default_min) || isNaN(default_max)) {
                //     if (price_raw.indexOf('%') > -1) {
                //         section_total_percent += (val / step) * price;
                //     } else {
                //         section_total += (val / step) * price;
                //     }
                // } else {
                //     if (val < default_min) {
                //         if (price_raw.indexOf('%') > -1) {
                //             section_total_percent -= ((default_min - val) / step) * price;
                //         } else {
                //             section_total -= ((default_min - val) / step) * price;
                //         }
                //     } else if (val > default_max) {
                //         if (price_raw.indexOf('%') > -1) {
                //             section_total_percent += ((val - default_max) / step) * price;
                //         } else {
                //             section_total += ((val - default_max) / step) * price;
                //         }
                //     }
                // }
            });
            return ((hiweb_calculator.current_total_price * section_total_percent / 100) + section_total);
        },

        filter_price: function (num) {
            const n = String(num),
                p = n.indexOf('.')
            return n.replace(
                /\d(?=(?:\d{3})+(?:\.|$))/g,
                (m, i) => p < 0 || i < p ? `${m} ` : m
            )
        },

        updateTotal: function ($wrap) {
            let total_price = hiweb_calculator.collect($wrap);
            total_price = hiweb_calculator.filter_price(total_price);
            $wrap.find('[data-total]').html(total_price);
        }

    };


    hiweb_calculator.init();

});