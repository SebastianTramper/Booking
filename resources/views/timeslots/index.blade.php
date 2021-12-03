@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl my-10"> Bekijk hier alle tijdsloten van <strong> {{ $package->name }} </strong></h1>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th
                                    scope="col"
                                    class="font-bold px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Vanaf
                                </th>
                                <th scope="col"
                                    class="font-bold px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tot
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($timeslots as $timeslot)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $timeslot->date_from }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">
                                            {{ $timeslot->date_to }}
                                        </div>
                                    </td>

                                    @if ($role == "admin")

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route("timeslots.edit", $timeslot->id) }}"
                                               class="text-blue hover:text-indigo-900">
                                                Aanpassen
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form action="{{ route("timeslots.delete", $timeslot->id) }}" method="POST"
                                                  class="text-red bg-white cursor-pointer">
                                                @csrf
                                                @method("Delete")

                                                <input type="submit" value="Verwijderen"
                                                       class="text-red bg-white cursor-pointer">
                                            </form>
                                        </td>

                                    @else
                                        @if( $timeslot->timeslot_id != null)
                                            <td class="text-red text-right pr-16">
                                                <div>Vol</div>
                                            </td>
                                        @else
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="{{ route("appointments.store", $timeslot->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    <input id="submit" type="submit" value="Reserveren"
                                                           class="text-green hover:text-green500 cursor-pointer mt-2 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                                </form>
                                            </td>
                                        @endif

                                    @endif
                                </tr
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-10">
            @if ($role == "admin")

                <a href="{{ route("timeslots.create", $package->id) }}" class="bg-green p-4 mr-3 text-white font-bold">Maak
                    nieuwe datum beschikbaar</a>
                <a href="{{ route("packages.index") }}" class="bg-blue p-4 mr-3 text-white font-bold">Terug
                    naar het arrangementen</a>
            @else
                <a href="{{ route("packages.show", $package->id) }}" class="bg-blue p-4 mr-3 text-white font-bold">Terug
                    naar het arrangement</a>
            @endif

        </div>
    </div>
@endsection
