<x-layout>

    <table>

        <th>ID Pojazdu</th>
        <th>Kwota wypożyczenia (dzień)</th>
        <th>Data rozpoczęcia</th>
        <th>Data zakończenia</th>
        <th>Dodatkowe ubezpieczenie</th>
        <th>Skan umowy</th>
        </tr>


        @foreach($wypozyczenia as $Wypozyczenie)

            <tr>
                <td> {{ $Wypozyczenie->id_pojazdu }}</td>
                <td> {{ $Wypozyczenie->kowta_wypozyczenia_dzien }}</td>
                <td> {{ $Wypozyczenie->data_rozpoczecia }}</td>
                <td> {{ $Wypozyczenie->data_zakonczenia }}</td>
                <td> {{ $Wypozyczenie->dod_ubezpieczenie }}</td>
                <td> {{ $Wypozyczenie->skan_umowy }}</td>

            </tr>

        @endforeach

    </table>

</x-layout>
