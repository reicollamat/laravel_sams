@extends('layouts.mainlayout')
@section('content')

    <div class="p-4 mt-14">
        <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">
            <div
                class="w-full font-bold text-lg p-2 shadow-md uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <h1>Information Sheet</h1>

            </div>
            <div
                class="p-3 mt-4 text-gray-900 bg-white border-b  dark:text-white dark:bg-gray-800 dark:border-gray-700">


                {{--                <p>{{ $guard->first_name }}</p>--}}
                {{--                <p>{{ $guard->birthdate }}</p>--}}
                {{--                <p>hello</p>--}}
                @foreach($guards as $guard)
                    <div
                        class="w-full font-bold text-lg p-2 shadow-md uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        <h1>{{ $guard->first_name }}</h1>

                    </div>
                    <div class="gap-0 columns-1 md:columns-6">
                        <p class="w-full font-bold text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            First Name :</p>
                        <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            {{ $guard->first_name}}</p>
                        <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Middle Name</p>
                        <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            {{$guard->middle_name}}</p>
                        <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Last Name</p>
                        <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            {{$guard->last_name}}</p>

                    </div>
                    <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Address</p>
                    <div class="columns-1 sm:columns-6">
                        <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Birth Date</p>
                        <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            {{ $guard->birthdate }}</p>
                        <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Phone Number</p>
                        <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            {{ $guard->phone_number}}</p>
                        <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Sex</p>
                        <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            {{ $guard->sex}}</p>
                    </div>
                    <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        NBI Clearance Number</p>
                    <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Educational Attainment</p>
                    <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        LESP ID</p>
                    <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        SSS Number</p>
                    <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Agency Affiliation Date</p>
                    <p class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        NBI Issued Date</p>
            </div>
            @endforeach

        </div>
    </div>
    </div>
@endsection
