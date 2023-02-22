@extends('layouts.masterapp')
@section('content')
    <div class="p-4 sm:ml-64 mt-14">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 font-bold text-2xl text-gray-900 dark:text-gray-100">
                    Active Contracts
                </div>
            </div>
        </div>
        <x-search-bar action="#" method="GET">
            <x-slot name="anchor" href="#">
            </x-slot>
        </x-search-bar>
        <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-5">

            <div class="border-2 p-4 border-gray-200 rounded-lg dark:border-gray-700 dark:bg-gray-800">
                @if (session('status'))
                    <x-custom-info-banner>
                        {{ session('status') }}
                    </x-custom-info-banner>
                @endif

                <div class="relative overflow-x-auto">
                    {{-- @if (count($s_guards) > 0) --}}
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Contract Proponent
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Contract ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Approved Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Contract Expiry Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    View
                                </th>
                            </tr>
                        </thead>
                        @foreach ($all_contracts as $all_contract)
                        <tbody>
                            <tr class="bg-white text-md border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 text-xl font-bold text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $all_contract->name . " " .$all_contract->last_name}}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $all_contract->id }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $all_contract->approved_date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $all_contract->end_date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $all_contract->status }}
                                </td>
                                <td class="px-6 py-4">
                                    <a class="text-blue-600" href="/activecontract/test">View
                                        Contract</a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
