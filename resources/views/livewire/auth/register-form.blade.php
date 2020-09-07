<form class="user" wire:submit.prevent="submit">

    <div class="form-group">
        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name"
            placeholder="Your name" wire:model="name">
        @error('name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
    </div>

    <div class="form-group">
        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email"
            placeholder="Email Address" wire:model="email">
        @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
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
<div>
    {{-- Stop trying to control. --}}
</div>
