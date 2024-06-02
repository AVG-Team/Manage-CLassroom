<x-auth.layout>
    @section('title')
        {{ $title }}
    @endsection
    <div class="flex h-full flex-wrap items-center justify-center lg:justify-between">
        <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12 hidden lg:block">
{{--                <lottie-player src="https://lottie.host/f0774770-0c02-40fb-8946-cd6f3ba17988/rR9TyEBHNN.json"--}}
{{--                               background="##FFFFFF" speed="1" class="w-[95%]" loop autoplay direction="1"--}}
{{--                               mode="normal"></lottie-player>--}}
                <lottie-player src="https://lottie.host/994e962e-5b3f-4e8c-9ef2-0ad341d8cacb/Gpba1q8VP8.json"
                               background="##FFFFFF" speed="1" class="w-[95%]" loop autoplay direction="1"
                               mode="normal"></lottie-player>
        </div>

        <!-- Right column container -->
        <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
            <!--Sign in section-->
            <div class="flex flex-row items-center justify-center lg:justify-center">
                <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo">
            </div>

            <div>
                <div class="flex flex-col items-center justify-center">
                    <div class="flex flex-col items-center justify-center">
                        <h1 class="text-2xl font-bold text-center text-gray-800">Xác Thực Email</h1>
                        @if($statusEmailVerified)
                            <p class="text-center text-gray-500 mt-3">Cảm ơn bạn đã đăng ký tham gia website của chúng tôi. Email của bạn đã được xác thực thành công. Chúc bạn có những trải nghiệm tuyệt vời với dịch vụ của chúng tôi ❤️.</p>
                        @else
                            <p class="text-center text-error-500 font-bold mt-3">Rất tiếc, việc xác thực email đã thất bại. Vui lòng kiểm tra lại và thử lại sau. Nếu bạn gặp bất kỳ vấn đề nào, xin liên hệ với chúng tôi để được hỗ trợ. Cảm ơn bạn.</p>
                        @endif
                    </div>
                    <div class="flex flex-col items-center justify-center mt-8">
                        @if(auth()->check() && auth()->user()->name == null)
                            <a href="{{ route('home') }}"
                               class="w-full px-4 py-2 text-center text-white bg-blue-500 rounded-md hover:bg-blue-600">Cập Nhật Hồ Sơ</a>
                        @elseif(auth()->check())
                            <a href="{{ route('home') }}"
                               class="w-full px-4 py-2 text-center text-white bg-blue-500 rounded-md hover:bg-blue-600">Trang Chủ</a>
                        @else
                            <a href="{{ route('login') }}"
                               class="w-full px-4 py-2 text-center text-white bg-blue-500 rounded-md hover:bg-blue-600">Đăng Nhập</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth.layout>
