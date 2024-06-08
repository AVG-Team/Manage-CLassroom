<x-admin.layouts.app>
    @push("styles")
        <style>
            input {
                outline: none;
            }

            .check-input-error {
                border-color: red;
            }
        </style>
    @endpush
    @section('title', $title)
    @section('title-content', $contentTitle)
    @section('breadcrumbs')
        {{ Breadcrumbs::render('admin.classrooms.create') }}
    @endsection
    <div>
        <div class="flex flex-col gap-9">
            <!-- Contact Form -->
            <div
                class="rounded-xl border border-stroke bg-white shadow-default"
            >
                <div
                    class="border-b border-stroke px-6.5 py-4"
                >
                    <h3 class="font-medium text-black">
                        Thông Tin Cá Nhân
                    </h3>
                </div>
                <form action="{{ route("admin.classrooms.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-6.5">
                        <div class="mb-4.5">
                            <label
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Tiêu Đề <span class="text-meta-1">*</span>
                            </label>
                            <input
                                value="{{ old('title') }}"
                                name="title"
                                type="text"
                                placeholder="Nhập Tiêu Đề Của Bạn"
                                class="{{ $errors->has('title') ? "check-input-error" : "" }} w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                            />

                            @if($errors->has('title'))
                                <p class="text-red-500 mt-2 text-sm">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                        <div class="mb-4.5">
                            <label
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Mã Giáo Viên <span class="text-meta-1">*</span>
                            </label>
                            <div>
                                <!-- SearchBox -->
                                <div class="relative" data-hs-combo-box='{
                                    "isOpenOnFocus": true,
                                    "apiUrl": "{{ route('admin.users.get-teacher') }}",
                                    "outputItemTemplate": "<div data-hs-combo-box-output-item><span class=\"flex items-center cursor-pointer py-2 px-4 w-full text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100\"><div class=\" items-center w-full\"><div class=\"flex\"><div data-hs-combo-box-output-item-field=\"name\" data-hs-combo-box-search-text></div><p class=\"mx-[0.3rem]\">-</p><div data-hs-combo-box-output-item-field=\"phone\" data-hs-combo-box-search-text></div></div><div class=\"text-xs opacity-50\" data-hs-combo-box-output-item-field=\"uuid\" data-hs-combo-box-search-text data-hs-combo-box-value></div></div><span class=\"hidden hs-combo-box-selected:block\"><svg class=\"flex-shrink-0 size-3.5 text-blue-600\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg></span></span></div>",
                                    "groupingTitleTemplate": "<div class=\"text-xs uppercase text-gray-500 m-3 mb-1 \"></div>"
                                  }'>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                                            <svg class="flex-shrink-0 size-4 text-gray-400"
                                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <path d="m21 21-4.3-4.3"></path>
                                            </svg>
                                        </div>
                                        <input id="hs-combo-box-hidden" name="teacher_id" type="text"
                                               data-hs-combo-box-input=""
                                               class="py-3 ps-10 pe-4 block w-full border-solid border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                               placeholder="Nhập Tên Giáo Viên">
                                    </div>

                                    <!-- SearchBox Dropdown -->
                                    <div class="absolute z-50 w-full bg-white border border-gray-200 rounded-lg"
                                         style="display: none;" data-hs-combo-box-output="">
                                        <div
                                            class="max-h-72 rounded-b-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300"
                                            data-hs-combo-box-output-items-wrapper=""></div>
                                    </div>
                                    <!-- End SearchBox Dropdown -->
                                </div>
                                <!-- End SearchBox -->
                            </div>
                        </div>

                        <div class="mb-4.5">
                            <label for="description"
                                   class="mb-3 block text-sm font-medium text-black"
                            >
                                Mô Tả <span class="text-meta-1">*</span>
                            </label>
                            <textarea id="description" name="description"
                                      class="{{ $errors->has('description') ? "check-input-error" : "" }} py-3 px-4 block w-full border-solid border border-gray-200 rounded-lg text-sm focus:border-secondary focus:ring-secondary focus:outline-secondary disabled:pointer-events-none"
                                      rows="3" placeholder="Nhập Mô Tả Lớp Học"
                            > {{ old('description') }} </textarea>

                            @if($errors->has('description'))
                                <p class="text-red-500 mt-2 text-sm">{{ $errors->first('description') }}</p>
                            @endif
                        </div>

                        <div class="mb-4.5">
                            <label
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Ảnh Bìa Lớp Học <span class="text-meta-1">*</span>
                            </label>
                            <div>
                                <label class="block">
                                    <span class="sr-only">Ảnh Bìa Lớp Học</span>
                                    <input type="file" accept="image/*" name="image"
                                           class="block w-full text-gray-600
                                                file:me-4 file:py-2 file:px-4
                                                file:rounded-lg file:border-0
                                                file:text-sm file:font-semibold
                                                file:bg-secondary file:text-white
                                                hover:file:bg-secondary-700
                                                file:disabled:opacity-50 file:disabled:pointer-events-none
                                                file:cursor-pointer
                                                dark:text-neutral-500
                                                dark:file:bg-blue-500
                                                dark:hover:file:bg-blue-400
                                              " id="image_input">
                                </label>
                                <p class="text-sm text-gray-500 mt-2" id="error_message">Chấp nhận các tệp JPG, PNG, GIF, BMP. Kích thước tệp tối đa 5MB</p>
                                <div class="mt-3 hidden" id="image_preview_parent">
                                    <p class="text-lg font-medium">Ảnh xem trước : </p>
                                    <img src="" class="h-[30vh]" id="image_preview" alt="ảnh xem trước">
                                </div>
                            </div>

                            @if($errors->has('image'))
                                <p class="text-red-500 mt-2 text-sm">{{ $errors->first('image') }}</p>
                            @endif
                        </div>
                        <div class="mb-4.5">
                            <div class="grid sm:grid-cols-2 gap-x-10">
                                <div>
                                    <label for="subject_id" class="mb-3 block text-sm font-medium text-black">
                                        Môn Học <span class="text-meta-1">*</span>
                                    </label>

                                    <div
                                        class="relative z-20 bg-white"
                                    >
                                        <select
                                            name="subject_id" id="subject_id"
                                            class="{{ $errors->has('subject_id') ? "check-input-error" : "" }} relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-secondary active:border-secondary"
                                        >
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}"
                                                        class="text-body" {{ old('subject') == $subject->id ? "selected" : "" }}>{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                        <span
                                            class="absolute right-4 top-1/2 z-10 -translate-y-1/2"
                                        >
                                          <svg
                                              width="24"
                                              height="24"
                                              viewBox="0 0 24 24"
                                              fill="none"
                                              xmlns="http://www.w3.org/2000/svg"
                                          >
                                            <g opacity="0.8">
                                              <path
                                                  fill-rule="evenodd"
                                                  clip-rule="evenodd"
                                                  d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                  fill="#637381"
                                              ></path>
                                            </g>
                                          </svg>
                                        </span>
                                    </div>
                                    @if($errors->has('subject_id'))
                                        <p class="text-red-500 mt-2 text-sm">{{ $errors->first('subject_id') }}</p>
                                    @endif
                                </div>
                                <div>
                                    <label for="grade"
                                        class="mb-3 block text-sm font-medium text-black"
                                    >
                                        Lớp Học <span class="text-meta-1">*</span>
                                    </label>

                                    <div
                                        class="relative z-20 bg-white"
                                    >
                                        <select id="grade"
                                            name="grade"
                                            class="{{ $errors->has('grade') ? "check-input-error" : "" }} relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-secondary active:border-secondary"
                                        >
                                            @for($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}"
                                                        class="text-body" {{ old('grade') == $i ? "selected" : "" }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <span
                                            class="absolute right-4 top-1/2 z-10 -translate-y-1/2"
                                        >
                                          <svg
                                              width="24"
                                              height="24"
                                              viewBox="0 0 24 24"
                                              fill="none"
                                              xmlns="http://www.w3.org/2000/svg"
                                          >
                                            <g opacity="0.8">
                                              <path
                                                  fill-rule="evenodd"
                                                  clip-rule="evenodd"
                                                  d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                  fill="#637381"
                                              ></path>
                                            </g>
                                          </svg>
                                        </span>
                                    </div>
                                    @if($errors->has('grade'))
                                        <p class="text-red-500 mt-2 text-sm">{{ $errors->first('grade') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-4.5 grid sm:grid-cols-2 gap-x-10">
                            <div>
                                <label for="capacity"
                                       class="mb-3 block text-sm font-medium text-black"
                                >
                                    Số Lượng 1 Lớp <span class="text-meta-1">*</span>
                                </label>
                                <input id="capacity"
                                       value="{{ old('capacity') }}"
                                       name="capacity"
                                       type="text"
                                       placeholder="Nhập Số Lượng 1 Lớp"
                                       class="{{ $errors->has('capacity') ? "check-input-error" : "" }} w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                                />
                                @if($errors->has('capacity'))
                                    <p class="text-red-500 mt-2 text-sm"> {{ $errors->first('capacity') }} </p>
                                @endif
                            </div>
                            <div>
                                <label for="price" class="block text-sm font-medium mb-2 dark:text-white">Giá</label>
                                <div class="relative">
                                    <input type="text" id="price" name="price" value="{{ old('price') }}" class="border-solid border py-3 pl-12 px-4 ps-9 pe-16 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="0.00">
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-4 ">
                                        <span class="text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                                        <span class="text-gray-500 dark:text-neutral-500">VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <x-user.form.buttons.primary type="submit"
                                                     class="w-full justify-center font-medium p-3 rounded">Tạo Lớp Học
                        </x-user.form.buttons.primary>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
            <script>
                const imageInput = document.getElementById('image_input');
                const imagePreview = document.getElementById('image_preview');
                const imagePreviewParent = document.getElementById('image_preview_parent');
                const errorMessage = document.getElementById('error_message');
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'];

                imageInput.addEventListener('change', function (event) {
                    const [file] = event.target.files;
                    if (file) {
                        let error = "";
                        if (!validImageTypes.includes(file.type)) {
                            error = "Vui lòng chọn một tệp ảnh hợp lệ (JPEG, PNG, GIF, BMP).";
                            errorMessage.classList.add('text-red-500')
                            errorMessage.classList.remove('text-gray-500');
                            imagePreview.src = "";
                        }

                        if (file.size > 5 * 1024 * 1024) { // 5MB
                            error = "Kích thước tệp quá lớn. Vui lòng chọn tệp nhỏ hơn 5MB.";
                            errorMessage.classList.add('text-red-500')
                            errorMessage.classList.remove('text-gray-500');
                            imagePreview.src = "";
                        }

                        if(error !== "") {
                            errorMessage.textContent = error;
                            alert(error)
                            imageInput.value = "";
                            return;
                        }

                        errorMessage.classList.add('text-gray-500')
                        errorMessage.classList.remove('text-red-500');

                        const reader = new FileReader();
                        reader.onload = function (e) {
                            imagePreview.src = e.target.result;
                            imagePreviewParent.classList.remove('hidden');
                        }
                        reader.readAsDataURL(file);
                    }
                });
            </script>
    @endpush
</x-admin.layouts.app>
