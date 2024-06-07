<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite('resources/css/admin/app.css')
    @stack('styles')
</head>

<body>
<!-- ===== Preloader Start ===== -->
{{--<x-admin.layouts.partials.preloader />--}}
<!-- ===== Preloader End ===== -->

<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
    <!-- ===== Sidebar Start ===== -->
    <x-admin.layouts.partials.sidebar/>
    <!-- ===== Sidebar End ===== -->

    <!-- ===== Content Area Start ===== -->
    <div
        class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden"
    >
        <!-- ===== Header Start ===== -->
        <x-admin.layouts.partials.header/>
        <!-- ===== Header End ===== -->

        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                <!-- Breadcrumb Start -->
                <div
                    class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
                >
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        @yield('title-content')
                    </h2>

                    <nav>
                        @yield('breadcrumbs')
                    </nav>
                </div>
                <!-- Breadcrumb End -->
                {{ $slot }}
            </div>
        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
</div>
<!-- ===== Page Wrapper End ===== -->
<x-partials.toast />
@vite('resources/js/admin/app.js')
@stack('scripts')
</body>
</html>
