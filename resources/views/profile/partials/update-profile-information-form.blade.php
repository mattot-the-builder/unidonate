<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="telephone" :value="__('Telephone')" />
            <x-text-input id="telephone" name="telephone" type="text" class="mt-1 block w-full" :value="old('telephone', $user->telephone)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
        </div>

        <div class="form-group">
                            
                            
            <label for="kelompok">Kelompok</label>
            <select class="form-control" name="kelompok">

                
                @if ($user->kelompok == 'Amanah')
                    <option value="Amanah" selected>Amanah</option>
                    <option value="Cendikiawan">Cendikiawan</option>
                    <option value="Murni">Murni</option>
                    <option value="Ilmu">Ilmu</option>
                @elseif ($user->kelompok == 'Cendekiawan')
                    <option value="Amanah">Amanah</option>
                    <option value="Cendikiawan" selected>Cendikiawan</option>
                    <option value="Murni">Murni</option>
                    <option value="Ilmu">Ilmu</option>
                @elseif ($user->kelompok == 'Murni')
                    <option value="Amanah">Amanah</option>
                    <option value="Cendikiawan">Cendikiawan</option>
                    <option value="Murni" selected>Murni</option>
                    <option value="Ilmu">Ilmu</option>
                @elseif ($user->kelompok == 'Ilmu')
                    <option value="Amanah">Amanah</option>
                    <option value="Cendikiawan">Cendikiawan</option>
                    <option value="Murni">Murni</option>
                    <option value="Ilmu" selected>Ilmu</option>
                @else
                    <option value="N/A" checked>N/A</option>
                @endif

                

            </select>
            
            <x-input-error :messages="$errors->get('kelompok')" class="mt-2" />
        </div>
        
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    
</section>
