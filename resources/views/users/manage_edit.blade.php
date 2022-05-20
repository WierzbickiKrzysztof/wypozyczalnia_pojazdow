<x-layout>
    <div>
        <a class="btn btn-primary fs-5 me-2 py-2 px-4" role="button" href="{{ route('pracownicy.index') }}">Lista Pracowników</a>
    </div>
    <h1>Edytuj Pracowników - {{$user->name}}</h1>
    <form method="POST" action="{{ route('pracownicy.update', ['user' => $user->id]) }}">
        @csrf
        @method('PUT')
        <div class="col-md-4 mx-auto card bg-secondary border-info mb-5">
            <div class="card-body p-sm-5">

                <div class="mb-3">
                    <label class="form-label" for="name">Dane</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="name" name="name" required="" value="{{$user->name}}">
                    @error('name')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="telefon">Telefon</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="telefon" name="telefon" required="" value="{{$user->telefon}}">
                    @error('telefon')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">email</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="email" name="email" required="" value="{{$user->email}}">
                    @error('email')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button class="btn btn-primary d-block w-100" type="submit">Zaktualizuj</button>
                </div>
            </div>
        </div>
    </form>
</x-layout>
