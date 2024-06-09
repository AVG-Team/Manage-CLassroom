<!-- Sidebar -->
<div id="docs-sidebar" class="z-99 hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-white border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 lg:static ">
    <div class="px-6">
        <img src="{{ Vite::asset("resources/images/logo.png") }}" alt="Logo">
    </div>
    <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap">
        <ul class="space-y-1.5">
            <li class="hs-accordion {{ Request::routeIs('admin.home') ? 'active' : '' }} ">
                <a class="hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-200" href="{{ route("admin.home") }}">
                    <svg class="size-4 " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Trang Chủ
                </a>
            </li>

            <li class="hs-accordion {{ Request::routeIs('admin.users.*') ? 'active' : '' }}">
                <button type="button" class="hs-accordion-toggle hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-200">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>

                    <p>Quản Lý Người Dùng</p>

                    <svg class="hs-accordion-active:block ms-auto hidden size-4 text-gray-600 group-hover:text-gray-500 " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>

                    <svg class="hs-accordion-active:hidden ms-auto block size-4 text-gray-600 group-hover:text-gray-500 " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>

                <div class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 {{ Request::routeIs('admin.users.*') ? '' : 'hidden' }}">
                    <ul class="hs-accordion-group ps-3 pt-2">
                        <li class="hs-accordion {{ request()->routeIs('admin.users.index') && !request()->has('filter_type') ? 'active' : '' }}">
                            <a class="hs-accordion-toggle hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-200"
                               href="{{ route("admin.users.index") }}"
                            >
                                Quản Lý Tất Cả
                            </a>
                        </li>
                        <li class="hs-accordion {{ request()->routeIs('admin.users.index') && request()->get('filter_type') == '0' ? 'active' : '' }}">
                            <a href="{{ route("admin.users.index") . "?filter_type=0" }}"
                               class="hs-accordion-toggle hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-200">
                                <p>Quản Lý Học Sinh</p>
                            </a>
                        </li>
                        <li class="hs-accordion {{ request()->routeIs('admin.users.index') && request()->get('filter_type') == 1 ? 'active' : '' }}">
                            <a href="{{ route("admin.users.index") . "?filter_type=1" }}" class="hs-accordion-toggle hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-200">
                                <p>Quản Lý Giáo Viên</p>
                            </a>
                        </li>
                        @if(auth()->user()->key_role == \App\Enums\UserRoleEnum::ADMIN)
                            <li class="hs-accordion {{ request()->routeIs('admin.users.index') && request()->get('filter_type') == 2 ? 'active' : '' }}">
                                <a href="{{ route("admin.users.index") . "?filter_type=2" }}" class="hs-accordion-toggle hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-200">
                                    <p>Quản Lý Nhân Viên</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </li>

            <li class="hs-accordion {{ Request::routeIs('admin.classrooms.*') || Request::routeIs('admin.exercises.*') || Request::routeIs('admin.users-subscribed.*') || Request::routeIs('admin.subject.*') ? 'active' : '' }}" id="class-manage">
                <button type="button" class="hs-accordion-toggle hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium w-full text-start flex items-center py-2 text-sm text-gray-700 rounded-lg hover:bg-gray-200">
                    <svg class="size-5 ml-2 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>

                    Quản Lý Lớp Học

                    <svg class="hs-accordion-active:block ml-9 hidden size-4 text-gray-600 group-hover:text-gray-500 " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>

                    <svg class="hs-accordion-active:hidden ml-9 block size-4 text-gray-600 group-hover:text-gray-500 " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>

                <div id="class-manage" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 {{ Request::routeIs('admin.classrooms.*') || Request::routeIs('admin.exercises.*') || Request::routeIs('admin.users-subscribed.*') || Request::routeIs('admin.subject.*') ? '' : 'hidden' }}">
                    <ul class="pt-2 ps-2">
                        <li class="hs-accordion {{ Request::routeIs('admin.classrooms.*') ? 'active' : '' }}">
                            <a class="hs-accordion-toggle hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-200" href="{{ route('admin.classrooms.index') }}">
                                Quản Lý Lớp
                            </a>
                        </li>
                        <li class="hs-accordion {{ Request::routeIs('admin.exercises.*') ? 'active' : '' }}">
                            <a class="hs-accordion-toggle hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-200" href="{{ route('admin.exercises.index') }}">
                                Quản Lý Bài Tập
                            </a>
                        </li>
                        <li class="hs-accordion {{ Request::routeIs('admin.users-subscribed.*') ? 'active' : '' }}">
                            <a class="hs-accordion-toggle hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-200" href="{{ route('admin.users-subscribed.index') }}">
                                Quản Lý Học Sinh Của Lớp Học
                            </a>
                        </li>

                        <li class="hs-accordion {{ Request::routeIs('admin.subject.*') ? 'active' : '' }}">
                            <a class="hs-accordion-toggle hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-200" href="{{ route('admin.subject.index') }}">
                                Quản Lý Môn Học
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="hs-accordion {{ Request::routeIs('admin.salaries.*') || Request::routeIs('admin.default-salary.*') ? 'active' : '' }}" id="salary-manage">
                <button type="button" class="hs-accordion-toggle hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium w-full text-start flex items-center py-2 text-sm text-gray-700 rounded-lg hover:bg-gray-200">
                    <svg class="size-5 mr-3 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>

                    Quản Lý Lương

                    <svg class="hs-accordion-active:block ml-9 hidden size-4 text-gray-600 group-hover:text-gray-500 " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>

                    <svg class="hs-accordion-active:hidden ml-9 block size-4 text-gray-600 group-hover:text-gray-500 " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>

                <div id="class-manage" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 {{ Request::routeIs('admin.salaries.*') || Request::routeIs('admin.default-salary.*') ? '' : 'hidden' }}">
                    <ul class="pt-2 ps-2">
                        <li class="hs-accordion {{ Request::routeIs('admin.salaries.*') ? 'active' : '' }}">
                            <a class="hs-accordion-toggle hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-200" href="{{ route('admin.salaries.index') }}">
                                Quản Lý Lương
                            </a>
                        </li>
                        <li class="hs-accordion {{ Request::routeIs('admin.default-salary.*') ? 'active' : '' }}">
                            <a class="hs-accordion-toggle hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-200" href="{{ route('admin.default-salary.index') }}">
                                Quản Lý Lương Cơ bản
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="hs-accordion {{ Request::routeIs('admin.orders.*') ? 'active' : '' }} ">
                <a class="hs-accordion-active:text-secondary hs-accordion-active:hover:bg-transparent hs-accordion-active:font-medium w-full text-start flex items-center py-2 text-sm text-gray-700 rounded-lg hover:bg-gray-200" href="{{ route("admin.orders.index") }}">
                    <svg class="size-5 ml-2 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>
                    Quản Lý Đơn Hàng
                </a>
            </li>

            <li><a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-200" href="#">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>
                    Lịch Học
                </a></li>
        </ul>
    </nav>
</div>
<!-- End Sidebar -->
