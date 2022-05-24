<x-layout>
    <div>
        <a class="btn btn-primary fs-5 me-2 py-2 px-4" role="button" href="{{ route('pojazdy.create') }}">Dodaj pojazd</a>
        <a class="btn btn-primary fs-5 me-2 py-2 px-4" role="button" href="/opcje/dodatkowe_opcje">Dodatkowe Opcje</a>

    </div>
    <h2 class="text-center mb-4">Lista pojazdów</h2>

    <table>
        <tr>
            <th>NR pojazdu</th>
            <th>Typ pojazdu</th>
            <th colspan="3">Pojazd</th>
            <th>Stan</th>
        </tr>

        @foreach($pojazdy as $pojazd)
            <tr>
                <td><a href="{{ route('pojazdy.show', ['pojazd' => $pojazd->id]) }}">{{ $pojazd->nr_pojazdu }}</a></td>
                <td>{{ $pojazd->s_typ_pojazdu->name }}</td>
                <td colspan="3">{{ $pojazd->s_model->name }} {{ $pojazd->s_marka->name }} {{ $pojazd->wersja }}</td>
                <td>{{ $pojazd->stan }}</td>
            </tr>

        @endforeach
    </table>


{{--    <div class="mt-6 p-4">--}}
{{--        {{ $pojazdy->links() }}--}}
{{--    </div>--}}
</x-layout>
