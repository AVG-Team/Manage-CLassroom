<nav id="navbar" class="fixed w-full px-8 bg-white border border-b-2 z-70 sm:bg-white">
    <Container>
            <div class="relative flex flex-wrap items-center justify-between py-3 gap-7 md:gap-0 md:py-4">
                <div class="relative z-20 flex justify-between w-full h-[45px] md:px-0 lg:w-max">
                    <button class="flex items-center px-2 space-x-2 transition duration-300 hover:shadow-md hover:shadow-gray-600/50 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                        </svg>
                    </button>
                    <a href="/#home" aria-label="logo" class="flex items-center space-x-2 text-xl font-bold text-primary">
                        <img src="{{ asset('storage/img/logo/classroom.png') }}" class="w-[8rem]  xl:w-[10rem]" alt="Classroom Logo" />
                    </a>
                    <div class="relative flex max-h-10 lg:hidden">
                        <button aria-label="humburger" id="hamburger" class="relative p-6 -mr-6">
                            <div aria-hidden="true" id="line" class="m-auto h-0.5 w-5 rounded bg-sky-900 transition duration-300 dark:bg-gray-300"></div>
                            <div aria-hidden="true" id="line2" class="m-auto mt-2 h-0.5 w-5 rounded bg-sky-900 transition duration-300 dark:bg-gray-300"></div>
                        </button>
                    </div>
                </div>
                <div id="navLayer" aria-hidden="true" class="fixed inset-0 z-10 w-screen h-screen transition duration-500 origin-bottom scale-y-0 bg-white/70 backdrop-blur-2xl dark:bg-gray-900/70 lg:hidden"></div>
                <div id="navlinks" class="absolute left-0 z-20 flex-col flex-wrap justify-end invisible w-full gap-6 p-8 transition-all duration-300 origin-top-right scale-90 translate-y-1 bg-white border border-gray-100 shadow-2xl opacity-0 top-full rounded-3xl shadow-gray-600/10 dark:border-gray-700 dark:bg-gray-800 dark:shadow-none lg:visible lg:relative lg:flex lg:w-7/12 lg:translate-y-0 lg:scale-100 lg:flex-row lg:items-center lg:gap-0 lg:border-none lg:bg-transparent lg:p-0 lg:opacity-100 lg:shadow-none">
                    <div class="w-full text-gray-600 dark:text-gray-200 lg:w-auto lg:pr-4 lg:pt-0">
                        <ul class="flex flex-col gap-6 tracking-wide lg:flex-row lg:gap-0 lg:text-sm">
                            <li class="w-full">
                                <button class="flex items-center px-2 space-x-2 transition duration-300 rounded-full hover:shadow-md hover:shadow-gray-600/50">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </button>
                            </li>
                            <li class="w-full">
                                <button class="flex items-center px-2 space-x-2 transition duration-300 border-2 rounded-full hover:shadow-md hover:shadow-gray-600/50">
                                    <img src="{{ asset('storage/img/logo/classroom.png') }}" class="w-2 xl:w-[3rem]" alt="Classroom Logo" />
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-12 lg:mt-0">
                    </div>
                </div>
            </div>
        </Container>
</nav>