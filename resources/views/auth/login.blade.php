<x-auth.layout>
    @section('title')
        {{ $title }}
    @endsection
    @push('styles')
        @if($errors->has("email"))
            <style>
                .group[data-twe-input-focused] .group-data-\[twe-input-focused\]\:border-primary{
                    border-color: red !important;
                }

                .group[data-twe-input-focused] .group-data-\[twe-input-focused\]\:border-t-transparent {
                    border-top-color: transparent !important;
                }

                .dark\:border-neutral-400 {
                    border-color: red;
                }

                label.input-label.error {
                    color: red !important;
                }
            </style>
        @endif
    @endpush
    <div class="flex h-full flex-wrap items-center justify-center lg:justify-between">
        <div
            class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12 hidden lg:block">
            <lottie-player src="https://lottie.host/7af0aab9-f06a-4a96-9607-7ebe4486339b/0fYYVaUlOI.json"
                           background="##FFFFFF" speed="1" class="w-[95%]" loop autoplay direction="1"
                           mode="normal"></lottie-player>
        </div>

        <!-- Right column container -->
        <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
            <form action="{{ route("login.process") }}" method="post">
                @csrf
                <!--Sign in section-->
                <div class="flex flex-row items-center justify-center lg:justify-center">
                    <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo">
                </div>
                <!-- Email input -->
                <div class="relative mb-6 mt-3" data-twe-input-wrapper-init>
                    <input
                        type="text"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                        id="inputEmail"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Địa Chỉ Email"/>
                    <label
                        for="inputEmail"
                        class="input-label {{ $errors->has("email") ? "error" : "" }} pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-secondary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                    >Địa Chỉ Email
                    </label>
                </div>

                <div class="mb-4">
                    @if ($errors->has('email'))
                        <p class="text-red-500">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <!-- Password input -->
                <div class="relative mb-6" data-twe-input-wrapper-init>
                    <input
                        type="password"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-secondary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                        id="inputPassword"
                        name="password"
                        placeholder="Mật Khẩu" />
                    <label
                        for="inputPassword"
                        class="pointer-events-none input-label {{ $errors->has("password") ? "error" : "" }} absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-secondary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                    >Mật Khẩu
                    </label>
                    <div class="absolute cursor-pointer bottom-[20%] right-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-secondary hidden" id="eye_show_pwd">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-secondary hidden" id="eye_hidden_pwd">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </div>
                </div>

                <div class="mb-4">
                    @if ($errors->has('password'))
                        <p class="text-red-500">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="mb-6 flex items-center justify-between">
                    <!-- Remember me checkbox -->
                    <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                        <input
                            class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-secondary checked:bg-secondary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right"
                            type="checkbox"
                            name="remember"
                            id="remember"/>
                        <label
                            class="inline-block ps-[0.15rem] hover:cursor-pointer hover:text-secondary-800"
                            for="remember">
                            Remember me
                        </label>
                    </div>

                    <!--Forgot password link-->
                    <a href="#" class="hover:text-secondary-800">Quên mật khẩu?</a>
                </div>

                <!-- Login button -->
                <div class="text-center lg:text-left">
                    <x-user.form.buttons.primary type="submit" class="w-full h-10" id="button_submit">Đăng Nhập</x-user.form.buttons.primary>

                    <!-- Register link -->
                    <p class="mb-0 mt-2 pt-1 text-sm font-semibold">
                        Bạn chưa có tài khoản ?
                        <a
                            href="{{ route("register") }}"
                            class="text-secondary transition duration-150 ease-in-out hover:text-secondary-700 focus:text-secondary-700 active:text-secondary-800"
                        >Đăng kí ngay !!!</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    @push("scripts")
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const inputPassword = document.getElementById("inputPassword");
                    const eye = document.getElementById("eye_show_pwd");
                    const eyeHidden = document.getElementById("eye_hidden_pwd");

                    inputPassword.addEventListener("focus", function () {
                        if(eyeHidden.classList.contains("hidden"))
                            eye.classList.remove("hidden");
                    });

                    eye.addEventListener("click", function () {
                        eye.classList.add("hidden");
                        eyeHidden.classList.remove("hidden");
                        inputPassword.type = "text";
                    });

                    eyeHidden.addEventListener("click", function () {
                        eyeHidden.classList.add("hidden");
                        eye.classList.remove("hidden");
                        inputPassword.type = "password";
                    });
                });
            </script>
    @endpush
</x-auth.layout>
