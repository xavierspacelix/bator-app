<x-frontend-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="dashboard-tab"
                        data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                        aria-selected="false">Dashboard</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="profile-tab" data-tabs-target="#profile" type="button" role="tab"
                        aria-controls="profile" aria-selected="false">Profile</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                        aria-controls="settings" aria-selected="false">Settings</button>
                </li>
            </ul>
        </div>
        <div id="default-tab-content">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                aria-labelledby="dashboard-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                        class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>.
                    Clicking
                    another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                    control
                    the content visibility and styling.</p>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                aria-labelledby="profile-tab">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div
                        class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800 w-full">
                        <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                            <input type="hidden" name="oldImage" value="{{ $user->avatar }}">

                            <img id="avatarPreview" class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0"
                                src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . $user->name . '&background=1A56DB&color=fff' }}"
                                alt="{{ $user->name }}">
                            <div>
                                <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Profile picture
                                </h3>
                                <div class="mb-4 text-sm text-gray-500 dark:text-gray-400">
                                    JPG, GIF or PNG. Max size of 800K
                                </div>
                                <div class="flex items-center space-x-4">
                                    <label type="button" for="avatar"
                                        class="inline-flex cursor-pointer items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                        <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                                            </path>
                                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                                        </svg>
                                        <input type="file" class="hidden" id="avatar" name="avatar" onchange="previewAvatar()">
                                        Upload picture
                                    </label>
                                    <button type="button" id="deleteAvatar"
                                        class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <div class="flex flex-col mb-4">
                            <h3 class="text-xl font-semibold leading-6 tracking-tighter text-black">Informasi Profil
                            </h3>
                            <p class="mt-1.5 text-sm text-muted-foreground">Perbarui informasi profil Anda, alamat,
                                dan pengaturan lainnya.</p>
                        </div>
                        @include('profile.partials.profile-information-form')
                        <div class="mb-6">
                            <button
                                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                type="submit">Save all</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
                aria-labelledby="settings-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                        class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>.
                    Clicking
                    another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                    control
                    the content visibility and styling.</p>
            </div>
        </div>
    </div>
    @push('customJS')
        <script>
            function previewAvatar() {
                const input = document.getElementById('avatar');
                const preview = document.getElementById('avatarPreview');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(function() {
                // Handle klik tombol hapus avatar
                $("#deleteAvatar").on("click", function() {
                    if (confirm("Apakah Anda yakin ingin menghapus avatar?")) {
                        window.location.href = window.location.href;
                        // Kirim permintaan AJAX untuk menghapus avatar
                        $.ajax({
                            url: "{{ route('avatar.delete') }}", // Ganti dengan route yang sesuai
                            type: "DELETE",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                // Perbarui tampilan di sisi klien setelah penghapusan berhasil
                                $("#deleteAvatar").remove();
                                $("img").attr("src",
                                    "{{ asset('storage/' . $user->avatar) }}"
                                ); // Ganti dengan path default avatar yang sesuai

                            },
                            error: function(xhr, status, error) {
                                // Tangani kesalahan jika diperlukan
                                console.error(error);
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
</x-frontend-layout>
