<section id="hero" class="w-full" data-oas="fade-right">
    <div class="relative grid max-w-screen-xl grid-cols-12 px-4 mx-auto overflow-hidden sm:px-8 gap-x-6" v-bind="$attrs">
        <div class="col-span-12 px-6 mt-12 space-y-4 text-center lg:col-span-6 xl:mt-10 sm:space-y-6 sm:text-left">
          <span data-aos="fade-right" data-aos-once="true" class="text-base font-semibold uppercase text-gradient"
            >Đăng ký ngay hôm nay</span
          >
          <h1
            data-aos="fade-right"
            data-aos-once="true"
            class="text-[2.5rem] sm:text-5xl xl:text-6xl font-bold leading-tight capitalize sm:pr-8 xl:pr-10"
          >
            Học Tập Cùng <span class="text-header-gradient"> Classroom MT </span> Hiệu Quả Và Kết Nối Dễ Dàng
          </h1>
          <p data-aos="fade-down" data-aos-once="true" data-aos-delay="300" class="hidden paragraph sm:block">
            Luyện tập thường xuyên, đặt câu hỏi và tìm hiểu sâu hơn để nắm vững kiến thức.
          </p>
          <div
            data-aos="fade-up"
            data-aos-once="true"
            data-aos-delay="700"
            class="flex flex-col mt-2 space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4"
          >
            <x-user.form.buttons style="primary" class="max-w-full px-8 py-4">
              Bắt Đầu Ngay
            </x-user.form.buttons>
          </div>
        </div>
        <div class="hidden col-span-12 sm:block lg:col-span-6">
          <div class="w-full">
            <lottie-player data-aos="fade-up"data-aos-once="true"
            src="https://lottie.host/b83b079e-d335-46e7-9f71-e5c76de9c8c0/BZZoMFcD96.json"  background="##FFFFFF" speed="1" class="w-[90%] -mt-4" loop autoplay direction="1" mode="normal"></lottie-player>
          </div>
        </div>
        <img
            data-aos="fade-up"
            data-aos-delay="300"
            src="{{ Vite::asset('resources/images/pattern/ellipse-1.png') }}"
            alt="Ellipse 1"
            class="absolute hidden w-6 sm:block bottom-12 xl:bottom-16 left-4 xl:left-0"
        />
        <img
          alt="Ellipse 2"
          data-aos="fade-up"
          data-aos-delay="300"
          src="{{ Vite::asset('resources/images/pattern/ellipse-2.png') }}"
          class="hidden sm:block absolute top-4 sm:top-10 right-64 sm:right-96 xl:right-[32rem] w-6"
        />
        <img
          alt="Ellipse 3"
          data-aos="fade-up"
          data-aos-delay="300"
          src="{{ Vite::asset('resources/images/pattern/ellipse-3.png') }}"
          class="absolute hidden w-6 sm:block bottom-56 right-24"
        />
        <img
            alt="Ellipse 4"
            data-aos="fade-up"
            data-aos-delay="300"
            src="{{ Vite::asset('resources/images/pattern/star.png') }}"
            class="hidden sm:block absolute top-20 sm:top-28 right-16 lg:right-0 lg:left-[30rem] w-8"
        />
    </div>
</section>
