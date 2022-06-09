<x-layout>
    <h2 class="text-center mb-4">Lista pojazdów</h2>

    <table class="table table-dark">
        <tr>
            <th scope="col">NR pojazdu</th>
            <th scope="col">Kategoria pojazdu</th>
            <th scope="col">Typ pojazdu</th>
            <th scope="col">Pojazd</th>
            <th scope="col">Stan</th>
            @can('pracownik')
{{--                <th scope="col">Historia</th>--}}
                <th scope="col">Opcje</th>
            @endcan
        </tr>

        @foreach($pojazdy as $pojazd)
            <tr scope="row">
                <td><a href="{{ route('pojazdy.show', ['pojazd' => $pojazd->id]) }}">{{ $pojazd->nr_pojazdu }}</a></td>
                <td>{{ $pojazd->s_typ_pojazdu->name }}</td>
                <td>{{ $pojazd->s_typ_pojazdu->typ_pojazdu }}</td>
                <td>{{ $pojazd->s_marka->name }} {{ $pojazd->s_model->name }} {{ $pojazd->wersja }}</td>
                <td>{{ $pojazd->stan }}</td>
                @can('pracownik')
                    <td style="text-align: center">
                        <a class="btn btn-primary text-center " role="button" href="{{ route('wypozyczenia.createFromPojazdy', ['id_pojazdu' => $pojazd->id, 'kwota_wypozyczenia_dzien' => $pojazd->s_typ_pojazdu->cena]) }}">Wypożycz</a>
                        <a class="btn btn-success text-center " role="button" href="{{ url('pojazdy/history/' . $pojazd->id) }}">Historia pojazdu</a>
                    </td>
                @endcan
            </tr>

        @endforeach
    </table>


{{--    <div class="mt-6 p-4">--}}
{{--        {{ $pojazdy->links() }}--}}
{{--    </div>--}}
</x-layout>
