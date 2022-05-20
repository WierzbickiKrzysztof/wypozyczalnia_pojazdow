<x-layout>
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card bg-dark" style="border-radius: 15px;">
                <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Zarejestruj się</h2>

                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="form-outline mb-4">
                            <input type="text" id="name" class="form-control form-control-lg" name="name" value="{{ old('name') }}">
                            <label class="form-label" for="name">Imię i nazwisko</label>

                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <input type="email" id="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}">
                            <label class="form-label" for="email">E-mail</label>

                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" id="telefon" class="form-control form-control-lg" name="telefon" value="{{ old('telefon') }}">
                            <label class="form-label" for="telefon">Telefon</label>

                            @error('telefon')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" id="password" class="form-control form-control-lg" name="password" value="{{ old('password') }}">
                            <label class="form-label" for="password">Hasło</label>

                            @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" id="password_confirmation" class="form-control form-control-lg" name="password_confirmation" value="{{ old('password_confirmation') }}">
                            <label class="form-label" for="password_confirmation">Powtórz hasło</label>

                            @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success btn-block btn-lg text-body">Zarejestruj się</button>
                        </div>

                        <p class="text-center mt-5 mb-0">Posiadasz już konto? <a href="{{ route('login') }}" class="fw-bold"><u>Zaloguj się</u></a></p>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-layout>
