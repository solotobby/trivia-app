{{-- <div class="flex flex-col gap-6">
    <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autofocus
            autocomplete="email"
            placeholder="email@example.com"
        />

        <!-- Password -->
        <div class="relative">
            <flux:input
                wire:model="password"
                :label="__('Password')"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="__('Password')"
                viewable
            />

            @if (Route::has('password.request'))
                <flux:link class="absolute end-0 top-0 text-sm" :href="route('password.request')" wire:navigate>
                    {{ __('Forgot your password?') }}
                </flux:link>
            @endif
        </div>

        <!-- Remember Me -->
        <flux:checkbox wire:model="remember" :label="__('Remember me')" />

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Log in') }}</flux:button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            {{ __('Don\'t have an account?') }}
            <flux:link :href="route('register')" wire:navigate>{{ __('Sign up') }}</flux:link>
        </div>
    @endif
</div> --}}


<form wire:submit="login">
    <div class="block block-themed block-rounded block-fx-shadow">
      <div class="block-header bg-gd-dusk">
        <h3 class="block-title">Please Sign In</h3>
      </div>
      <div class="block-content">
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
        <div class="row">
          <div class="col-sm-6 d-sm-flex align-items-center push">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="login-remember-me" wire:model="remember">
              <label class="form-check-label" for="login-remember-me">Remember Me</label>
            </div>
          </div>
          <div class="col-sm-6 text-sm-end push">
            <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
              Sign In
            </button>
          </div>
        </div>
      </div>
      <div class="block-content block-content-full bg-body-light text-center d-flex justify-content-between">
        <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{route('register')}}">
          <i class="fa fa-plus opacity-50 me-1"></i> Create Account
        </a>
        <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ route('password.request') }} ">
          Forgot Password
        </a>
      </div>
    </div>
  </form>

