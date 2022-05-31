<x-layout>

    <h2 class="text-center mb-4">Historia wypożyczeń</h2>

    <table>
        <tr>
            <th>ID Wypożyczenia</th>
            <th>ID Pojazdu</th>
            <th>Kwota wypożyczenia (dzień)</th>
            <th>Data rozpoczęcia</th>
            <th>Data zakończenia</th>
            <th>Data zwrotu</th>
            <th>Zwrócone?</th>
            <th>Dodatkowe ubezpieczenie</th>
        </tr>



        @foreach($wypozyczenia as $Wypozyczenie)

            <tr>
                <td>{{ $Wypozyczenie->id}}</td>
                <td> {{ $Wypozyczenie->id_pojazdu }}</td>
                <td> {{ $Wypozyczenie->kowta_wypozyczenia_dzien }}</td>
                <td> {{ $Wypozyczenie->data_rozpoczecia }}</td>
                <td> {{ $Wypozyczenie->data_zakonczenia }}</td>
                <td>{{$Wypozyczenie->data_zwrotu}}</td>

                @if($Wypozyczenie->id_zwrotu == 1)
                    <td>Niezwrócony</td>
                @elseif($Wypozyczenie->id_zwrotu == 2)
                    <td>Zwrócony</td>
                @else
                    <td></td>         {{-- Tutaj else raczej niepotrzebny bo nigdy sie nie wykona?, ale na wszelki wypadek, zeby nie zbugowala sie tabela  --}}
                @endif

                <td> {{ $Wypozyczenie->dod_ubezpieczenie }}</td>
            </tr>
        @endforeach
    </table>

    <br>
    <a class="btn btn-success ms-md-2" href="{{ route('panel_klienta') }}">Powrót do Panelu Klienta</a>

</x-layout>
