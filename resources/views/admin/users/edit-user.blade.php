<x-app-admin-layout>
    <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
        <div class="mb-4 col-span-full xl:mb-2">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                {{ __('Edit User,') }} {{ $user->name }}</h1>
        </div>

        <div class="col-span-full xl:col-auto">
            {{-- Profile Photo --}}
            @include('admin.users.livewire.includes.edit-profile-pict')
            {{-- Social Account --}}
            @include('admin.users.livewire.includes.social-account')
            {{-- Session Device --}}
            @include('admin.users.livewire.includes.session-device')
        </div>
        <div class="col-span-2">
            {{-- Form User Data --}}
            @include('admin.users.livewire.includes.form-edit-user')
            {{-- Password Change --}}
            @include('admin.users.livewire.includes.change-password')
        </div>
    </div>

</x-app-admin-layout>
