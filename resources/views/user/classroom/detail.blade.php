<x-classroom.layouts.app>
    <div class="p-4 sm:ml-56 lg:ml-80">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
            <div class="mb-4 border-b border-gray-200 shadow-lg">
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200"
                    id="default-tab" role="tablist">
                    <li class="me-2" role="presentation">
                        <button id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                aria-controls="dashboard" aria-selected="false"
                                class="inline-block xl:p-4 px-2 py-4 text-blue-600 bg-gray-100 rounded-t-lg active hover:text-gray-600 hover:bg-gray-50 ">
                            Bảng tin
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button id="exercise-tab" data-tabs-target="#exercise" type="button" role="tab"
                                aria-controls="exercise" aria-selected="false"
                                class="inline-block xl:p-4 px-2 py-4  rounded-t-lg hover:text-gray-600 hover:bg-gray-50 ">Bài tập trên
                            lớp
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button id="everyone-tab" data-tabs-target="#everyone" type="button" role="tab"
                                aria-controls="everyone" aria-selected="false"
                                class="inline-block xl:p-4 px-2 py-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">Mọi người
                        </button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="hidden p-4 rounded-lg bg-gray-50 " id="dashboard" role="tabpanel"
                     aria-labelledby="dashboard-tab">
                    <div class="grid gap-4">
                        <div class="w-full bg-blue-400 rounded-lg h-52">
                            <h1 class="text-white">Bảng tin</h1>
                        </div>
                        <div class="grid grid-cols-5 gap-3">
                            <div class="w-full p-4 bg-white rounded-lg shadow-md h-36 xl:block hidden">
                                <x-classroom.layouts.items.expireExercise/>
                            </div>
                            <div class="w-full h-auto xl:col-span-4 col-span-5">
                                <div class="w-full h-auto">
                                    <x-classroom.layouts.items.createNotify/>
                                    <x-classroom.layouts.items.exerciseNotify/>
                                    <x-classroom.layouts.items.normalNotify/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 " id="exercise" role="tabpanel"
                     aria-labelledby="exercise-tab">
                    <div class="xl:container xl:px-4 mx-auto">
                        <div class="flex flex-col">
                            @for($i = 0 ; $i < 5 ; $i++)
                                <x-classroom.layouts.items.exercise/>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 " id="everyone" role="tabpanel"
                     aria-labelledby="everyone-tab">
                    <div class="xl:container xl:px-4 mx-auto">
                        <div class="flex flex-col">
                            <x-classroom.layouts.items.members/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <x-classroom.layouts.partials.footer/>
        <!-- End Footer -->
    </div>
</x-classroom.layouts.app>
