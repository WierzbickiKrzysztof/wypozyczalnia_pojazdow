<x-layout>
    <h1>Edytuj pojazd - {{$pojazd->unikatowy_id_pojazdu}}</h1>
    <form method="POST" action="/pojazdy/{{ $pojazd->id }}">
        @csrf
        @method('PUT')
        <div class="col-md-4 mx-auto card bg-secondary border-info mb-5">
            <div class="card-body p-sm-5">

                <div class="mb-3">
                    <label class="form-label" for="marka">Marka</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="marka" name="marka" required="" value="{{$pojazd->marka}}">
                    @error('marka')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="model">Model</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="model" name="model" required="" value="{{$pojazd->model}}">
                    @error('model')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="wersja">wersja</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="wersja" name="wersja" required="" value="{{$pojazd->wersja}}">
                    @error('wersja')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="przebieg">Przebieg</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="przebieg" name="przebieg" required="" value="{{$pojazd->przebieg}}">
                    @error('przebieg')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="stan">Stan</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="stan" name="stan" required="" value="{{$pojazd->stan}}">
                    @error('stan')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="paliwo">Paliwo</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="paliwo" name="paliwo" required="" value="{{$pojazd->paliwo}}">
                    @error('paliwo')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="id_wyp">id_wyp</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="id_wyp" name="id_wyp" required="" value="{{$pojazd->id_wyp}}">
                    @error('id_wyp')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="data_wypozyczenia">data_wypozyczenia</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="data_wypozyczenia" name="data_wypozyczenia" required="" value="{{$pojazd->data_wypozyczenia}}">
                    @error('data_wypozyczenia')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="data_zwrotu">data_zwrotu</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="data_zwrotu" name="data_zwrotu" required="" value="{{$pojazd->data_zwrotu}}">
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
