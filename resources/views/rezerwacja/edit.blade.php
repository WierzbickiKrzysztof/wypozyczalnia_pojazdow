<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
<<script type="text/javascript">
    function change(){
        var select = document.getElementById("id_pojazdu");
        var text = select.options[select.selectedIndex].text;
        var cut = text.split("Cena: ").pop();
        var price = parseInt(cut);
        document.getElementById("kowta_wypozyczenia_dzien").value= price;
    }
    function dateValidate(){
        var start = document.getElementById("data_rozpoczecia").value;
        var end = document.getElementById("data_zakonczenia").value;
        if(start > end){
            document.getElementById("data_zakonczenia").setCustomValidity("Data zkończenia musi być większa niż data rozpoczęcia.");
            document.getElementById("data_zakonczenia").reportValidity();
            return false;
        }
        document.getElementById("data_zakonczenia").setCustomValidity("");
        return true;
    }
</script>
<x-layout>
    <div>
        <a class="btn btn-primary fs-5 me-2 py-2 px-4" role="button" href="{{ route('pracownicy.index') }}">Lista Pracowników</a>
    </div>
    <h1>Edytuj Rezerwacje Numer - {{$rezerwacja->id}}</h1>
    <form method="POST" action="{{ route('rezerwacja.update_edit', ['rezerwacja' => $rezerwacja->id]) }}">
        @csrf
        @method('POST')
        <div class="col-md-4 mx-auto card bg-secondary border-info mb-5">
            <div class="card-body p-sm-5">

                <div class="mb-3">
                    <label class="form-label" for="id_klienta">id klienta</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="id_klienta" name="id_klienta" required="" value="{{$rezerwacja->id_klienta}}">
                    @error('name')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="id_pojazdu">id pojazdu</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="id_pojazdu" name="id_pojazdu" required="" value="{{$rezerwacja->id_pojazdu}}">
                    @error('telefon')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="kwota_wypozyczenia_dzien">kwota wypożyzcenia dzień</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="kwota_wypozyczenia_dzien" name="kwota_wypozyczenia_dzien" required="" value="{{$rezerwacja->kwota_wypozyczenia_dzien}}">
                    @error('email')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="data_rozpoczecia">data rozpoczecia</label>
                    <input class="form-control" type="date" data-bs-toggle="tooltip" data-bss-tooltip="" id="data_rozpoczecia" name="data_rozpoczecia" required="" value="{{$rezerwacja->data_rozpoczecia}}">
                    @error('email')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="data_zakonczenia">data zakonczenia</label>
                    <input class="form-control" type="date" data-bs-toggle="tooltip" data-bss-tooltip="" id="data_zakonczenia" name="data_zakonczenia" required="" value="{{$rezerwacja->data_zakonczenia}}">
                    @error('email')
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
                    <label class="form-label" for="calkowita_kwota">calkowita kwota</label>
                    <input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="calkowita_kwota" name="calkowita_kwota" required="" value="{{$rezerwacja->calkowita_kwota}}">
                    @error('email')
                    <p class="text-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button onclick="return dateValidate()" class="btn btn-primary d-block w-100" type="submit">Zaktualizuj</button>
                </div>
            </div>
        </div>
    </form>
</x-layout>
