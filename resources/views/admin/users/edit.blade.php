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
        {{ Breadcrumbs::render('admin.users.create') }}
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
                <form action="{{ route("admin.users.update", $user->uuid) }}" method="post">
                    @csrf
                    <div class="p-6.5">
                        <div class="mb-4.5">
                            <label
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Tên Của Bạn <span class="text-meta-1">*</span>
                            </label>
                            <input
                                value="{{ old('name') ?: $user->name }}"
                                name="name"
                                type="text"
                                placeholder="Nhập Tên Của Bạn"
                                class="{{ $errors->has('name') ? "check-input-error" : "" }} w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                            />

                            @if($errors->has('name'))
                                <p class="text-red-500 mt-2 text-sm">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="mb-4.5">
                            <label
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Email <span class="text-meta-1">*</span>
                            </label>
                            <input
                                value="{{ old('email') ?: $user->email }}"
                                name="email"
                                type="email"
                                placeholder="Nhập email của bạn"
                                class="{{ $errors->has('email') ? "check-input-error" : "" }} w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                            />

                            @if($errors->has('email'))
                                <p class="text-red-500 mt-2 text-sm">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="mb-4.5">
                            <div class="grid sm:grid-cols-2 gap-x-10">
                                <div>
                                    <label
                                        class="mb-3 block text-sm font-medium text-black"
                                    >
                                        Chức Vụ Người Dùng
                                    </label>

                                    <div
                                        class="relative z-20 bg-white"
                                    >
                                        @php $arrRole = auth()->user()->role == 3 ? \App\Enums\UserRoleEnum::getArrayView() : \App\Enums\UserRoleEnum::getArrayViewForStaff() @endphp
                                        <select
                                            name="role"
                                            class="{{ $errors->has('role') ? "check-input-error" : "" }} relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-secondary active:border-secondary"
                                        >
                                            @foreach($arrRole as $role => $roleValue)
                                                @php
                                                    $selectedRole = old('role') ?: $user->role;
                                                @endphp
                                                <option value="{{ $roleValue }}"
                                                        class="text-body" {{ $selectedRole == $roleValue ? "selected" : "" }}>{{ $role }}</option>
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
                                    @if($errors->has('role'))
                                        <p class="text-red-500 mt-2 text-sm">{{ $errors->first('role') }}</p>
                                    @endif
                                </div>
                                <div>
                                    <label
                                        class="mb-3 block text-sm font-medium text-black"
                                    >
                                        Giới Tính
                                    </label>
                                    <div class="flex gap-x-6 mt-5">
                                        <div class="flex">
                                            <input type="radio" name="gender"
                                                   @php $checked = old('gender') ?: $user->gender @endphp
                                                   {{ $checked == 0 ? "checked" : "" }} value="0"
                                                   class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                            >
                                            <label for="hs-radio-group-1" class="text-sm text-gray-500 ms-2">Nữ</label>
                                        </div>
                                        <div class="flex">
                                            <input type="radio" name="gender" value="1" {{ $checked == 1 ? "checked" : "" }}
                                                   class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                            <label for="hs-radio-group-2" class="text-sm text-gray-500 ms-2">Nam</label>
                                        </div>
                                    </div>

                                    @if($errors->has('gender'))
                                        <p class="text-red-500 mt-2 text-sm"> {{ $errors->first('gender') }} </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-4.5">
                            <label
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Số Điện Thoại <span class="text-meta-1">*</span>
                            </label>
                            <input
                                value="{{ old('phone') ?: $user->phone }}"
                                name="phone"
                                type="text"
                                placeholder="Nhập số điện thoại của bạn"
                                class="{{ $errors->has('phone') ? "check-input-error" : "" }} w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                            />
                            @if($errors->has('phone'))
                                <p class="text-red-500 mt-2 text-sm"> {{ $errors->first('phone') }} </p>
                            @endif
                        </div>

                        <div class="mb-4.5">
                            <label
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Địa Chỉ
                            </label>
                            <input
                                value="{{ old('address') ?: $user->address }}"
                                name="address"
                                type="text"
                                placeholder="Nhập địa chỉ của bạn"
                                class="{{ $errors->has('address') ? "check-input-error" : "" }} w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                            />

                            @if($errors->has('address'))
                                <p class="text-red-500 mt-2 text-sm"> {{ $errors->first('address') }} </p>
                            @endif
                        </div>
                        <x-user.form.buttons.primary type="submit"
                                                     class="w-full justify-center font-medium p-3 rounded">Cập Nhật Người Dùng
                        </x-user.form.buttons.primary>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin.layouts.app>
