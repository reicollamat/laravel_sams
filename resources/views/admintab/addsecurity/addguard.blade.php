@extends('layouts.masterapp')
@section('content')

<div class="p-4 sm:ml-64 mt-14">
    <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">
        
        @foreach ($errors->all() as $error)
            <div id="alert-border-5" class="flex p-4 border-t-4 border-gray-300 bg-gray-50 dark:bg-gray-800 dark:border-gray-600" role="alert">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-800 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div class="ml-3 text-sm font-medium text-gray-800 dark:text-gray-300">
                    {{ $error }}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white" data-dismiss-target="#alert-border-5" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        @endforeach
        
        <form method="POST" action="/securityguard/add/">
            @csrf
            <!-- First Name -->
            <div class="columns-1 md:columns-3">
                <div>
                    <x-input-label for="first_name" :value="__('First Name')" />
                    <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                        :value="old('first_name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </div>

                <!-- middle_name -->
                <div class="mt-4">
                    <x-input-label for="middle_name" :value="__('Middle Name')" />
                    <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name"
                        :value="old('middle_name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
                </div>

                <!-- last_name -->
                <div class="mt-4">
                    <x-input-label for="last_name" :value="__('Last Name')" />
                    <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                        :value="old('last_name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </div>
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    required autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="mt-4 ">
                <div class="columns-1 md:columns-2 mt-4">
                    <!-- birthdate -->
                    <div class="w-full md:mb-0">
                        <x-input-label for="birthdate" :value="__('Birth Date')" />
                        <x-text-input id="birthdate"
                            class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4"
                            type="date" name="birthdate" :value="old('birthdate')" required autocomplete="name" />
                        <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                    </div>
                    <!-- phone number -->
                    <div class="w-full md:mb-0 mt-4">
                        <!-- phone_num -->
                        <x-input-label for="phone_number" :value="__('Phone Number')" />
                        <input
                            class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 "
                            id="phone_number" type="text" name="phone_number" placeholder="09*********"
                            :value="old('phone_number')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                    </div>
                </div>
                <div class="columns-1 md:columns-2 mt-4">
                    {{-- sex --}}
                    <div class="w-full md:mb-0">
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
                    {{-- education attainment --}}
                    <div class="w-full md:mb-0 ">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300"
                            for="educational_attainment">
                            Education Attainment
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 pr-8"
                                id="educational_attainment" name="educational_attainment"
                                :value="old('educational_attainment')" required autocomplete="username">
                                <option value="" disabled selected>Select</option>
                                <option value="1">College Graduate</option>
                                <option value="2">College Undergraduate</option>
                                <option value="3">Highschool Undergraduate</option>
                            </select>
                            <x-input-error :messages="$errors->get('educational_attainment')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 columns-1 md:columns-3">
                <div class="w-full md:mb-0 ">
                    <!-- lesp_id -->
                    <x-input-label for="lesp_id" :value="__('LESP ID')" />
                    <input
                        class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 "
                        id="lesp_id" type="text" name="lesp_id" placeholder="---------------" :value="old('lesp_id')"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('lesp_id')" class="mt-2" />
                </div>

                <div class="w-full md:mb-0 ">
                    <!-- sss number-->
                    <x-input-label for="sss" :value="__('SSS Number')" />
                    <input
                        class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 "
                        id="sss" type="text" name="sss" placeholder="---------------" :value="old('sss')" required
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('sss')" class="mt-2" />
                </div>

                <div class="w-full  md:mb-0 ">
                    <!-- nbi_clearnace_id -->
                    <x-input-label for="nbi_clearnace_id" :value="__('NBI Clearance ID')" />
                    <input
                        class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 "
                        id="nbi_clearnace_id" type="text" name="nbi_clearnace_id" placeholder="-------------"
                        :value="old('nbi_clearnace_id')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('nbi_clearnace_id')" class="mt-2" />
                </div>
            </div>
            <div class="columns-1 md:columns-2 mt-4">
                <!-- agency_affiliation_date -->
                <div class="w-full md:mb-0 ">
                    <x-input-label for="agency_affiliation_date" :value="__('Agency Affiliation Date')" />
                    <x-text-input id="agency_affiliation_date"
                        class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4"
                        type="date" name="agency_affiliation_date" :value="old('agency_affiliation_date')" required
                        autocomplete="name" />
                    <x-input-error :messages="$errors->get('agency_affiliation_date')" class="mt-2" />
                </div>
                <!-- nbi_issued_date -->
                <div class="w-full md:mb-0">
                    <x-input-label for="birthnbi_issued_date_date" :value="__('NBI Issued Date')" />
                    <x-text-input id="nbi_issued_date"
                        class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4"
                        type="date" name="nbi_issued_date" :value="old('nbi_issued_date')" required
                        autocomplete="name" />
                    <x-input-error :messages="$errors->get('nbi_issued_date')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                {{-- <a
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> --}}

                <x-primary-button class="ml-4">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Modal toggle -->
        <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Toggle modal
        </button>

        <!-- Main modal -->
        <div id="defaultModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-2xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Terms of Service
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            With less than a month to go before the European Union enacts new consumer privacy laws for
                            its citizens, companies around the world are updating their terms of service agreements to
                            comply.
                        </p>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May
                            25 and is meant to ensure a common set of data rights in the European Union. It requires
                            organizations to notify users as soon as possible of high-risk data breaches that could
                            personally affect them.
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="defaultModal" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                            accept</button>
                        <button data-modal-hide="defaultModal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection