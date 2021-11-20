<form action="{{ route("timeslots.update", $id) }}" method="POST">
    @csrf
    @method("Put")

    <div>
        <label for="name">Vanaf</label>
        <input id="date_from" name="date_from" value="{{ $date_from }}" type="datetime-local" class="@error('date_from') is-invalid @enderror">
        @error('date_from')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="date_to">Tot</label>
        <input id="date_to" type="datetime-local" value="{{ $date_from }}" value="2017-06-01T08:30" name="date_to" class="@error('date_to') is-invalid @enderror">
        @error('date_to')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <input id="submit" type="submit" value="Opslaan">
    </div>
</form>
<a href="{{ route("timeslots.index") }}">Terug naar tijdsloten</a>
