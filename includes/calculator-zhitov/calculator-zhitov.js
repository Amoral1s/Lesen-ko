jQuery(document).ready(function($){

    let calculator_load = function($calculator_wrap){
        let $calculator_form = $calculator_wrap.find('form');
        let $result_wrap = $calculator_wrap.find('.block_raschet_r');
        $result_wrap.html('');
        $result_wrap.addClass('loading');
        $.ajax({
            url: '/wp-admin/admin-ajax.php?action=zhitov_calculator&data-lestnica='+($calculator_form.is('[data-lestnica]') ? $calculator_form.attr('data-lestnica') : ''),
            type: 'get',
            data: $calculator_form.serialize(),
            success: function(response){
                let $content = $(response);
                $result_wrap.removeClass('loading');
                // $result_wrap.append( $content );
                $result_wrap.append( $content.next('div.sp_calc') );
                $result_wrap.append( $content.next('div#drawing') );
                $result_wrap.append( $content.next('div.inline') );
            },
            done: function(){
                $result_wrap.removeClass('loading').html('<h1>Error. Try again</h1>');
            }
        });
    }

    let $calculator_wrap = $('.calculator-zhitov ');
    if($calculator_wrap.length > 0 ) {
        let $calculator_form = $calculator_wrap.find('form');
        $calculator_form.on('submit', function(e){
            e.preventDefault();
            calculator_load($calculator_wrap);
        });
        calculator_load($calculator_wrap);
    }

});