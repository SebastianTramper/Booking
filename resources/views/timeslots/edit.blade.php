

<div class="w-full max-w-xs">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route("timeslots.update", $id) }}" method="POST">
        @csrf
        @method("Put")
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="date_from">
                Datum vanaf
            </label>
            <input id="date_from" name="date_from" value="{{ $date_from }}" type="datetime-local" class="@error('date_from') is-invalid @enderror" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('date_from')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="date_to">
                Datum tot
            </label>
            <input id="date_to" type="datetime-local" value="{{ $date_from }}" value="2017-06-01T08:30" name="date_to" class="@error('date_to') is-invalid @enderror" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
            @error('date_to')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="submit">
                Sign In
            </button>
        </div>
    </form>
</div>

<a href="{{ route("timeslots.index", $package_id) }}">Terug naar tijdsloten</a>
