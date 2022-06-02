<x-layout>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <h1>Dodaj wypozyczenie</h1>
    <form method="POST" action="{{ route('wypozyczenia.store') }}">
        @csrf
        <div class="col-md-4 mx-auto card bg-secondary border-info mb-5">
            <div class="card-body p-sm-5">
                <div class="mb-3">
                    <label class="form-label" for="id_klienta">Klient</label>

                    <select name="id_klienta" id="id_klienta" class="category">
                        <option disabled selected>--wybierz klienta--</option>
                        @foreach($klient as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} | {{ $item->email }}</option>
                        @endforeach
                    </select>
                    @error('id_klienta')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="id_pojazdu">Wybierz pojazd</label>

                    <select name="id_pojazdu" id="id_pojazdu" class="category">
                        <option disabled selected>--wybierz pojazd--</option>
                        @foreach($pojazd as $item)
                            <option value="{{ $item->id }}">{{ $item->s_typ_pojazdu->name }} | {{ $item->nr_pojazdu }} | {{ $item->s_marka->name }} {{ $item->s_model->name }} {{ $item->wersja }}</option>
                        @endforeach
                    </select>
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
                    <script>
                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0');
                        var yyyy = today.getFullYear();

                        today = yyyy + '-' + mm + '-' + dd;
                        $('#data_rozpoczecia').attr('min',today);
                        $('#data_zakonczenia').attr('min',today);
                    </script>
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

