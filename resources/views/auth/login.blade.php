@extends('layouts.main')
@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/signin.css') }}">
@endsection


@section('content')
    <section>
        <div class="wrapper">
            <div class="inner" dir="ltr">
                <div class="image-holder">
                    <img src="{{ asset('/assets/img/registration-form-6.jpg') }}" style="margin-left: -20px;" />
                </div>
                <form method="POST" action="{{ route('admin.login') }}">@csrf

                    <h3>Admin Signin</h3>
                    <div class="form-row">

                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Enter your email" autofocus>

                    </div>
                    <div class="form-row">
                        <input type="password" class="form-control" placeholder="Password" name="password" />
                    </div>
                    <button type="submit">
                        SignIn
                        <i class="zmdi zmdi-long-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
