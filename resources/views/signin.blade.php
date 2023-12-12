@extends('layouts.main')
@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/signin.css') }}">
@endsection
@section('content')

    <section>
        @if (isset($data['invalid_account']))
            <p>{{ $data['invalid_account'] }}</p>
        @endif
        <div class="wrapper">
            <div class="inner">
                <div class="image-holder">
                    <img src="{{ asset('/assets/img/registration-form-6.jpg') }}" style="margin-left: -20px;" />
                </div>
                <form id="login-form" method="POST" action="{{ route('authenticated') }}"> @csrf
                    <h3>Signin</h3>
                    <div class="form-row">
                        <input type="text" class="form-control" placeholder="Email" name="email" />
                    </div>
                    <div class="form-row">
                        <input type="password" class="form-control" placeholder="Password" name="password" />
                    </div>
                    <div class="form-row">
                        @if (isset($data['errors']))
                            <ul style="padding: 15px; color: red;">
                                @foreach ($data['errors'] as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <button type="submit">
                        SignIn
                        <i class="zmdi zmdi-long-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');

            fetch('https://nourishfitness.net/api/users/auth/login', {
                    method: 'POST',
                    body: JSON.stringify({
                        email: formData.get('email'),
                        password: formData.get('password')
                    }),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Request failed with status ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.token && data.data) {
                        var token = data.token;
                        var userData = data.data;
                        localStorage.setItem('flutter.token', token);
                        window.location.href = 'https://portal.nourishfitness.net';
                    } else {
                        throw new Error('Invalid response format');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
@endsection
