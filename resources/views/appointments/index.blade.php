@extends("layouts.app")

@section('content')
    <section class="container mx-auto ">
        <div class="my-10">
            <h1 class="text-3xl"> Afspraken </h1>
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
                                    email
                                </th>
                                <th scope="col" class="font-bold    px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Vanaf
                                </th>
                                <th scope="col" class="font-bold    px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tot
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $appointment->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">
                                            <div>
                                                {{ $appointment->email }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $appointment->date_from }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $appointment->date_to }}
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
            <a href="{{ route('dashboard') }}" class="bg-green hover:bg-blue500 p-4 mr-3 text-white font-bold">
                terug naar dashboard
            </a>
        </div>

    </section>

@endsection
