@props(['classrooms','user'])
<div id="hs-vertically-centered-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-4xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto ">
            <div class="flex justify-between items-center py-3 px-4 border-b">
                <h3 class="font-bold text-gray-800 ">
                    Danh Sách Các Khoá Học
                </h3>
                <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-vertically-centered-modal">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg  w-full">
                    <div class="grid items-center justify-center grid-cols-1 mb-4 xl:gap-4 xl:grid-cols-3">
                        @if($classrooms->isNotEmpty() && auth()->user())
                        @foreach($classrooms as $class)
                        @if(!$user->classrooms->contains($class->id))
                        <div
                            class="relative grid grid-cols-1 mb-4 transition duration-300 border-2 rounded-lg h-54 bg-gray-50 hover:shadow-md hover:shadow-gray-600/50">
                            <div class="relative">
                                <div class="relative flex w-full border-b-2 border-gray-200 rounded-lg h-18">
                                    <img src="{{ Vite::asset('resources/images/pattern/math.jpg') }}"
                                         class="object-cover w-full h-full rounded-t-md" alt="Classroom Logo"/>
                                    <div
                                        class="absolute inset-0 flex items-center justify-center text-2xl font-bold text-[#5AB2FF]">
                                        {{ $class->title }} {{ $class->grade }}
                                    </div>
                                </div>
                                <div class="relative flex-1">
                                    <div
                                        class="absolute w-[2.8rem] h-[2.8rem] lg:w-[4rem] lg:h-[4rem] overflow-hidden border-2 border-white rounded-full lg:top-[-2.2rem] top-[-1.2rem]  right-4  bg-[#5AB2FF]">
                                        <div
                                            class="absolute inset-0 flex items-center justify-center text-3xl font-bold text-[#FFF9D0]">
                                            GV
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-3 text-gray-800">
                                <div class="flex items-center mt-2">
                                    <h2 class="text-xl font-semibold mr-1 flex justify-center ">{{ $class->teacher->name
                                        }}</h2>
                                    @if($class->status == \App\Enums\ClassroomStatusEnum::ACTIVE)
                                    <div
                                        class="rounded-full border flex justify-center items-center bg-green-500 p-1"></div>
                                    @elseif($class->status == \App\Enums\ClassroomStatusEnum::PENDING)
                                    <div
                                        class="rounded-full border flex justify-center items-center bg-yellow-500 p-1"></div>
                                    @endif
                                </div>
                                <p class="mt-2 text-sm">
                                    Thời gian : 20:00 - 21:00
                                </p>
                                <p class="mt-2 text-sm">
                                    {{ $class->title }} {{ $class->grade }}
                                </p>
                            </div>
                            <div class="pb-3 ml-3">
                                <a href="{{ route('checkout', $class->id) }}"
                                   class="rounded-xl border w-1/3 flex justify-center items-center mt-2 py-1 bg-blue-500 hover:bg-blue-600">
                                    <p class="text-sm text-gray-50">Tham gia</p>
                                </a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
