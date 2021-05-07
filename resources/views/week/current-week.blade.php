@extends ('layout')

@section('title', 'Current week')

@section ('content')
    <div class="flex justify-center">
        @if ( $remaining > '00:00')
            <div class="flex space-x-2 mt-4 px-4 py-2 text-center text-yellow-500 bg-yellow-100 rounded-md shadow-xl">
                <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>

                <p>You need <span class="font-bold">{{ $remaining }}</span> hours to achieve your goals! </p>
            </div>
        @else
            <div class="flex space-x-2 mt-4 px-4 py-2 text-center text-green-500 bg-green-100 rounded-md shadow-xl">
                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>

                <p classs="text-green-500 bg-green-100">Well done! You achieve your goals! </p>
            </div>
        @endif
    </div>

    <div class="w-1/2 mx-auto space-y-4 my-10 py-4">
        <div class="space-y-4 h-4/6 overflow-y-auto">
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
                        <p class="font-bold">Date</p>
                        <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $schedule->date)->format('d-m-Y') }}</p>
                    </div>

                    <div class="flex flex-col space-y-2">
                        <span class="font-bold">Total hours</span>
                        <span>{{ $schedule->time->format('%H:%I') }}</span>
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
        </div>


        <div class="px-6 py-2 text-white text-lg bg-yellow-300 border-b-8 border-yellow-500 rounded-md shadow-md">
            <p class="font-bold">Total hours worked: <span>{{ $total }}</span></p>
        </div>
    </div>

@endsection
