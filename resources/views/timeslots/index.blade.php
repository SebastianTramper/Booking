<div>
    Bekijk hier alle tijdsloten van

    <table class="table-auto">
        <thead>
        <tr>
            <th>Vanaf</th>
            <th>tot</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($timeslots as $timeslot) { ?>
        <tr>
            <td>
                {{ $timeslot->id }}
            </td>
            <td>
                {{ $timeslot->date_from }}
            </td>
            <td>
                {{ $timeslot->date_to }}
            </td>
            <td>
                <a href="{{ route("timeslots.edit", $timeslot->id) }}">
                    Aanpassen
                </a>
            </td>
            <td>
                <form action="{{ route("timeslots.delete", $timeslot->id) }}" method="POST">
                    @csrf
                    @method("Delete")

                    <input type="submit" value="Verwijderen">
                </form>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="{{ route("timeslots.create") }}">Maak nieuwe datum beschikbaar</a>
</div>
