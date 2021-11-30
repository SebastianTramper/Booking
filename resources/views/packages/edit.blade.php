@extends('layouts.app')
@section('content')

    <section class="container mx-auto">
        <div class="mt-10 mb-5">
            <h1 class="text-3xl"> Arrangement <strong> {{ $name }} </strong></h1>
        </div>

        <form action="/packages/update/{{ $id }}" method="POST" class="pt-6 pb-8 mb-4" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div>
                <label for="name">Naam</label>
                <input id="name" name="name" type="text" value="{{ $name }}"
                       class="@error('name') is-invalid @enderror block text-gray-700 text-sm cursor-pointer font-bold mb-2">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="excerpt">Introductie</label>
                <textarea name="excerpt" id="excerpt" cols="50" rows="10"  class="@error('excerpt') is-invalid @enderror block text-gray-700 text-sm cursor-pointer font-bold mb-2">{{ $excerpt }}</textarea>
                @error('excerpt')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="description">Beschrijving</label>
                <textarea name="description" id="description" cols="50" rows="10" class="@error('description') is-invalid @enderror block text-gray-700 text-sm cursor-pointer font-bold mb-2"> {{ $description }}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="image_url">Afbeelding</label>
                <input id="image_url" name="image_url" type="file" value="{{ $image_url }}"
                       class="@error('image_url') is-invalid @enderror block text-gray-700 text-sm cursor-pointer font-bold mb-2">
                @error('image_url')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="price">Prijs</label>
                <input id="price" type="text" name="price" value="{{ $price }}"
                       class="@error('price') is-invalid @enderror block text-gray-700 text-sm cursor-pointer font-bold mb-2">
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <input id="submit" type="submit" value="Opslaan" class="bg-green cursor-pointer mt-2 hover:bg-green500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>

        </form>
        <div class="my-12">
            <a href="{{ route("packages.index") }}" class="bg-blue hover:bg-blue500  p-4 mr-3 text-white font-bold">Terug naar arrangementen</a>
        </div>
    </section>
@endsection
