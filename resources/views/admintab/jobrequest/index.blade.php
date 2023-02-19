@extends('layouts.masterapp')
@section('content')
    <div class="p-4 sm:ml-64 mt-14">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 font-bold text-2xl text-gray-900 dark:text-gray-100">
                    Active Job Requests
                </div>
            </div>
        </div>
        <x-search-bar action="{{ route('searchsecurityguard') }}" method="GET">
            <x-slot name="anchor" href="#">

            </x-slot>
        </x-search-bar>
        <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-4">
            <div class="relative overflow-x-auto">
                @if (session('status'))
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)">
                    <div class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="w-full flex justify-center">
                            <span class="font-medium"> {{ session('status') }}</span>
                        </div>
                    </div>
                </div>
                @endif
                @if (count($contract_details) > 0)
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Client Full Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Request's </br> Location
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Request's Number </br> of Guards
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Request's </br> Start Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Details
                                </th>
                            </tr>
                        </thead>
                        @foreach ($contract_details as $contract_detail)
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <p class="text-white">
                                            {{ strtoupper($contract_detail->name) . ' ' . strtoupper($contract_detail->last_name) }}
                                        </p>
                                    </th>
                                    <td class="px-6 py-4">
                                        <p class="text-white">{{ $contract_detail->locations_name }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        none
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-white">{{ $contract_detail->start_date }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-white">
                                            @if ($contract_detail->status == 1)
                                                Pending
                                            @elseif ($contract_detail->status == 2)
                                                Waiting for Approval
                                            @elseif ($contract_detail->status == 3)
                                                Approved
                                            @else
                                                Unknown
                                            @endif
                                        </p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="text-blue-600" href="/jobrequest/{{ $contract_detail->id }}/show">Full Details
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    @else
                        <h1 class="w-full py-7 text-2xl text-center text-gray-500 dark:text-gray-400">No Job Request
                            Found!
                        </h1>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
