<x-classroom.layouts.app>
    <div class="p-4 sm:ml-56 lg:ml-80">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
            <div class="grid grid-cols-5 gap-4">
                <div class="grid col-span-4">
                    <div class="w-full rounded-lg max-h-full">
                        <div class="flex border-b border-blue-600 pb-4 pt-2 px-4">
                            <div class="flex-1 items-start">
                                <h1 class="text-blue-600 text-2xl font-medium mb-2">Ngày 4/6</h1>
                                <p class="text-gray-500 text-sm font-normal mb-2">Nguyễn Thanh Tùng •
                                    4 thg 6 (Đã chỉnh sửa 4 thg 6)</p>
                                <p class="text-gray-700 text-sm font-medium">100 điểm </p>

                            </div>
                            <div class="items-end ml-4">
                                <p class="text-sm text-gray-700 font-medium">Đến hạn 21:30 4/6</p>
                            </div>

                        </div>
                        <div class="flex items-start p-4 mt-2 border-b-2 border-gray-300">
                            <p class="text-gray-700 text-md font-normal">
                                Tạo 2 entity gồm <br/>
                                User: ID, username (U), email(U), password,firstName, lastName, birthDay, isDeleted(bool). Role <br/>
                                Role: role_id, role_name<br/>
                                User n -1 Role<br/>
                                Thực hiện CRUD và các form ( có bootstrap) cho 2 entity<br/>
                                yêu cầu: upload code lên github và nộp link github<br/>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="grid col-span-1">
                    <div class="grid gap-2">
                        <div class="bg-white rounded-xl h-32 shadow-md border p-3">
                            <div class="flex justify-center p-3">
                                <h1 class="text-md font-medium text-gray-700">
                                    Bài Tập Của Bạn
                                </h1>
                            </div>
                            <div class="flex justify-center items-center mt-4">
                                <button class="flex justify-center items-center rounded-md border w-full py-2 hover:bg-gray-50 text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    <p class="text-blue-600 text-xs">Thêm hoăc tạo</p>
                                </button>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl h-24 shadow-md border p-3">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                <p class="text-sm text-gray-700 ml-1">Nhận xét riêng tư</p>
                            </div>
                            <div class="flex justify-center items-center mt-4">
                                <button class="flex justify-center items-center rounded-md border w-full py-2 hover:bg-gray-50 text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    <p class="text-blue-600 text-xs">Thêm nhận xét</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-classroom.layouts.app>
