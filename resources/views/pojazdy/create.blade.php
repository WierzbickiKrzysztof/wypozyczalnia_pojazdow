<x-layout>
    <h1>Dodaj pojazd</h1>
    <form method="POST" action="/pojazdy">
        @csrf
        <div class="col-md-4 mx-auto card bg-secondary border-info mb-5">
            <div class="card-body p-sm-5">
                <div class="mb-3">
                    <label class="form-label" for="nr_pojazdu">NR Pojazdu</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="nr_pojazdu" name="nr_pojazdu" required="" value="{{old('nr_pojazdu')}}">
                    @error('nr_pojazdu')
                        <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="typ_pojazdu">Typ pojazdu</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="typ_pojazdu" name="typ_pojazdu" required="" value="{{old('typ_pojazdu')}}">
                    @error('typ_pojazdu')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="typ_pojazdu">Marka</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="marka" name="marka" required="" value="{{old('marka')}}">
                    @error('marka')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="typ_pojazdu">Model</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="model" name="model" required="" value="{{old('model')}}">
                    @error('model')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="typ_pojazdu">Wersja</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="wersja" name="wersja" required="" value="{{old('wersja')}}">
                    @error('wersja')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="typ_pojazdu">Stan</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="stan" name="stan" required="" value="{{old('stan')}}">
                    @error('stan')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="przebieg">Przebieg</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="przebieg" name="przebieg" required="" value="{{old('przebieg')}}">
                    @error('przebieg')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="typ_pojazdu">Pojemnosc baku</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="pojemnosc_baku" name="pojemnosc_baku" required="" value="{{old('pojemnosc_baku')}}">
                    @error('pojemnosc_baku')
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
