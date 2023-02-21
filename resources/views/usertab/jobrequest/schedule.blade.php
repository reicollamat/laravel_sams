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
            <table class="mt-4 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-2 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Add Shift
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                        Work Schedule for Post #{{$post_id}} - Armed
                    </p>
                </caption>
            </table>
        </div>


        <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Schedule for Post #{{ $post_id }}
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet
                        consectetur, adipisicing elit. Nesciunt autem quisquam voluptatum culpa dolor.</p>
                </caption>
                <thead class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Shift
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Monday
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tuesday
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Wednesday
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Thursday
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Friday
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Saturday
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sunday
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($shifts as $shift)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$shift}}
                        </th>
                        @for ($i=1;$i<=7;$i++)
                            <td class="px-6 py-4">
                                @if (in_array($i,$days))
                                    {{ $schedules[$shift] }} <br>
                                @endif
                            </td>
                        @endfor
                        
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <form method="POST" action="{{ route('jobrequest.storeshift',['post_id'=>$post_id]) }}">
            @csrf

            @foreach ($shifts as $shift)                
                <input type="text" name="shifts[]" value="{{$shift}}" hidden>
            @endforeach

            @foreach ($days as $day)
                <input type="text" name="days[]" value="{{$day}}" hidden>
            @endforeach

            @foreach ($schedules as $schedule)
                <input type="text" name="schedules[]" value="{{$schedule}}" hidden>
            @endforeach

            <input type="text" name="contract_id" value="{{$contract_id}}" hidden>
            <input type="text" name="location_id" value="{{$location_id}}" hidden>

            <div class="mt-4 ">
                <x-custom-primary-button>
                    Save->
                </x-custom-primary-button>
            </div>
        </form>

        <div class="mt-4 ">

            <form action="{{ route('jobrequest.shift',['post_id'=>$post_id]) }}">
                <x-custom-primary-button>
                    <-Edit
                </x-custom-primary-button>
            </form>
        </div>
        
    </div>
</div>
@endsection