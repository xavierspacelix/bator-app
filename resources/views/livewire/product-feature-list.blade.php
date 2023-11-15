<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
        <div class="mx-auto max-w-screen-xl">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Rekomendasi Baru</h2>
        </div>
        @if ($motors->isEmpty())
            <div class="w-full mx-auto px-10 py-4">
                <div class="flex flex-col justify-center py-12 items-center">

                    <div class="flex justify-center items-center">
                        <img class="w-64 h-64"
                            src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690257804/jjqw2hfv0t6karxdeq1s.svg"
                            alt="image empty states">
                    </div>
                    <h1 class="text-gray-700 font-medium text-2xl text-center mb-3">Belum Ada Product!</h1>

                    <div class="flex flex-col justify-center">
                        <button class="flex items-center px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6  mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Jual Produk Anda
                        </button>
                    </div>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 gap-3 mb-6 lg:mb-16 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($motors as $item)
                <a href="{{route('detailMotor', $item)}}" wire:navigate
                    class="relative flex w-full max-w-sm flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                    <div class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
                        <img class="object-cover w-full"
                            src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                            alt="product image" />
                        <span
                            class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">Feature</span>
                        <span
                            class="absolute top-0 right-0 m-2 rounded-full bg-white p-2 text-center text-sm font-medium text-black ">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-pink-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 19">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 4C5.5-1.5-1.5 5.5 4 11l7 7 7-7c5.458-5.458-1.542-12.458-7-7Z" />
                            </svg></span>
                    </div>
                    <div class="mt-4 px-5 pb-5">
                        <div>
                            <h5 class="text-xl tracking-tight text-slate-900">{{ $item->name }}</h5>
                            <span class="text-sm text-slate-900 ">Tahun 2022</span>
                        </div>
                        <div class="mt-2 mb-5 flex items-center justify-between">
                            <p>
                                <span class="text-2xl font-bold text-slate-900">@currency($item->price)</span>
                            </p>
                        </div>
                        <div class="flex items-center justify-between font-light text-gray-500">
                            <p>Lokasi</p>
                            <p>{{ $item->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        @endif

    </div>
</section>
