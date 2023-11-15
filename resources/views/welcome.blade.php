<x-frontend-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-xl px-4 md:px-8">
            <div class="grid gap-8 md:grid-cols-2 lg:gap-12">
                <div class="md:pt-8 lg:flex lg:flex-col lg:justify-center">
                    <p class="text-center font-bold text-green-500 md:text-left">Temukan Jutaan Penawaran Motor
                    Berkualitas!</p>

                    <h1 class="mb-4 text-center text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6 md:text-left">
                        Jual atau Beli
                        Motor, Semuanya ada disini.</h1>
                </div>
                <div>
                    <div class="h-64 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-auto">
                        <img src="{{ asset('images/banner.jpg') }}"
                            loading="lazy" alt="Photo by Martin Sanchez" class="h-full w-full object-cover object-center" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('product-feature-list')
</x-frontend-layout>
