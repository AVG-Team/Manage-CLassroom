<x-classroom.layouts.app :classrooms="$classrooms" :user="$user">
    <div class="p-4 sm:ml-56 lg:ml-80">
        <div class="p-4 mt-14">
            <div class="grid xl:grid-cols-5 gap-4 grid-cols-1">
                <div class="grid xl:col-span-4 border-2 border-gray-200 border-dashed rounded-lg ">
                    <div class="w-full rounded-lg max-h-full">
                        <div class="flex border-b border-blue-600 pb-4 pt-2 px-4">
                            <div class="flex-1 items-start">
                                <h1 class="text-blue-600 text-2xl font-medium mb-2">{{ $exercise->title }}</h1>
                                <p class="text-gray-500 text-sm font-normal mb-2">{{ $classroom->teacher->name}}</p>
                            </div>
                            <div class="items-end ml-4">
                                <p class="text-sm text-gray-700 font-medium">Tạo: {{
                                    $exercise->created_at->format('d') }} tháng {{ $exercise->created_at->format('m')
                                    }} </p>
                            </div>

                        </div>
                        <div class="flex items-start p-4 mt-2">
                            <p class="text-gray-700 text-sm font-medium">
                                {!! nl2br(e($exercise->description)) !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="grid col-span-1">
                    <div class="grid gap-2">
                        @if(auth()->user()->role == \App\Enums\UserRoleEnum::USER)
                        <div class="bg-white rounded-xl h-40 shadow-md border p-3">
                            <div class="flex justify-center p-3">
                                <h1 class="text-md font-medium text-gray-700">
                                    Bài Tập Của Bạn
                                </h1>
                            </div>
                            @if($exercise->name_file_upload != null)
                            <div class="flex justify-center items-center rounded border border-dashed mb-2 p-2">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-5 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                                    </svg>
                                    <p class="text-blue-600 text-sm "> {{ $exercise->name_file_upload }} </p>
                                </div>
                            </div>
                            @endif
                            <div class="flex justify-center items-center">

                                <a href="{{ asset('storage/exercises/' . $exercise->name_file_upload) }}"
                                   download="{{ $exercise->name_file_upload }}"
                                   class="flex justify-center items-center rounded-md border w-full py-2 hover:bg-gray-50 text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-4 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                                    </svg>
                                    <p class="text-blue-600 text-xs">Tải xuống </p>
                                </a>

                            </div>
                        </div>
                        <div class="bg-white rounded-xl h-24 shadow-md border p-3">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                                </svg>
                                <p class="text-sm text-gray-700 ml-1">Nhận xét riêng tư</p>
                            </div>
                            <div class="flex justify-center items-center mt-4">
                                <button
                                    class="flex justify-center items-center rounded-md border w-full py-2 hover:bg-gray-50 text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 4.5v15m7.5-7.5h-15"/>
                                    </svg>
                                    <p class="text-blue-600 text-xs">Thêm nhận xét</p>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if(auth()->user()->role == \App\Enums\UserRoleEnum::TEACHER)
                        <div class="bg-white rounded-xl h-60 shadow-md border p-3">
                            <div class="flex justify-center p-3">
                                <h1 class="text-md font-medium text-gray-700">
                                    Chỉnh sửa bài tập
                                </h1>
                            </div>
                            @if($exercise->name_file_upload != null)
                            <div class="flex justify-center items-center rounded border border-dashed mb-2 p-2 h-30">
                                <div class="flex items-center h-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-5 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                                    </svg>
                                    <p class="text-blue-600 text-sm "> {{ $exercise->name_file_upload }} </p>
                                </div>
                            </div>
                            @endif
                            <div class="flex justify-center items-center">
                                <button type="button" data-hs-overlay="#hs-medium-modal"
                                        class="flex justify-center items-center rounded-md border w-full py-2 hover:bg-gray-50 text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-4 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75"/>
                                    </svg>
                                    <p class="text-blue-600 text-xs">Chỉnh sửa </p>
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="hs-medium-modal"
         class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 ">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700 w-full">
                    <h3 class="font-bold text-gray-800 dark:text-white">
                        Chỉnh sủa bài tập
                    </h3>
                    <button type="button"
                            class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700"
                            data-hs-overlay="#hs-medium-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-4 overflow-y-auto flex justify-center">
                    <div class="  w-full rounded-lg border border-gray-200 bg-white p-4 shadow-sm  sm:p-6  lg:p-8">
                        <form method="POST" action="{{ route('exercise.update', $exercise->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-6 grid grid-cols-2 gap-4">
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tiêu đề</label>
                                    <input type="text" id="title" name="title"
                                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500"
                                           placeholder="Nguyễn Văn A" value="{{ old('title', $exercise->title) }}" required/>
                                    @error('title')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-2 sm:col-span-1">
                                    <label for="uploadFile" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tải tài liệu</label>
                                    <input type="file" id="uploadFile" name="uploadFile"
                                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500"/>
                                    @error('uploadFile')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="description" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Mô tả</label>
                                <textarea id="description" name="description"
                                          class="block w-full h-32 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500"
                                          placeholder="Toán 12">{{ old('description', $exercise->description) }}</textarea>
                                @error('description')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                                <button type="submit"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Lưu thay đổi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-classroom.layouts.app>
