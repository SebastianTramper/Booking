@extends('layouts.app')
@section('content')

    <section class="container mx-auto">
        <div class="mt-10 mb-5">
            <h1 class="text-3xl"> Maak een nieuw tijdslot voor:<strong> {{ $package->name }} </strong></h1>
        </div>

        <form action="{{ route("timeslots.store", $package->id) }}" method="POST">
            @csrf

            <div>
                <label for="name">Vanaf</label>
                <input id="date_from" name="date_from" type="datetime-local"
                       class="@error('date_from') is-invalid @enderror block text-gray-700 cursor-pointer text-sm font-bold mb-2">
                @error('date_from')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div>
                <label for="date_to">Tot</label>
                <input id="date_to" type="datetime-local" name="date_to" class="@error('date_to') is-invalid @enderror block text-gray-700 cursor-pointer text-sm font-bold mb-2">
                @error('date_to')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <input id="submit" type="submit" value="Opslaan" class="bg-green cursor-pointer mt-2 hover:bg-green500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>
        </form>
        <div class="my-12">
            <a href="{{ route("timeslots.index", $package->id) }}" class="bg-blue hover:bg-blue500 p-4 mr-3 text-white font-bold">Terug naar tijdsloten</a>
        </div>
    </section>
@endsection
