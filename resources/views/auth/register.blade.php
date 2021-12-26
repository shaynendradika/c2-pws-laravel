@extends('layouts.app')
@section('content')
<div class="container py-4 mt-5 mb-3 d-flex justify-content-center">
    <h1>Register</h1>
</div>
<div class="container text-center" style="width:330px;">
    <main class="p-2">
        <form action="#" method="POST">
            @csrf
            <div class="form-floating">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="Name" name="name" value="{{ old('name') }}" required>
                <label for="floatingInput">Name</label>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="Username" name="username" value="{{ old('username') }}" required>
                <label for="floatingInput">Username</label>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}" required>
                <label for="floatingInput">Email address</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" value="" required>
                <label for="floatingPassword">Password</label>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="checkbox mb-3 mt-3">
                Sudah punya akun? <a href="{{ route('login') }}">login</a> disini
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
        </form>
    </main>
</div>
@endsection

