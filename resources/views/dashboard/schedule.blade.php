@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1 class="text-2xl md:text-3xl font-bold mb-6">{{ $title }}</h1>

    <x-panel title="All scheduled vaccinations">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b text-slate-500">
                    <th class="py-2 pr-2">#</th>
                    <th class="py-2 pr-2">Patient</th>
                    {{-- purok and dose are hidden on small screens --}}
                    <th class="py-2 pr-2 hidden sm:table-cell">Purok</th>
                    <th class="py-2 pr-2">Vaccine</th>
                    <th class="py-2 pr-2 hidden md:table-cell">Dose</th>
                    <th class="py-2 pr-2">Date</th>
                    <th class="py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                {{-- $loop: odd rows are white (zebra), first row is bold, iteration is the row number --}}
                @forelse ($schedules as $row)
                    <tr class="{{ $loop->odd ? 'bg-white' : 'bg-slate-50' }} {{ $loop->first ? 'font-semibold' : '' }}">
                        <td class="py-2 pr-2">{{ $loop->iteration }}</td>
                        <td class="py-2 pr-2">{{ $row->patient_name }}</td>
                        <td class="py-2 pr-2 hidden sm:table-cell">{{ $row->purok }}</td>
                        <td class="py-2 pr-2">{{ $row->vaccine }}</td>
                        <td class="py-2 pr-2 hidden md:table-cell">{{ $row->dose }}</td>
                        <td class="py-2 pr-2">{{ $row->scheduled_at->format('M d, Y') }}</td>
                        <td class="py-2">
                            {{ $row->status }}
                            {{-- red badge only for overdue rows --}}
                            @unless ($row->status !== 'Overdue')
                                <span class="ml-1 px-2 py-0.5 rounded bg-red-600 text-white text-xs">Overdue</span>
                            @endunless
                        </td>
                    </tr>
                {{-- runs when there are no rows --}}
                @empty
                    <tr>
                        <td colspan="7" class="py-4 text-center text-slate-500">No schedules yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-panel>
@endsection
