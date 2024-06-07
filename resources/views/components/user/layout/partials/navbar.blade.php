<nav id="navbar" class="relative z-10 w-full px-8 text-neutral-800">
    <Container>
        <div class="relative flex flex-wrap items-center justify-between gap-6 py-3 md:gap-0 md:py-4">
            <div class="relative z-20 flex justify-between w-full md:px-0 lg:w-max">
                <a href="/#home" aria-label="logo" class="flex items-center space-x-2">
                    <img src="{{ Vite::asset('resources/images/logo/classroom.png') }}" class="w-[8rem] xl:w-[10rem]"
                         alt="Classroom Logo"/>
                </a>
                <div class="relative flex max-h-10 lg:hidden">
                    <button aria-label="humburger" id="hamburger" class="relative p-6 -mr-6">
                        <div aria-hidden="true" id="line"
                             class="m-auto h-0.5 w-5 rounded bg-sky-900 transition duration-300 "></div>
                        <div aria-hidden="true" id="line2"
                             class="m-auto mt-2 h-0.5 w-5 rounded bg-sky-900 transition duration-300"></div>
                    </button>
                </div>
            </div>
            <div id="navLayer" aria-hidden="true"
                 class="fixed inset-0 z-10 w-screen h-screen transition duration-500 origin-bottom scale-y-0 bg-white/70 backdrop-blur-2xl lg:hidden"></div>
            <div id="navlinks"
                 class="absolute left-0 z-20 flex-col flex-wrap justify-end invisible w-full gap-6 p-8 transition-all duration-300 origin-top-right scale-90 translate-y-1 bg-white border border-gray-100 shadow-2xl opacity-0 top-full rounded-3xl shadow-gray-600/10 lg:visible lg:relative lg:flex lg:w-7/12 lg:translate-y-0 lg:scale-100 lg:flex-row lg:items-center lg:gap-0 lg:border-none lg:bg-transparent lg:p-0 lg:opacity-100 lg:shadow-none">
                <div class="w-full text-gray-600 lg:w-auto lg:pr-4 lg:pt-0">
                    <ul class="flex flex-col gap-6 tracking-wide lg:flex-row lg:gap-0 lg:text-sm">
                        <li class="w-full">
                            <a class="md:px-4 py-2 text-sm bg-transparent rounded-lg text-[#666666] hover:text-gray-900 focus:outline-none focus:shadow-outline whitespace-nowrap"
                               href="/classroom">
                                Lớp học
                            </a>
                        </li>
                        <li class="w-full">
                            <a class="md:pr-4 py-2 text-sm bg-transparent rounded-lg text-[#666666] hover:text-gray-900 focus:outline-none focus:shadow-outline whitespace-nowrap"
                               href="#">
                                Về chúng tôi
                            </a>
                        </li>
                        <li class="w-full">
                            <a class="md:pr-4 py-2 text-sm bg-transparent rounded-lg text-[#666666] hover:text-gray-900 focus:outline-none focus:shadow-outline whitespace-nowrap"
                               href="#">
                                Liên hệ
                            </a>
                        </li>
                        <li class="w-full lg:hidden">
                            <x-user.form.buttons.primary class="w-full py-3 xl:px-8" onclick="na()">
                                Đăng nhập
                            </x-user.form.buttons.primary>
                        </li>
                        <li class="w-full lg:hidden">
                            <x-user.form.buttons class="w-full py-3 xl:px-8" onclick="location.href=''">
                                Đăng ký
                            </x-user.form.buttons>
                        </li>
                    </ul>
                </div>

                <div class="mt-12 lg:mt-0">
                    @if(auth()->check())
                        <div class="hidden lg:flex">
                            <div class="hs-dropdown relative inline-flex">
                                <button id="hs-dropdown-custom-trigger" type="button"
                                        class="hs-dropdown-toggle py-1 ps-1 pe-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    </svg>
                                    <span
                                        class="text-gray-600 font-medium truncate max-w-[7.5rem]">{{ auth()->user()->name ?? "Anonymous" }}</span>
                                    <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m6 9 6 6 6-6"/>
                                    </svg>
                                </button>

                                <div
                                    class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2"
                                    aria-labelledby="hs-dropdown-custom-trigger">
                                    @if(auth()->user()->role >= 1)
                                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400"
                                           href="#">
                                            Quản Lý Trang Web
                                        </a>
                                    @endif

                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400"
                                       href="{{ route('profile') }}" target="_blank">
                                        Cập Nhật Hồ Sơ
                                    </a>
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400"
                                       href="{{ route("classroom") }}">
                                        Vào Lớp Học
                                    </a>
                                    @if(auth()->check())
                                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400"
                                               href="{{ route("logout") }}">
                                                Đăng Xuất
                                            </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="hidden space-x-3 lg:flex">
                            <x-user.form.buttons.secondary class="px-6 py-3 xl:px-8"
                                                           onclick="window.open('{{ route('login') }}', '_blank')">
                                Đăng nhập
                            </x-user.form.buttons.secondary>
                            <x-user.form.buttons.primary class="px-6 py-3 xl:px-8"
                                                         onclick="window.open('{{ route('register') }}', '_blank')">
                                Đăng ký
                            </x-user.form.buttons.primary>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </Container>
</nav>
