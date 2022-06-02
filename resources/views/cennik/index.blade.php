<x-layout>

    <table>
        <tr>
            <th>Nazwa</th>
            <th>Kategoria</th>                              {{--  suv/cabrio/sedan,--}}
            <th>Cena za dzień</th>
        </tr>
        @foreach($s_typ_pojazdu as $typ_pojazdu)
        <tr>
            <td>{{$typ_pojazdu->name}}</td>
            <td>{{$typ_pojazdu->typ_pojazdu}}</td>
            <td>{{$typ_pojazdu->cena}}</td>
        </tr>

        @endforeach
    </table>



</x-layout>
