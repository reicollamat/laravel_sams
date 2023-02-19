@extends('layouts.mainlayout')
@section('content')
    @foreach ($contract_details as $contract_detail)
        <div class="p-4 mt-14">
            <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">
                {{-- Banner --}}
                <div
                    class="w-full p-3 rounded-lg flex shadow-md uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <x-custom-back-button href="{{ route('indexjobrequest') }}">
                        {{ __('Back') }}
                    </x-custom-back-button>
                    <div class="w-full flex flex-col font-bold text-sm p-2 sm:text-xl sm:flex-row">
                        <h1 class="w-full">{{ __('Job Request Information') }}</h1>
                        <div class="w-full flex flex-col justify-end gap-2 sm:flex-row">
                            <h1>{{ __('STATUS :') }}</h1>
                                @if ($contract_detail->status == 1)
                                    <h1 class="text-red-600">Waiting for Approval</h1>
                                @else
                                    <h1>Waiting for Approval</h1>
                                @endif
                            </h1>

                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">
                <div
                    class="w-full p-3 rounded-lg shadow-md uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <div class="w-full text-lg flex justify-center font-black">
                        <h1>Client / User Information </h1>
                    </div>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="grid grid-cols-1 gap-0 sm:grid-cols-2 sm:gap-9">
                        <div>
                            <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                                <p
                                    class="w-full text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    First Name
                                </p>
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    {{ $contract_detail->name }}
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
                                    {{ $contract_detail->last_name }}
                                </p>
                            </div>
                            <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                            <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    Email Address
                                </p>
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    {{ $contract_detail->email }}
                                </p>
                            </div>
                            <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                            <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    Birth Date</p>
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    {{ $contract_detail->birth_date }}</p>
                            </div>
                            <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">

                            <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    Sex</p>
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    @if ($contract_detail->sex === 'M')
                                        Male
                                    @elseif ($contract_detail->sex === 'F')
                                        Female
                                    @else
                                        Unknown
                                    @endif
                            </div>
                            <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                            <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    Phone Number</p>
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    {{ $contract_detail->phone_number }}</p>
                            </div>
                        </div>
                        <div>
                            <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                                <p
                                    class="w-full  text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    Organization Name
                                </p>
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    {{ $contract_detail->organization_name }}
                                </p>
                            </div>
                            <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                            <div class="grid grid-cols-1 gap-0 sm:grid-cols-2 ">
                                <p
                                    class="w-full text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    Organization Address
                                </p>
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800 ">
                                    {{ $contract_detail->organization_address }}
                                </p>
                            </div>
                            <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                            <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                                <p
                                    class="w-full  text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    Position
                                </p>
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    {{ $contract_detail->position }}
                                </p>
                            </div>
                            <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        </div>
                    </div>
                </div>
                <div
                    class="w-full mt-6 p-3 rounded-lg shadow-md uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <div class="w-full text-lg flex justify-center font-black">
                        <h1>Job Request Full Details</h1>
                    </div>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="grid grid-cols-1 gap-0 sm:grid-cols-2 sm:gap-9">
                        <div>
                            <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                                <p
                                    class="w-full text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    Contract Start Date
                                </p>
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    {{ $contract_detail->name }}
                                </p>
                            </div>
                            <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        </div>
                        <div>
                            <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                                <p
                                    class="w-full  text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    Contract End Date
                                </p>
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    {{ $contract_detail->organization_name }}
                                </p>
                            </div>
                            <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        </div>
                        
                    </div>
                    <div class="mt-3 grid grid-cols-1 gap-0 sm:grid-cols-2 sm:gap-9">
                        <p
                            class="w-full  text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Daily Wage
                        </p>
                        <p
                            class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            {{ $contract_detail->last_name }}
                        </p>
                    </div>
                    <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                </div>

            </div>
            <div class="w-full flex justify-center">
            </div>
        </div>
    @endforeach
@endsection
