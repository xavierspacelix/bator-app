<x-frontend-layout>
    <div class="sm:py-12 py-2">
        <div class="flex max-w-7xl text-slate-800 items-center justify-center mx-auto">
            <div class="flex w-full flex-col md:w-2/2">
                <div class="my-auto mx-auto flex flex-col justify-center md:justify-start lg:w-[34rem]">
                    <div class="flex w-full flex-col rounded-2xl bg-white px-2 sm:px-14">
                        <h2 class="text-2xl font-semibold text-gray-700">Informasi Tambahan</h2>
                        <div class="mt-8 flex w-full flex-col pb-8">
                            <form action="{{ route('becomeSellerStore') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="grid grid-cols-6 gap-6 mb-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="dateofbirth"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Tanggal Lahir') }}</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                </svg>
                                            </div>
                                            <input datepicker datepicker-autohide datepicker-format="yyyy/mm/dd"
                                                type="text" name="dateofbirth" id="dateofbirth"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Select date">
                                        </div>
                                        <x-input-error :messages="$errors->get('dateofbirth')" class="mt-2" />
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="gender"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                            Kelamin</label>
                                        <select id="gender" name="gender" data-placeholder="Pilih Desa/Kelurahan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="address"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Alamat') }}</label>
                                    <input type="text" name="address" id="address"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="Jln. Jalaparang" value="{{ old('address') }}">
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>

                                <div class="grid grid-cols-6 gap-6 mb-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="province_code"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                                        <select
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            name="province_code" id="province_code">
                                            <option selected>Pilih Provinsi</option>
                                            @foreach ($province as $item)
                                                <option value="{{ $item->code }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="city_code"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                                        <select id="city_code" name="city_code" data-placeholder="Pilih Kota"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Pilih Kota</option>
                                            <option></option>

                                        </select>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="district_code"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                                        <select id="district_code" name="district_code"
                                            data-placeholder="Pilih Kecamatan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Pilih Kecamatan</option>
                                            <option></option>

                                        </select>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="village_code"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa/Kelurahan</label>
                                        <select id="village_code" name="village_code"
                                            data-placeholder="Pilih Desa/Kelurahan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Pilih Desa/Kelurahan</option>
                                            <option></option>

                                        </select>
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <label for="no_handphone"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('No Handphone') }}</label>
                                    <input type="number" name="no_handphone" id="no_handphone"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="0812345678" value="{{ old('no_handphone') }}">
                                    <x-input-error :messages="$errors->get('no_handphone')" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <label for="bio"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
                                    <textarea id="bio" rows="4" name="bio"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Penjual Motor Handal🏍️">{{ old('bio') }}</textarea>

                                    <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                                </div>
                                <div class="my-4 space-y-3">
                                    <div class="flex items-center mb-4 space-x-4">
                                        <input id="terms" type="checkbox" value="1" name="terms"
                                            class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="terms"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"><span
                                                class="text-sm text-gray-600">I agree to the <a class="underline"
                                                    href="#">Terms and
                                                    Conditions</a>. Learn about our
                                                Privacy Policy
                                                and our measures to keep your data safe and secure.</span></label>
                                    </div>
                                    <x-input-error :messages="$errors->get('terms')" class="mt-2" />
                                </div>
                                <button type="submit"
                                    class="w-full my-2 flex items-center justify-center rounded-md bg-gray-900 py-3 font-medium text-white">
                                    Continue
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-4 h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="relative hidden h-screen select-none flex-col justify-center bg-blue-600 bg-gradient-to-br md:flex md:w-1/2 rounded-lg shadow-lg">
                <div class="py-16 px-8 text-white xl:w-[40rem]">
                    <span class="rounded-full bg-white px-3 py-1 font-medium text-blue-600">Become A Seller</span>
                    <p class="my-6 text-3xl font-semibold leading-10">Lebih Praktis Jual <span
                            class="whitespace-nowrap inline-block -rotate-1 animate-gradient-pulse rounded-xl ring-2 ring-emerald-400/70 shadow-2xl shadow-emering-emerald-400/[0.25] ml-1 bg-gradient-to-r from-background via-emering-emerald-400/10 to-background px-4 py-1.5 text-md tracking-tight text-foreground sm:px-4 sm:py-3 sm:text-lg lg:text-xl">Kendaraan
                            dan Sparepart disini.</span></p>
                    <p class="mb-4">Untuk Kenyamanan Bersama Kami Membutuhkan Informasi Tambahan Untuk User yang
                        Ingin Menjadi Seller, Jangan Khawatir Data Kamu Aman Kok.</p>
                </div>
            </div>
        </div>
    </div>
    @push('customJS')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            function onChangeSelect(url, code, name) {
                // send ajax request to get the cities of the selected province and append to the select tag
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        code: code,
                    },
                    success: function(data) {
                        let select = $("#" + name);
                        select.empty();
                        select.append(`<option>${select.data("placeholder")}</option>`);
                        $.each(data, function(key, value) {
                            select.append(`<option value="${key}">${value}</option>`);
                        });
                    },
                });
            }
            $("#city_code").attr("disabled", true);
            $("#district_code").attr("disabled", true);
            $("#village_code").attr("disabled", true);
            $(function() {
                $("#province_code").on("change", function() {
                    onChangeSelect("api/city/", $(this).val(), "city_code");
                    $("#city_code").attr("disabled", false);
                    $("#district_code").attr("disabled", true).empty();
                    $("#village_code").attr("disabled", true).empty();
                });
                $("#city_code").on("change", function() {
                    onChangeSelect("api/district/", $(this).val(), "district_code");
                    $("#city_code").attr("disabled", false);
                    $("#district_code").attr("disabled", false).empty();
                    $("#village_code").attr("disabled", false).empty();
                });
                $("#district_code").on("change", function() {
                    onChangeSelect("api/village/", $(this).val(), "village_code");
                });
            });
        </script>
    @endpush
</x-frontend-layout>
