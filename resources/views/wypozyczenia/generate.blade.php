<x-layout>
    <h1>Generuj Raport</h1>
    <form method="POST" action="/wypozyczenia/report">
        @csrf
        <div class="col-md-4 mx-auto card bg-secondary border-info mb-5">
            <div class="card-body p-sm-5">
                <div class="mb-3">
                    <label class="form-label" for="data_rozpoczecia">Data początkowa</label>
                    <input class="form-control" type="date" data-bs-toggle="tooltip" data-bss-tooltip="" id="data_rozpoczecia" name="data_rozpoczecia" required="" value="{{old('data_rozpoczecia')}}">
                    @error('data_rozpoczecia')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="data_zakonczenia">Data końcowa</label>
                    <input class="form-control" type="date" data-bs-toggle="tooltip" data-bss-tooltip="" id="data_zakonczenia" name="data_zakonczenia" required="" value="{{old('data_zakonczenia')}}">
                    @error('data_zakonczenia')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button class="btn btn-primary d-block w-100" type="submit">Generuj</button>
                </div>
            </div>
        </div>
    </form>
</x-layout>

