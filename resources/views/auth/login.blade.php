@extends('app')

@section('title', 'Login')

@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 8px;">
            @error('email')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div style="margin-bottom: 15px;">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required style="width: 100%; padding: 8px;">
            @error('password')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit" style="padding: 10px 20px; font-size: 16px;">Login</button>
        </div>
    </form>
    <div style="margin-top: 20px; text-align: center;">
        <p>Don't have an account? <a href="{{ route('register') }}" style="color: #007bff; text-decoration: none; font-weight: bold;">Register here</a></p>
    </div>
@endsection
