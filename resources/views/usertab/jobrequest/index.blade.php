@extends('layouts.masterapp')
@section('content')

<div class="p-4 sm:ml-64 mt-14">

    {{-- check contract if finished --}}
    {{-- if contract is finished, display create new contract --}}
    @if ($checkcontract === null || $checkcontract->is_finished == 1)
        <form method="POST" action="{{ route('jobrequest.storecontract', ['user_id'=>$user_id]) }}">
            @csrf
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-2">
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

    {{-- if contract is NOT finished, display resume last request form --}}
    @elseif ($checkcontract === null || $checkcontract->is_finished == 0)
        <form method="GET" action="{{ route('jobrequest.post',['contract_id'=>$checkcontract->id, 'location_id'=>$checkcontract->location->id]) }}">
            @csrf
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-2">
            
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead
                            class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        <tr>
                            <th class="p-4 w-1/4">
                                <div>
                                    <div class="mt-1 w-full flex justify-center">
                                        <x-custom-primary-button>
                                            Resume
                                        </x-custom-primary-button>
                                    </div>
                                </div>
                            </th>
                            <th class= 'font-bold'>
                                Resume Job Request
                                <p class= 'mt-1 text-sm font-normal text-gray-500 dark:text-gray-400'>
                                    You have not finshed your last request form
                                </p>
                            </th>
                        </tr>
                        </thead>
            
                    </table>
                </div>
            
            </div>
        </form>
    @endif

    

    <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    {{$user_data->name}}'s Previous Requests
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">You can monitor the status of your request here</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Contract ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Number of Posts
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
                    @foreach ($contracts as $contract)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$contract->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{-- fetch the number of post from its related models --}}
                            {{count($contract->location->post)}}
                        </td>
                        <td class="px-6 py-4">
                            
                        </td>
                        <td class="px-6 py-4">
                            {{$contract->status}}
                            {{-- display status depending on what status on database --}}
                            @if ($contract->status == 1)
                                {{-- if request is finished --}}
                                @if ($contract->is_finished == 0)
                                    Unfinished Request
                                @elseif ($contract->is_finished == 1)
                                    Pending Request
                                @endif
                            @elseif ($contract->status == 2)
                                Contract Proposed
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection