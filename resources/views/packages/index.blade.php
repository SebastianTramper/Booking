@extends("layouts.app")

@section('content')
    <section class="container mx-auto ">
        <div class="my-10">
            <h1 class="text-3xl"> Arrangementen </h1>
        </div>

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
                                    Naam
                                </th>
                                <th scope="col" class="font-bold px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Afbeelding
                                </th>
                                <th scope="col" class="font-bold    px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Prijs
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($packages as $package)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $package->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">
                                        {{ $package->image_url }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $package->price }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route("packages.edit", $package->id) }}" class="text-blue hover:text-indigo-900">
                                        Aanpassen
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a  href="{{ route("timeslots.index", $package->id) }}" class="text-green hover:text-indigo-900">
                                        Beschikbare tijden
                                    </a>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                    <form action="{{ route("packages.delete", $package->id) }}" method="POST" class=" hover:text-indigo-900">
                                        @csrf
                                        @method("Delete")

                                        <input type="submit" value="Verwijderen" class="text-red bg-white cursor-pointer">
                                    </form>
                                </td>
                            </tr
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-4 lg:mt-10">
            <a href="{{ route('packages.create') }}" class="bg-green p-4 mr-3 text-white font-bold">
                Maak een nieuwe arrangement
            </a>
        </div>

    </section>

@endsection
