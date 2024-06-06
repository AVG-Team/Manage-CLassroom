<nav id="navbar" class="fixed w-full px-8 bg-white border border-b-2 z-70 sm:bg-white">
    <Container>
            <div class="relative flex flex-wrap items-center justify-between py-3 gap-7 md:gap-0 md:py-4">
                <div class="relative z-20 flex justify-between w-full h-[45px] md:px-0 lg:w-max">
                    <button class="flex items-center invisible px-2 space-x-2 transition duration-300 hover:shadow-md hover:shadow-gray-600/50 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                        </svg>
                    </button>
                    <a href="/#home" aria-label="logo" class="flex items-center space-x-2 text-xl font-bold text-primary">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" class="w-[8rem]  xl:w-[10rem]" alt="Classroom Logo" />
                    </a>
                    <div class="relative flex max-h-10 lg:hidden">
                        <button aria-label="humburger" id="hamburger" class="relative p-6 -mr-6">
                            <div aria-hidden="true" id="line" class="m-auto h-0.5 w-5 rounded bg-sky-900 transition duration-300 "></div>
                            <div aria-hidden="true" id="line2" class="m-auto mt-2 h-0.5 w-5 rounded bg-sky-900 transition duration-300"></div>
                        </button>
                    </div>
                </div>
                <div id="navLayer" aria-hidden="true" class="fixed inset-0 z-10 w-screen h-screen transition duration-500 origin-bottom scale-y-0 bg-white/70 backdrop-blur-2xl lg:hidden"></div>
                <div id="navlinks" class="absolute left-0 z-20 flex-col flex-wrap justify-end invisible w-full gap-6 p-8 transition-all duration-300 origin-top-right scale-90 translate-y-1 bg-white border border-gray-100 shadow-2xl opacity-0 top-full rounded-3xl shadow-gray-600/10 lg:visible lg:relative lg:flex lg:w-7/12 lg:translate-y-0 lg:scale-100 lg:flex-row lg:items-center lg:gap-0 lg:border-none lg:bg-transparent lg:p-0 lg:opacity-100 lg:shadow-none">
                    <div class="w-full text-gray-600 lg:w-auto lg:pr-4 lg:pt-0">
                        <ul class="flex flex-col items-center gap-6 tracking-wide lg:flex-row lg:gap-0 lg:text-sm">
                            <li class="hidden w-full mr-2 lg:flex">
                                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="flex items-center px-2 space-x-2 transition duration-300 rounded-full hover:shadow-md hover:shadow-gray-600/50">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </button>
                            </li>

                            <li class="relative w-full">
                                @if(auth()->check())
                                    <div class="hidden lg:flex">
                                        <div class="relative inline-flex hs-dropdown">
                                            <button id="hs-dropdown-custom-trigger" type="button"
                                                    class="inline-flex items-center py-1 text-sm font-semibold text-gray-800 bg-white border border-gray-200 rounded-full shadow-sm hs-dropdown-toggle ps-1 pe-3 gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
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
                                                href="{{ route('classroom') }}">
                                                    Vào Lớp Học
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full lg:hidden">
                                        <button id="hs-dropdown-custom-trigger" type="button"
                                                    class="inline-flex items-center py-1 mb-2 text-sm font-semibold text-gray-800 bg-white border border-gray-200 rounded-full shadow-sm hs-dropdown-toggle ps-1 pe-3 gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                            <span
                                                class="text-gray-600 font-medium truncate max-w-[7.5rem]">{{ auth()->user()->name ?? "Anonymous" }}</span>
                                        </button>
                                        <hr/>
                                        <ul class="mt-2 space-y-2 font-norma">
                                            <li>
                                                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                                    </svg>
                                                <span class="ms-3">Màn hình chính</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                                    </svg>
                                                
                                                <span class="flex-1 ms-3 whitespace-nowrap">Lịch</span>
                                                </a>
                                            </li>
                                            <hr/>
                                            <li>
                                                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                                    </svg>
                                                    
                                                    <span class="flex-1 ms-3 whitespace-nowrap">Giảng dạy</span>
                                                </a>

                                                <ul class="space-y-2 font-normal ">
                                                    <li>
                                                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                                            <div class=" w-[2rem] h-[2rem] overflow-hidden border-2 border-white rounded-full  bg-[#FFF9D0]">
                                                                <div class=" inset-0 flex items-center justify-center text-xl font-bold text-[#5AB2FF]">
                                                                    N
                                                                </div>
                                                            </div>
                                                        <span class="ms-3">Toán</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                                            <div class=" w-[2rem] h-[2rem]overflow-hidden border-2 border-white rounded-full lg:top-[-2.2rem] top-[-1.2rem] bg-[#FFF9D0]">
                                                                <div class=" inset-0 flex items-center justify-center text-xl font-bold text-[#5AB2FF]">
                                                                        N
                                                                </div>
                                                            </div>
                                                            <span class="flex-1 ms-3 whitespace-nowrap">Văn</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <hr/>
                                            <li>
                                                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                                    </svg>
                                                <span class="flex-1 ms-3 whitespace-nowrap">Đã đăng ký</span>
                                                </a>
                                            </li>
                                            <hr/>
                                            <li>
                                                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                                    </svg>
                                                <span class="flex-1 ms-3 whitespace-nowrap">Lớp học đã lưu trữ</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    <span class="flex-1 ms-3 whitespace-nowrap">Cài đặt</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <div class="hidden space-x-3 lg:flex">
                                        <button id="hs-dropdown-custom-trigger" type="button"
                                                    class="inline-flex items-center py-1 text-sm font-semibold text-gray-800 bg-white border border-gray-200 rounded-full shadow-sm hs-dropdown-toggle ps-1 pe-3 gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>
                                                <!-- <span
                                                    class="text-gray-600 font-medium truncate max-w-[7.5rem]">{{ auth()->user()->name ?? "Anonymous" }}</span> -->
                                                <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="m6 9 6 6 6-6"/>
                                                </svg>
                                        </button>
                                    </div>
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="mt-12 lg:mt-0">
                    </div>
                </div>
            </div>
        </Container>
        <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full p-4">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Terms of Service
                        </h3>
                        <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 space-y-4 md:p-5">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                        </p>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                        <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                        <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                    </div>
                </div>
            </div>
        </div>
</nav>
