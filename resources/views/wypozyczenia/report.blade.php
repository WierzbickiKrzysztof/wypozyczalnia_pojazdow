<x-layout>
    <h2 class="text-center mb-4">Raport {{ $data_p }} - {{$data_k}}</h2>

    @foreach($wypozyczenia as $Wypozyczenie)
        <h1>ID Klienta: <a href="#{{ $Wypozyczenie->id }}">{{ $Wypozyczenie->id_klienta }}</a></h1>
        <h2>ID Pojazdu: {{ $Wypozyczenie->id_pojazdu }}</h2>
        <h3>Kwota wypożyczenia (dzień): {{ $Wypozyczenie->kowta_wypozyczenia_dzien }}</h3>
        <h3>Data rozpoczęcia: {{ $Wypozyczenie->data_rozpoczecia }}</h3>
        <h3>Data zakończenia: {{ $Wypozyczenie->data_zakonczenia }}</h3>
        <h3>Dodatkowe ubezpieczenie: {{ $Wypozyczenie->dod_ubezpieczenie }}</h3>
        <h3>Skan umowy: {{ $Wypozyczenie->skan_umowy }}</h3>

    @endforeach


</x-layout>
