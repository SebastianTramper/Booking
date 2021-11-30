@extends('layouts.layout')
@section('login')
    <div
        class="fixed flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    </div>
@endsection

@section('packages')
    <div class="pt-10">
        <h2 class="text-2xl pb-5">Een greep uit onze arrangementen</h2>
        <div class="grid grid-cols-3 gap-4">


            @foreach($packages as $package)
                <div class="rounded overflow-hidden pb-5 border w-full bg-white hover:bg-gray shadow">
                    <a href="{{ route("packages.show", $package->id) }}">
                        <img class="w-full bg-cover"
                             src="{{ asset('storage/' . $package->image_url) }}">
                        <div class="px-3 pb-2">
                            <div class="pt-2">
                                <h2 class="text-md font-medium">{{ $package->name }}</h2>
                            </div>
                            <div class="pt-1">
                                <div class="mb-2 text-sm">
                                    {{ $package->excerpt }}
                                </div>
                            </div>
                            <div class="text-lg font-bold">
                                Prijs: €{{ $package->price }},-
                            </div>
                            <div class="text-sm mb-2 cursor-pointer">
                                Lees verder
                            </div>
                        </div>
                    </a>

                </div>

            @endforeach

        </div>
    </div>
@endsection



