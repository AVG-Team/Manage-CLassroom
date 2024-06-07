<x-auth.layout>
    @section('title')
        {{ $title }}
    @endsection
    @push('styles')
        @if($errors->has("email"))
            <style>
                .group[data-twe-input-focused] .group-data-\[twe-input-focused\]\:border-primary {
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
            <form action="{{ route('admin.login.process') }}" method="post">
                @csrf
                <!--Sign in section-->
                <div class="flex flex-row items-center justify-center lg:justify-center">
                    <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo">
                </div>

                <h2 class="text-2xl font-semibold text-center mt-4 mb-6">Đăng Nhập vào Quản Trị</h2>

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
                        placeholder="Mật Khẩu"/>
                    <label
                        for="inputPassword"
                        class="pointer-events-none input-label {{ $errors->has("password") ? "error" : "" }} absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-secondary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                    >Mật Khẩu</label>
                </div>

                <!-- Login button -->
                <div class="text-center lg:text-left">
                    <x-user.form.buttons.primary type="button" class="w-full h-10" id="button_submit">Đăng Nhập
                    </x-user.form.buttons.primary>
                </div>
            </form>
        </div>
    </div>
    @push("scripts")
        <script>
            const btn = document.getElementById("button_submit");
            btn.addEventListener("click", function () {
                const password = document.getElementById("inputPassword");
                if (password.value.length === 0) {
                    alert("Mật khẩu không được để trống");
                } else {
                    document.querySelector("form").submit();
                }
            });
        </script>
    @endpush
</x-auth.layout>
