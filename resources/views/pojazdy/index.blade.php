<x-layout>

    <h2 class="text-center mb-4">Lista pojazdów</h2>
    @foreach($pojazdy as $pojazd)
        <h1><a href="/pojazdy/{{ $pojazd->id }}">{{ $pojazd->nr_pojazdu }}</a></h1>
        <h2>{{ $pojazd->marka }}</h2>
        <h3>{{ $pojazd->model }}</h3>
    @endforeach

{{--    <div class="mt-6 p-4">--}}
{{--        {{ $pojazdy->links() }}--}}
{{--    </div>--}}
</x-layout>
