<x-layout>
    <h1>Dodaj pojazd</h1>
    <form method="POST" action="/pojazdy">
        @csrf
        <div class="col-md-4 mx-auto card bg-secondary border-info mb-5">
            <div class="card-body p-sm-5">
                <div class="mb-3">
                    <label class="form-label" for="unikatowy_id_pojazdu">UIP</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="unikatowy_id_pojazdu" name="unikatowy_id_pojazdu" required="" value="{{old('unikatowy_id_pojazdu')}}">
                    @error('unikatowy_id_pojazdu')
                        <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="marka">Marka</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="marka" name="marka" required="" value="{{old('marka')}}">
                    @error('marka')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="model">Model</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="model" name="model" required="" value="{{old('model')}}">
                    @error('model')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="wersja">wersja</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="wersja" name="wersja" required="" value="{{old('wersja')}}">
                    @error('wersja')
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
                    <label class="form-label" for="stan">Stan</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="stan" name="stan" required="" value="{{old('stan')}}">
                    @error('stan')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="paliwo">Paliwo</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="paliwo" name="paliwo" required="" value="{{old('paliwo')}}">
                    @error('paliwo')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="id_wyp">id_wyp</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="id_wyp" name="id_wyp" required="" value="{{old('id_wyp')}}">
                    @error('id_wyp')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="data_wypozyczenia">data_wypozyczenia</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="data_wypozyczenia" name="data_wypozyczenia" required="" value="{{old('data_wypozyczenia')}}">
                    @error('data_wypozyczenia')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="data_zwrotu">data_zwrotu</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="data_zwrotu" name="data_zwrotu" required="" value="{{old('data_zwrotu')}}">
                    @error('data_zwrotu')
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
