@extends('layouts.app')
@section('content')

    <section class="container mx-auto">

        <div class="my-10">
            <img class="w-full bg-cover mb-5"
                 src="{{ asset('storage/' . $image_url) }}">
            <h1 class="text-3xl mb-4"> {{ $name }} </h1>
            <p>{{ $description }}</p>
            <div class="text-2xl font-bold my-5">
                Prijs: €{{ $price }},-
            </div>
            <img src="{{ $image_url }}" alt="">

            <div class="my-10">
                <a href="{{ route("timeslots.index", $id) }}" class="bg-green hover:bg-green500 p-4 mr-3 text-white font-bold">Reserveren</a>
                <a href="{{ route("home.index") }}" class="bg-blue hover:bg-blue500 p-4 mr-3 text-white font-bold">Terug naar arrangementen</a>
            </div>
        </div>

    </section>
@endsection
