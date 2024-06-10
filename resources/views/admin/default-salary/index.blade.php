<x-admin.layouts.app>
    @push("styles")
        <style>
            input {
                outline: none;
            }
        </style>
    @endpush
    @section('title', $title)
    @section('title-content', $contentTitle)
    @section('breadcrumbs')
        {{ Breadcrumbs::render('admin.default-salary') }}
    @endsection
    <div class="mb-3">
        <div class="mb-3 grid sm:grid-cols-2">
            <select name="per_page"
                    class="w-full sm:w-[47%] border-solid border-[0.5px] py-3 px-4 pe-9 block border-gray-200 rounded-lg text-sm focus:border-secondary-500 focus:ring-secondary-500 disabled:opacity-50 disabled:pointer-events-none">
                <option selected="" value="15">Số dòng hiển thị</option>
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>

            <div style="direction: rtl">
                <x-user.form.buttons.primary href="#" class="px-3 py-3 flex !rounded"
                                             onclick="location.href='{{ route('admin.default-salary.create') }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </x-user.form.buttons.primary>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg divide-y divide-gray-200">
                    <div class="py-3 px-4">
                        <div class="relative">
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" name="search"
                                   id="search" value="{{ request('search') }}"
                                   class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                   placeholder="Tìm kiếm">
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                <svg class="size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24"
                                     height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div id="table">
                        {!! $tableHtml !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            let page = 1;

            function attachDeleteEventListeners() {
                let deleteButtons = document.querySelectorAll('.btn-delete');
                deleteButtons.forEach((button) => {

                    button.addEventListener('click', (e) => {
                        e.preventDefault();
                        const id = e.target.getAttribute('data-id');
                        console.log(id)
                        const url = '{{ route('admin.default-salary.destroy', ':id') }}'.replace(':id', id);
                        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        axios.delete(url, {
                            headers: {
                                'X-CSRF-TOKEN': token
                            }
                        })
                            .then(response => {
                                console.log(response);
                                if (response.data.success) {
                                    fetchData(page);
                                    Toastify({
                                        text: response.data.message,
                                        duration: 1000,
                                        close: true,
                                        gravity: "top", // `top` or `bottom`
                                        position: "right", // `left`, `center` or `right`
                                        style: {
                                            background: "#19B9A8",
                                            borderRadius: "0.7rem",
                                        },
                                    }).showToast();
                                }
                            })
                            .catch(error => {
                                console.log(error);
                                Toastify({
                                    text: error.response.data.message,
                                    duration: 1000,
                                    close: true,
                                    gravity: "top", // `top` or `bottom`
                                    position: "right", // `left`, `center` or `right`
                                    style: {
                                        background: "#EF4444",
                                        borderRadius: "0.7rem",
                                    },
                                }).showToast();
                                console.error('Error deleting :', error);
                            });
                    });
                });
            }

            function fetchData(page = 1) {
                console.log(document.getElementById('search').value)
                axios.get('{{ route('admin.default-salary.table') }}', {
                    params: {
                        per_page: document.getElementsByName('per_page')[0].value,
                        page: page,
                        search: document.getElementById('search').value
                    }
                })
                    .then(response => {
                        document.getElementById('table').innerHTML = response.data.html;
                        attachDeleteEventListeners();
                    })
                    .catch(error => console.error('Error fetching data:', error));
            }

            document.getElementsByName('per_page')[0].addEventListener('change', function (e) {
                fetchData();
            });

            document.getElementById('search').addEventListener('input', function (e) {
                let timeoutId;

                clearTimeout(timeoutId);

                timeoutId = setTimeout(fetchData, 500);
            });

            // delete

            document.addEventListener('DOMContentLoaded', () => {
                attachDeleteEventListeners();
                document.getElementById('pagination').addEventListener('click', function (e) {
                    if (e.target.tagName === 'A') {
                        e.preventDefault();
                        page = new URL(e.target.href).searchParams.get('page');
                        fetchData(page);
                    }
                });
            })

            const table = document.getElementById('table');
            const observer = new MutationObserver(function (mutationsList, observer) {
                console.log('Table changed');
                document.getElementById('pagination').addEventListener('click', function (e) {
                    if (e.target.tagName === 'A') {
                        e.preventDefault();
                        page = new URL(e.target.href).searchParams.get('page');
                        fetchData(page);
                    }
                });
            });

            observer.observe(table, {childList: true, subtree: true});
        </script>
    @endpush
</x-admin.layouts.app>
