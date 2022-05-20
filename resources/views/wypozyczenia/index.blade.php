<x-layout>
    <div>
        <a class="btn btn-primary fs-5 me-2 py-2 px-4" role="button" href="{{ route('wypozyczenia.create') }}">Wypożycz pojazd</a>


    </div>

    <h2 class="text-center mb-4">Lista wypożyczeń</h2>

    <table>
        <tr>
            <th>ID Klienta</th>
            <th>ID Pojazdu</th>
            <th>Kwota wypożyczenia (dzień)</th>
            <th>Data rozpoczęcia</th>
            <th>Data zakończenia</th>
            <th>Dodatkowe ubezpieczenie</th>
            <th>Skan umowy</th>
        </tr>


    @foreach($wypozyczenia as $Wypozyczenie)

        <tr>
            <th> <a href="#{{ $Wypozyczenie->id }}">{{ $Wypozyczenie->id_klienta }}</a></th>
            <th> {{ $Wypozyczenie->id_pojazdu }}</th>
            <th> {{ $Wypozyczenie->kowta_wypozyczenia_dzien }}</th>
            <th> {{ $Wypozyczenie->data_rozpoczecia }}</th>
            <th> {{ $Wypozyczenie->data_zakonczenia }}</th>
            <th> {{ $Wypozyczenie->dod_ubezpieczenie }}</th>
            <th> {{ $Wypozyczenie->skan_umowy }}</th>
        </tr>
    @endforeach
    </table>


    {{--    <div class="mt-6 p-4">--}}
    {{--        {{ $pojazdy->links() }}--}}
    {{--    </div>--}}
</x-layout>

