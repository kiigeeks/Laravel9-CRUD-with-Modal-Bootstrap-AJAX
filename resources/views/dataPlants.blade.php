<div class="table-responsive pt-2 pb-2 mb-3">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($plants as $plant)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $plant->nama }}</td>
                    <td>{{ $plant->category->keterangan }}</td>
                    <td>
                        <a id="{{ $plant->id }}" class="btn btn-info detailPlants" data-bs-toggle="modal" data-bs-target="#ModalDetail" style="color: white;"><i class="bi bi-eye"></i></a>
                        <a id="{{ $plant->id }}" class="btn btn-warning editPlants" data-bs-toggle="modal" data-bs-target="#ModalEdit" style="color: white;"><i class="bi bi-pencil-square"></i></a>
                        <a id="{{ $plant->id }}" class="btn btn-danger border-0 deletePlants"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>

