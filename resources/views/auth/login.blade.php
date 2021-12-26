@extends('layouts.app')
@section('content')
<div class="container py-4 mt-5 mb-3 d-flex justify-content-center">
    <h1>Login</h1>
</div>
<div class="container text-center" style="width:330px;">
    <main class="p-2">
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif 
        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif 
        <form action="#" method="POST">
            @csrf
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}" required>
                <label for="floatingInput">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>   
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                <label for="floatingPassword">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>   
                @enderror
            </div>

            <div class="checkbox mb-3 mt-3">
                Belum punya akun? <a href="{{ route('register') }}">daftar</a> disini
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </main>
</div>
@endsection
