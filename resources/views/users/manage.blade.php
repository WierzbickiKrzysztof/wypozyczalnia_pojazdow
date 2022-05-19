<x-layout>
    <div>
        <a class="btn btn-primary fs-5 me-2 py-2 px-4" role="button" href="/users/manage_show">Lista Pracowników</a>

    </div>
    <h1>Dodaj Pracownika</h1>
    <form method="POST" action="/users/manage_show">
        @csrf
        <div class="col-md-4 mx-auto card bg-secondary border-info mb-5">
            <div class="card-body p-sm-5">
                <div class="mb-3">
                    <label class="form-label" for="name">Imie i Nazwisko</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="name" name="name" required="" value="{{old('name')}}">
                    @error('name')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Hasło</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="password" name="password" required="" value="{{old('password')}}">
                    @error('password')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="password_confirmation">Powtórz hasło</label>
                    <input type="password" id="password_confirmation" class="form-control form-control-lg" name="password_confirmation" value="{{ old('password_confirmation') }}">


                    @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="telefon">Telefon</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="telefon" name="telefon" required="" value="{{old('telefon')}}">
                    @error('telefon')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">email</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="email" name="email" required="" value="{{old('email')}}">
                    @error('email')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button class="btn btn-primary d-block w-100" type="submit">Prześlij</button>
                </div>
            </div>
        </div>
    </form>

</x-layout>
