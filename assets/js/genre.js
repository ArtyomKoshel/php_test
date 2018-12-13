//prodcat Ajax Filtering
jQuery(function ($) {
    //Load posts on page load
    prodcat_get_posts();

    //If list item is clicked, trigger input change and add css class
    $('#filt').on('click', 'label', function () {
        var input = $(this).find('input');
        if ($(this).attr('id') == 'clear-all') {
            $(this).removeClass('active');
            $('#filt label ').removeClass('active').find('input').prop('checked', false);
            $('#filt label ').removeClass('selected').find('input').prop('checked', false);
            $("input.text-search").val('');
            prodcat_get_posts();
        } else if (input.is(':checked')) {
            input.prop('checked', false);
            $(this).removeClass('selected');
        } else {
            input.prop('checked', true);
            $(this).addClass('selected');
        }

        input.trigger("change");
    });

    //If input is changed, load posts
    $('#prodcat-filter').on('change', 'input', function () {
        prodcat_get_posts(); //Load Posts
    });

    //Find Selected prodcats
    function getSelectedprodcats() {
        var prodcats = [];
        $("#filt label input:checked").each(function () {
            var vali = $(this).val();
            prodcats.push(vali);
        });
        return prodcats;
    }

    var sort = [];
    $('#sort').on('change', 'input', function () {
        var val = $(this).attr('value');
        var pol = $(this).attr('name');
        sort = pol + '.' + val;
        return sort;
    });
    //Fire ajax request when typing in search
    $('#prodcat-search').on('keyup', 'input.text-search', function (e) {
        if (e.keyCode == 27) {
            $(this).val('');
        }

        prodcat_get_posts(); //Load Posts
    });


    //Get Search Form Values
    function getSearchValue() {
        var searchValue = $('#prodcat-search input.text-search').val();
        return searchValue;
    }

    //If pagination is clicked, load correct posts
    $('.prodcat-filter-navigation').on('click', 'a', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');
        var paged = url.split('&paged=');

        prodcat_get_posts(paged[1]); //Load Posts (feed in paged value)
    });

    //Main ajax function
    function prodcat_get_posts(paged) {
        var paged_value = paged;
        var ajax_url = ajax_prodcat_params.ajax_url;
        $.ajax({
            type: 'GET',
            url: ajax_url,
            data: {
                action: 'prodcat_filter',
                prodcats: getSelectedprodcats,
                sort: sort,
                search: getSearchValue(),
                paged: paged_value,
            },
            beforeSend: function () {
                $('#loader').show();
            },
            success: function (data) {
                $('#prodcat-results').html(data);
                $('#loader').hide();
            },
            error: function () {
                $("#prodcat-results").html('<p>There has been an error</p>');
            }
        });
    }

});


