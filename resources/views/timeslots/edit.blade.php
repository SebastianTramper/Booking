@extends('layouts.app')
@section('content')

    <section class="container mx-auto">
        <div class="mt-10 mb-5">
            <h1 class="text-3xl"> Tijdslot van <strong> {{ $package_name }} </strong></h1>
            <ul class="mt-4">
                <li>Van: {{ $date_from }}</li>
                <li>Tot: {{ $date_to }}</li>
            </ul>
        </div>


        <form action="{{ route("timeslots.update", $id) }}" method="POST" class="pt-6 pb-8 mb-4">
            @csrf
            @method("Put")

            <div>
                <label for="name">Vanaf</label>
                <input id="date_from" name="date_from" value="{{ $date_from }}" type="datetime-local" class="@error('date_from') is-invalid @enderror block text-gray-700 text-sm cursor-pointer font-bold mb-2">
                @error('date_from')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="date_to">Tot</label>
                <input id="date_to" type="datetime-local" value="{{ $date_from }}" value="2017-06-01T08:30" name="date_to" class="@error('date_to') is-invalid @enderror block text-gray-700 cursor-pointer text-sm font-bold mb-2">
                @error('date_to')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <input id="submit" type="submit" value="Opslaan" class="bg-green cursor-pointer mt-2 hover:bg-green500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>
        </form>
        <div class="mt-12">
            <a href="{{ route("timeslots.index", $package_id) }}" class="bg-blue hover:bg-blue500 p-4 mr-3 text-white font-bold">Terug naar tijdsloten</a>
        </div>
    </section>

@endsection
