<x-layout>

    <h2 class="text-center mb-4">Rezerwacje</h2>

    <table>
        <tr>
            <th>ID Pojazdu</th>
            <th>Kwota wypożyczenia (dzień)</th>
            <th>Data rozpoczęcia</th>
            <th>Data zakończenia</th>
            <th>całkowita kwota</th>
            <th>status_rezerwacji</th>
            <th>Opcje</th>
        </tr>



        @foreach($rezerwacja as $Rezerwacje)

            <tr>
                <td> {{ $Rezerwacje->id_pojazdu }}</td>
                <td> {{ $Rezerwacje->kwota_wypozyczenia_dzien }}</td>
                <td> {{ $Rezerwacje->data_rozpoczecia }}</td>
                <td> {{ $Rezerwacje->data_zakonczenia }}</td>
                <td> {{ $Rezerwacje->calkowita_kwota }}</td>
                <td> {{ $Rezerwacje->status_rezerwaacji }}</td>
                <td>
                    <a class="btn btnMaterial btn-flat success semicircle" role="button" href="{{ route('rezerwacja.edit', ['rezerwacja' => $Rezerwacje->id]) }}" style="color: rgb(0,144,197);"><i class="fas fa-pen"></i></a>

                    <form method="POST" class="d-inline" action="{{ route('rezerwacja.destroy', ['rezerwacja' => $Rezerwacje->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btnMaterial btn-flat accent btnNoBorders checkboxHover" type="submit" data-bs-toggle="modal" data-bs-target="#delete-modal"><i class="fas fa-trash btnNoBorders" style="color: rgb(217,23,23);"></i></button>

                    </form>

                </td>
            </tr>
        @endforeach
    </table>

    <br>
    <a class="btn btn-success ms-md-2" href="{{ route('panel_klienta') }}">Powrót do Panelu Klienta</a>

</x-layout>
