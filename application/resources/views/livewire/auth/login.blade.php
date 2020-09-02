<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>

                    <div class="col-lg-6">
                        <div class="p-5">

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Authentication</h1>
                            </div>

                            <form class="user" wire:submit.prevent="submit">

                                <div class="form-group">
                                    <input type="email"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        aria-describedby="emailHelp" id="email" placeholder="Your email"
                                        wire:model="email">
                                    @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                        id="password" placeholder="Password" wire:model="password">
                                    @error('password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="remember"
                                            wire:model="remember">
                                        <label class="custom-control-label" for="remember">Remember Me</label>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>

                            </form>

                            <hr>

                            <div class="text-center">
                                <a class="small" href="{{ route('auth.recover') }}">Forgot Password?</a>
                            </div>

                            <div class="text-center">
                                <a class="small" href="{{ route('auth.register') }}">Create an Account!</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
