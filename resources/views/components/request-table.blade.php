<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Ruolo richiesto</th>
            <th scope="col">Stato</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @if(is_iterable($roleRequests))
            @foreach($roleRequests as $request)
                <tr>
                    <th scope="row">{{$request->id}}</th>
                    <td>{{$request->user->name}}</td>
                    <td>{{$request->user->email}}</td>
                    <td>{{$request->role}}</td>
                    <td>{{$request->status}}</td>
                    <td>
                        @switch($request->role)
                            @case('admin')
                            <a href="{{route('admin.setAdmin', ['user' => $request->user->id, 'roleRequest' => $request->id])}}"class="btn btn-info text-white">Attiva {{$request->role}}</a>
                                @break
                            @case('revisor')
                            <a href="{{route('admin.setRevisor', ['user' => $request->user->id, 'roleRequest' => $request->id])}}"class="btn btn-info text-white">Attiva {{$request->role}}</a>
                                @break
                            @case('writer')
                            <a href="{{route('admin.setWriter', ['user' => $request->user->id, 'roleRequest' => $request->id])}}"class="btn btn-info text-white">Attiva {{$request->role}}</a>
                                @break
                        @endswitch
                    </td>
                </tr>
            @endforeach
        @else
@endif
    </tbody>
</table>


