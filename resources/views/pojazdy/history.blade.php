<x-layout>

    <h1 class="text-center mb-4">Historia pojazdu</h1>
    <p class="text-center mb-4" style="color:orange; font-size: x-large; font-weight: bolder"> {{ $marka }} {{ $model }} {{ $wersja }} <br/> {{ $pojazd->nr_pojazdu }}</p>

    <br>
    <table>
        <tr>
            <th>ID Wypożyczenia</th>
            <th>Klient</th>
            <th>Data rozpoczęcia</th>
            <th>Data zakończenia</th>
            <th>Data zwrotu</th>
            <th>Zwrócony?</th>
            <th>Przebieg po zwrocie</th>
        </tr>



        @foreach($wypozyczenia as $Wypozyczenie)

            <tr>
                <td>{{ $Wypozyczenie->id}}</td>
                <td>{{ $Wypozyczenie->klient->name }}</td>
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
                <td>{{ $Wypozyczenie->przebieg_po_zwrocie }}</td>
            </tr>

        @endforeach
    </table>

    <br>
    <a class="btn btn-success ms-md-2" href="{{ route('pojazdy.index') }}">Powrót do pojazdów</a>

</x-layout>
