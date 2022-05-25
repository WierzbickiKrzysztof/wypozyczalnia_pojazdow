<x-layout>

    <div>




    </div>

    <h2 class="text-center mb-4">Lista wypożyczeń</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>ID Klienta</th>
            <th>ID Pojazdu</th>
            <th>Kwota wypożyczenia (dzień)</th>
            <th>Data rozpoczęcia</th>
            <th>Data zakończenia</th>
            <th>Data zwrotu</th>
            <th>Zwrócone?</th>
            <th>Dodatkowe ubezpieczenie</th>
            <th>Skan umowy</th>
            <th>Przycisk</th>
        </tr>


    @foreach($wypozyczenia as $Wypozyczenie)

        <tr>
            <td>{{ $Wypozyczenie->id}}</td>
            <td> {{ $Wypozyczenie->id_klienta }}</td>
            <td> {{ $Wypozyczenie->id_pojazdu }}</td>
            <td> {{ $Wypozyczenie->kowta_wypozyczenia_dzien }}</td>
            <td> {{ $Wypozyczenie->data_rozpoczecia }}</td>
            <td> {{ $Wypozyczenie->data_zakonczenia }}</td>
            <td>{{$Wypozyczenie->data_zwrotu}}</td>
            @foreach($zwrot as $zwroty)
                @if($zwroty->id==$Wypozyczenie->id_zwrotu)
                    <td>{{$zwroty->name}}</td>
                @endif
            @endforeach
            <td> {{ $Wypozyczenie->dod_ubezpieczenie }}</td>
            <td> {{ $Wypozyczenie->skan_umowy }}</td>
            <td>
                <form method="get" action="{{ route('wypozyczenia.update', ['wypozyczenia' => $Wypozyczenie->id])  }}">
                    @csrf
                    @method('get')
                    <button class="btn btnMaterial btn-flat accent btnNoBorders checkboxHover" style="margin-left: 5px;" type="submit" data-bs-toggle="modal" data-bs-target="#delete-modal"><i class="far fa-eye" style="color: #00bdff;"></i></button>

                </form>

            </td>
        </tr>
    @endforeach
    </table>


    {{--    <div class="mt-6 p-4">--}}
    {{--        {{ $pojazdy->links() }}--}}
    {{--    </div>--}}
</x-layout>

