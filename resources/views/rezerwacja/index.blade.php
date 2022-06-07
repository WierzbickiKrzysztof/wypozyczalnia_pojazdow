<x-layout>
    <h2 class="text-center mb-4">Lista rezerwacji</h2>
    <a class="btn btn-primary fs-5 me-2 py-2 px-4" role="button" href="{{ route('rezerwacja.create') }}">Utwórz rezerwację</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Klient</th>
            <th>Pojazd</th>
            <th>Kwota wypożyczenia (dzień)</th>

            <th>Data rozpoczęcia</th>
            <th>Data zakończenia</th>
            <th>Kwota wypożyczenia (całkowita)</th>
{{--            <th>Status realizacji</th>--}}
{{--            <th>Dodatkowe ubezpieczenie</th>--}}
            <th>Przycisk</th>
        </tr>


    @foreach($rezerwacje as $rezerwacja)

        <tr>
            <td>{{ $rezerwacja->id}}</td>
            <td> {{ $rezerwacja->id_klienta }}</td>
            <td> {{ $rezerwacja->id_pojazdu }}</td>
            <td> {{ $rezerwacja->kwota_wypozyczenia_dzien }} PLN</td>
            <td> {{ $rezerwacja->data_rozpoczecia }}</td>
            <td> {{ $rezerwacja->data_zakonczenia }}</td>
            <td>{{ $rezerwacja->calkowita_kwota }} PLN</td>
{{--            <td>{{ $rezerwacja->status_rezerwacji }}</td>--}}
{{--            <td> {{ $rezerwacja->id_ubezpieczenia }}</td>--}}

            <td>
                <a class="btn btnMaterial btn-flat success semicircle" role="button" href="{{ route('rezerwacja.edit', ['rezerwacja' => $rezerwacja->id]) }}" style="color: rgb(0,197,179);"><i class="fas fa-pen"></i></a>
            </td>
        </tr>
    @endforeach
    </table>

</x-layout>

