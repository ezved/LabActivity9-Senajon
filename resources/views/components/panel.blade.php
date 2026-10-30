{{-- white box with a title, whatever is inside the tag goes in $slot --}}
@props(['title'])

<section class="bg-white rounded-lg shadow mb-6">
    <h2 class="px-4 py-3 border-b font-semibold text-lg">{{ $title }}</h2>
    <div class="p-4 overflow-x-auto">
        {{ $slot }}
    </div>
</section>
