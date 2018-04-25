$(function(){
    setTimeout(function(){
        $('#flashMessage').fadeOut('slow');
    }, 800);
});

$(function() {
    $('a.delete').click(function(e) {
        if (confirm('削除しますか？')) {
                                            /* /deleteアクションへのパス/削除する申請のid/現在のユーザのid/ */
            $.post('/transport_app_ver2_1/requestdetails/delete/'
                    + $(this).data('request_id') + '/' + $(this).data('user_id') + '/' + $(this).data('year_month') ,{},
                function(response) {
                    $('#request_'+response.request_id).fadeOut();
                    console.log(response);
                    //console.log(total_cost);
            }, "json");
        }
        return false;
    });
});

$(function() {
    $('#datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
    });
});

$(function() {
    $('#year_month').datepicker({
        dateFormat: 'yy-mm',
        language: 'ja',
        minViewMode: 1
    });
});
