@extends ('layout')

@section ('content')
    <form
        action="{{ route('schedules.update', $schedule) }}"
        method="POST"
        class="container w-1/3 mx-auto my-16 p-10 bg-white rounded-md shadow-md"
        autocomplete="off"
    >
        @csrf
        @method('PUT')

        <div class="space-y-6 text-lg text-gray-700">

            <div class="flex flex-col">
                <label class="leading-loose" for="date">Logging at</label>
                <input
                    class="w-full px-4 py-2 text-gray-600 border border-gray-300 focus:ring-blue-500 rounded-md
                    @error('date') border border-red-600 @enderror"
                    id="date"
                    type="date"
                    name="date"
                    value="{{ old('date', $schedule->date) }}"
                >
                @error('date')
                    <p class="text-red-600 mt-2">{{ $errors->first('date')}}</p>
                @enderror
            </div>

            <div class="flex flex-col">
                <label class="leading-loose" for="start">Start at</label>
                <input
                    class="w-full px-4 py-2 text-gray-600 border border-gray-300 focus:ring-blue-500 rounded-md
                    @error('start') border border-red-600 @enderror"
                    id="start"
                    type="time"
                    name="start"
                    value="{{ old('start', \Carbon\Carbon::createFromFormat('H:i:s', $schedule->start)->format('H:i')) }}"
                >
                @error('start')
                    <p class="text-red-600 mt-2">{{ $errors->first('start')}}</p>
                @enderror
            </div>

            <div class="flex flex-col">
                <label class="leading-loose" for="stop">End at</label>
                <input
                    class="w-full px-4 py-2 text-gray-600 border border-gray-300 focus:ring-blue-500 rounded-md
                    @error('stop') border border-red-600 @enderror"
                    id="stop"
                    type="time"
                    name="stop"
                    value="{{ old('stop', $schedule->stop ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->stop)->format('H:i') : '') }}"
                >
                @error('stop')
                    <p class="text-red-600 mt-2">{{ $errors->first('stop')}}</p>
                @enderror
            </div>

            <button class="w-full px-4 py-2 text-white font-bold bg-yellow-400 hover:bg-yellow-500 rounded-md" type="submit">
                Edit
            </button>
        </div>
    </form>
@endsection
