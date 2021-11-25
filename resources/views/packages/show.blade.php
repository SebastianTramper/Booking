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
    <tr>
        <td>
            {{ $name }}
        </td>
        <td>
            {{ $excerpt }}
        </td>
        <td>
            {{ $description }}
        </td>
        <td>
            {{ $image_url }}
        </td>
        <td>
            {{ $price }}
        </td>
        <td>
            <a href="{{ route("packages.edit", $id) }}">
                Aanpassen
            </a>
        </td>
        <td>
            <form action="{{ route("packages.delete", $id) }}" method="POST">
                @csrf
                @method("Delete")

                <input type="submit" value="Verwijderen">
            </form>
        </td>
    </tr>
    </tbody>
</table>

<a href="{{ route("timeslots.index",$id) }}">Bekijk hier de beschikbaare tijden</a>


<a href="{{ route("packages.index") }}">Terug naar arrangementen</a>
