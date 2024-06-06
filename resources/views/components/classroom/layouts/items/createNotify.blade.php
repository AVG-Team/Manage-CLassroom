<div class="h-auto mb-6 border shadow-md rounded-xl">
    <button id="notifyBtn"
            class="flex items-center justify-start w-full h-16 border rounded-xl hover:bg-gray-100 hover:text-blue-400">
        <div
            class="w-[2.2rem] h-[2.2rem] lg:w-[2.8rem] lg:h-[2.8rem] overflow-hidden border-2 border-white rounded-full lg:top-[-2.2rem] top-[-1.2rem] bg-[#FFF9D0] mx-3 flex justify-center items-center">
            <div class="inset-0 flex items-center justify-center text-xl font-bold text-[#5AB2FF]">
                N
            </div>
        </div>
        <p class="text-sm text-gray-500 hover:text-blue-400">Thông báo nội dung nào đó cho lớp học của bạn</p>
    </button>
    <div id="notify" class="hidden w-full p-4 bg-white shadow-lg rounded-xl">
        <textarea class="w-full p-2 mb-4 border-2 rounded border-b-blue-600" rows="4"
                  placeholder="Thông báo nội dung nào đó cho lớp học của bạn"></textarea>
        <div class="flex items-center justify-between w-full">
            <div class="flex space-x-2">
                <button class="p-2 rounded-full hover:bg-gray-200">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M14 7l-5 5m0 0l5 5m-5-5h12m-9 5H3m0 0v-6h9m0 6v-6"></path>
                    </svg>
                </button>
                <button class="p-2 rounded-full hover:bg-gray-200">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 8h16M4 16h16"></path>
                    </svg>
                </button>
                <button class="p-2 rounded-full hover:bg-gray-200">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <button class="p-2 rounded-full hover:bg-gray-200">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </button>
                <button class="p-2 rounded-full hover:bg-gray-200">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5.121 19.364l5.657-5.657m0 0l5.657 5.657M10.778 13.707l5.657-5.657M15.121 8.364L5.121 18.364"></path>
                    </svg>
                </button>
            </div>
            <div class="flex space-x-2">
                <button class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Đăng</button>
                <button id="cancelBtn" class="px-4 py-2 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">Huỷ
                </button>
            </div>
        </div>
    </div>
</div>
