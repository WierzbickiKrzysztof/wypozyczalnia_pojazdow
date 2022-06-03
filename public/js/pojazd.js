jQuery(document).ready(function($){

    $("#typ_pojazdu").change(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            typ_pojazdu: jQuery('#typ_pojazdu').val(),
        };
        var type = "POST";
        var ajaxurl = '../api/get/typ_pojazdu';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {

                $('#marka').empty();

                $('#marka_h').show("slow");

                var option = document.createElement('option');
                option.text = '--wybierz markę pojazdu--';
                option.disabled = true;
                option.selected = true;
                document.querySelector('#marka').add(option, 0)

                $("#model").empty();
                var option = document.createElement('option');
                option.text = '--najpierw wybierz model pojazdu--';
                option.disabled = true;
                option.selected = true;
                document.querySelector('#model').add(option, 0)

                data.forEach(optionsFunction);

                function optionsFunction(item, index, arr) {
                    var option = document.createElement('option');
                    option.text = data[1][index].name;
                    option.value = data[1][index].id;

                    document.querySelector('#marka').add(option, null)
                }

                $('#cena').empty();


                $('#cena').val(data[0][0].cena + " PLN");

            },
            error: function (data) {
                console.log(data);
            }
        });
    });



    $("#marka").change(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            marka: jQuery('#marka').val(),
        };
        var type = "POST";
        var ajaxurl = '../api/get/marka';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {

                $("#model").empty();

                $('#model_h').show("slow");

                var option = document.createElement('option');
                option.text = '--wybierz model pojazdu--';
                option.disabled = true;
                option.selected = true;
                document.querySelector('#model').add(option, 0)

                data.forEach(optionsFunction);

                function optionsFunction(item, index, arr) {
                    var option = document.createElement('option');
                    option.text = data[index].name;
                    option.value = data[index].id;

                    document.querySelector('#model').add(option, null)
                }

            },
            error: function (data) {
                console.log(data);
            }
        });
    });


});
