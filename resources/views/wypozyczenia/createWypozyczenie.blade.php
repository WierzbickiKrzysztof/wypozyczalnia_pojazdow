<x-layout>
    <h1>Dodaj wypozyczenie</h1>
    <form method="POST" action="/wypozyczenia">
        @csrf
        <div class="col-md-4 mx-auto card bg-secondary border-info mb-5">
            <div class="card-body p-sm-5">
                <div class="mb-3">
                    <label class="form-label" for="id_klienta">ID Klienta</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="id_klienta" name="id_klienta" required="" value="{{old('id_klienta')}}">
                    @error('id_klienta')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="id_pojazdu">ID Pojazdu</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="id_pojazdu" name="id_pojazdu" required="" value="{{old('id_pojazdu')}}">
                    @error('id_pojazdu')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="kowta_wypozyczenia_dzien">Kwota wypożyczenia(dzień)</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="kowta_wypozyczenia_dzien" name="kowta_wypozyczenia_dzien" required="" value="{{old('kowta_wypozyczenia_dzien')}}">
                    @error('kowta_wypozyczenia_dzien')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="data_rozpoczecia">Data rozpoczęcia</label>
                    <input class="form-control" type="date" data-bs-toggle="tooltip" data-bss-tooltip="" id="data_rozpoczecia" name="data_rozpoczecia" required="" value="{{old('data_rozpoczecia')}}">
                    @error('data_rozpoczecia')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="data_zakonczenia">Data zakończenia</label>
                    <input class="form-control" type="date" data-bs-toggle="tooltip" data-bss-tooltip="" id="data_zakonczenia" name="data_zakonczenia" required="" value="{{old('data_zakonczenia')}}">
                    @error('data_zakonczenia')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="dod_ubezpieczenie">Dodatkowe ubezpieczenie</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="dod_ubezpieczenie" name="dod_ubezpieczenie" required="" value="{{old('dod_ubezpieczenie')}}">
                    @error('dod_ubezpieczenie')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="skan_umowy">Skan umowy</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="skan_umowy" name="skan_umowy" required="" value="{{old('skan_umowy')}}">
                    @error('skan_umowy')
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

