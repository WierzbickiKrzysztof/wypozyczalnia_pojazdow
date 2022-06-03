@push('scripts')
    <script src="{{ asset('js/rezerwacja.js') }}"></script>
@endpush
<x-layout>
    <h2 class="text-center mb-4">Utwórz rezerwacje</h2>

    <form method="POST" action="{{ route('rezerwacja.store') }}">
        @csrf
        <div class="col-md-4 mx-auto card bg-secondary border-info mb-5">
            <div class="card-body p-sm-5">
                <div class="mb-3">
                    <label class="form-label" for="id_klienta">Klient</label>

                    <select name="id_klienta" id="id_klienta" class="form-select">
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
                    <label class="form-label" for="typ_pojazdu">Typ pojazdu</label>
                    <select name="typ_pojazdu" id="typ_pojazdu" class="form-select">
                        <option disabled selected>--wybierz typ pojazdu--</option>
                        @foreach($typ_pojazdu as $item)
                            <option value="{{ $item->id }}">{{ $item->name}} | {{ $item->typ_pojazdu }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3" id="marka_h" style="display: none">
                    <label class="form-label" for="marka">Marka</label>
                    <select name="marka" id="marka" class="form-select">
                        <option disabled selected>--najpierw wybierz typ pojazdu--</option>
                    </select>
                </div>

                <div class="mb-3" id="model_h" style="display: none">
                    <label class="form-label" for="model">Model</label>
                    <select name="model" id="model" class="form-select">
                        <option disabled selected>--najpierw wybierz typ pojazdu--</option>
                    </select>
                </div>

                <div class="mb-3" id="id_pojazdu_h" style="display: none">
                    <label class="form-label" for="id_pojazdu">Wybierz pojazd</label>
                    <select name="id_pojazdu" id="id_pojazdu" class="form-select">
                        <option disabled selected>--najpierw wybierz model pojazdu--</option>
                    </select>
                </div>

                <div class="mb-3" id="cena_h" style="display: none">
                    <label class="form-label" for="kwota_wypozyczenia_dzien">Kwota wypożyczenia(dzień)</label>
                    <input class="form-control" disabled type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="kwota_wypozyczenia_dzien" name="kwota_wypozyczenia_dzien" required="" value="">
                </div>
                <div class="mb-3" id="data_rozpoczecia_h" style="display: none">
                    <label class="form-label" for="data_rozpoczecia">Data rozpoczęcia</label>
                    <input class="form-control" type="date" data-bs-toggle="tooltip" data-bss-tooltip="" id="data_rozpoczecia" name="data_rozpoczecia" required="" value="{{old('data_rozpoczecia')}}">
                    @error('data_rozpoczecia')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3" id="data_zakonczenia_h" style="display: none">
                    <label class="form-label" for="data_zakonczenia">Data zakończenia</label>
                    <input class="form-control" disabled type="date" data-bs-toggle="tooltip" data-bss-tooltip="" id="data_zakonczenia" name="data_zakonczenia" required="" value="{{old('data_zakonczenia')}}">
                    @error('data_zakonczenia')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3" id="cena_koncowa_h" style="display: none">
                    <label class="form-label" for="cena_koncowa">Kwota wypożyczenia</label>
                    <input class="form-control" disabled type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="cena_koncowa" name="cena_koncowa" required="" value="">
                </div>

{{--                <div class="mb-3">--}}
{{--                    <label class="form-label" for="dod_ubezpieczenie">Dodatkowe ubezpieczenie</label>--}}
{{--                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="dod_ubezpieczenie" name="dod_ubezpieczenie" required="" value="{{old('dod_ubezpieczenie')}}">--}}
{{--                    @error('dod_ubezpieczenie')--}}
{{--                    <p class="text-500 text-xs mt-1">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}

                <div>
                    <button class="btn btn-primary d-block w-100" type="submit">Prześlij</button>
                </div>
            </div>
        </div>
    </form>
</x-layout>

