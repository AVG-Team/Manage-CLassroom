<x-user.layout.app>
    @section('title', 'Trang Chủ - ' . config('app.name'))
    <!-- banner -->
    <x-user.layout.partials.banner/>
    <!-- end banner -->

    <div class="mt-94 xl:mt-20 xxl:mt-80">
        <div class="flex justify-center items-start rounded-lg border-b-2 border-gray-200 border-dashed mx-21 mb-2 pb-1">
            <p class="text-blue-600 text-3xl font-medium">Danh Sách Các Khoá Học</p>
        </div>
        <div class="flex flex-col w-full justify-start px-22 pb-5">
            <div class="container w-full flex justify-start mt-2 items-center">

                <div class="rounded-full border flex justify-center items-center bg-green-500 p-1"></div>
                <p class="text-gray-700 text-md font-medium ml-2">Đang hoạt động</p>

                <div class="rounded-full border flex justify-center items-center bg-yellow-500 p-1 ml-2 "></div>
                <p class="text-gray-700 text-md font-medium ml-2">Đang chờ</p>

            </div>
        </div>
        <div class="flex w-full justify-center px-20 pb-5">
            <div class="container w-full flex justify-center">
                <div class="p-5 border-2 border-gray-200 border-dashed rounded-lg mt-2 w-full">
                    <div class="grid items-center justify-center grid-cols-1 mb-4 xl:gap-4 xl:grid-cols-3">
                        @if($classrooms->isNotEmpty() && auth()->user() )
                        @foreach($classrooms as $class)
                        @if($user->classrooms->contains($class->id))
                        <a href="{{ route('classroom.detail', $class->id) }}"
                           class="relative grid grid-cols-1 mb-4 transition duration-300 border-2 rounded-lg h-52 bg-gray-50 hover:shadow-md hover:shadow-gray-600/50">
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
                                        class="absolute w-[2.8rem] h-[2.8rem] lg:w-[4.5rem] lg:h-[4.5rem] overflow-hidden border-2 border-white rounded-full lg:top-[-2.2rem] top-[-1.2rem]  right-4  bg-[#5AB2FF]">
                                        <div
                                            class="absolute inset-0 flex items-center justify-center text-4xl font-bold text-[#FFF9D0]">
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
                                <div
                                    class="rounded-xl border w-1/3 flex justify-center items-center mt-2 py-1 bg-green-500">
                                    <p class="text-sm text-gray-50">Đã tham gia</p>
                                </div>
                            </div>
                        </a>
                        @else
                        <div
                            class="relative grid grid-cols-1 mb-4 transition duration-300 border-2 rounded-lg h-52 bg-gray-50 hover:shadow-md hover:shadow-gray-600/50">
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
</x-user.layout.app>
