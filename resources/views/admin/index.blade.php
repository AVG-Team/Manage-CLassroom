<x-admin.layouts.app>
    @section('title', $title)
    @section('title-content', $contentTitle)

    @section('breadcrumbs')
    {{ Breadcrumbs::render('admin.home') }}
    @endsection

    <div
        class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5"
    >

        <!-- Card Item Start -->
        <div
            class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default flex justify-center"
        >
            <div class="text-center">
                <div class="flex justify-center">
                    <div
                        class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2"
                    >
                        <svg
                            class="fill-secondary-700"
                            width="22"
                            height="18"
                            viewBox="0 0 22 18"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M7.18418 8.03751C9.31543 8.03751 11.0686 6.35313 11.0686 4.25626C11.0686 2.15938 9.31543 0.475006 7.18418 0.475006C5.05293 0.475006 3.2998 2.15938 3.2998 4.25626C3.2998 6.35313 5.05293 8.03751 7.18418 8.03751ZM7.18418 2.05626C8.45605 2.05626 9.52168 3.05313 9.52168 4.29063C9.52168 5.52813 8.49043 6.52501 7.18418 6.52501C5.87793 6.52501 4.84668 5.52813 4.84668 4.29063C4.84668 3.05313 5.9123 2.05626 7.18418 2.05626Z"
                                fill=""
                            />
                            <path
                                d="M15.8124 9.6875C17.6687 9.6875 19.1468 8.24375 19.1468 6.42188C19.1468 4.6 17.6343 3.15625 15.8124 3.15625C13.9905 3.15625 12.478 4.6 12.478 6.42188C12.478 8.24375 13.9905 9.6875 15.8124 9.6875ZM15.8124 4.7375C16.8093 4.7375 17.5999 5.49375 17.5999 6.45625C17.5999 7.41875 16.8093 8.175 15.8124 8.175C14.8155 8.175 14.0249 7.41875 14.0249 6.45625C14.0249 5.49375 14.8155 4.7375 15.8124 4.7375Z"
                                fill=""
                            />
                            <path
                                d="M15.9843 10.0313H15.6749C14.6437 10.0313 13.6468 10.3406 12.7874 10.8563C11.8593 9.61876 10.3812 8.79376 8.73115 8.79376H5.67178C2.85303 8.82814 0.618652 11.0625 0.618652 13.8469V16.3219C0.618652 16.975 1.13428 17.4906 1.7874 17.4906H20.2468C20.8999 17.4906 21.4499 16.9406 21.4499 16.2875V15.4625C21.4155 12.4719 18.9749 10.0313 15.9843 10.0313ZM2.16553 15.9438V13.8469C2.16553 11.9219 3.74678 10.3406 5.67178 10.3406H8.73115C10.6562 10.3406 12.2374 11.9219 12.2374 13.8469V15.9438H2.16553V15.9438ZM19.8687 15.9438H13.7499V13.8469C13.7499 13.2969 13.6468 12.7469 13.4749 12.2313C14.0937 11.7844 14.8499 11.5781 15.6405 11.5781H15.9499C18.0812 11.5781 19.8343 13.3313 19.8343 15.4625V15.9438H19.8687Z"
                                fill=""
                            />
                        </svg>
                    </div>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4
                            class="text-title-md font-bold text-black"
                        >
                            {{ $totalUsers }}
                        </h4>
                        <span class="text-sm font-medium">Tổng Số Người Dùng</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Item End -->

        <!-- Card Item Start -->
        <div
            class="flex justify-center rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default"
        >
            <div class="text-center">
                <div class="flex justify-center">
                    <div
                        class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="text-secondary-700 size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75"/>
                        </svg>

                    </div>
                </div>
                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4
                            class="text-title-md font-bold text-black"
                        >
                            {{ $exercises }}
                        </h4>
                        <span class="text-sm font-medium">Tổng Số Bài Tập</span>
                    </div>

                    <span
                        class="flex items-center gap-1 text-sm font-medium text-meta-3"
                    >
                  </span>
                </div>
            </div>
        </div>
        <!-- Card Item End -->

        <!-- Card Item Start -->
        <div
            class="flex justify-center rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default "
        >
            <div class="text-center">
                <div class="flex justify-center">
                    <div
                        class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary-700 size-6" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4
                            class="text-title-md font-bold text-black"
                        >
                            {{ $totalProducts }}
                        </h4>
                        <span class="text-sm font-medium">Tổng Lớp Đang Tồn Tại</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Item End -->
        <!-- Card Item Start -->
        <div
            class="flex justify-center rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default"
        >
            <div class="text-center">
                <div class="flex justify-center">
                    <div
                        class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6 text-secondary-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z"/>
                        </svg>

                    </div>
                </div>
                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4
                            class="text-title-md font-bold text-black"
                        >
                            {{ $orders }}
                        </h4>
                        <span class="text-sm font-medium">Tổng Doanh Thu</span>
                    </div>

                    <span
                        class="flex items-center gap-1 text-sm font-medium text-meta-3"
                    >
                  </span>
                </div>
            </div>
        </div>
        <!-- Card Item End -->
    </div>
    <div
        class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5"
    >
        <div
            class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default sm:px-7.5 xl:col-span-12"
        >
            <div class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap">
                <div class="flex w-full flex-wrap gap-3 sm:gap-5">
                    <div class="flex min-w-47.5">
        <span
            class="mr-2 mt-1 flex h-4 w-full max-w-4 items-center justify-center rounded-full border border-secondary"
        >
          <span
              class="block h-2.5 w-full max-w-2.5 rounded-full bg-secondary"
          ></span>
        </span>
                        <div class="w-full">
                            <p class="font-semibold text-secondary">Tổng Doanh Số</p>
                        </div>
                    </div>
                </div>

                <div class="flex w-full max-w-45 justify-end">
                    <div
                        class="inline-flex items-center rounded-md bg-whiter p-1.5 dark:bg-meta-4"
                    >
