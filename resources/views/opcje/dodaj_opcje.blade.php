<x-layout>
    <h2 class="text-center mb-4">Dodaj dodatkowe wyposażenie</h2>
    <form method="GET" action="{{ route('opcje.create') }}">
        @csrf
        <div class="col-md-4 mx-auto card bg-secondary border-info mb-5">
            <div class="card-body p-sm-5">
                <div class="mb-3">
                    <label class="form-label" for="name">Nazwa</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="name" name="name" required="" value="{{old('name')}}">
                    @error('name')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="opis">Krótki opis</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="opis" name="opis" required="" value="{{ old('opis') }}">
                    @error('opis')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="cena">cena</label>
                    <input class="form-control" type="number" data-bs-toggle="tooltip" data-bss-tooltip="" id="cena" name="cena" required="" value="{{ old('stan') }}" min="0" value="0" step=".01">
                    @error('cena')
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
