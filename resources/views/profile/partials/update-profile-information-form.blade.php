<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
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
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <!-- last_name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                :value="old('last_name', $user->last_name)" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <!-- birth_date -->
        <div class="mt-4">
            <x-input-label for="birth_date" :value="__('Birth Date')" />
            <x-text-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date"
                :value="old('birth_date', $user->birth_date)" required autocomplete="name" />
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

        <div class="mt-4 ">
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/3 px-1 md:mb-0">
                    <!-- phone_num -->
                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                    <input
                        class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 "
                        id="phone_number" type="text" name="phone_number" placeholder="09*********"
                        value="{{ $user->phone_number }}" required />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>
                <div class="w-full md:w-1/3 px-1 md:mb-0">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="sex">
                        Sex
                    </label>
                    <div class="relative">
                        <select
                            class="block appearance-none w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 pr-8"
                            id="sex" name="sex" :value="Select" placeholder="Select" required autocomplete="username">
                            <option value="" disabled selected>Select Option</option>
                            <option value="M" {{ ($user->sex === 'M') ? 'selected' : '' }} >M</option>
                            <option value="F" {{ ($user->sex === 'F') ? 'selected' : '' }} >F</option>
                        </select>
                        <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-1 md:mb-0">
                    <label class="block uppercase tracking-wide font-medium text-sm text-gray-700 dark:text-gray-300"
                        for="position">
                        Position
                    </label>
                    <input
                        class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 "
                    id="position" type="text" name="position" placeholder="HR" value="{{ $user->position }}"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('position')" class="mt-2" />
                </div>
            </div>
        </div>

        <!-- orgnanization name -->
        <div class="mt-4">
            <x-input-label for="organization_name" :value="__('Organization Name')" />
            <x-text-input id="organization_name" class="block mt-1 w-full" type="text" name="organization_name"
                :value="old('organization_name', $user->organization_name)" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('organization_name')" class="mt-2" />
        </div>
        <!-- organization address -->
        <div class="mt-4">
            <x-input-label for="organization_address" :value="__('Organization Address')" />
            <x-text-input id="organization_address" class="block mt-1 w-full" type="text" name="organization_address"
                :value="old('organization_address',$user->organization_address)" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('organization_address')" class="mt-2" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>