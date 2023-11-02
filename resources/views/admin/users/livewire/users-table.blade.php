 <div>
     <div
         class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
         <div class="w-full mb-1">
             <div class="mb-4">

                 <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Data Pengguna</h1>
             </div>

             <div class="flex flex-col items-center justify-between space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                 <div class="w-full md:w-1/2">
                     <label for="simple-search" class="sr-only">Search</label>
                     <div class="relative w-96">
                         <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                             <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                 fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd"
                                     d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                     clip-rule="evenodd" />
                             </svg>
                         </div>
                         <input wire:model.live.debounce.500ms="search" type="text"
                             class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                             placeholder="Cari Pengguna">
                     </div>
                 </div>
                 <div
                     class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                     <button type="button" data-modal-target="add-user" data-modal-toggle="add-user"
                         class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                         <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                             <path clip-rule="evenodd" fill-rule="evenodd"
                                 d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                         </svg>
                         Tambah Pengguna
                     </button>
                     <a href="#"
                         class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                         <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd"
                                 d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                 clip-rule="evenodd"></path>
                         </svg>
                         Export
                     </a>
                     <div class="flex">
                         <span id="states-button" data-dropdown-toggle="dropdown-states"
                             class="flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg md:w-auto focus:outline-none  focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 "
                             type="button">
                             <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-4 text-gray-400"
                                 viewbox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd"
                                     d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                     clip-rule="evenodd" />
                             </svg>

                         </span>

                         <label for="filter" class="sr-only">Choose a state</label>
                         <select id="filter" wire:model.live.debounce.500ms="admin" name="filter"
                             class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">

                             <option class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100" value="">
                                 Semua</option>
                             <option class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100" value="admin">
                                 Admin</option>
                             <option class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100" value="user">
                                 Pengguna</option>

                         </select>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="flex flex-col">
         <div class="overflow-x-auto">
             <div class="inline-block min-w-full align-middle">
                 <div class="overflow-hidden shadow">
                     <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                         <thead class="bg-gray-100 dark:bg-gray-700">
                             <tr>
                                 <th scope="col"
                                     class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                     Name
                                 </th>
                                 <th scope="col"
                                     class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                     Kota
                                 </th>
                                 <th scope="col"
                                     class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                     Alamat
                                 </th>
                                 <th scope="col"
                                     class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                     Tempat/Tanggal Lahir
                                 </th>
                                 <th scope="col"
                                     class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                     Role
                                 </th>
                                 <th scope="col"
                                     class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                     Actions
                                 </th>
                             </tr>
                         </thead>
                         <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                             @foreach ($users as $user)
                                 <tr wire:key='{{ $user }}' class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                     <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                         <img class="w-10 h-10 rounded-full"
                                             src="https://flowbite-admin-dashboard.vercel.app/images/users/neil-sims.png"
                                             alt="Neil Sims avatar">
                                         <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                             <div class="text-base font-semibold text-gray-900 dark:text-white">
                                                 {{ $user->name }}
                                             </div>
                                             <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                 {{ $user->email }}</div>
                                         </div>
                                     </td>

                                     <td
                                         class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                         Front-end developer</td>
                                     <td
                                         class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                         I love working with React and Flowbites to create efficient and user-friendly
                                         interfaces. In my spare time, I enjoys baking, hiking, and spending time with
                                         my
                                         family.
                                     </td>
                                     <td
                                         class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                         United
                                         States</td>
                                     <td
                                         class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                         <div class="flex items-center">
                                             <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Active
                                         </div>
                                     </td>
                                     <td class="p-4 space-x-2 whitespace-nowrap">
                                         <a href="{{ route('admin.users.edit', $user) }}"
                                             class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                             <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <path
                                                     d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                 </path>
                                                 <path fill-rule="evenodd"
                                                     d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                     clip-rule="evenodd"></path>
                                             </svg>
                                             {{ __('Edit user') }}
                                         </a>
                                         <button type="button"
                                             data-modal-toggle="delete-user-modal-{{ $user->uuid }}"
                                             class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                             <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <path fill-rule="evenodd"
                                                     d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                     clip-rule="evenodd"></path>
                                             </svg>
                                             {{ __('Delete user') }}
                                         </button>
                                         @include('admin.users.livewire.includes.modal-delete')
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>

                 </div>
             </div>
         </div>
         <div class="p-4 flex">
             <div class="flex space-x-4 items-center">
                 <label class="w-32 text-sm font-medium dark:text-white text-gray-900">Per Page</label>
                 <select wire:model.live="perPage"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-none hover:bg-gray-100  focus:z-10 focus:ring-4  dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 ">
                     <option value="5">5</option>
                     <option value="10">10</option>
                     <option value="20">20</option>
                     <option value="50">50</option>
                     <option value="100">100</option>
                 </select>
             </div>
         </div>
         <div class="p-4">
             {{ $users->links('pagination::tailwind') }}
         </div>
     </div>
     @include('admin.users.livewire.includes.add-user-modal')
 </div>
