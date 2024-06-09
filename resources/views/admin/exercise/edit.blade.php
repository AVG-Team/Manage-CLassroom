<x-admin.layouts.app>
    @push("styles")
        <style>
            input {
                outline: none;
            }

            textarea {
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
        {{ Breadcrumbs::render('admin.exercises.edit', $exercise->id) }}
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
                        Thông tin bài tập
                    </h3>
                </div>
                <form action="">
                    <div class="p-6.5">
                        <div class="mb-4.5">
                            <label
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Tiêu Đề <span class="text-meta-1">*</span>
                            </label>
                            <input
                                value="{{ old('title') ?: $exercise->title }}"
                                name="title"
                                type="text"
                                placeholder="Nhập Tiêu Đề Bài Tập"
                                disabled
                                class="{{ $errors->has('title') ? "check-input-error" : "" }} bg-gray-200 w-full rounded border-[1.5px] border-stroke px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                            />

                            @if($errors->has('title'))
                                <p class="text-red-500 mt-2 text-sm">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                        <div class="mb-4.5">
                            <label for="description"
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Mô Tả <span class="text-meta-1">*</span>
                            </label>
                            <textarea id="description" name="description" disabled
                                      class="{{ $errors->has('description') ? "check-input-error" : "" }} py-3 px-4 block w-full border-solid border border-gray-200 bg-gray-200 rounded-lg text-sm focus:border-secondary focus:ring-blue-500 disabled:pointer-events-none" rows="3" placeholder="Nhập Mô Tả Bài Tập"
                            >{{ $exercise->description }}</textarea>

                            @if($errors->has('description'))
                                <p class="text-red-500 mt-2 text-sm">{{ $errors->first('description') }}</p>
                            @endif
                        </div>

                        <div class="mb-4.5">
                            <label
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Tên File <span class="text-meta-1">*</span>
                            </label>

                            <div class="flex rounded-lg shadow-sm">
                                <input type="text" id="name_file_upload" name="name_file_upload" value="{{ old('name_file_upload') ?: $exercise->name_file_upload }}"
                                       disabled class="{{ $errors->has('name_file_upload') ? "check-input-error" : "" }} bg-gray-200 w-full rounded border-[1.5px] border-stroke px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                                >
                                <a href="{{ Storage::url("exercises/" . $exercise->name_file_upload) }}" download class="py-[1.5rem] w-[2.875rem] h-[2.875rem] flex-shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:shadow-md hover:shadow-[#0c66ee]/50 transition duration-300 disabled:opacity-50 disabled:pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                </a>
                            </div>

                            @if($errors->has('name_file_upload'))
                                <p class="text-red-500 mt-2 text-sm">{{ $errors->first('name_file_upload') }}</p>
                            @endif
                        </div>

                        <div class="mb-4.5">
                            <label
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Giáo Viên
                            </label>
                            <input
                                value="{{ $exercise->user->name }}"
                                type="text"
                                disabled
                                class="bg-gray-200 w-full rounded border-[1.5px] border-stroke px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                            />

                            @if($exercise->user->deleted_at)
                            <p class="text-red-500 mt-2 text-sm font-medium">Người dùng đã bị xoá khỏi hệ thống</p>
                            @endif
                        </div>

                        <div class="mb-4.5">
                            <label
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Lớp Học
                            </label>
                            <input
                                value="{{ $exercise->classroom->title }}"
                                type="text"
                                disabled
                                class="bg-gray-200 w-full rounded border-[1.5px] border-stroke px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                            />
                        </div>
{{--                        <x-user.form.buttons.primary type="submit" class="w-full justify-center font-medium p-3 rounded">Tạo Người Dùng</x-user.form.buttons.primary>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin.layouts.app>
