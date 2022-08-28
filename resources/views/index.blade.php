@extends('layouts.main')

@section('container')
    <header>
        <h1 class="mb-3 mt-3 text-center">List Plants</h1>
    </header>

    <section>
        <div class="container">
            <div class="row my-5">
                <div class="col-lg-12">
                    <button class="btn btn-primary rounded mb-2" data-bs-toggle="modal" data-bs-target="#ModalAdd"><i
                            class="bi bi-plus"></i> Add Plants</button>
                    <div class="card shadow">
                        <div class="card-body" id="dataPage">
                            <div class="d-flex justify-content-center mt-3">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Add -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="titleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModalLabel">Add Plants</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="form-add" enctype="multipart/form-data" action="#" method="POST">
                        @csrf
                        <div class="form-group pb-2">
                            <label for="Nama" class="pb-1">Title Plants</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                placeholder="Name Plants" required />
                        </div>
                        <div class="form-group pb-2">
                            <label for="category" class="pb-1">Category Plants</label>
                            <select class="form-control m-bot15" name="category_id" id="category_id">
                                <option value="">Pilih Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->keterangan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pb-2">
                            <label for="image" class="form-label">Image Plants</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            <input class="form-control" type="file" id="image" name="image"
                                onchange="previewImage()">
                        </div>
                        <div class="form-group pb-2">
                            <label for="desc" class="pb-1">Desc Plants</label>
                            <input type="text" name="desc" id="desc" class="form-control"
                                placeholder="Desc Plants" required />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add_plants_btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="ModalDetail" tabindex="-1" aria-labelledby="titleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModalLabel">Detail Plants</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="form-detail" enctype="multipart/form-data" action="#" method="POST">
                        @csrf
                        <div class="mt-2 d-flex justify-content-center" id="images"></div>
                        <div class="form-group pb-2">
                            <label for="Nama" class="pb-1">Title Plants</label>
                            <input type="text" id="namaDet" class="form-control" readonly required />
                        </div>
                        <div class="form-group pb-2">
                            <label for="category" class="pb-1">Category Plants</label>
                            <input type="text" id="categoryDet" class="form-control" readonly required />
                        </div>
                        <div class="form-group pb-2">
                            <label for="desc" class="pb-1">Desc Plants</label>
                            <input type="text" id="descDet" class="form-control" readonly required />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="titleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModalLabel">Edit Plants</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="form-edit" enctype="multipart/form-data" action="#" method="POST">
                        @csrf
                        <div class="mt-2 d-flex justify-content-center" id="imagesEdit"></div>
                        <input type="hidden" id="idEdit" name="idEdit" />
                        <div class="form-group pb-2">
                            <label for="Nama" class="pb-1">Title Plants</label>
                            <input type="text" id="namaEdit" name="nama" class="form-control" required />
                        </div>
                        <div class="form-group pb-2">
                            <label for="category" class="pb-1">Category Plants</label>
                            <select class="form-control m-bot15" name="category_id" id="categoryEdit">
                                <option value="">Pilih Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->keterangan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pb-2">
                            <label for="image" class="form-label">Image Plants</label>
                            <img class="img-previewEdit img-fluid mb-3 col-sm-5 d-block">
                            <input class="form-control" type="file" id="imageEdit" name="image"
                                onchange="previewImageEdit()">
                        </div>
                        <div class="form-group pb-2">
                            <label for="desc" class="pb-1">Desc Plants</label>
                            <input type="text" id="descEdit" name="desc" class="form-control" readonly
                                required />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="edit_plants_btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- untuk jquery ajax --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- js databales --}}
    {{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script> --}}

    {{-- js sweet alert --}}
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

    <script>
        $(function() {

            // add ajax request
            $("#form-add").submit(function(e) {
                e.preventDefault();
                const dataForm = new FormData(this);
                $("#add_plants_btn").text('Adding ...');
                $.ajax({
                    url: '{{ route('save.plants') }}',
                    method: 'POST',
                    data: dataForm,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            swal({
                                title: "Success!",
                                text: "New record has been saved!",
                                icon: "success",
                                button: "Close",
                            });
                            fetch();
                            $("#form-add")[0].reset();
                        } else {
                            swal({
                                title: "Error!",
                                text: "Someting Wrong",
                                icon: "error",
                                button: "Close",
                            });
                        }
                        $("#add_plants_btn").text('Submit');
                        $("#ModalAdd").modal('hide');
                    }
                });
            });

            // delete ajax request
            $(document).on('click', '.deletePlants', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this record!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: '{{ route('delete.plants') }}',
                                method: 'DELETE',
                                data: {
                                    id: id,
                                    _token: csrf
                                },
                                success: function(response) {
                                    if (response.status == 200) {
                                        swal({
                                            title: "Success!",
                                            text: "Record has been deleted!",
                                            icon: "success",
                                            button: "Close",
                                        });
                                        fetch();
                                    } else {
                                        swal({
                                            title: "Error!",
                                            text: "Someting Wrong",
                                            icon: "error",
                                            button: "Close",
                                        });
                                    }
                                }
                            });
                        } else {
                            swal("Record is safe!");
                        }
                    });
            });

            // detail ajax request
            $(document).on('click', '.detailPlants', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('detail.plants') }}',
                    method: 'GET',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#namaDet").val(response.plant.nama);
                        $("#categoryDet").val(response.category);
                        $("#descDet").val(response.plant.desc);
                        $("#images").html(
                            `<img src="{{ asset('storage/${response.plant.image}') }}" width="200" height="200" class="img-fluid img-thumbnail">`
                        );
                    }
                });
            });

            // edit ajax request
            $(document).on('click', '.editPlants', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('edit.plants') }}',
                    method: 'GET',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#namaEdit").val(response.nama);
                        $("#categoryEdit").val(response.category_id);
                        $("#descEdit").val(response.desc);
                        $("#imagesEdit").html(
                            `<img src="{{ asset('storage/${response.image}') }}" width="100" class="img-fluid img-thumbnail">`
                        );
                        $("#idEdit").val(response.id);
                    }
                });
            });

            // update ajax request
            $("#form-edit").submit(function(e) {
                //stop submit the form, we will post it manually.
                e.preventDefault();
                // Get form
                var form = $('#form-edit')[0];
                // FormData object
                var dataForm = new FormData(form);
                $("#edit_plants_btn").text('Updating ...');
                $.ajax({
                    url: '{{ route('update.plants') }}',
                    method: 'POST',
                    data: dataForm,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            swal({
                                title: "Updated!",
                                text: "Record has been updated!",
                                icon: "success",
                                button: "Close",
                            });
                            fetch();
                        } else {
                            swal({
                                title: "Error!",
                                text: "Someting Wrong",
                                icon: "error",
                                button: "Close",
                            });
                        }
                        $("#edit_plants_btn").text('Submit');
                        $("#ModalEdit").modal('hide');
                    }
                });
            });

            //get record
            fetch();

            function fetch() {
                $.ajax({
                    url: '{{ url('fetch') }}',
                    method: 'GET',
                    success: function(response) {
                        $("#dataPage").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });

        // preview image add
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview')
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }

        // preview image edit
        function previewImageEdit() {
            const image = document.querySelector('#imageEdit');
            const imgPreview = document.querySelector('.img-previewEdit')
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection
