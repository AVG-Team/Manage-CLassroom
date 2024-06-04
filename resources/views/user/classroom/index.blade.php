<x-classroom.layouts.app>
    <div class="p-4 sm:ml-56 lg:ml-80">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
            <div class="grid items-center justify-center grid-cols-1 mb-4 xl:gap-4 xl:grid-cols-3">
                @for($i = 0; $i < 10; $i++)
                    <a href="#" class="relative grid grid-cols-1 mb-4 transition duration-300 border-2 rounded-lg h-52 bg-gray-50 hover:shadow-md hover:shadow-gray-600/50">
                        <div class="relative">
                            <div class="relative flex w-full border-b-2 border-gray-200 rounded-lg h-18">
                                <img src="{{ asset('storage/img/pattern/math.jpg') }}" class="object-cover w-full h-full rounded-t-md" alt="Classroom Logo" />
                                <div class="absolute inset-0 flex items-center justify-center text-2xl font-bold text-[#5AB2FF]">
                                    Toán
                                </div>
                            </div>
                            <div class="relative flex-1">
                                <div class="absolute w-[2.8rem] h-[2.8rem] lg:w-[4.5rem] lg:h-[4.5rem] overflow-hidden border-2 border-white rounded-full lg:top-[-2.2rem] top-[-1.2rem]  right-4 bg-[#FFF9D0]">
                                    <div class="absolute inset-0 flex items-center justify-center text-4xl font-bold text-[#5AB2FF]">
                                        N
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-3 text-gray-800">
                            <h2 class="text-xl font-semibold">Nguyễn Văn N</h2>
                            <p class="mt-2 text-sm">
                                Thời gian : 20:00 - 21:00
                            </p>
                            <p class="mt-2 text-sm">
                                Toán lớp 12
                            </p>
                        </div>
                    </a>
                @endfor
                
            </div>
        </div>
    </div>
</x-classroom.layouts.app>