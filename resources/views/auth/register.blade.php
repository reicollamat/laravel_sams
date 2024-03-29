<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->

        <div class="columns-1 md:columns-2">
            <div>
                <x-input-label for="name" :value="__('First Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <!-- last_name -->
            <div class="mt-4">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                    :value="old('last_name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

        </div>
        

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- birth_date -->
        <div class="mt-4">
            <x-input-label for="birth_date" :value="__('Birth Date')" />
            <x-text-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" required
                autocomplete="name" />
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>
        <div class="mt-4 ">
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/3 md:mb-0">
                    <!-- phone_num -->
                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                    <input
                        class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 "
                        id="phone_number" type="text" name="phone_number" placeholder="09*********"
                        :value="old('phone_number')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>
                <div class="w-full md:w-1/3 px-1 md:mb-0">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="sex">
                        Sex
                    </label>
                    <div class="relative">
                        <select
                            class="block appearance-none w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 pr-8"
                            id="sex" name="sex" :value="old('phone_number')" required autocomplete="username">
                            <option value="" disabled selected>Select</option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                        <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                    </div>
                </div>
                <div class="w-full md:w-1/3 md:mb-0">
                    <label class="block uppercase tracking-wide font-medium text-sm text-gray-700 dark:text-gray-300"
                        for="position">
                        Position
                    </label>
                    <input
                        class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 "
                        id="position-zip" type="text" name="position" placeholder="HR" :value="old('phone_number')"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('position')" class="mt-2" />
                </div>
            </div>
        </div>

        <!-- orgnanization name -->
        <div class="mt-4">
            <x-input-label for="organization_name" :value="__('Organization Name')" />
            <x-text-input id="organization_name" class="block mt-1 w-full" type="text" name="organization_name"
                :value="old('organization_name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('organization_name')" class="mt-2" />
        </div>
        <!-- organization address -->
        <div class="mt-4">
            <x-input-label for="organization_address" :value="__('Organization Address')" />
            <x-text-input id="organization_address" class="block mt-1 w-full" type="text" name="organization_address"
                :value="old('organization_address')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('organization_address')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>