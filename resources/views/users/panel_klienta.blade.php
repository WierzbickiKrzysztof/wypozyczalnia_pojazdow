<x-layout>

{{--    glowny wyglad panelu klienta--}}

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
    <script src="{{ asset('/assets/css/tabelka.css') }}"></script>

{{--    dodanie przycisku do historii wypozyczen--}}
    <div class="container-fluid" style="margin-bottom: 50px;">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6">
                <h1 class="text-white mb-4">Panel klienta</h1>
                <a class="btn btn-primary fs-5 me-2 py-2 px-4" role="button" href="{{ route('users.history') }}">Historia wypożyczeń</a>
                @foreach($users as $users)
                <a class="btn btn-primary fs-5 me-2 py-2 px-4" role="button" href="{{ route('users.client_data_edit',['users' => $users->id]) }}">Edytuj Profil</a>
                @endforeach
            </div>
        </div>

    </div>

</x-layout>

