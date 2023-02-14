@extends('layouts.mainlayout')
@section('content')
    @foreach ($guards as $guard)
        <div class="p-4 mt-14">
            <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">
                {{-- Banner --}}
                <div
                    class="w-full flex justify-center text-lg p-2 shadow-md uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <h1>Information Sheet</h1>

                </div>
                {{-- Full name --}}
                <div
                    class="w-full mt-2 fs-6 font-bold text-lg p-2 shadow-md uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <h1>{{ $guard->first_name . ' ' . $guard->middle_name . ' ' . $guard->last_name }}</h1>

                </div>
                {{-- Main Screen --}}
                <div class="block sm:flex gap-x-11">
                    <div
                        class="w-full rounded-sm p-3 mt-4 text-gray-900 bg-white border-b  dark:text-white dark:bg-gray-800 dark:border-gray-700 sm:w-1/2">
                        <p>Basic Information</p>
                        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">

                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full  text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                First Name
                            </p>
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                {{ $guard->first_name }}
                            </p>
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2 ">
                            <p class="w-full text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Middle Name
                            </p>
                            <p
                                class="w-full xl:text-right font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800 ">
                                {{ $guard->middle_name }}
                            </p>
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full  text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Last Name
                            </p>
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                {{ $guard->last_name }}
                            </p>
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Address
                            </p>
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                {{ $guard->address }}
                            </p>
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Birth Date</p>
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                {{ $guard->birthdate }}</p>

                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">

                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Sex</p>
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                {{ $guard->sex == 'M' ? 'Male' : 'Female' }}</p>
                        </div>

                    </div>
                    <div
                        class="w-full rounded-sm p-3 mt-4 text-gray-900 bg-white border-b  dark:text-white dark:bg-gray-800 dark:border-gray-700 sm:w-1/2">
                        <p>Personal / Private Information</p>
                        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Phone Number</p>
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                {{ $guard->phone_number }}</p>

                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">

                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                NBI Clearance Number</p>
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                {{ $guard->nbi_clearance_id }}</p>
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Educational Attainment
                            </p>
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                @if ($guard->educational_attainment == '1')
                                    College Graduate
                                @elseif ($guard->educational_attainment == '2')
                                    College Undergraduate
                                @elseif ($guard->educational_attainment == '3')
                                    High School Gradute
                                @else
                                    Unknown
                                @endif
                            </p>
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                LESP ID</p>
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                {{ $guard->lesp_id }}</p>
                        </div>

                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                SSS Number</p>
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                {{ $guard->sss }}</p>
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Agency Affiliation Date</p>
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                {{ $guard->agency_affiliation_date }}</p>
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                NBI Issued Date</p>
                            <p
                                class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                {{ $guard->nbi_issued_date }}</p>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    @endforeach
@endsection
