<x-layout>
    <h2 class="text-center mb-4">{{ $pojazdy->nr_pojazdu }}</h2>
    <h2>{{ $pojazdy->marka }}</h2>
    <h3>{{ $pojazdy->model }}</h3>
    @auth
        <a class="btn btn-info ms-md-2" href="/pojazdy/{{ $pojazdy->id }}/edit">Edytuj wpis</a>

        <form method="POST" action="/pojazdy/{{ $pojazdy->id }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger ms-md-2" type="submit">Usuń wpis</button>
        </form>
    @endauth
</x-layout>
