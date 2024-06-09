<x-admin.layouts.app>
    @push("styles")
        <style>
            input {
                outline: none;
            }

            .check-input-error {
                border-color: red;
            }
        </style>
    @endpush
    @section('title', $title)
    @section('title-content', $contentTitle)
    @section('breadcrumbs')
        {{ Breadcrumbs::render('admin.users-subscribed.create') }}
    @endsection
    <div>
        <div class="flex flex-col gap-9">
            <!-- Contact Form -->
            <div
                class="rounded-xl border border-stroke bg-white shadow-default"
            >
                <div
                    class="border-b border-stroke px-6.5 py-4"
                >
                    <h3 class="font-medium text-black">
                        Thông Tin Cá Nhân
                    </h3>
                </div>
                <form action="{{ route("admin.users-subscribed.store") }}" method="post">
                    @csrf
                    <div class="p-6.5">
                        <div class="mb-4.5">
                            <label
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Mã Học Sinh <span class="text-meta-1">*</span>
                            </label>
                            <div>
                                <!-- SearchBox -->
                                <div class="relative" data-hs-combo-box='{
                                    "isOpenOnFocus": true,
                                    "apiUrl": "{{ route('admin.users.get-student') }}",
                                    "outputItemTemplate": "<div data-hs-combo-box-output-item><span class=\"flex items-center cursor-pointer py-2 px-4 w-full text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100\"><div class=\" items-center w-full\"><div class=\"flex\"><div data-hs-combo-box-output-item-field=\"name\" data-hs-combo-box-search-text></div><p class=\"mx-[0.3rem]\">-</p><div data-hs-combo-box-output-item-field=\"phone\" data-hs-combo-box-search-text></div></div><div class=\"text-xs opacity-50\" data-hs-combo-box-output-item-field=\"uuid\" data-hs-combo-box-search-text data-hs-combo-box-value></div></div><span class=\"hidden hs-combo-box-selected:block\"><svg class=\"flex-shrink-0 size-3.5 text-blue-600\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg></span></span></div>",
                                    "groupingTitleTemplate": "<div class=\"text-xs uppercase text-gray-500 m-3 mb-1 \"></div>"
                                  }'>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                                            <svg class="flex-shrink-0 size-4 text-gray-400"
                                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <path d="m21 21-4.3-4.3"></path>
                                            </svg>
                                        </div>
                                        <input id="hs-combo-box-hidden" name="user_id" type="text"
                                               data-hs-combo-box-input=""
                                               class="py-3 ps-10 pe-4 block w-full border-solid border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                               placeholder="Nhập Tên Giáo Viên">
                                    </div>

                                    <!-- SearchBox Dropdown -->
                                    <div class="absolute z-50 w-full bg-white border border-gray-200 rounded-lg"
                                         style="display: none;" data-hs-combo-box-output="">
                                        <div
                                            class="max-h-72 rounded-b-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300"
                                            data-hs-combo-box-output-items-wrapper=""></div>
                                    </div>
                                    <!-- End SearchBox Dropdown -->
                                </div>
                                <!-- End SearchBox -->
                            </div>
                        </div>

                        <div class="mb-4.5">
                            <label
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Mã Lớp Học <span class="text-meta-1">*</span>
                            </label>
                            <div>
                                <!-- SearchBox -->
                                <div class="relative" data-hs-combo-box='{
                                    "isOpenOnFocus": true,
                                    "apiUrl": "{{ route('admin.classrooms.get-classroom') }}",
                                    "outputItemTemplate": "<div data-hs-combo-box-output-item><span class=\"flex items-center cursor-pointer py-2 px-4 w-full text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100\"><div class=\" items-center w-full\"><div class=\"flex\"><div data-hs-combo-box-output-item-field=\"title\" data-hs-combo-box-search-text></div></div><div class=\"text-xs opacity-50\" data-hs-combo-box-output-item-field=\"code_classroom\" data-hs-combo-box-search-text data-hs-combo-box-value></div></div><span class=\"hidden hs-combo-box-selected:block\"><svg class=\"flex-shrink-0 size-3.5 text-blue-600\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg></span></span></div>",
                                    "groupingTitleTemplate": "<div class=\"text-xs uppercase text-gray-500 m-3 mb-1 \"></div>"
                                  }'>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                                            <svg class="flex-shrink-0 size-4 text-gray-400"
                                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <path d="m21 21-4.3-4.3"></path>
                                            </svg>
                                        </div>
                                        <input id="hs-combo-box-hidden" name="code_classroom" type="text"
                                               data-hs-combo-box-input=""
                                               class="py-3 ps-10 pe-4 block w-full border-solid border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                               placeholder="Nhập Tiêu Đề Lớp Bạn">
                                    </div>

                                    <!-- SearchBox Dropdown -->
                                    <div class="absolute z-50 w-full bg-white border border-gray-200 rounded-lg"
                                         style="display: none;" data-hs-combo-box-output="">
                                        <div
                                            class="max-h-72 rounded-b-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300"
                                            data-hs-combo-box-output-items-wrapper=""></div>
                                    </div>
                                    <!-- End SearchBox Dropdown -->
                                </div>
                                <!-- End SearchBox -->
                            </div>
                        </div>

                        <div class="mb-4.5">
                            <label for="description"
                                   class="mb-3 block text-sm font-medium text-black"
                            >
                                Chú Thích Đơn <span class="text-meta-1">*</span>
                            </label>
                            <textarea id="note" name="note"
                                      class="{{ $errors->has('note') ? "check-input-error" : "" }} py-3 px-4 block w-full border-solid border border-gray-200 rounded-lg text-sm focus:border-secondary focus:ring-secondary focus:outline-secondary disabled:pointer-events-none"
                                      rows="3" placeholder="Nhập Chú Thích Hoá Đơn"
                            >{{ old('note') }}</textarea>

                            <p class="text-secondary mt-2 text-sm"><span class="text-meta-1">*</span> Khi Bạn Thêm Học Viên Sẽ Đồng Thời Tạo Đơn Mới Và Sẽ Chuyển Qua Đã Duyệt</p>

                            @if($errors->has('note'))
                                <p class="text-red-500 mt-2 text-sm">{{ $errors->first('note') }}</p>
                            @endif
                        </div>

                        <x-user.form.buttons.primary type="submit"
                                                     class="w-full justify-center font-medium p-3 rounded">Thêm Học Viên
                        </x-user.form.buttons.primary>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin.layouts.app>
