@extends('layouts.masterapp')
@section('content')
<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
      {{-- temporary dashboard welcome & timeline --}}
      <h1
         class="mb-2 text-lg font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-4xl dark:text-white">
         Welcome {{ Auth::user()->name }} !
      </h1>
      <hr class="my-5 text-gray-600">
      <div
         class="w-full flex  flex-wrap gap-6 justify-center justify-items-center flex-col sm:justify-evenly sm:flex-row">
         <div
            class="max-w-xs p-5 self-center bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
               <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                  Noteworthy
                  technology
                  acquisitions 2021
               </h5>
            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
               acquisitions of 2021 so far, in reverse chronological order.
            </p>
         </div>
         <div
            class="max-w-xs p-5 self-center bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
               <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                  Noteworthy
                  technology
                  acquisitions 2021
               </h5>
            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
               acquisitions of 2021 so far, in reverse chronological order.
            </p>
         </div>
         <div
            class="max-w-xs p-5 self-center bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
               <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                  Noteworthy
                  technology
                  acquisitions 2021
               </h5>
            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
               acquisitions of 2021 so far, in reverse chronological order.
            </p>
         </div>
         <div
            class="max-w-xs p-5 self-center bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
               <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                  Noteworthy
                  technology
                  acquisitions 2021
               </h5>
            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
               acquisitions of 2021 so far, in reverse chronological order.
            </p>
         </div>
         <div
            class="max-w-xs p-5 self-center bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
               <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                  Noteworthy
                  technology
                  acquisitions 2021
               </h5>
            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
               acquisitions of 2021 so far, in reverse chronological order.
            </p>
         </div>
         <div
            class="max-w-xs p-5 self-center bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
               <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                  Noteworthy
                  technology
                  acquisitions 2021
               </h5>
            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
               acquisitions of 2021 so far, in reverse chronological order.
            </p>
         </div>
         
      </div>
   </div>
</div>
@endsection