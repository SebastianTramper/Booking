


<table class="table-auto">
    <thead>
    <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>Beschrijving</th>
        <th>Afbeelding</th>
        <th>Prijs</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($packages as $package) { ?>
        <tr>
            <td>
                {{ $package->id }}
            </td>
            <td>
                {{ $package->name }}
            </td>
            <td>
                {{ $package->description }}
            </td>
            <td>
                {{ $package->image_url }}
            </td>
            <td>
                {{ $package->price }}
            </td>
            <td>
                <a href="{{ route("packages.edit", $package->id) }}">
                    Aanpassen
                </a>
            </td>
            <td>
                <a href="{{ route("packages.show", $package->id) }}">
                    Bekijken
                </a>
            </td>
        </tr>
   <?php } ?>
    </tbody>
</table>


<a href="{{ route('packages.create') }}">
    Maak een nieuwe arrangement
</a>
