<x-frontend-layout>
    <section>
        <div class="items-center px-8 mx-auto max-w-7xl lg:px-16 md:px-12 flex">
            <div class="justify-center w-full lg:p-10 max-auto">
                <div class="mb-6">
                    <p class="text-4xl text-black">
                        Mau Jual Apa Hari Ini?
                    </p>
                    <p class="max-w-2xl mt-4 text-lg tracking-tight text-gray-600">
                        Pilih Kategori
                    </p>
                </div>
                <div class="flex flex-col w-full mx-auto">
                    <div class="flex flex-col flex-grow overflow-y-auto bg-white rounded-xl border border-gray-900">
                        <div class="flex flex-col flex-grow">
                            <nav class="flex-1 px-2 bg-white p-1">
                                <ul>
                                    @foreach ($categories as $item)
                                        <li>
                                            <div x-data="{ open: false }">
                                                <button
                                                    class="inline-flex items-center justify-between w-full px-4 py-2 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:text-blue-500 group"
                                                    @click="open = ! open">
                                                    <span class="inline-flex items-center text-base font-light">
                                                        {{ $item->name }}
                                                    </span>
                                                    </span>
                                                    <svg fill="currentColor" viewBox="0 0 20 20"
                                                        :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                                        class="inline w-5 h-5 ml-auto transition-transform duration-200 transform group-hover:text-accent rotate-0">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                                <div class="p-2 pl-6 -px-px" x-show="open"
                                                    @click.outside="open = false" style="display: none;">
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('jual', [
                                                                'category' => $item->slug,
                                                                'kondisi' => 'bekas'
                                                            ]) }}"
                                                                class="inline-flex items-center w-full p-2 pl-3 text-sm font-light text-gray-500 rounded-lg hover:text-blue-500 group hover:bg-gray-50">
                                                                <span class="inline-flex items-center w-full">
                                                                    <span class="ml-4">
                                                                        Bekas
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('jual', $item->name . '?kondisi=baru') }}"
                                                                class="inline-flex items-center w-full p-2 pl-3 text-sm font-light text-gray-500 rounded-lg hover:text-blue-500 group hover:bg-gray-50">
                                                                <span class="inline-flex items-center w-full">
                                                                    <span class="ml-4">
                                                                        Baru
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>
