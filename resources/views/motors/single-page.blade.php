<x-frontend-layout>
    <div class="container mx-auto sm:px-4">
        <div class="lg:col-gap-10 xl:col-gap-14 mt-8 grid grid-cols-1 gap-2 lg:mt-12 lg:grid-cols-5 lg:gap-14 ">
            {{-- Image --}}
            <div class="lg:col-span-5 lg:row-end-1 bg-white sm:p-4 sm:rounded-xl sm:border sm:border-gray-300 ">
                <div class="px-4 sm:px-0">
                    <div class="lg:flex lg:items-start">
                        <div id="gallery" class="relative w-full" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="relative h-56 overflow-hidden rounded-lg md:h-[570px] bg-black">
                                <!-- Item 1 -->
                                @foreach ($motor->image as $item)
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ asset('storage/'. $item->image_path) }}"
                                            class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-cover"
                                            alt="">
                                    </div>
                                @endforeach
                            </div>
                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Seller --}}
            <div class="lg:col-span-3 lg:row-span-3 lg:row-end-3">
                <div class="mb-6 bg-white sm:rounded-lg p-4 sm:shadow-lg border border-gray-300">
                    <div class="flex items-center justify-between mb-3">
                        <h1 class="sm: text-2xl font-bold text-gray-900 sm:text-3xl">@currency($motor->price)</h1>
                        <div class="flex items-center justify-center gap-3">
                            <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m5.953 7.467 6.094-2.612m.096 8.114L5.857 9.676m.305-1.192a2.581 2.581 0 1 1-5.162 0 2.581 2.581 0 0 1 5.162 0ZM17 3.84a2.581 2.581 0 1 1-5.162 0 2.581 2.581 0 0 1 5.162 0Zm0 10.322a2.581 2.581 0 1 1-5.162 0 2.581 2.581 0 0 1 5.162 0Z" />
                            </svg>
                            <button type="submit" class="">
                                <svg class="w-6 h-6 text-gray-800 hover:text-pink-500 dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 21 19">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 4C5.5-1.5-1.5 5.5 4 11l7 7 7-7c5.458-5.458-1.542-12.458-7-7Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <h1 class="text-md font-base text-gray-500 sm:text-xl mb-3">Tahun {{ $motor->tahun }}</h1>
                    <h1 class="text-md font-base text-gray-500 sm:text-xl mb-3">{{ $motor->name }}</h1>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">
                            Lokasi
                        </span>
                        <span class="text-gray-500">
                            {{ $motor->created_at->format('d F') }}
                        </span>
                    </div>
                </div>

                <div class="mb-6 bg-white sm:rounded-lg p-4 sm:shadow-lg border border-gray-300">
                    <a class="flex items-center justify-between cursor-pointer hover:bg-gray-300 p-2 rounded-lg"
                        href="">
                        <div class="flex items-center gap-4">
                            <img class="w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="">
                            <div class="font-medium dark:text-white">
                                <div>{{ $motor->seller->user->name }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">Bergabung pada
                                    {{ $motor->seller->user->created_at->format('d M') }}</div>
                            </div>
                        </div>
                        <div>
                            <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1" />
                            </svg>
                        </div>
                    </a>
                    <button type="button"
                        class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center sm:inline-flex hidden items-center justify-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full ">
                        <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 18" fill="currentColor">
                            <path
                                d="M18 4H16V9C16 10.0609 15.5786 11.0783 14.8284 11.8284C14.0783 12.5786 13.0609 13 12 13H9L6.846 14.615C7.17993 14.8628 7.58418 14.9977 8 15H11.667L15.4 17.8C15.5731 17.9298 15.7836 18 16 18C16.2652 18 16.5196 17.8946 16.7071 17.7071C16.8946 17.5196 17 17.2652 17 17V15H18C18.5304 15 19.0391 14.7893 19.4142 14.4142C19.7893 14.0391 20 13.5304 20 13V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4Z"
                                fill="currentColor" />
                            <path
                                d="M12 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V9C0 9.53043 0.210714 10.0391 0.585786 10.4142C0.960859 10.7893 1.46957 11 2 11H3V13C3 13.1857 3.05171 13.3678 3.14935 13.5257C3.24698 13.6837 3.38668 13.8114 3.55279 13.8944C3.71889 13.9775 3.90484 14.0126 4.08981 13.996C4.27477 13.9793 4.45143 13.9114 4.6 13.8L8.333 11H12C12.5304 11 13.0391 10.7893 13.4142 10.4142C13.7893 10.0391 14 9.53043 14 9V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0Z"
                                fill="currentColor" />
                        </svg>
                        Chat dengan Penjual
                    </button>
                </div>

                <div class="mb-6 bg-white sm:rounded-lg p-4 sm:shadow-lg border border-gray-300">
                    <h1 class="text-lg font-bold text-gray-900 sm:text-xl mb-3">Lokasi</h1>
                    <iframe class="rounded-lg"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d664.8269794275219!2d107.6330003819949!3d-6.8958964457011245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7a55f9f0431%3A0x6136ea91d09f5044!2sEsitrack!5e0!3m2!1sid!2sid!4v1699954414470!5m2!1sid!2sid"
                        width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="lg:col-span-5 mb-6">
                <div class="bg-white sm:rounded-xl sm:border sm:border-gray-300 sm:px-4 px-0 sm:shadow-lg">
                    <div class="p-4">
                        <h1 class="text-black text-lg sm:text-xl font-semibold">Spesifikasi :</h1>
                        <div class="mb-6">
                            <div class="mt-3">
                                <div class="grid grid-cols-2 md:grid-cols-4">
                                    <div class="w-full mb-4">
                                        <div class="flex">
                                            <span class="mr-3 text-gray-500 dark:text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M21 7.5l-2.25-1.313M21 7.5v2.25m0-2.25l-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3l2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75l2.25-1.313M12 21.75V19.5m0 2.25l-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
                                                </svg>
                                            </span>
                                            <div>
                                                <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Merk
                                                </p>
                                                <h2 class="text-base font-semibold text-gray-700 dark:text-gray-400">
                                                    {{ $motor->merk->name }}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mb-4">
                                        <div class="flex ">
                                            <span class="mr-3 text-gray-500 dark:text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M7.875 14.25l1.214 1.942a2.25 2.25 0 001.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 011.872 1.002l.164.246a2.25 2.25 0 001.872 1.002h2.092a2.25 2.25 0 001.872-1.002l.164-.246A2.25 2.25 0 0116.954 9h4.636M2.41 9a2.25 2.25 0 00-.16.832V12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 01.382-.632l3.285-3.832a2.25 2.25 0 011.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0021.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 002.25 2.25z" />
                                                </svg>
                                            </span>
                                            <div>
                                                <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Model
                                                </p>
                                                <h2 class="text-base font-semibold text-gray-700 dark:text-gray-400">
                                                    {{ $motor->type_model_motor->name }}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mb-4 lg:mb-0">
                                        <div class="flex ">
                                            <span class="mr-3 text-gray-500 dark:text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                                </svg>
                                            </span>
                                            <div>
                                                <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Jarak Tempuh
                                                </p>
                                                <h2 class="text-base font-semibold text-gray-700 dark:text-gray-400">
                                                    {{ $motor->jarak_tempuh }}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mb-4 lg:mb-0">
                                        <div class="flex ">
                                            <span class="mr-3 text-gray-500 dark:text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </span>
                                            <div>
                                                <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Kondisi
                                                </p>
                                                <h2
                                                    class="text-base font-semibold text-gray-700 dark:text-gray-400 capitalize">
                                                    {{ $motor->kondisi }}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mb-4 lg:mb-0">
                                        <div class="flex ">
                                            <span class="mr-3 text-gray-500 dark:text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                                </svg>
                                            </span>
                                            <div>
                                                <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Tahun
                                                </p>
                                                <h2 class="text-base font-semibold text-gray-700 dark:text-gray-400">
                                                    {{ $motor->tahun }}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mb-4 lg:mb-0">
                                        <div class="flex ">
                                            <span class="mr-3 text-gray-500 dark:text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                                                </svg>
                                            </span>
                                            <div>
                                                <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Kapasitas Tank
                                                </p>
                                                <h2 class="text-base font-semibold text-gray-700 dark:text-gray-400">
                                                    {{ $motor->kapasitas_tank }} L
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mb-4 lg:mb-0">
                                        <div class="flex ">
                                            <span class="mr-3 text-gray-500 dark:text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                                                </svg>
                                            </span>
                                            <div>
                                                <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Jenis Bahan Bakar
                                                </p>
                                                <h2
                                                    class="text-base font-semibold text-gray-700 dark:text-gray-400 capitalize">
                                                    {{ $motor->fuel->name }}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mb-4 lg:mb-0">
                                        <div class="flex ">
                                            <span class="mr-3 text-gray-500 dark:text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                                </svg>
                                            </span>
                                            <div>
                                                <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Tipe Penjual
                                                </p>
                                                <h2 class="text-base font-semibold text-gray-700 dark:text-gray-400">
                                                    Tipe Seller
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                        <h1 class="text-black text-lg sm:text-xl font-semibold">Deskripsi :</h1>
                        <div class="mb-6">
                            <div class="mt-3 ">
                                <article class="prose lg:prose-lg">
                                    {!! $motor->description !!}
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="bottom-banner" tabindex="-1"
        class="sm:hidden fixed bottom-0 start-0 z-50 flex justify-between w-full p-2 border-t border-gray-200 bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
        <div class="flex justify-center items-center w-full">

            <div class="flex">
                <button type="button"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 18" fill="currentColor">
                        <path
                            d="M18 4H16V9C16 10.0609 15.5786 11.0783 14.8284 11.8284C14.0783 12.5786 13.0609 13 12 13H9L6.846 14.615C7.17993 14.8628 7.58418 14.9977 8 15H11.667L15.4 17.8C15.5731 17.9298 15.7836 18 16 18C16.2652 18 16.5196 17.8946 16.7071 17.7071C16.8946 17.5196 17 17.2652 17 17V15H18C18.5304 15 19.0391 14.7893 19.4142 14.4142C19.7893 14.0391 20 13.5304 20 13V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4Z"
                            fill="currentColor" />
                        <path
                            d="M12 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V9C0 9.53043 0.210714 10.0391 0.585786 10.4142C0.960859 10.7893 1.46957 11 2 11H3V13C3 13.1857 3.05171 13.3678 3.14935 13.5257C3.24698 13.6837 3.38668 13.8114 3.55279 13.8944C3.71889 13.9775 3.90484 14.0126 4.08981 13.996C4.27477 13.9793 4.45143 13.9114 4.6 13.8L8.333 11H12C12.5304 11 13.0391 10.7893 13.4142 10.4142C13.7893 10.0391 14 9.53043 14 9V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0Z"
                            fill="currentColor" />
                    </svg>
                    Chat dengan Penjual
                </button>

            </div>
        </div>
    </div>
</x-frontend-layout>
