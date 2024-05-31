<nav id="navbar" class="relative z-10 w-full px-8 text-neutral-800">
    <Container>
            <div class="relative flex flex-wrap items-center justify-between gap-6 py-3 md:gap-0 md:py-4">
                <div class="relative z-20 flex justify-between w-full md:px-0 lg:w-max">
                    <a href="/#home" aria-label="logo" class="flex items-center space-x-2">
                        <img src="{{ asset('storage/img/logo/classroom.png') }}" class="w-[8rem] xl:w-[10rem]" alt="Classroom Logo" />
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
                        <ul class="flex flex-col gap-6 tracking-wide lg:flex-row lg:gap-0 lg:text-sm">
                            <li class="w-full">
                                <a class="md:px-4 py-2 text-sm bg-transparent rounded-lg text-[#666666] hover:text-gray-900 focus:outline-none focus:shadow-outline whitespace-nowrap" href="/classroom">
                                    Lớp học
                                </a>
                            </li>
                            <li class="w-full">
                                <a class="md:pr-4 py-2 text-sm bg-transparent rounded-lg text-[#666666] hover:text-gray-900 focus:outline-none focus:shadow-outline whitespace-nowrap" href="#">
                                    Về chúng tôi
                                </a>
                            </li>
                            <li class="w-full">
                                <a class="md:pr-4 py-2 text-sm bg-transparent rounded-lg text-[#666666] hover:text-gray-900 focus:outline-none focus:shadow-outline whitespace-nowrap" href="#">
                                    Liên hệ
                                </a>
                            </li>
                            <li class="w-full lg:hidden">
                                <x-user.form.buttons style="primary" class="w-full py-3 xl:px-8">
                                Đăng nhập
                                </x-user.form.buttons>
                            </li>
                            <li class="w-full lg:hidden">
                                <x-user.form.buttons style="primary" class="w-full py-3 xl:px-8">
                                Đăng ký
                                </x-user.form.buttons>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-12 lg:mt-0">
                        <div class="hidden space-x-3 lg:flex">
                            <x-user.form.buttons style="secondary"  class="px-6 py-3 xl:px-8">
                            Đăng nhập
                            </x-user.form.buttons>
                            <x-user.form.buttons style="primary" class="px-6 py-3 xl:px-8">
                            Đăng ký
                            </x-user.form.buttons>
                        </div>
                    </div>
                </div>
            </div>
        </Container>
</nav>