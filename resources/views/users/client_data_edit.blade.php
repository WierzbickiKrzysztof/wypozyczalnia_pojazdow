<x-layout>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<script src="{{ asset('/assets/css/client.css') }}"></script>-->
    <script src="https://geodata.solutions/includes/countrystate.js" ></script>
    <a class="btn btn-success ms-md-2" href="{{ route('panel_klienta') }}">Powrót do Panelu Klienta</a>

    <form method="POST" action="{{ route('users.client_data_update', ['users' => $users->id]) }}">
        @csrf
        @method('PUT')
        <div class="container-dziad">
            <h3 class="text-dark mb-4">Profil</h3>
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Ustawienia Profilu</p>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row" style="margin-bottom: 25px;text-align: left;">

                            <div class="col-sm-8 col-md-8 col-lg-9 col-xl-10 col-xxl-10 align-self-center">
                                <div class="row">
                                    <div class="col-md-12 text-start">
                                        <div class="text-dark mb-4"><label class="form-label" for="email"><strong>Adres Email</strong></label><input class="form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="email" name="email" required="" value="{{$users->email}}"></div>
                                        @error('email')
                                        <p class="text-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 text-start">
                                <div class="text-dark mb-4"><label class="form-label" for="password"><strong>Hasło</strong></label><input class="form-control" type="password" placeholder="Hasło" name="password" required value="{{$users->password}}" /></div>
                                @error('password')
                                <p class="text-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 text-start">
                                <div class="text-dark mb-4"><label class="form-label" for="username"><strong>Powtórz Hasło</strong></label><input id="verifyPassword" class="form-control" type="password" placeholder="Hasło" name="password" required value="{{$users->password}}" /></div>
                                @error('email')
                                <p class="text-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="text-dark mb-4"><label class="form-label" for="first_name"><strong>Dane</strong></label><input class="form-control" type="text" placeholder="Imie" name="first_name" required value="{{$users->name}}" /></div>
                                @error('name')
                                <p class="text-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="text-dark mb-4"><label class="form-label" for="city"><strong>Miasto</strong></label><input id="cityId" class="form-control" type="text" placeholder="Miejscowość oraz kod pocztowy" name="city"  /></div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-dark mb-4"><label class="form-label" for="address"><strong>Address</strong></label><input class="form-control" type="text" placeholder="ulica" name="address" /></div>
                            </div>
                            <div class="col">
                                <p id="emailErrorMsg" class="text-danger" style="display: none;"></p>
                                <p id="passwordErrorMsg" class="text-danger" style="display: none;"></p>
                            </div>
                            <div class="col-md-12" style="text-align: right;margin-top: 5px;"><button id="submitBtn" class="btn btn-primary btn-sm" type="submit">Zapisz</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</x-layout>
