@extends('layouts.auth')

@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">

                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>

                        <livewire:auth.register-form />

                        <hr>

                        <div class="text-center">
                            <a class="small" href="{{ route('auth.login') }}">Forgot Password?</a>
                        </div>

                        <div class="text-center">
                            <a class="small" href="{{ route('auth.login') }}">Already have an account? Login!</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
