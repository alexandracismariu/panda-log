@extends ('layout')

@section ('content')

    <div class="flex flex-col w-2/3 mx-auto space-y-6 my-10 p-10 bg-white border-b-8 border-yellow-400
             hover:border-yellow-500 rounded-md shadow-md hover:shadow-lg"
    >
        <div class="grid grid-cols-5 gap-4 text-gray-700">
            <div class="flex flex-col">
                <span class="text-lg text-gray-400">Weekday:</span>
                <span class="text-xl">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $schedule->date)->format('l') }}</span>
            </div>

            <div class="flex flex-col">
                <span class="text-lg text-gray-400">Logging at:</span>
                <span class="text-xl">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $schedule->date)->format('d-m-Y') }}</span>
            </div>

            <div class="flex flex-col">
                <span class="text-lg text-gray-400">Start at:</span>
                <span class="text-xl">{{ \Carbon\Carbon::createFromFormat('H:i:s', $schedule->start)->format('H:i') }}</span>
            </div>

            <div class="flex flex-col">
                <span class="text-lg text-gray-400">End at:</span>
                <span class="text-xl">{{ $schedule->stop ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->stop)->format('H:i') : '--:--' }}</span>
            </div>

            <div class="flex flex-col">
                <span class="text-lg text-gray-400">Total hours:</span>
                <span class="text-xl">{{ $schedule->time->format('%H:%I') }}</span>
            </div>

        </div>


        <a
            href="{{ route('schedules.edit', $schedule) }}"
            class="flex self-end space-x-2 text-gray-600 hover:text-blue-600"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>

            <span class="text-lg">Edit</span>
        </a>

    </div>

@endsection





