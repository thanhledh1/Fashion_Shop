{{-- @extends('admin.master')
@section('content') --}}
<style>
    img#avtshow {
        border: 3px solid rgb(150, 0, 0);
        padding: 10px;
        height: 250px;
        width: 250px;
        border-radius: 50%;

    }
</style>
<main class="page-content">

    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel-panel-default">
                <header class="page-title-bar">

                    <h1 class="">Thông tin</h1>
                </header>
                <!-- Modal -->
               


                <hr>
                <div class="panel-heading">

                </div>
                <div>
                    <table class="table" ui-jq="footable"
                        ui-options='{
            "paging": {
              "enabled": true
            },
            "filtering": {
              "enabled": true
            },
            "sorting": {
              "enabled": true
            }}'>

                        <div class="gallery-grids">



                            <div class="gallery-top-grids">
                                <div class="col-sm-3 com-w3ls">
                                    <section class="panel">
                                        <div class="gallery-grid">
                                            <br>
                                            <a class="example-image-link" data-lightbox="example-set"
                                                data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
                                                <img id="avtshow"
                                                    src="{{ asset('admin/uploads/user/' . $user->image) }}"
                                                    alt="" />

                                            </a>
                                        </div>
                                        <div class="panel-body">
                                            <h3>{{ $user->name }}</h3>
                                            <ul class="nav nav-pills nav-stacked labels-info ">
                                                <li>
                                                    <h4>{{ $user->group->name }}</h4>
                                                </li>
                                            </ul>
                                            <div class="text-center">
                                                {{-- showmodal --}}
                                                {{-- <button class="btn btn-info me-1 edit-btn" data-id="' + value.id + '">Edit</button> --}}
                                                @if (Auth::user()->id == $user->id || Auth::user()->hasPermission('User_update'))
                                                    <a class="btn mini btn-default"
                                                        href="{{ route('user.edit', $user->id) }}">
                                                        <i class="fa fa-cog"> Thông tin</i>
                                                    </a>
                                                @endif
                                                @if (Auth::user()->id == $user->id)
                                                    <a class="btn mini btn-default"
                                                        href="{{ route('user.editpass', Auth::user()->id) }}">
                                                        <i class="fa fa-cog"> Mật Khẩu </i>
                                                    </a>
                                                @endif
                                                @if (Auth::user()->hasPermission('User_adminUpdatePass'))
                                                    <a class="btn mini btn-default"
                                                        href="{{ route('user.adminpass', $user->id) }}">
                                                        <i class="fa fa-cog">Mật khẩu*</i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Bat su kien sau khi ajax goi
        $('body').on('click', '.edit-btn', function() {
            //lay id
            let id = $(this).data('id');
            // Goi ajax
            let option = {
                url: "http://127.0.0.1:8000/api/customer/show/" + id,
                method: "GET",
                dataType: "json",
                data: {
                    id: id
                },
                success: function(response) {
                    console.log(response);
                    $("#up_first_name").val(response.first_name);
                    $("#up_last_name").val(response.last_name);
                    $("#id").val(response.id);
                },
            }
            // Dua vao cac o input trong form
            $.ajax(option);
            // Goi modal
            $('#editModal').modal('show');
        });
        $('#btnok').on('click', function() {
            // validate form
            let id = $("#id").val();
            let first_name = $('#up_first_name').val();
            let last_name = $('#up_last_name').val();
            if (!first_name) {
                $('#upfirst_name_error').html('truong bat buoc');
            }
            if (!last_name) {
                $('#uplast_name_error').html(' aatruong bat buoc');
                // alert('edit: ')
            } else {
                // alert('edit: ' + id)
                let option = {
                    url: "http://127.0.0.1:8000/api/customer/update/" + id,
                    method: "PUT",
                    dataType: "json",
                    data: {
                        first_name: first_name,
                        last_name: last_name,
                    },
                    success: function(response) {
                        // console.log(response);
                        $('#editModal').modal('hide');
                        getList();
                        // $("#id").val(0);
                        Swal.fire(
                            'Good job!',
                            'Cập nhật thành công!',
                            'success'
                        )
                    }
                }
                $.ajax(option)
            }
        })
    </script>
</main>
{{-- @endsection --}}