<!--                        <button-->
<!--                            class="rounded bg-white px-3 py-1 text-xs font-medium text-black shadow-card hover:bg-white hover:shadow-card dark:bg-boxdark dark:text-white dark:hover:bg-boxdark"-->
<!--                        >-->
<!--                            Day-->
<!--                        </button>-->
                        <button
                            id="month_btn_chart"
                            class="rounded bg-white px-3 py-1 text-xs font-medium text-dark hover:bg-secondary hover:shadow-card hover:text-white"
                        >
                            Tháng
                        </button>
                        <button
                            id="year_btn_chart"
                            class="rounded px-3 py-1 text-xs font-medium text-black hover:bg-secondary hover:shadow-card hover:text-white"
                        >
                            Năm
                        </button>
                    </div>
                </div>
            </div>
            <div>
                <div id="chartOne" class="-ml-5"></div>
            </div>
        </div>
        <div class="col-span-12 xl:col-span-12">
            <div
                class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default sm:px-7.5 xl:pb-1"
            >
                <h4 class="mb-6 text-xl font-bold text-black dark:text-white">
                    Tổng Số Lớp Có Nhiều Học Sinh Nhất
                </h4>

                <div class="flex flex-col">
                    <div
                        class="grid grid-cols-3 rounded-sm bg-gray-2 dark:bg-meta-4 sm:grid-cols-6"
                    >
                        <div class="p-2.5 xl:p-5">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">#</h5>
                        </div>
                        <div class="p-2.5 text-center xl:p-5">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">Lớp</h5>
                        </div>
                        <div class="p-2.5 text-center xl:p-5 col-span-2">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">Giảng Viên</h5>
                        </div>
                        <div class="hidden p-2.5 text-center sm:block xl:p-5">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">Số Lượng Học Sinh</h5>
                        </div>
                        <div class="hidden p-2.5 text-center sm:block xl:p-5">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">Tổng Tiền</h5>
                        </div>
                    </div>

                    <div
                        class="grid grid-cols-3 border-b border-stroke sm:grid-cols-6"
                    >
                        @foreach($listClassrooms as $classroom )

                        <div class="flex items-center p-2.5">
                            <p class="font-medium text-black dark:text-white">{{ $classroom['id'] }}</p>
                        </div>

                        <div class="flex items-center justify-center p-2.5 xl:p-5">
                            <p class="font-medium text-black dark:text-white">{{ $classroom['title'] }}</p>
                        </div>

                        <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5 col-span-2">
                            <p class="font-medium text-black dark:text-white">{{ $classroom['teacher'] }}</p>
                        </div>

                        <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                            <p class="font-medium text-meta-5">{{ $classroom['total_users'] }}</p>
                        </div>

                        <div class="flex items-center justify-center p-2.5 xl:p-5">
                            <p class="font-medium text-meta-3">{{ $classroom['total_orders'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        const apiUrl = '{{ route('admin.chart-revenue') }}';
    </script>
    @push('scripts')
        @vite('resources/js/admin/chart.js')
    @endpush
</x-admin.layouts.app>
