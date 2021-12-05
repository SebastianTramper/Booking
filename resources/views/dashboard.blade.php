@extends("layouts.app")
@section("header")
    <div name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </div>
@endsection
@section('content')
    <section>
        <div class="container mx-auto py-10">
            <div class="grid grid-cols-3 gap-4">
                <a href="{{ route('packages.index') }}" class="text-center border-opacity-20 border hover:bg-blue py-20">Beheer arrangementen</a>
                <a href="{{ route('appointments.index') }}" class="text-center border-opacity-20 border hover:bg-green py-20">Bekijk alle aanmeldingen</a>
            </div>

        </div>
    </section>
@endsection
