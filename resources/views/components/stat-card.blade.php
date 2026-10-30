{{-- small card for one number, takes a title and a value --}}
@props(['title', 'value'])

<div class="bg-white rounded-lg shadow p-4 text-center">
    <p class="text-sm uppercase tracking-wide text-slate-500">{{ $title }}</p>
    <p class="text-3xl font-bold text-emerald-700 mt-1">{{ $value }}</p>
</div>
