@extends('layouts.masterapp')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

        @if (Session::has('status'))
        <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)">
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">{{ Session::get('status') }}</span>
            </div>
        </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <x-custom-back-button href="{{ url()->previous() }}">
                {{ __('Back') }}
            </x-custom-back-button>
            <table class="mt-4 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-2 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Add Location
                </caption>
            </table>
        </div>


        <form method="POST" action="{{ route('jobrequest.storelocation') }}">
            @csrf

            <div class="mt-4 ">
                <div class="columns-1 md:columns-2 mt-4">

                    {{-- input location --}}
                    <div>
                        <x-input-label for="locations_name" :value="__('Location Name')" />
                        <x-text-input type="text" class="block mt-1 w-full" id="locations_name" name="locations_name" :value="old('locations_name')" required autofocus autocomplete="name" />
                        <p id="floating_helper_text" class="mt-2 text-xs text-gray-500 dark:text-gray-400">Please insert location here.</p>
                    </div>
    
                    {{-- input address --}}
                    <div>
                        <x-input-label for="address" :value="__('Address')" />
                        <x-text-input type="text" class="block mt-1 w-full" id="address" name="address" :value="old('address')" required autofocus autocomplete="name" />
                        <p id="floating_helper_text" class="mt-2 text-xs text-gray-500 dark:text-gray-400">Please insert address here.</p>
                    </div>

                </div>
            </div>

            <div class="mt-4 ">
                <x-custom-primary-button>
                    Add Location
                </x-custom-primary-button>
            </div>
        </form>

        {{-- temporary table display --}}
        <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Locations Table
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet
                        consectetur, adipisicing elit. Nesciunt autem quisquam voluptatum culpa dolor.</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Location Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Location Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Number of Guards
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit Post
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Remove</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $location['locations_name'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $location['address'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $location['include'] }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Remove</a>
                        </td>
                    </tr>      
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection