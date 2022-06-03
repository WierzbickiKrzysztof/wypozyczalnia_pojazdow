@push('scripts')
    <script src="{{ asset('js/pojazd.js') }}"></script>
@endpush
<x-layout>
    <h2 class="text-center mb-4">Dodaj pojazd</h2>
    <form method="POST" action="{{ route('pojazdy.store') }}">
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
                    <select name="typ_pojazdu" id="typ_pojazdu" class="form-select">
                        <option disabled selected>--wybierz typ pojazdu--</option>
                        @foreach($typ_pojazdu as $item)
                            <option value="{{ $item->id }}">{{ $item->name}} | {{ $item->typ_pojazdu }}</option>
                        @endforeach
                    </select>
                    @error('typ_pojazdu')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3" id="marka_h" style="display: none">
                    <label class="form-label" for="marka">Marka</label>
                    <select name="marka" id="marka" class="form-select">
                        <option disabled selected>--najpierw wybierz typ pojazdu--</option>
                    </select>
                    @error('marka')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3" id="model_h" style="display: none">
                    <label class="form-label" for="model">Model</label>
                    <select name="model" id="model" class="form-select">
                        <option disabled selected>--najpierw wybierz typ pojazdu--</option>
                    </select>
                    @error('model')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="wersja">Wersja</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="wersja" name="wersja" required="" value="{{ old('wersja') }}">
                    @error('wersja')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="stan">Stan</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="stan" name="stan" required="" value="{{ old('stan') }}">
                    @error('stan')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="przebieg">Przebieg</label>
                    <input class="form-control" type="number" data-bs-toggle="tooltip" data-bss-tooltip="" id="przebieg" name="przebieg" required="" value="{{ old('przebieg') }}">
                    @error('przebieg')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="typ_pojazdu">Pojemnosc baku</label>
                    <input class="form-control" type="number" data-bs-toggle="tooltip" data-bss-tooltip="" id="pojemnosc_baku" name="pojemnosc_baku" required="" value="{{ old('pojemnosc_baku') }}">
                    @error('pojemnosc_baku')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="cena">Cena</label>
                    <input class="form-control" disabled type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="cena" name="cena" required="" value="">
                </div>

                <div>
                    <button class="btn btn-primary d-block w-100" type="submit">Prześlij</button>
                </div>
            </div>
        </div>
    </form>
</x-layout>
