<x-classroom.layouts.app :classrooms="$classrooms" :user="$user">
    <div class="p-4 sm:ml-56 lg:ml-80">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
            <div class="grid items-center justify-center grid-cols-1 mb-4 xl:gap-4 xl:grid-cols-3">
                @if(auth()->user()->role == \App\Enums\UserRoleEnum::USER)
                    @if($user->classrooms->isNotEmpty())
                        @foreach($user->classrooms as $class)
                        <a href="{{ route('classroom.detail', $class->id) }}"
                           class="relative grid grid-cols-1 mb-4 transition duration-300 border-2 rounded-lg h-52 bg-gray-50 hover:shadow-md hover:shadow-gray-600/50">
                            <div class="relative">
                                <div class="relative flex w-full border-b-2 border-gray-200 rounded-lg h-20">
                                    <img src="{{ Vite::asset('resources/images/pattern/math.jpg') }}"
                                         class="object-cover w-full h-full rounded-t-md" alt="Classroom Logo"/>
                                    <div
                                        class="absolute inset-0 flex items-center justify-center text-2xl font-bold text-[#5AB2FF]">
                                        {{ $class->title }}
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
                                @if ($class->teacher != null)
                                <h2 class="text-xl font-semibold">{{ $class->teacher->name}}</h2>
                                @else
                                <p class="text-red-500">Không có giáo viên được liên kết</p>
                                @endif
                                <p class="mt-2 text-sm">
                                    Thời gian : 20:00 - 21:00
                                </p>
                                <p class="mt-2 text-sm">
                                    Toán lớp 12
                                </p>
                            </div>
                        </a>
                        @endforeach
                    @else
                    <div class="text-red-500">
                        <p>Không có lớp học nào</p>
                    </div>
                    @endif
                @elseif(auth()->user()->role == \App\Enums\UserRoleEnum::TEACHER)
                @if($user->teacherClassrooms->isNotEmpty())
                @foreach($user->teacherClassrooms as $class)
                <a href="{{ route('classroom.detail', $class->id) }}"
                   class="relative grid grid-cols-1 mb-4 transition duration-300 border-2 rounded-lg h-52 bg-gray-50 hover:shadow-md hover:shadow-gray-600/50">
                    <div class="relative">
                        <div class="relative flex w-full border-b-2 border-gray-200 rounded-lg h-20">
                            <img src="{{ Vite::asset('resources/images/pattern/math.jpg') }}"
                                 class="object-cover w-full h-full rounded-t-md" alt="Classroom Logo"/>
                            <div
                                class="absolute inset-0 flex items-center justify-center text-2xl font-bold text-[#5AB2FF]">
                                {{ $class->title }}
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
                        @if ($class->teacher != null)
                        <h2 class="text-xl font-semibold">{{ $class->teacher->name}}</h2>
                        @else
                        <p class="text-red-500">Không có giáo viên được liên kết</p>
                        @endif
                        <p class="mt-2 text-sm">
                            Thời gian : 20:00 - 21:00
                        </p>
                        <p class="mt-2 text-sm">
                            Toán lớp 12
                        </p>
                    </div>
                </a>
                @endforeach
                @else
                <div class="text-red-500">
                    <p>Không có lớp học nào</p>
                </div>
                @endif
                @endif
            </div>
        </div>
        <!-- Footer -->
        <x-classroom.layouts.partials.footer/>
        <!-- End Footer -->
    </div>
</x-classroom.layouts.app>
