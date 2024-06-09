@props(['classroom'])
<div class="h-auto mb-2 border rounded-xl">
    <div class="p-4 border-b-2 border-blue-600 mb-3">
        <h1 class="text-blue-600 text-lg font-medium"> Giáo Viên </h1>
    </div>
    <div class="flex items-center w-full p-4 bg-white hover:bg-gray-100 mb-10">
        <div class="flex-shrink-0">
            <div class="flex items-center justify-center w-12 h-12 text-white rounded-full">
                <div
                    class="w-[2.2rem] h-[2.2rem] lg:w-[2.8rem] lg:h-[2.8rem] overflow-hidden border-2 border-white rounded-full lg:top-[-2.2rem] top-[-1.2rem] bg-[#5AB2FF] flex justify-center items-center">
                    <div class="inset-0 flex items-center justify-center text-xl font-bold text-[#FFF9D0]">
                        GV
                    </div>
                </div>
            </div>
        </div>
        <div class="items-start flex-1 ml-4">
            <p class="text-sm text-gray-700 font-medium">{{ $classroom->teacher->name }}</p>
        </div>
    </div>
    <div class="p-4 border-b-2 border-blue-600 mb-3">
        <h1 class="text-blue-600 text-lg font-medium"> Học Sinh </h1>
    </div>
    @foreach($classroom->users as $user)
        <div class="flex items-center w-full p-4 bg-white hover:bg-gray-100 border-b ">
            <div class="flex-shrink-0">
                <div class="flex items-center justify-center w-12 h-12 text-white rounded-full">
                    <div
                        class="w-[2.2rem] h-[2.2rem] lg:w-[2.8rem] lg:h-[2.8rem] overflow-hidden border-2 border-white rounded-full lg:top-[-2.2rem] top-[-1.2rem] bg-[#FFF9D0] flex justify-center items-center">
                        <div class="inset-0 flex items-center justify-center text-xl font-bold text-[#5AB2FF]">
                            HS
                        </div>
                    </div>
                </div>
            </div>
            <div class="items-start flex-1 ml-4">
                <p class="text-sm text-gray-700 font-medium">{{ $user->name }}</p>
            </div>
        </div>
    @endforeach
</div>

