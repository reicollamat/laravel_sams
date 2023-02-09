<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
         {{-- temporary table display --}}
         <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
               <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                  Temporary Table Template
                  <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
               </caption>
               <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                        <th scope="col" class="px-6 py-3">
                           Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Color
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                           <span class="sr-only">Edit</span>
                        </th>
                  </tr>
               </thead>
               <tbody>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                           Sliver
                        </td>
                        <td class="px-6 py-4">
                           Laptop
                        </td>
                        <td class="px-6 py-4">
                           $2999
                        </td>
                        <td class="px-6 py-4 text-right">
                           <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                  </tr>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           Microsoft Surface Pro
                        </th>
                        <td class="px-6 py-4">
                           White
                        </td>
                        <td class="px-6 py-4">
                           Laptop PC
                        </td>
                        <td class="px-6 py-4">
                           $1999
                        </td>
                        <td class="px-6 py-4 text-right">
                           <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                  </tr>
                  <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           Magic Mouse 2
                        </th>
                        <td class="px-6 py-4">
                           Black
                        </td>
                        <td class="px-6 py-4">
                           Accessories
                        </td>
                        <td class="px-6 py-4">
                           $99
                        </td>
                        <td class="px-6 py-4 text-right">
                           <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                  </tr>
               </tbody>
            </table>
         </div>


        </div>
    </div>
</x-app-layout>
