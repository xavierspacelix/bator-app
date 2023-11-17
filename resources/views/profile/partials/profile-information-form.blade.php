<div class="mb-6">
    <label for="name"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Full Name') }}</label>
    <input type="text" name="name" id="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
        placeholder="Boonie" value="{{ old('name', $user->name) }}">
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>
<div class="mb-6">
    <label for="email"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Email') }}</label>
    <input type="email" name="email" id="email"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
        placeholder="name@company.com" value="{{ old('email', $user->email) }}">
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<div class="grid grid-cols-6 gap-6 mb-6">
    <div class="col-span-6 sm:col-span-3">
        <label for="dateofbirth"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Tanggal Lahir') }}</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input datepicker datepicker-autohide datepicker-format="yyyy/mm/dd" type="text" name="dateofbirth" id="dateofbirth"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Select date">
            <x-input-error :messages="$errors->get('dateofbirth')" class="mt-2" />
        </div>
    </div>
    <div class="col-span-6 sm:col-span-3">
        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
        <select id="gender" name="gender" data-placeholder="Pilih Desa/Kelurahan"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="P">Perempuan</option>
            <option value="L">Laki-Laki</option>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </select>
    </div>
</div>
<div class="mb-6">
    <label for="address"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Alamat') }}</label>
    <input type="text" name="address" id="address"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
        placeholder="Jln. Jalaparang" value="{{ old('address', $user->address) }}">
    <x-input-error :messages="$errors->get('address')" class="mt-2" />
</div>


<x-dependent-select>
    @foreach ($province as $item)
        <option value="{{ $item->code }}">{{ $item->name }}</option>
    @endforeach
</x-dependent-select>
<div class="mb-6">
    <label for="no_handphone"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('No Handphone') }}</label>
    <input type="number" name="no_handphone" id="no_handphone"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
        placeholder="0812345678" value="{{ old('no_handphone', $user->no_handphone) }}">
    <x-input-error :messages="$errors->get('no_handphone')" class="mt-2" />
</div>
<div class="mb-6">
    <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
    <textarea id="bio" rows="4" name="bio"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Penjual Motor Handal🏍️" value="{{ old('bio', $user->bio) }}"></textarea>

    <x-input-error :messages="$errors->get('no_handphone')" class="mt-2" />
</div>

