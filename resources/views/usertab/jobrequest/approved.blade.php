@extends('layouts.masterapp')
@section('content')

<div class="p-4 sm:ml-64 mt-14">

    <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    {{$user_data->name}}'s Approved Requests
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">List of approved requests from Admin. "View Details" to review the contract and agree if satisfied</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Contract ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Location
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Number of Post/s
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Start Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span>Details</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contracts as $contract)
                    @if ($contract->status == 3)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$contract->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{-- fetch the locations name --}}
                            {{$contract->location->locations_name}}
                        </td>
                        <td class="px-6 py-4">
                            {{count($contract->location->post)}}
                        </td>
                        <td class="px-6 py-4">
                            {{date("F jS, Y", strtotime($contract->start_date))}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('jobrequest.view_contract',['contract_id'=>$contract->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View Details</a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection