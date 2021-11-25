


<table class="table-auto">
    <thead>
    <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>Introductie</th>
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
                {{ $package->excerpt }}
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
                <a href="{{ route("timeslots.index", $package->id) }}">
                    Beschikbare tijden
                </a>
            </td>
            <td>
                <form action="{{ route("packages.delete", $package->id) }}" method="POST">
                    @csrf
                    @method("Delete")

                    <input type="submit" value="Verwijderen">
                </form>
            </td>
        </tr>
   <?php } ?>
    </tbody>
</table>


<a href="{{ route('packages.create') }}">
    Maak een nieuwe arrangement
</a>

<a href="{{ route("packages.index") }}">Terug naar arrangementen</a>
