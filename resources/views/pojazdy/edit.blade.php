<x-layout>
    <h2 class="text-center mb-4">Edytuj pojazd - {{$pojazd->nr_pojazdu}}</h2>
    <form method="POST" action="{{ route('pojazdy.update', ['pojazd' => $pojazd->id]) }}">
        @csrf
        @method('GET')
        <div class="col-md-4 mx-auto card bg-secondary border-info mb-5">
            <div class="card-body p-sm-5">
                <div class="mb-3">

                    <label class="form-label" for="typ_pojazdu">Typ pojazdu</label>
                    <select name="typ_pojazdu" id="typ_pojazdu" class="category">
                        <option disabled>--wybierz typ pojazdu--</option>
                        @foreach($typ_pojazdu as $item)
                            @if($item->id == $pojazd->typ_pojazdu)
                                <option selected value="{{ $item->id }}">{{ $item->name}}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('typ_pojazdu')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="marka">Marka</label>
                    <select name="marka" id="marka" class="category">
                        <option disabled selected>--wybierz markę pojazdu--</option>
                        @foreach($marka as $item)
                            @if($item->id == $pojazd->marka)
                                <option selected value="{{ $item->id }}">{{ $item->name}}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('marka')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="model">Model</label>
                    <select name="model" id="model" class="category">
                        <option disabled selected>--wybierz model pojazdu--</option>
                        @foreach($model as $item)
                            @if($item->id == $pojazd->model)
                                <option selected value="{{ $item->id }}">{{ $item->name}}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('model')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="wersja">Wersja</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="wersja" name="wersja" required="" value="{{ $pojazd->wersja }}">
                    @error('wersja')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="stan">Stan</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="stan" name="stan" required="" value="{{ $pojazd->stan }}">
                    @error('stan')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="przebieg">Przebieg</label>
                    <input class="form-control" type="number" data-bs-toggle="tooltip" data-bss-tooltip="" id="przebieg" name="przebieg" required="" value="{{ $pojazd->przebieg }}">
                    @error('przebieg')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="typ_pojazdu">Pojemnosc baku</label>
                    <input class="form-control" type="number" data-bs-toggle="tooltip" data-bss-tooltip="" id="pojemnosc_baku" name="pojemnosc_baku" required="" value="{{ $pojazd->pojemnosc_baku }}">
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
