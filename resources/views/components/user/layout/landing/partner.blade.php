@props(['img' => ''])

<div>
    <img src="{{ Vite::asset('resources/images/partner/' . $img) }}" class="mx-auto sm:w-1/2 lg:w-72" alt="" />
</div>
