@props(['exercises','classroom'])
@if(auth()->user()->role == \App\Enums\UserRoleEnum::TEACHER)
<div class="flex justify-start items-center gap-x-2 py-3  border-t dark:border-neutral-700">
    <button type="submit" data-hs-overlay="#hs-modal"
            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        Tạo bài tập
    </button>
</div>
@endif

@foreach($exercises as $exercise)
<div class="h-auto mb-2 border rounded-xl">
    <div class="exerciseBtn flex items-center w-full p-4 bg-white shadow-md rounded-xl hover:bg-gray-100 border-b">
        <div class="flex-shrink-0">
            <div class="flex items-center justify-center w-12 h-12 text-white bg-gray-400 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
            </div>
        </div>
        <div class="items-start flex-1 ml-4">
            <p class="text-sm text-gray-700">{{ $exercise->title }}</p>
        </div>
        <div class="items-end ml-4">
            <p class="text-xs text-gray-400">Tạo: {{
                $exercise->created_at->format('d') }} tháng {{ $exercise->created_at->format('m') }}</p>
        </div>
    </div>
    <div class=" description items-center w-full p-4 bg-white shadow-md rounded-b-xl hidden">
        <div class="items-start flex-1  border-b mb-3 p-2">
            <p class="text-sm text-gray-700 font-medium">  {!! nl2br(e($exercise->description)) !!}</p>
        </div>
        <a href="{{ route('exercise', $exercise->id ) }}" class="text-blue-600 no-underline font-medium text-md p-2 hover:bg-blue-100 rounded-xl">Xem hưỡng dẫn  </a>
    </div>
</div>
@endforeach

<div id="hs-modal"
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
                        data-hs-overlay="#hs-modal">
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
                    <form method="POST" action="{{ route('exercise.store', $classroom->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6 grid grid-cols-2 gap-4">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tiêu đề</label>
                                <input type="text" id="title" name="title"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500"
                                       placeholder="Nguyễn Văn A"  required/>
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
                                      placeholder="Toán 12">

                            </textarea>
                            @error('description')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t ">
                            <button type="submit"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Tạo bài tập
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
