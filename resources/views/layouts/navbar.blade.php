<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <div class="mr-3">
                @if (auth()->check())
                    <div x-data="{
                        open: false,
                        toggle() {
                            if (this.open) {
                                return this.close()
                            }

                            this.$refs.button.focus()

                            this.open = true
                        },
                        close(focusAfter) {
                            if (!this.open) return

                            this.open = false

                            focusAfter && focusAfter.focus()
                        }
                    }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                        x-id="['dropdown-button']" class="flex items-center justify-end">
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                            :aria-controls="$id('dropdown-button')">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="https://avatars.githubusercontent.com/u/499550?v=4"
                                alt="{{ auth()->user()->name }}">
                        </button>

                        <div class="w-full  top-14 max-w-sm rounded-lg bg-white p-3 drop-shadow-xl divide-y divide-gray-200 absolute z-50"
                            x-ref="panel" x-show="open" x-transition.origin.top.right
                            x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                            style="display: none;">
                            <div aria-label="header" class="flex space-x-4 items-center p-4">
                                <div aria-label="avatar" class="flex mr-auto items-center space-x-4">
                                    <img src="https://avatars.githubusercontent.com/u/499550?v=4" alt="avatar Evan You"
                                        class="w-16 h-16 shrink-0 rounded-full" />
                                    <div class="space-y-2 flex flex-col flex-1 truncate">
                                        <div class="font-medium relative text-xl leading-tight text-gray-900">
                                            <span class="flex">
                                                <span class="truncate relative pr-8">
                                                    Evan You
                                                    <span aria-label="verified"
                                                        class="absolute top-1/2 -translate-y-1/2 right-0 inline-block rounded-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                                            class="w-6 h-6 ml-1 text-cyan-400" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path
                                                                d="M12.01 2.011a3.2 3.2 0 0 1 2.113 .797l.154 .145l.698 .698a1.2 1.2 0 0 0 .71 .341l.135 .008h1a3.2 3.2 0 0 1 3.195 3.018l.005 .182v1c0 .27 .092 .533 .258 .743l.09 .1l.697 .698a3.2 3.2 0 0 1 .147 4.382l-.145 .154l-.698 .698a1.2 1.2 0 0 0 -.341 .71l-.008 .135v1a3.2 3.2 0 0 1 -3.018 3.195l-.182 .005h-1a1.2 1.2 0 0 0 -.743 .258l-.1 .09l-.698 .697a3.2 3.2 0 0 1 -4.382 .147l-.154 -.145l-.698 -.698a1.2 1.2 0 0 0 -.71 -.341l-.135 -.008h-1a3.2 3.2 0 0 1 -3.195 -3.018l-.005 -.182v-1a1.2 1.2 0 0 0 -.258 -.743l-.09 -.1l-.697 -.698a3.2 3.2 0 0 1 -.147 -4.382l.145 -.154l.698 -.698a1.2 1.2 0 0 0 .341 -.71l.008 -.135v-1l.005 -.182a3.2 3.2 0 0 1 3.013 -3.013l.182 -.005h1a1.2 1.2 0 0 0 .743 -.258l.1 -.09l.698 -.697a3.2 3.2 0 0 1 2.269 -.944zm3.697 7.282a1 1 0 0 0 -1.414 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z"
                                                                stroke-width="0" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </span>
                                        </div>
                                        <p class="font-normal text-base leading-tight text-gray-500 truncate">
                                            evanyou@gmail.com
                                        </p>
                                    </div>
                                </div>
                                <svg class="w-6 h-6 text-gray-400  shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1" />
                                </svg>

                            </div>
                            <div aria-label="navigation" class="py-2">
                                <nav class="grid gap-1">
                                    <a href="{{ route('profile.index') }}"
                                        class="flex items-center leading-6 space-x-3 py-3 px-4 w-full text-lg text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-6 h-6"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        </svg>
                                        <span>Profile</span>
                                    </a>
                                    <a href="/"
                                        class="flex items-center leading-6 space-x-3 py-3 px-4 w-full text-lg text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md">
                                        <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 21 19">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M11 4C5.5-1.5-1.5 5.5 4 11l7 7 7-7c5.458-5.458-1.542-12.458-7-7Z" />
                                        </svg>
                                        <span>Iklan Saya</span>
                                    </a>
                                    <a href="/"
                                        class="flex items-center leading-6 space-x-3 py-3 px-4 w-full text-lg text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-7 h-7"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                            </path>
                                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                        </svg>
                                        <span>Settings</span>
                                    </a>
                                    <a href="/"
                                        class="flex items-center leading-6 space-x-3 py-3 px-4 w-full text-lg text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-7 h-7"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                            </path>
                                            <path d="M9 17h6"></path>
                                            <path d="M9 13h6"></path>
                                        </svg>
                                        <span>Guide</span>
                                    </a>
                                    <a href="/"
                                        class="flex items-center leading-6 space-x-3 py-3 px-4 w-full text-lg text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-7 h-7"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z">
                                            </path>
                                            <path d="M12 16v.01"></path>
                                            <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path>
                                        </svg>
                                        <span>Helper Center</span>
                                    </a>
                                </nav>
                            </div>
                            <div aria-label="footer" class="pt-2">
                                <button type="button"
                                    class="flex items-center space-x-3 py-3 px-4 w-full leading-6 text-lg text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-7 h-7"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                                        </path>
                                        <path d="M9 12h12l-3 -3"></path>
                                        <path d="M18 15l3 -3"></path>
                                    </svg>
                                    <span>Logout</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button data-collapse-toggle="navbar-user" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                @else
                    <a href="{{ route('login') }}" wire:navigate
                        class="text-gray-800 dark:text-white hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log
                        in</a>
                @endif
            </div>
            <div>
                <a href="#_"
                    class="relative inline-flex items-center justify-start py-2 pl-3 pr-11 overflow-hidden font-semibold text-indigo-600 transition-all duration-150 ease-in-out rounded-full hover:pl-10 hover:pr-6 bg-gray-50 group dark:bg-gray-900 dark:text-indigo-300 ">
                    <span
                        class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-indigo-600 group-hover:h-full"></span>
                    <span class="absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">

                        <svg class="w-4 h-4 text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 1v16M1 9h16" />
                        </svg>
                    </span>
                    <span
                        class="absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
                        <svg class="w-4 h-4 text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 1v16M1 9h16" />
                        </svg>
                    </span>
                    <span
                        class="relative w-full text-left transition-colors duration-200 ease-in-out group-hover:text-white">Jual</span>
                </a>
            </div>
        </div>



        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                        aria-current="page">Buy</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Sell</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
