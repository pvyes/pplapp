<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card w-96 bg-base-100">
                <div class="card-body">
                    <h1 class="text-3xl font-bold text-center mb-6">Create Account</h1>

                    <form method="POST" action="/register">
                        @csrf

                        <!-- Name -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="name"
                                   placeholder="Name"
                                   value="{{ old('name') }}"
                                   class="input input-bordered @error('name') input-error @enderror"
                                   required>
                            <span>Name</span>
                        </label>
                        @error('name')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Email -->
                        <label class="floating-label mb-6">
                            <input type="email"
                                   name="email"
                                   placeholder="[mail@example.com](<mailto:mail@example.com>)"
                                   value="{{ old('email') }}"
                                   class="input input-bordered @error('email') input-error @enderror"
                                   required>
                            <span>E-mail</span>
                        </label>
                        @error('email')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Password -->
                        <label class="floating-label mb-6">
                            <input type="password"
                                   name="password"
                                   placeholder="••••••••"
                                   class="input input-bordered @error('password') input-error @enderror"
                                   required>
                            <span>Password</span>
                        </label>
                        @error('password')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Password Confirmation -->
                        <label class="floating-label mb-6">
                            <input type="password"
                                   name="password_confirmation"
                                   placeholder="••••••••"
                                   class="input input-bordered"
                                   required>
                            <span>Confirm Password</span>
                        </label>

                        <!-- Avatar -->
                        <div class="avatar-selector" style="display:inline;">
                            <label class="avatar-option">
                            <input type="radio" name="avatar" value="https://avatars.laravel.cloud/taylor@laravel.com" checked>
                            <img class="size-6 rounded-full" src="https://avatars.laravel.cloud/taylor@laravel.com" alt="Taylor">
                            </label>
                            <label class="avatar-option">
                            <input type="radio" name="avatar" value="https://avatars.laravel.cloud/36152413-67a9-465d-acf3-e8879c48253c">
                            <img class="size-6 rounded-full"src="https://avatars.laravel.cloud/36152413-67a9-465d-acf3-e8879c48253c" alt="Blue">
                            </label>
                            <label class="avatar-option">
                            <input type="radio" name="avatar" value="https://avatars.laravel.cloud/03ed2e68-1a21-4972-b3b2-0a483b0658ea?vibe=sunset">
                            <img class="size-6 rounded-full"src="https://avatars.laravel.cloud/03ed2e68-1a21-4972-b3b2-0a483b0658ea?vibe=sunset" alt="Sunset">
                            </label>
                            <label class="avatar-option">
                            <input type="radio" name="avatar" value="https://avatars.laravel.cloud/22945806-91ea-4649-a775-b300642c0000?vibe=ocean">
                            <img class="size-6 rounded-full"src="https://avatars.laravel.cloud/22945806-91ea-4649-a775-b300642c0000?vibe=ocean" alt="Ocean">
                            </label>
                            <label class="avatar-option">
                            <input type="radio" name="avatar" value="https://avatars.laravel.cloud/d05096ec-ec0a-49b0-aea5-bfdb65816174?vibe=daybreak">
                            <img class="size-6  rounded-full"src="https://avatars.laravel.cloud/d05096ec-ec0a-49b0-aea5-bfdb65816174?vibe=daybreak" alt="Daybreak">
                            </label>
                            <label class="avatar-option">
                            <input type="radio" name="avatar" value="https://avatars.laravel.cloud/a4804e90-09da-4f3f-b554-fb52c752fbec?vibe=bubble">
                            <img class="size-6 rounded-full"src="https://avatars.laravel.cloud/a4804e90-09da-4f3f-b554-fb52c752fbec?vibe=bubble" alt="Bubble">
                            </label>
                            <label class="avatar-option">
                            <input type="radio" name="avatar" value="https://avatars.laravel.cloud/14411fbc-7266-4f9f-9399-e38b98ca1cf4?vibe=forest">
                            <img class="size-6 rounded-full"class="size-6 rounded-full"src="https://avatars.laravel.cloud/14411fbc-7266-4f9f-9399-e38b98ca1cf4?vibe=forest" alt="Forest">
                            </label>
                            <label class="avatar-option">
                            <input type="radio" name="avatar" value="https://avatars.laravel.cloud/eeb04d7e-a80e-480c-9dcb-0cb51eeadd87?vibe=fire">
                            <img class="size-6 rounded-full"src="https://avatars.laravel.cloud/eeb04d7e-a80e-480c-9dcb-0cb51eeadd87?vibe=fire" alt="Fire">
                            </label>
                            <label class="avatar-option">
                            <input type="radio" name="avatar" value="https://avatars.laravel.cloud/e01be3e6-57fb-4d8f-87ab-fab6a146e72b?vibe=crystal">
                            <img class="size-6 rounded-full"src="https://avatars.laravel.cloud/e01be3e6-57fb-4d8f-87ab-fab6a146e72b?vibe=crystal" alt="Crystal">
                            </label>
                            <label class="avatar-option">
                            <input type="radio" name="avatar" value="https://avatars.laravel.cloud/291b6fbb-5d8d-4073-a35d-120b7f869c51?vibe=ice">
                            <img class="size-6 rounded-full"src="https://avatars.laravel.cloud/291b6fbb-5d8d-4073-a35d-120b7f869c51?vibe=ice" alt="Ice">
                            </label>
                            <label class="avatar-option">
                            <input type="radio" name="avatar" value="https://avatars.laravel.cloud/b7cf6c8d-a831-450d-8e46-94aba55d7733?vibe=stealth">
                            <img class="size-6 rounded-full"  src="https://avatars.laravel.cloud/b7cf6c8d-a831-450d-8e46-94aba55d7733?vibe=stealth" alt="Stealth">
                            </label>
                        </div>
                        @error('avatar')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Submit Button -->
                        <div class="form-control mt-8">
                            <button type="submit" class="btn btn-primary btn-sm w-full">
                                Register
                            </button>
                        </div>
                    </form>

                    <div class="divider">OR</div>
                    <p class="text-center text-sm">
                        Already have an account?
                        <a href="/login" class="link link-primary">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>