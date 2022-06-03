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

                $('#kwota_wypozyczenia_dzien').empty();


                $('#kwota_wypozyczenia_dzien').val(data[0][0].cena + " PLN");

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


    $("#model").change(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            typ_pojazdu: jQuery('#typ_pojazdu').val(),
            marka: jQuery('#marka').val(),
            model: jQuery('#model').val(),
        };
        var type = "POST";
        var ajaxurl = '../api/get/pojazdy';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {

                $("#id_pojazdu").empty();

                $('#id_pojazdu_h').show("slow");

                var option = document.createElement('option');
                option.text = '--wybierz pojazd--';
                option.disabled = true;
                option.selected = true;
                document.querySelector('#id_pojazdu').add(option, 0)

                data.forEach(optionsFunction);

                function optionsFunction(item, index, arr) {
                    var option = document.createElement('option');
                    option.text = data[index].wersja + " | " + data[index].stan  + " | Przebieg: " +  data[index].przebieg  + " | Pojemność baku: " +  data[index].pojemnosc_baku  + " | " + data[index].nr_pojazdu;
                    option.value = data[index].id;

                    document.querySelector('#id_pojazdu').add(option, null)
                }

            },
            error: function (data) {
                console.log(data);
            }
        });
    });


    $("#id_pojazdu").change(function (e) {
        $('#cena_h').show("slow");
        $('#data_rozpoczecia_h').show("slow");
        $('#data_zakonczenia_h').show("slow");
    });


    // Daty
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;

    $('#data_rozpoczecia').attr('min', today);

    $("#data_rozpoczecia").change(function (e) {
        $('#data_rozpoczecia_h');
        var end_day = new Date($('#data_rozpoczecia').val());

        var dd = String(end_day.getDate() + 1).padStart(2, '0');
        var mm = String(end_day.getMonth() + 1).padStart(2, '0');
        var yyyy = end_day.getFullYear();


        end_day = yyyy + '-' + mm + '-' + dd;

        $('#data_zakonczenia').val('').attr('min', end_day).prop("disabled", false);


    });

    $("#data_zakonczenia").change(function (e) {

        // Wyliczenie liczby dni
        var data_rozpoczecia = new Date($('#data_rozpoczecia').val());
        var data_zakonczenia = new Date($('#data_zakonczenia').val());

        var l_dni = (data_zakonczenia - data_rozpoczecia)/(1000*60*60*24);


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            l_dni: l_dni,
            typ_pojazdu: jQuery('#typ_pojazdu').val(),
        };
        var type = "POST";
        var ajaxurl = '../api/get/cena_koncowa';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {

                $("#cena_koncowa_h").show("slow");

                $("#cena_koncowa").empty().val(data + " PLN za " + l_dni + " dni");


            },
            error: function (data) {
                console.log(data);
            }
        });

    });

});
