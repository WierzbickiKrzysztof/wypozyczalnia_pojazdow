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
                <a class="btn btnMaterial btn-flat success semicircle" role="button" href="{{ route('rezerwacja.edit', ['rezerwacja' => $rezerwacja->id]) }}" style="color: rgb(0,144,197);"><i class="fas fa-pen"></i></a>

                <a class="btn btnMaterial btn-flat success semicircle" role="button" href="{{ route('wypozyczenia.createFromRezerwacja', ['id_klienta' => $rezerwacja->id_klienta, 'id_pojazdu' => $rezerwacja->id_pojazdu, 'kwota_wypozyczenia_dzien' => $rezerwacja->kwota_wypozyczenia_dzien, 'data_rozpoczecia' => $rezerwacja->data_rozpoczecia, 'data_zakonczenia' => $rezerwacja->data_zakonczenia]) }}" style="color: rgb(0,197,3);"><i class="fas fa-cart-plus"></i></a>
                <form method="POST" class="d-inline" action="{{ route('rezerwacja.destroy', ['rezerwacja' => $rezerwacja->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btnMaterial btn-flat accent btnNoBorders checkboxHover" type="submit" data-bs-toggle="modal" data-bs-target="#delete-modal"><i class="fas fa-trash btnNoBorders" style="color: rgb(217,23,23);"></i></button>

                </form>

            </td>

        </tr>
    @endforeach
    </table>

</x-layout>

