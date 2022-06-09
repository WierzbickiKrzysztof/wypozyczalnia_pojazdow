<x-layout>

    <form method="POST" action="{{ url('zwroty')}}">
        @csrf
        @method('PUT')
        <div class="col-md-4 mx-auto card bg-secondary border-info mb-5">
            <div class="card-body p-sm-5">

                <div class="mb-3">
                    <label class="form-label" for="indexWypozyczenia">ID wypozyczenia</label>
                    <input class="form-control"  type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="indexWypozyczenia" name="indexWypozyczenia" required="" value="{{$id}}">
                    @error('$indexPojazdu')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="indexPojazdu">ID pojazdu</label>
                    <input class="form-control"  type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="indexPojazdu" name="indexPojazdu" required="" value="{{$indexPojazdu}}">
                    @error('$indexPojazdu')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="przebieg"><b>Podaj przebieg (zaladowano wartosc przed wypozyczeniem auta)</b></label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="przebieg" name="przebieg" required="" value="{{$przebieg}}">
                    @error('przebieg')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="uszkodzenia">Zauważone uszkodzenia</label>
                    <textarea class="form-control" id="uszkodzenia" name="uszkodzenia" rows="4"></textarea>
                </div>



                <div>
                    <button class="btn btn-primary d-block w-100" type="submit">Zwróć pojazd</button>
                </div>
            </div>
        </div>
    </form>

</x-layout>
