<header class="w-full pb-10">
    <!-- navbar -->
    <nav id="navbar" class="relative z-10 w-full text-neutral-800">
        <div class="flex flex-col max-w-screen-xl px-8 py-4 mx-auto lg:items-center lg:justify-between lg:flex-row">
        <div class="flex flex-col items-center space-x-4 lg:flex-row xl:space-x-8">
            <div class="flex flex-row items-center justify-between w-full">
            <div>
                <img src="{{ asset('storage/img/logo/classroom.png') }}" class="w-28 xl:w-[8.5rem]" alt="Classroom Logo" />
            </div>
            <button class="rounded-lg lg:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                <SegmentIcon v-if="!open" :size="24" />
                <CloseIcon v-else :size="24" />
            </button>
            </div>
            <ul id="navbar" class="flex-col flex-grow hidden w-full h-auto px-4 pb-4 space-y-3 duration-300 origin-top lg:flex lg:items-center lg:pb-0 lg:justify-end lg:flex-row xl:space-x-2 lg:space-y-0">
                <li class="w-full">
                    <a class="md:px-4 py-2 text-sm bg-transparent rounded-lg text-[#666666] hover:text-gray-900 focus:outline-none focus:shadow-outline whitespace-nowrap" href="#">
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
            </ul>
        </div>
        <div :class="[open ? 'flex' : 'hidden lg:flex']" class="space-x-3">
            <x-user.form.buttons style="secondary"  class="px-6 py-3 mt-2 xl:px-8">
            Đăng nhập
            </x-user.form.buttons>
            <x-user.form.buttons style="primary" class="px-6 py-3 mt-2 xl:px-8">
            Đăng ký
            </x-user.form.buttons>
        </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- banner -->
    <x-user.layout.partials.banner />
    <!-- end banner -->
</header>
