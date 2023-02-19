@extends('layouts.masterapp')
@section('content')

<div class="p-4 sm:ml-64 mt-14">
    <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">

        @if (session('status') === 'Guards Added!')
        <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)">
            <div class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="w-full flex justify-center">
                    <span class="font-medium">Security Guards Saved !</span>
                </div>
            </div>
        </div>
        @endif
        
        @foreach ($errors->all() as $error)
        <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)">
            <div class="flex p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="w-full flex justify-center">
                    <span class="font-medium">{{ $error }}</span>
                </div>
            </div>
        </div>
        @endforeach

        

        <form method="POST" action="{{ route('storesecurityguard') }}">
            @csrf
            <!-- First Name -->
            <div class="columns-1 md:columns-3">
                <div>
                    <x-input-label for="first_name" :value="__('First Name')" />
                    <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="name" />
                    {{-- <x-input-error :messages="$errors->get('first_name')" class="mt-2" />--}}
                </div>

                <!-- middle_name -->
                <div class="mt-4">
                    <x-input-label for="middle_name" :value="__('Middle Name')" />
                    <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('middle_name')" required autofocus autocomplete="name" />
                    {{-- <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />--}}
                </div>

                <!-- last_name -->
                <div class="mt-4">
                    <x-input-label for="last_name" :value="__('Last Name')" />
                    <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="name" />
                    {{-- <x-input-error :messages="$errors->get('last_name')" class="mt-2" />--}}
                </div>
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
                {{-- <x-input-error :messages="$errors->get('address')" class="mt-2" />--}}
            </div>

            <div class="mt-4 ">
                <div class="columns-1 md:columns-2 mt-4">
                    <!-- birthdate -->
                    <div class="w-full md:mb-0">
                        <x-input-label for="birthdate" :value="__('Birth Date')" />
                        <x-text-input id="birthdate" class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4" type="date" name="birthdate" :value="old('birthdate')" required autocomplete="name" />
                        {{-- <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />--}}
                    </div>
                    <!-- phone number -->
                    <div class="w-full md:mb-0 mt-4">
                        <!-- phone_num -->
                        <x-input-label for="phone_number" :value="__('Phone Number')" />
                        <input class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 " id="phone_number" type="text" name="phone_number" placeholder="09*********" :value="old('phone_number')" required autocomplete="username" />
                        {{-- <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />--}}
                    </div>
                </div>
                <div class="columns-1 md:columns-2 mt-4">
                    {{-- sex --}}
                    <div class="w-full md:mb-0">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="sex">
                            Sex
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 pr-8" id="sex" name="sex" :value="old('phone_number')" required autocomplete="username">
                                <option value="" disabled selected>Select</option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                            {{-- <x-input-error :messages="$errors->get('sex')" class="mt-2" />--}}
                        </div>
                    </div>
                    {{-- education attainment --}}
                    <div class="w-full md:mb-0 ">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="educational_attainment">
                            Education Attainment
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 pr-8" id="educational_attainment" name="educational_attainment" :value="old('educational_attainment')" required autocomplete="username">
                                <option value="" disabled selected>Select</option>
                                <option value="1">College Graduate</option>
                                <option value="2">College Undergraduate</option>
                                <option value="3">High-school Undergraduate</option>
                            </select>
                            {{-- <x-input-error :messages="$errors->get('educational_attainment')" class="mt-2" />--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 columns-1 md:columns-3">
                <div class="w-full md:mb-0 ">
                    <!-- lesp_id -->
                    <x-input-label for="lesp_id" :value="__('LESP ID')" />
                    <input class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 " id="lesp_id" type="text" name="lesp_id" placeholder="---------------" :value="old('lesp_id')" required autocomplete="username" />
                    {{-- <x-input-error :messages="$errors->get('lesp_id')" class="mt-2" />--}}
                </div>

                <div class="w-full md:mb-0 ">
                    <!-- sss number-->
                    <x-input-label for="sss" :value="__('SSS Number')" />
                    <input class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 " id="sss" type="text" name="sss" placeholder="---------------" :value="old('sss')" required autocomplete="username" />
                    {{-- <x-input-error :messages="$errors->get('sss')" class="mt-2" />--}}
                </div>

                <div class="w-full  md:mb-0 ">
                    <!-- nbi_clearnace_id -->
                    <x-input-label for="nbi_clearance_id" :value="__('NBI Clearance ID')" />
                    <input class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 " id="nbi_clearance_id" type="text" name="nbi_clearance_id" placeholder="-------------" :value="old('nbi_clearance_id')" required autocomplete="username" />
                    {{-- <x-input-error :messages="$errors->get('nbi_clearnace_id')" class="mt-2" />--}}
                </div>
            </div>
            <div class="columns-1 md:columns-2 mt-4">
                <!-- agency_affiliation_date -->
                <div class="w-full md:mb-0 ">
                    <x-input-label for="agency_affiliation_date" :value="__('Agency Affiliation Date')" />
                    <x-text-input id="agency_affiliation_date" class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4" type="date" name="agency_affiliation_date" :value="old('agency_affiliation_date')" required autocomplete="name" />
                    {{-- <x-input-error :messages="$errors->get('agency_affiliation_date')" class="mt-2" />--}}
                </div>
                <!-- nbi_issued_date -->
                <div class="w-full md:mb-0">
                    <x-input-label for="nbi_issued_date" :value="__('NBI Issued Date')" />
                    <x-text-input id="nbi_issued_date" class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4" type="date" name="nbi_issued_date" :value="old('nbi_issued_date')" required autocomplete="name" />
                    {{-- <x-input-error :messages="$errors->get('nbi_issued_date')" class="mt-2" />--}}
                </div>
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-custom-back-button href="{{ route('indexsecurityguard') }}">
                    {{ __('Back') }}
                </x-custom-back-button>
                <x-custom-primary-button class="ml-4">
                    {{ __('Save') }}
                </x-custom-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection