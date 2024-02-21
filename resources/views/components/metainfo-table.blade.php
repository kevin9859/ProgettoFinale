<table class="table table-striped table-hover border-">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome tag</th>
            <th scope="col">Numero articoli collegati</th>
            <th scope="col">Aggiorna</th>
            <th scope="col">Cancella</th>
        </tr>
    </thead>
    <tbody>
        @foreach($metaInfos as $metaInfo)
        <tr>
            <th scope="row">{{ $metaInfo->id }}</th>
            <td>{{ $metaInfo->name }}</td>
            <td>{{ count($metaInfo->articles) }}</td>
            @if($metaType == 'tags')
            <td>
                <form action="{{ route('admin.editTag', $metaInfo->id) }}" method="post">
                    @csrf
                    @method('put')
                    <input type="text" name="name" value="{{ $metaInfo->name }}" class="form-control w-50 d-inline">
                    <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                </form>
            </td>
            <td>
                <form action="{{ route('admin.deleteTag', ['tag' => $metaInfo]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger text-white">Elimina</button>
                </form>
            </td>
            @else
            <td>
                <form action="{{route('admin.editCategory', ['category' => $metaInfo])}}" method="POST">
                    @csrf
                    @method('put')
                    <input type="text" name="name" placeholder="Nuovo nome categoria" class="form-control w-50 d-inline">
                    <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                </form>
            </td>
            <td>
                <form action="{{route('admin.deleteCategory', ['category' => $metaInfo])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger text-white">Elimina</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
