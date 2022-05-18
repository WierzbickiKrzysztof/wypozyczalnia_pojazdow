<x-layout>
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card bg-dark" style="border-radius: 15px;">
                <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Zaloguj się</h2>

                    <form method="POST" action="/users/authenticate">
                        @csrf

                        <div class="form-outline mb-4">
                            <input type="email" id="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}">
                            <label class="form-label" for="email">E-mail</label>

                            @error('email')
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

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success btn-block btn-lg text-body">Zaloguj się</button>
                        </div>

                        <p class="text-center mt-5 mb-0">Nie masz jeszcze konta? <a href="/register" class="fw-bold"><u>Zarejestruj się</u></a></p>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-layout>
