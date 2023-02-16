@extends('layouts.masterapp')
@section('content')

<div class="p-4 sm:ml-64 mt-14">

    <form method="POST" action="{{ route('jobrequest.storecontract', ['user_id'=>$user_id]) }}">
        @csrf
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-2">
            {{-- temporary table display --}}
        
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead
                        class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <tr>
                        <th class="p-4 w-1/4">
                            <div>
                                <div class="mt-1 w-full flex justify-center">
                                    <x-custom-primary-button>
                                        +Create
                                    </x-custom-primary-button>
                                </div>
                            </div>
                        </th>
                        <th class= 'font-bold'>
                            Create Job Request
                            <p class= 'mt-1 text-sm font-normal text-gray-500 dark:text-gray-400'>
                                Click "+Create" button to continue
                            </p>
                        </th>
                    </tr>
                    </thead>
        
                </table>
            </div>
        
        </div>
    </form>
    

    <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">
        {{-- temporary table display --}}

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Previous Requests
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet
                        consectetur, adipisicing elit. Nesciunt autem quisquam voluptatum culpa dolor.</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Contract ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Number of Locations
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Number of Guards
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">View</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            1
                        </th>
                        <td class="px-6 py-4">
                            6
                        </td>
                        <td class="px-6 py-4">
                            3
                        </td>
                        <td class="px-6 py-4">
                            Pending
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            2
                        </th>
                        <td class="px-6 py-4">
                            4
                        </td>
                        <td class="px-6 py-4">
                            7
                        </td>
                        <td class="px-6 py-4">
                            Active
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            3
                        </th>
                        <td class="px-6 py-4">
                            1
                        </td>
                        <td class="px-6 py-4">
                            7
                        </td>
                        <td class="px-6 py-4">
                            Pending
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection