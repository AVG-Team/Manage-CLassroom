<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $title }} </title>
    @vite('resources/css/auth.css')

    <style>
        .input-error {
            border-color: red;
        }

        .input-error:focus {
            border-color: red;
            box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.5);
        }
        .group[data-twe-input-focused] .group-data-\[twe-input-focused\]\:border-primary {
            border-color: #5AB2FF;
        }

        .group[data-twe-input-focused] .group-data-\[twe-input-focused\]\:border-t-transparent {
            border-top-color: transparent !important;
        }
    </style>
</head>
<body>
<div>
    <section class="bg-gray-100 flex items-center justify-center">
        <div class="bg-white rounded-3xl py-10 px-10 h-full w-full">
            <div class="flex h-full justify-center items-center">
                <!-- Right column container -->
                <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
                    <form action="{{ route("profile.process") }}" method="post">
                        @csrf
                        <!--Sign in section-->
                        <div class="flex flex-row items-center justify-center lg:justify-center">
                            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo">
                        </div>
                        <!-- Email input -->
                        <div class="mt-5 mb-3">
                            <p class="text-xl font-bold">Thông Tin Cá Nhân</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Email</label>
                            <div class="relative">
                                <input type="text" DISABLED value="{{ $user->email }}" class="{{ $errors->has("name") ? "input-error" : "" }} py-3 px-4 block w-full border-solid border-[3px] rounded-lg text-sm focus:border-secondary outline-none">
                            </div>
                        </div>
                        <!-- Name input -->
                        <div class="mt-5">
                            <label for="name" class="block text-sm font-medium mb-2">Tên</label>
                            <div class="relative">
                                <input type="text" name="name" id="name" value="{{ old('name') ?: $user->name }}" class="{{ $errors->has("name") ? "input-error" : "" }} py-3 px-4 block w-full border-solid border-[3px] rounded-lg text-sm focus:border-secondary outline-none" required="" aria-describedby="hs-validation-name-error-helper" placeholder="Nhập tên của bạn">
                                <div class="absolute {{ $errors->has("name") ? "flex" : "hidden" }} inset-y-0 end-0 items-center pointer-events-none pe-3">
                                    <svg class="flex-shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" x2="12" y1="8" y2="12"></line>
                                        <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                    </svg>
                                </div>
                            </div>
                            @if($errors->has("name"))
                                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{ $errors->first("name") }}</p>
                            @endif
                        </div>

                        <!-- Birthday input -->
                        <div class="mt-5">
                            <label for="datepicker" class="block text-sm font-medium mb-2">Ngày sinh</label>
                            <div class="relative">

                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input id="datepicker" name="birthday" value="{{ old('birthday') ?: format_day($user->birthday) }}" type="text" class="{{ $errors->has("birthday") ? "input-error" : "" }} bg-gray-50 text-gray-900 text-sm rounded-lg outline-none border-[3px] focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Chọn ngày sinh của bạn">
                                </div>

                            </div>
                            @if($errors->has("birthday"))
                                <p class="text-sm text-red-600 mt-2">{{ $errors->first("birthday") }}</p>
                            @endif
                        </div>

                        <!-- Phone input -->
                        <div class="mt-5">
                            <div>
                                <label for="phone" class="block text-sm text-gray-700 font-medium mb-2">Phone</label>
                                <div class="flex rounded-lg shadow-sm">
                                    <div class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50">
                                        <span class="text-sm text-gray-500 dark:text-neutral-400">+84</span>
                                    </div>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') ?: $user->phone }}" class="{{ $errors->has("phone") ? "input-error" : "" }} py-3 px-4 pe-11 block w-full border-gray-200 outline-none border-solid border-[3px] shadow-sm rounded-e-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="123456789">
                                </div>
                            </div>
                            @if($errors->has("phone"))
                                <p class="text-sm text-red-600 mt-2">{{ $errors->first("phone") }}</p>
                            @endif
                        </div>

                        <!-- Address input -->
                        <div class="mt-5">
                            <label for="address" class="block text-sm font-medium mb-2">Địa chỉ</label>
                            <div class="relative">
                                <input type="text" id="address" value="{{ old('address') ?: $user->address }}" name="address" class="{{ $errors->has("address") ? "input-error" : "" }} py-3 px-4 block w-full border-solid border-[3px] rounded-lg text-sm focus:border-secondary outline-none" required="" aria-describedby="hs-validation-name-error-helper" placeholder="Nhập địa chỉ của bạn">
                                <div class="absolute {{ $errors->has("address") ? "flex" : "hidden" }} inset-y-0 end-0 items-center pointer-events-none pe-3">
                                    <svg class="flex-shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" x2="12" y1="8" y2="12"></line>
                                        <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                    </svg>
                                </div>
                            </div>
                            @if($errors->has("address"))
                                <p class="text-sm text-red-600 mt-2" >{{ $errors->first("address") }}</p>
                            @endif
                        </div>

                        <!-- Gender Input -->
                        <div class="mt-5">
                            <div class="flex gap-x-6">
                                <label class="block text-sm font-medium">Giới tính</label>
                                <div class="flex">
                                    <input type="radio" name="gender" id="gender1" value="1" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600"{{ ( $user->gender == 1 || $user->gender == null ) ? "checked" : "" }}>
                                    <label for="gender1" class="text-sm text-gray-500 ms-2 dark:text-neutral-400">Nam</label>
                                </div>
                                <div class="flex">
                                    <input type="radio" name="gender" id="gender" value="0" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600"{{ $user->gender == 0 ? "checked" : "" }}>
                                    <label for="gender" class="text-sm text-gray-500 ms-2 dark:text-neutral-400">Nữ</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 mb-3">
                            <p class="text-xl font-bold">Đổi Mật Khẩu</p>
                        </div>

                        <!-- Password Old input -->
                        <div class="relative" id="old_password_group">
                            <label for="inputOldPassword" class="block text-sm font-medium mb-2">Mật Khẩu Cũ</label>
                            <div class="relative">
                                <input type="password" name="old_password" id="inputOldPassword" class="{{ $errors->has("old_password") ? "input-error" : "" }} py-3 px-4 block w-full border-solid border-[3px] rounded-lg text-sm focus:border-secondary outline-none" required="" placeholder="Nhập lại mật khẩu của bạn">
                                <div class="absolute {{ $errors->has("old_password") ? "flex" : "hidden" }} inset-y-0 end-0 items-center pointer-events-none pe-3">
                                    <svg class="flex-shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" x2="12" y1="8" y2="12"></line>
                                        <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                    </svg>
                                </div>
                            </div>
                            <div class="absolute cursor-pointer bottom-[18%] right-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-secondary hidden" id="eye_show_old_pwd">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-secondary hidden" id="eye_hidden_old_pwd">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </div>
                            @if($errors->has("old_password"))
                                <p class="text-sm text-red-600 mt-2" >{{ $errors->first("old_password") }}</p>
                            @endif
                        </div>

                        <!-- Password input -->
                        <div class="relative mt-5" id="password_group">
                            <label for="inputPassword" class="block text-sm font-medium mb-2">Mật Khẩu</label>
                            <div class="relative">
                                <input type="password" name="password" id="inputPassword" class="{{ $errors->has("password") ? "input-error" : "" }} py-3 px-4 block w-full border-solid border-[3px] rounded-lg text-sm focus:border-secondary outline-none" required="" placeholder="Nhập mật khẩu của bạn">
                                <div class="absolute {{ $errors->has("password") ? "flex" : "hidden" }} inset-y-0 end-0 items-center pointer-events-none pe-3">
                                    <svg class="flex-shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" x2="12" y1="8" y2="12"></line>
                                        <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                    </svg>
                                </div>
                            </div>
                            <div class="absolute cursor-pointer bottom-[18%] right-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-secondary hidden" id="eye_show_pwd">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-secondary hidden" id="eye_hidden_pwd">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </div>
                            @if($errors->has("password"))
                                <p class="text-sm text-red-600 mt-2" >{{ $errors->first("password") }}</p>
                            @endif
                        </div>

                        <!-- Password input -->
                        <div class="mt-5 relative" id="re_password_group">
                            <label for="inputRePassword" class="block text-sm font-medium mb-2">Nhập lại mật khẩu</label>
                            <div class="relative">
                                <input type="password" name="re_password" id="inputRePassword" class="{{ $errors->has("re_password") ? "input-error" : "" }} py-3 px-4 block w-full border-solid border-[3px] rounded-lg text-sm focus:border-secondary outline-none" required="" placeholder="Nhập lại mật khẩu">
                                <div class="absolute {{ $errors->has("re_password") ? "flex" : "hidden" }} inset-y-0 end-0 items-center pointer-events-none pe-3">
                                    <svg class="flex-shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" x2="12" y1="8" y2="12"></line>
                                        <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                    </svg>
                                </div>
                            </div>
                            <div class="absolute cursor-pointer bottom-[18%] right-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-secondary hidden" id="eye_show_re_pwd">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-secondary hidden" id="eye_hidden_re_pwd">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </div>
                            @if($errors->has("re_password"))
                                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{ $errors->first("re_password") }}</p>
                            @endif
                        </div>

                        <!-- Login button -->
                        <div class="text-center lg:text-left mt-5">
                            <x-user.form.buttons.primary type="button" class="w-full h-10" id="button_submit">Cập Nhật</x-user.form.buttons.primary>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@vite('resources/js/auth.js')
<x-partials.toast />
@vite("resources/js/profile.js")
</body>
</html>
