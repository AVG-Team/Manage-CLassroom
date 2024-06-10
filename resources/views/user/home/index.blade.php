<x-user.layout.app>
    @section('title', 'Trang Chủ - ' . config('app.name'))
    <!-- banner -->
    <x-user.layout.partials.banner />
    <!-- end banner -->

    <!-- partner -->
    <section class="relative w-full xxl:mt-80 xl:mt-20 mt-90 my-20 overflow-hidden shadow bg-partner ">
      <div class="flex flex-col items-center justify-center w-full px-6 py-16 space-y-4 text-center sm:px-0">
        <h3 data-aos="flip-down" class="text-2xl font-semibold text-neutral-800">Các Khoá Học Nổi Bật</h3>
        <p data-aos="flip-down" class="paragraph">Tham gia cùng chúng tôi để trải nghiệm các khoá học nào</p>
        <div data-aos="fade-up" class="flex flex-wrap items-center justify-center">
        @foreach (['clever.png', 'diamon-cutts.png', 'swiss-finance.png', 'gambio.png'] as $img)
            <x-user.layout.landing.partner :img="$img" />
        @endforeach
        </div>
      </div>
    </section>

    <!-- intro -->
    <section class="w-full my-36" data-aos="fade-down">
      <x-user.layout.partials.section data-aos="fade-down">
        <div class="col-span-12 lg:col-span-7">
          <div class="w-full">
            <lottie-player src="https://lottie.host/e9e4febc-c881-44d7-a608-97954b7aaca5/6WRZkskoj3.json"  background="##FFFFFF" speed="1" class="w-[95%]" loop autoplay direction="1" mode="normal"></lottie-player>
          </div>
        </div>
        <div class="col-span-12 px-4 mt-20 space-y-6 lg:col-span-5 sm:px-6">
            <h2 class="text-4xl font-semibold">
                Về chúng tôi "<span class="text-header-gradient">Quản Lý Lớp Học</span>"
            </h2>
            <p class="paragraph">Những nét nổi bật của website của chúng tôi</p>
            <ul class="space-y-4 sm:space-y-2">
                <li class="space-y-2">
                    <div class="flex items-center space-x-2">
                    <div class="text-[#0c66ee]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"  stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <span>Nhanh chóng, Tiện lợi</span>
                    </div>
                </li>
                <li class="space-y-2">
                    <div class="flex items-center space-x-2">
                        <div class="text-[#0c66ee]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"  stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <span>Dễ dàng, Hiệu quả</span>
                    </div>
                </li>
                <li class="space-y-2">
                    <div class="flex items-center space-x-2">
                        <div class="text-[#0c66ee]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"  stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                        </div>
                        <span>Chi phí giá rẻ</span>
                    </div>
                </li>
            </ul>
          <x-user.form.buttons style="secondary" class="w-full sm:max-w-[240px] px-10 py-4 font-medium">
            Tìm Hiểu Thêm
          </x-user.form.buttons>
        </div>
      </x-user.layout.partials.section>
    </section>
</x-user.layout.app>
