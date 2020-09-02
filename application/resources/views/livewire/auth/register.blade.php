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

                    <form class="user" wire:submit.prevent="submit">

                        <div class="form-group">
                            <input type="text"
                                class="form-control form-control-user @error('name') is-invalid @enderror" id="name"
                                placeholder="Your name" wire:model="name">
                            @error('name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="form-group">
                            <input type="email"
                                class="form-control form-control-user @error('email') is-invalid @enderror" id="email"
                                placeholder="Email Address" wire:model="email">
                            @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password"
                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                    id="password" placeholder="Password" wire:model="password">
                                @error('password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="password_confirmation"
                                    placeholder="Repeat Password" wire:model="password_confirmation">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>

                        <hr>

                    </form>

                    <hr>

                    <div class="text-center">
                        <a class="small" href="{{ route('auth.recover') }}">Forgot Password?</a>
                    </div>

                    <div class="text-center">
                        <a class="small" href="{{ route('auth.login') }}">Already have an account? Login!</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
