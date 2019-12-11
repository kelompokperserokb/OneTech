/*var base_url = window.location.origin;
(function($) {
    $('#search').submit(function(e){
        e.preventDefault();

        let searchValue = $("#search-text").val();

        let url = base_url + "/OneTech/viewproduct/search";
        $.ajax({
            url: url ,
            method: 'get',
            data: {value: searchValue},
            beforeSend : function(){

            },
            success: function(response) {
                console.log(response);
            },
        });
    });
})(jQuery);*/
