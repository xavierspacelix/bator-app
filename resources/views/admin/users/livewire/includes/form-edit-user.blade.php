<div x-data="{ editing: false }"
    class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
    <h3 class="mb-4 text-xl font-semibold dark:text-white">General information</h3>
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="name"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Full Name') }}</label>
            <input type="text" name="name" id="name"
                :class="editing === true ?
                    'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500' :
                    'shadow-sm bg-gray-50 border border-gray-200 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 cursor-not-allowed text-gray-500'"
                placeholder="Bonnie" value="{{ old('name', $user->name) }}" disabled x-bind:disabled="!editing">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mb-6">
            <label for="email"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Email') }}</label>
            <input type="email" name="email" id="email"
                :class="editing === true ?
                    'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500' :
                    'shadow-sm bg-gray-50 border border-gray-200 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 cursor-not-allowed text-gray-500'"
                placeholder="Bonnie" value="{{ old('email', $user->email) }}" disabled x-bind:disabled="!editing">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-full" x-show="editing">
            <div class="flex items-center gap-3 justify-end">
                <button
                    class="inline-flex items-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    type="submit">
                    <svg class="w-4 mr-2 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5.917 5.724 10.5 15 1.5" />
                    </svg>
                    {{ __('Save') }}
                </button>
                <p @click="editing = false"
                    class="border border-gray-300 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-gray-900 dark:text-white rounded-lg hover:bg-yellow-500 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:hover:border-gray-600 cursor-pointer">
                    <svg class="w-4 mr-2 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>

                    {{ __('Cancel') }}
                </p>
            </div>
        </div>
    </form>
    <div class="col-span-6 sm:col-full">
        <div class="flex items-center gap-3 justify-end">
            <p x-show="!editing" @click="editing = true"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-700 cursor-pointer">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                    </path>
                    <path fill-rule="evenodd"
                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                        clip-rule="evenodd"></path>
                </svg>
                {{ __('Edit') }}
            </p>
        </div>
    </div>
</div>
