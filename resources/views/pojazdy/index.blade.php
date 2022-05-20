<x-layout>

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
                <td><a href="/pojazdy/{{ $pojazd->id }}">{{ $pojazd->nr_pojazdu }}</a></td>
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
