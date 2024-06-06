<x-classroom.layouts.app>
    <div class="p-4 sm:ml-56 lg:ml-80">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
            <div class="grid items-center justify-center grid-cols-1 mb-4 xl:gap-4 xl:grid-cols-3">
                @if($user)
                @if($user->classrooms->isNotEmpty())
                @foreach($user->classrooms as $class)
                <a href="{{ route('classroom.detail', $class->id) }}"
                   class="relative grid grid-cols-1 mb-4 transition duration-300 border-2 rounded-lg h-52 bg-gray-50 hover:shadow-md hover:shadow-gray-600/50">
                    <div class="relative">
                        <div class="relative flex w-full border-b-2 border-gray-200 rounded-lg h-18">
                            <img src="{{ Vite::asset('resources/images/pattern/math.jpg') }}"
                                 class="object-cover w-full h-full rounded-t-md" alt="Classroom Logo"/>
                            <div
                                class="absolute inset-0 flex items-center justify-center text-2xl font-bold text-[#5AB2FF]">
                                {{ $class->title }}
                            </div>
                        </div>
                        <div class="relative flex-1">
                            <div
                                class="absolute w-[2.8rem] h-[2.8rem] lg:w-[4.5rem] lg:h-[4.5rem] overflow-hidden border-2 border-white rounded-full lg:top-[-2.2rem] top-[-1.2rem]  right-4 bg-[#FFF9D0]">
                                <div
                                    class="absolute inset-0 flex items-center justify-center text-4xl font-bold text-[#5AB2FF]">
                                    N
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-3 text-gray-800">
                        @if ($class->teachers->isNotEmpty())
                        <h2 class="text-xl font-semibold">{{ $class->teachers->first()->name }}</h2>
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
                @else
                <div class="text-red-500">
                    <p>Không có lớp học nào</p>
                </div>
                @endif
            </div>
        </div>
        <div id="default-modal" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full p-4">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Terms of Service
                        </h3>
                        <button type="button"
                                class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 space-y-4 md:p-5">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            With less than a month to go before the European Union enacts new consumer privacy laws for
                            its citizens, companies around the world are updating their terms of service agreements to
                            comply.
                        </p>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May
                            25 and is meant to ensure a common set of data rights in the European Union. It requires
                            organizations to notify users as soon as possible of high-risk data breaches that could
                            personally affect them.
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                        <button data-modal-hide="default-modal" type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            I accept
                        </button>
                        <button data-modal-hide="default-modal" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Decline
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <x-classroom.layouts.partials.footer/>
        <!-- End Footer -->
    </div>
</x-classroom.layouts.app>
