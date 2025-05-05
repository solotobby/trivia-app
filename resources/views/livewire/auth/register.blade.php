{{-- <div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input
            wire:model="name"
            :label="__('Name')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('Full name')"
        />

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')"
            viewable
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirm password')"
            viewable
        />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div> --}}



<form wire:submit="register">
    <div class="block block-themed block-rounded block-fx-shadow">
      <div class="block-header bg-gd-dusk">
        <h3 class="block-title">Please Sign In</h3>
      </div>
      <div class="block-content">
        <div class="form-floating mb-4">
            <input type="text" class="form-control" id="name-username" wire:model="name"
                :label="__('Name')"
                type="text"
                required
                autofocus
                autocomplete="email"
                
                placeholder="Enter your full name">
            <label class="form-label" for="name-username">Enter Full Name</label>
        </div>
        <div class="form-floating mb-4">
          <input type="text" class="form-control" id="login-username" wire:model="email"
              :label="__('Email address')"
              type="email"
              required
              autofocus
              autocomplete="email"
              
              placeholder="Enter your username">
          <label class="form-label" for="login-username">Email Address</label>
        </div>
        <div class="form-floating mb-4">
          <input type="password" class="form-control" id="login-password" wire:model="password"
          :label="__('Password')"
          type="password"
          required
          autocomplete="current-password"
          :placeholder="__('Password')" placeholder="Enter your password">
          <label class="form-label" for="login-password">Password</label>
        </div>
        <div class="form-floating mb-4">
            <input type="password" class="form-control" id="login-password" wire:model="password_confirmation"
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="current-password"
            :placeholder="__('Confirm Password')" placeholder="Enter your password confirmation">
            <label class="form-label" for="login-password">Password confirmation</label>
          </div>
        <div class="row">
          <div class="col-sm-6 d-sm-flex align-items-center push">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="login-remember-me" wire:model="remember">
              <label class="form-check-label" for="login-remember-me">Remember Me</label>
            </div>
          </div>
          <div class="col-sm-6 text-sm-end push">
            <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
              Sign Up
            </button>
          </div>
        </div>
      </div>
      <div class="block-content block-content-full bg-body-light text-center d-flex justify-content-between">
        <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{route('login')}}">
          <i class="fa fa-plus opacity-50 me-1"></i> Login to Account
        </a>
        <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ route('password.request') }} ">
          Forgot Password
        </a>
      </div>
    </div>
  </form>


