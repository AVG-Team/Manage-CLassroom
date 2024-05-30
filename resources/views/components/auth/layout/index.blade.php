<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @stack('styles')
    <style>
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
    <section class="h-screen bg-gray-100 flex items-center justify-center">
        <div class="h-[75%] bg-white w-[85%] rounded-3xl py-10 px-20">
            <!-- Left column container with background-->
            <div
                class="flex h-full flex-wrap items-center justify-center lg:justify-between">
                <div
                    class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
                    <lottie-player src="https://lottie.host/7af0aab9-f06a-4a96-9607-7ebe4486339b/0fYYVaUlOI.json"
                                   background="##FFFFFF" speed="1" class="w-[95%]" loop autoplay direction="1"
                                   mode="normal"></lottie-player>
                </div>

                <!-- Right column container -->
                <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
                    <form>
                        <!--Sign in section-->
                        <div class="flex flex-row items-center justify-center lg:justify-center">
                            <p class="mb-0 me-4 text-2xl">Login</p>
                        </div>

                        <!-- Separator between social media sign in and email/password sign in -->
                        <div class="border-t border-neutral-400 my-6"></div>

                        <!-- Email input -->
                        <div class="relative mb-6" data-twe-input-wrapper-init>
                            <input
                                type="text"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlInput2"
                                placeholder="Email address"/>
                            <label
                                for="exampleFormControlInput2"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-secondary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                            >Email address
                            </label>
                        </div>

                        <!-- Password input -->
                        <div class="relative mb-6" data-twe-input-wrapper-init>
                            <input
                                type="password"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-secondary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                id="password"
                                placeholder="Password" />
                            <label
                                for="password"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-secondary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                            >Password
                            </label>
                        </div>

                        <div class="mb-6 flex items-center justify-between">
                            <!-- Remember me checkbox -->
                            <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                <input
                                    class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-secondary checked:bg-secondary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right"
                                    type="checkbox"
                                    value=""
                                    id="exampleCheck2"/>
                                <label
                                    class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                    for="exampleCheck2">
                                    Remember me
                                </label>
                            </div>

                            <!--Forgot password link-->
                            <a href="#">Forgot password?</a>
                        </div>

                        <!-- Login button -->
                        <div class="text-center lg:text-left">
                            <x-user.form.butons >Button</x-user.form.butons>
                            <button
                                type="button"
                                class="inline-block w-full rounded bg-primary px-7 pb-2 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                                data-twe-ripple-init
                                data-twe-ripple-color="light">
                                Login
                            </button>

                            <!-- Register link -->
                            <p class="mb-0 mt-2 pt-1 text-sm font-semibold">
                                Don't have an account?
                                <a
                                    href="#"
                                    class="text-danger transition duration-150 ease-in-out hover:text-danger-600 focus:text-danger-600 active:text-danger-700"
                                >Register</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@vite('resources/js/app.js')
@vite('resources/js/auth.js')
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@stack('Scripts')
</body>
</html>