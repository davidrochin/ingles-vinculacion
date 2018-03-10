    <table class="table table-hover">

        <thead class="thead-light">
            <tr>
                <!--<th></th>-->
                <th>ID</th>
                <th>Profesor</th>
                <th>Horario</th>
                <th>Dias</th>
                <th>Código</th>
                <th>Grupo</th>
                <th>Nivel</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
        @foreach($groups as $group)
            <tr id="tableRow{{ $group->id }}" class="clickable-row">
                <td>{{ $group->id }}</td>
                <td>{{ $group->user->name }}</td>
                <td>{{ $group->schedule_start }} - {{ $group->schedule_end }}</td>
                <td>{{ $group->days }}</td>
                <td>{{ $group->code }}</td>
                <td>{{ $group->group }}</td>
                <td>{{ $group->level }}</td>
                <td><a href="{{ route('groups') }}/{{ $group->id }}">Ver grupo</a></td>
            </tr>
        @endforeach
        </tbody>

    </table>