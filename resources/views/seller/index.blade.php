<x-frontend-layout>
    <section>
        <div class="items-center px-8 mx-auto max-w-7xl lg:px-16 md:px-12 flex">
            <div class="justify-center w-full lg:p-10 max-auto">
                <div class="mb-6">
                    <p class="text-4xl text-black">
                        Mau Jual Apa Hari Ini?
                    </p>
                    <p class="max-w-2xl mt-4 text-lg tracking-tight text-gray-600">
                        Isi Detail Produk
                    </p>
                </div>
                <div class="p-4 rounded-lg bg-white dark:bg-gray-800 border border-gray-900">
                    <form action="{{ route('jualStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="text" hidden value="{{ $selectedCategory }}" name="category_id" id="category_id">
                        <input type="text" hidden value="{{ request('kondisi') }}" name="kondisi" id="kondisi">
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        <x-input-error :messages="$errors->get('kondisi')" class="mt-2" />
                        <div class="mb-6">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Nama Produk') }}</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Beat CBS 2023" value="{{ old('name') }}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mb-6">
                            <label for="merk_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merk</label>
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="merk_id" id="merk_id">
                                <option selected>Pilih Merk</option>
                                @foreach ($merks as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('merk_id')" class="mt-2" />
                        </div>
                        <div class="mb-6">
                            <label for="type_model_motor_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="type_model_motor_id" id="type_model_motor_id">
                                <option selected>Pilih Model</option>
                                @foreach ($merks as $merk)
                                    @foreach ($merk->typemodelmotors as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('type_model  _motor_id')" class="mt-2" />
                        </div>
                        <div class="mb-6">
                            <label for="tahun"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
                            <input type="text" name="tahun" id="tahun"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="2023" value="{{ old('tahun') }}">
                            <x-input-error :messages="$errors->get('tahun')" class="mt-2" />
                        </div>
                        <div class="mb-6">
                            <label for="jarak_tempuh"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jarak
                                Tempuh</label>
                            <input type="number" name="jarak_tempuh" id="jarak_tempuh"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="20.000" value="{{ old('jarak_tempuh') }}">
                            <x-input-error :messages="$errors->get('jarak_tempuh')" class="mt-2" />
                        </div>
                        <div class="mb-6">
                            <label for="fuel_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Bahan
                                Bakar</label>
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="fuel_id" id="fuel_id">
                                <option selected>Pilih Jenis Bahan Bakar</option>
                                @foreach ($fuels as $fuel)
                                    <option value="{{ $fuel->id }}">{{ $fuel->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('fuel_id')" class="mt-2" />
                        </div>
                        <div class="mb-6">
                            <label for="kapasitas_tank"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas
                                Tank</label>
                            <div class="relative mb-6">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    Ltr
                                </div>
                                <input type="text" id="kapasitas_tank" name="kapasitas_tank"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <x-input-error :messages="$errors->get('kapasitas_tank')" />
                        </div>
                        <div class="mb-6">
                            <label for="image[]"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Produk
                                <span>(Max.10 Gambar) </span></label>
                            <header
                                class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">
                                <p class="mb-3 font-semibold text-gray-900 flex flex-wrap justify-center">
                                    <span>Drag and drop your</span>&nbsp;<span>files anywhere or</span>
                                </p>
                                <input id="hidden-input" type="file" multiple class="hidden" name="images[]" />
                                <button id="button" type="button"
                                    class="mt-2 rounded-sm px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                                    Upload a file
                                </button>
                            </header>

                            <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                                To Upload
                            </h1>

                            <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                                <li id="empty"
                                    class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                                    <img class="mx-auto w-32"
                                        src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png"
                                        alt="no data" />
                                    <span class="text-small text-gray-500">No files selected</span>
                                </li>

                            </ul>

                            <template id="file-template">
                                <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                                    <article tabindex="0"
                                        class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline relative bg-gray-100 cursor-pointer relative shadow-sm">
                                        <img alt="upload preview"
                                            class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed" />

                                        <section
                                            class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                            <h1 class="flex-1 group-hover:text-blue-800"></h1>
                                            <div class="flex">
                                                <span class="p-1 text-blue-800">
                                                    <i>
                                                        <svg class="fill-current w-4 h-4 ml-auto pt-1"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24">
                                                            <path
                                                                d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                                        </svg>
                                                    </i>
                                                </span>
                                                <p class="p-1 size text-xs text-gray-700"></p>
                                                <button
                                                    class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                                                    <svg class="pointer-events-none fill-current w-4 h-4 ml-auto"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24">
                                                        <path class="pointer-events-none"
                                                            d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </section>
                                    </article>
                                </li>
                            </template>

                            <template id="image-template">
                                <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                                    <article tabindex="0"
                                        class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                        <img alt="upload preview"
                                            class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />

                                        <section
                                            class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                            <h1 class="flex-1"></h1>
                                            <div class="flex">
                                                <span class="p-1">
                                                    <i>
                                                        <svg class="fill-current w-4 h-4 ml-auto pt-"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24">
                                                            <path
                                                                d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                                                        </svg>
                                                    </i>
                                                </span>

                                                <p class="p-1 size text-xs"></p>
                                                <button
                                                    class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                                    <svg class="pointer-events-none fill-current w-4 h-4 ml-auto"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24">
                                                        <path class="pointer-events-none"
                                                            d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </section>
                                    </article>
                                </li>
                            </template>
                            <x-input-error :messages="$errors->get('images')" class="mt-2" />
                        </div>
                        <div class="mb-6">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                            <div class="relative mb-6">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    Rp.
                                </div>
                                <input type="text" id="price" name="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <x-input-error :messages="$errors->get('price')" />
                        </div>
                        <div class="mb-6">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <textarea id="description" rows="6" name="description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tulis Deskripsi Produk Disini..."></textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div class="mb-6">
                            <button
                                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                type="submit">Posting</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @push('customJS')
        <script>
            const fileTempl = document.getElementById("file-template"),
                imageTempl = document.getElementById("image-template"),
                empty = document.getElementById("empty");

            // use to store pre selected files
            let FILES = {};

            // check if file is of type image and prepend the initialied
            // template to the target element
            function addFile(target, file) {
                const isImage = file.type.match("image.*"),
                    objectURL = URL.createObjectURL(file);

                const clone = isImage ?
                    imageTempl.content.cloneNode(true) :
                    fileTempl.content.cloneNode(true);

                clone.querySelector("h1").textContent = file.name;
                clone.querySelector("li").id = objectURL;
                clone.querySelector(".delete").dataset.target = objectURL;
                clone.querySelector(".size").textContent =
                    file.size > 1024 ?
                    file.size > 1048576 ?
                    Math.round(file.size / 1048576) + "mb" :
                    Math.round(file.size / 1024) + "kb" :
                    file.size + "b";

                isImage &&
                    Object.assign(clone.querySelector("img"), {
                        src: objectURL,
                        alt: file.name
                    });

                empty.classList.add("hidden");
                target.prepend(clone);

                FILES[objectURL] = file;
            }

            const gallery = document.getElementById("gallery"),
                overlay = document.getElementById("overlay");

            // click the hidden input of type file if the visible button is clicked
            // and capture the selected files
            const hidden = document.getElementById("hidden-input");
            document.getElementById("button").onclick = () => hidden.click();
            hidden.onchange = (e) => {
                for (const file of e.target.files) {
                    addFile(gallery, file);
                }
            };

            // use to check if a file is being dragged
            const hasFiles = ({
                    dataTransfer: {
                        types = []
                    }
                }) =>
                types.indexOf("Files") > -1;

            // use to drag dragenter and dragleave events.
            // this is to know if the outermost parent is dragged over
            // without issues due to drag events on its children
            let counter = 0;

            // reset counter and append file to gallery when file is dropped
            function dropHandler(ev) {
                ev.preventDefault();
                for (const file of ev.dataTransfer.files) {
                    addFile(gallery, file);
                    overlay.classList.remove("draggedover");
                    counter = 0;
                }
            }

            // only react to actual files being dragged
            function dragEnterHandler(e) {
                e.preventDefault();
                if (!hasFiles(e)) {
                    return;
                }
                ++counter && overlay.classList.add("draggedover");
            }

            function dragLeaveHandler(e) {
                1 > --counter && overlay.classList.remove("draggedover");
            }

            function dragOverHandler(e) {
                if (hasFiles(e)) {
                    e.preventDefault();
                }
            }

            // event delegation to caputre delete events
            // fron the waste buckets in the file preview cards
            gallery.onclick = ({
                target
            }) => {
                if (target.classList.contains("delete")) {
                    const ou = target.dataset.target;
                    document.getElementById(ou).remove(ou);
                    gallery.children.length === 1 && empty.classList.remove("hidden");
                    delete FILES[ou];
                }
            };

            // print all selected files
            document.getElementById("submit").onclick = () => {
                alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
                console.log(FILES);
            };

            // clear entire selection
            document.getElementById("cancel").onclick = () => {
                while (gallery.children.length > 0) {
                    gallery.lastChild.remove();
                }
                FILES = {};
                empty.classList.remove("hidden");
                gallery.append(empty);
            };
        </script>
    @endpush
    @push('customCSS')
        <style>
            .hasImage:hover section {
                background-color: rgba(5, 5, 5, 0.4);
            }

            .hasImage:hover button:hover {
                background: rgba(5, 5, 5, 0.45);
            }

            #overlay p,
            i {
                opacity: 0;
            }

            #overlay.draggedover {
                background-color: rgba(255, 255, 255, 0.7);
            }

            #overlay.draggedover p,
            #overlay.draggedover i {
                opacity: 1;
            }

            .group:hover .group-hover\:text-blue-800 {
                color: #2b6cb0;
            }
        </style>
    @endpush
</x-frontend-layout>
