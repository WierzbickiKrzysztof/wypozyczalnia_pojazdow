<x-layout>
    <h2 class="text-center mb-4">Raport {{ $data_p }} - {{$data_k}}</h2>

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

</x-layout>
