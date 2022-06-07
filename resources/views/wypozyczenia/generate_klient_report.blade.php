<x-layout>
    <form method="GET" action="{{ route('wypozyczenia.klientreport')}}">
    @csrf
    @method('GET')
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
            <div>
                <button class="btn btn-primary d-block w-100" type="submit">Generuj</button>
            </div>
        </div>
    </div>
    </form>

</x-layout>

