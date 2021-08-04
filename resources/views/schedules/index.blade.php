@extends ('layout')

@section ('content')

    <div class="w-1/2 mx-auto space-y-4 my-10">
        @foreach($schedules as $schedule)
            <div class="px-6 py-1 sticky top-0 mb-2 text-white text-semibold text-lg bg-yellow-300 rounded-md">
                <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $schedule->date)->format('l') }}</p>
            </div>
            <div
                x-data="{ hovered: false }"
                @mouseover="hovered = true"
                @mouseout="hovered = false"
                class="flex justify-between container mx-auto px-6 py-2 bg-gray-50 hover:bg-white border-r-8 border-yellow-400
                hover:border-yellow-500 rounded-md hover:shadow-md"
            >

                <div class="flex justify-between w-1/2 text-lg">
                    <div class="flex flex-col space-y-2">
                        <p class="font-bold">Weekday</p>
                        <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $schedule->date)->format('l') }}</p>
                    </div>

                    <div class="flex flex-col space-y-2">
                        <p class="font-bold">Date</p>
                        <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $schedule->date)->format('d-m-Y') }}</p>
                    </div>
                </div>

                <div
                    x-show="hovered"
                    class="flex items-center space-x-4"
                >

                    <a href="{{ route('schedules.show', $schedule) }}">
                        <svg class="w-6 h-6 text-gray-500 hover:text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </a>

                    <a href="{{ route('schedules.edit', $schedule) }}">
                        <svg class="w-6 h-6 text-gray-500 hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </a>

                    <form action="{{ route('schedules.destroy', $schedule) }}" method="POST" class="flex justify-end">
                        @csrf
                        @method('delete')

                        <button type="submit">
                            <svg class="w-6 h-6 text-gray-500 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>

                </div>

            </div>
        @endforeach

        {{ $schedules->onEachSide(2)->links() }}
    </div>

@endsection
