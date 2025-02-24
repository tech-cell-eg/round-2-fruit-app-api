@extends('layout.app-auth')

@section('title', 'Register')

@section('content')

    <main class="main-content  mt-0">
        <section class="min-vh-100 mb-8">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url({{asset('assets/img/curved-images/curved14.jpg')}});">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                            {{--                            <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                        <div class="card z-index-0">
                            <div class="card-header text-center pt-4">
                                <h5>Register with</h5>
                            </div>
                            <div class="card-body">
                                <form role="form text-left" method="POST" action="{{route('register.post')}}">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                                    </div>
                                    @error('name')
                                    <span style="color:red;">{{$message}}</span>
                                    @enderror
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                    </div>
                                    @error('email')
                                    <span style="color:red;">{{$message}}</span>
                                    @enderror
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                    </div>
                                    @error('password')
                                    <span style="color:red;">{{$message}}</span>
                                    @enderror
                                    <div class="mb-3">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" aria-label="Password" aria-describedby="password-addon">
                                    </div>
                                    @error('password_confirmation')
                                    <span style="color:red;">{{$message}}</span>
                                    @enderror
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                                    </div>
                                    <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{route('login')}}" class="text-dark font-weight-bolder">Sign in</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@stop
