@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1 class="text-2xl md:text-3xl font-bold mb-6">{{ $title }}</h1>

    @if ($alerts->count() > 0)
        <div class="mb-6 p-4 rounded bg-red-100 border border-red-300 text-red-800">
            <strong>{{ $alerts->count() }}</strong> overdue vaccination(s) need follow-up.
        </div>
    @elseif (count($outOfStock) > 0)
        <div class="mb-6 p-4 rounded bg-amber-100 border border-amber-300 text-amber-800">
            Out of stock: {{ implode(', ', $outOfStock) }}. Reschedule affected patients.
        </div>
    @else
        <div class="mb-6 p-4 rounded bg-emerald-100 border border-emerald-300 text-emerald-800">
            All clear. No overdue vaccinations.
        </div>
    @endif

    <div class="grid gap-4 md:grid-cols-4 mb-6">
        @foreach ($stats as $stat)
            <x-stat-card :title="$stat['label']" :value="$stat['value']" />
        @endforeach
    </div>

    <x-panel title="Needs follow-up">
        @unless ($alerts->isEmpty())
            <span class="inline-block mb-3 px-2 py-1 rounded bg-red-600 text-white text-xs font-semibold">Overdue</span>
        @endunless

        <ul class="divide-y">
            @forelse ($alerts as $alert)
                <li class="py-2 flex flex-col sm:flex-row sm:justify-between">
                    <span>{{ $alert->patient_name }} ({{ $alert->purok }})</span>
                    <span class="text-slate-500">{{ $alert->vaccine }}, {{ $alert->dose }} &middot; {{ $alert->scheduled_at->format('M d, Y') }}</span>
                </li>
            @empty
                <li class="py-2 text-slate-500">Nobody is overdue.</li>
            @endforelse
        </ul>
    </x-panel>
@endsection
