@props(['classroom'])
<div class="h-auto mb-6 border shadow-md rounded-xl">
    <button id="notifyBtn"
            class="xl:flex hidden items-center justify-start w-full h-16 border rounded-xl hover:bg-gray-100 hover:text-blue-400 p-4">
        <div
            class="mr-4 w-[2.2rem] h-[2.2rem] lg:w-[2.8rem] lg:h-[2.8rem] overflow-hidden border-2 border-white rounded-full lg:top-[-2.2rem] top-[-1.2rem] bg-[#5AB2FF] flex justify-center items-center">
            <div class="inset-0 flex items-center justify-center text-xl font-bold text-[#FFF9D0]">
                GV
            </div>
        </div>
        <p class="text-sm text-gray-500 hover:text-blue-400">Thông báo nội dung nào đó cho lớp học của bạn</p>
    </button>
    <button id="notifyBtn" data-hs-overlay="#hs-modal-create"
            class="xl:hidden flex items-center justify-start w-full h-16 border rounded-xl hover:bg-gray-100 hover:text-blue-400 p-4">
        <p class="text-sm text-gray-500 hover:text-blue-400">Thông báo nội dung nào đó cho lớp học của bạn</p>
    </button>
    <form action="{{ route('notification.store', $classroom->id ) }}" method="POST" id="notify" enctype="multipart/form-data"
              class="hidden w-full p-4 bg-white shadow-lg rounded-xl">
        @csrf
        <label for="content" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tiêu đề</label>
        <textarea name="content" id="content" class="w-full p-2 mb-4 border-2 rounded border-b-blue-600" rows="4">

        </textarea>
        <div class="flex items-center justify-between w-full">
            <div class="flex space-x-2">
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Đăng</button>
                <button type="reset" id="cancelBtn" class="px-4 py-2 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">Huỷ
                </button>
            </div>
        </div>
    </form>
</div>
<div id="hs-modal-create"
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
                        data-hs-overlay="#hs-modal-create">
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
                    <form action="{{ route('notification.store', $classroom->id ) }}" method="POST" id="notify" enctype="multipart/form-data"
                          class="w-full p-4 bg-white shadow-lg rounded-xl">
                        @csrf
                        <label for="content" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tiêu đề</label>
                        <textarea name="content" id="content" class="w-full p-2 mb-4 border-2 rounded border-b-blue-600" rows="4">

                            </textarea>
                        <div class="flex space-x-2">
                            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Đăng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
