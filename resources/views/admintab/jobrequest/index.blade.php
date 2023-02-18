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
        <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-4">
            <div class="relative overflow-x-auto">

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
                                        <a class="text-blue-600" href="#">Full Details
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
