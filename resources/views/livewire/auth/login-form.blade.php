<form class="user" wire:submit.prevent="submit">

    <div class="form-group">
        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
            aria-describedby="emailHelp" id="email" placeholder="Your email" wire:model="email">
        @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
    </div>

    <div class="form-group">
        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
            id="password" placeholder="Password" wire:model="password">
        @error('password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
    </div>

    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="remember" wire:model="remember">
            <label class="custom-control-label" for="remember">Remember Me</label>
        </div>
    </div>


    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>

</form>
