@extends("panel.layouts.app")
@section("content")

    <div class="modal fade bd-example-modal-lg" style="overflow: scroll" id="add-video-modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #E5E8E8;">
                    <h5 class="modal-title" style="font-weight: bold; font-size: 25px !important; ">Video
                        Oluştur</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #F8F9F9;">
                    <form id="create_video"  action="{{route('video.create')}}" method="post">
                        @csrf
                        <div class="row mt-3 mb-4">
                            <div class="row mt-3 mb-4">
                                <div class="form-group mb-4 col-12">
                                    <label class="mb-1" for="image" style="text-decoration: underline;">Video Fotoğrafı</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="form-group mb-4 col-12">
                                    <label class="mb-1" for="title" style="text-decoration: underline;">Video Başlığı </label>
                                    <input type="text" name="title" id="title" class="form-control">
                                </div>
                                <div class="form-group mb-4 col-12">
                                    <label class="mb-1" for="video_url" style="text-decoration: underline;">Video Url'si </label>
                                    <input type="text" name="video_url" id="video_url" class="form-control">
                                </div>
                                <div class="form-group mb-4 col-12">
                                    <label class="mb-1" for="description" style="text-decoration: underline;">Açıklama </label>
                                    <textarea type="text" name="description" id="description" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-4 col-12">
                                    <label class="mb-1" for="order" style="text-decoration: underline;">Video Sırası </label>
                                    <input type="number" name="order" id="order" class="form-control">
                                </div>
                                <div class="form-group mb-4 col-12">
                                    <label class="mb-1" for="category_id" style="text-decoration: underline;">Kategorisi</label>
                                    <select name="category_id" id="category_id">
                                        <option disabled selected>Seçiniz</option>
                                    @foreach($category as $categories)
                                            <option value="{{$categories->id}}">
                                                {{$categories->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer" style="background-color: #E5E8E8;">
                    <button type="button" onclick="createVideo()" class="btn btn-primary">Kaydet</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" style="overflow: scroll" id="update_videos_modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #E5E8E8;">
                    <h5 class="modal-title" style="font-weight: bold; font-size: 25px !important; ">Video
                        Güncelle</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #F8F9F9; padding: 30px;">
                    <form id="update_video_post" method="post">

                        <div class="row mt-3 mb-4">
                            <div class="form-group mb-4 col-12">
                                <img id="videoImg"  class="img-thumbnail">
                                <label class="mb-1" for="image" style="text-decoration: underline;">Video Fotoğrafı</label>

                                <input type="file" name="image" id="imageUpdate" class="form-control">
                            </div>
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="title" style="text-decoration: underline;">Video Başlığı </label>
                                <input type="text" name="title" id="titleUpdate" class="form-control">
                            </div>
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="video_url" style="text-decoration: underline;">Video Url'si </label>
                                <input type="text" name="video_url" id="urlUpdate" class="form-control">
                            </div>
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="description" style="text-decoration: underline;">Açıklama </label>
                                <input type="text" name="description" id="descriptionUpdate" class="form-control">
                            </div>
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="order" style="text-decoration: underline;">Video Sırası </label>
                                <input type="number" name="order" id="orderUpdate" class="form-control">
                            </div>
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="category_id" style="text-decoration: underline;">Kategorisi</label>
                                <select name="category_id" id="categoryUpdate">
                                    <option disabled selected>Seçiniz</option>
                                @foreach($category as $categories)
                                        <option value="{{$categories->id}}">
                                            {{$categories->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <input type="hidden" name="updateId" id="updateId">

                    </form>
                </div>
                <div class="modal-footer" style="background-color: #E5E8E8;">
                    <button type="button" class="btn btn-primary" onclick="updateVideoPost()">Kaydet</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                </div>
            </div>
        </div>
    </div>

    <div class="pdf container">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Video Listesi</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card p-5">
                    <table id="videoTable" class="display nowrap dataTable cell-border" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Video Sırası</th>
                            <th>Video Kategorisi</th>
                            <th>Video Fotoğrafı</th>
                            <th>Video Adı</th>
                            <th>Açıklama</th>
                            <th>Güncelle</th>
                            <th>Sil</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Video Sırası</th>
                            <th>Video Kategorisi</th>
                            <th>Video Fotoğrafı</th>
                            <th>Video Adı</th>
                            <th>Açıklama</th>
                            <th>Güncelle</th>
                            <th>Sil</th>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="card-footer clearfix">
                        <button type="button" class="btn btn-info float-left" onclick="createModelOpen()"
                                data-bs-toggle="#add-video-modal"><i class="fas fa-plus"></i>Video Oluştur
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script type="text/javascript">
        function createModelOpen() {
            $('#add-video-modal').modal("toggle");
        }

        function createVideo() {
            var formData = new FormData(document.getElementById('create_video'));

            $.ajax({
                type: 'POST',
                url: '{{route('video.create')}}',
                data: formData,
                headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı',
                        html: 'Video Oluşturuldu!'
                    });

                    var elements = document.getElementById("create_video").elements;

                    for (var i = 0, element; element = elements[i++];) {
                        element.value = "";
                    }
                    $('#add-video-modal').modal("toggle");
                    dataTable.ajax.reload();

                },
                error: function (data) {
                    var errors = '';
                    for (datas in data.responseJSON.errors) {
                        errors += data.responseJSON.errors[datas] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',

                        html: 'Bilinmeyen bir hata oluştu.\n' + errors,
                    });
                }
            });


        }

        function updateVideoPost() {

            var formData = new FormData(document.getElementById('update_video_post'));
            $.ajax({
                type: 'POST',
                url: '{{route('video.update')}}',
                dataType: "json",
                data: formData,
                headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                contentType: false,
                cache: false,
                processData: false,
                success: function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı',
                        html: 'Güncelleme Başarılı!'
                    });

                    var elements = document.getElementById("update_video_post").elements;

                    for (var i = 0, element; element = elements[i++];) {
                        element.value = "";
                    }

                    $('#update_videos_modal').modal("toggle");

                    dataTable.ajax.reload(null, false);
                    dataTable.fnStandingRedraw();
                },
                error: function (data) {
                    var errors = '';
                    for (datas in data.responseJSON.errors) {
                        errors += data.responseJSON.errors[datas] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',

                        html: 'Bilinmeyen bir hata oluştu.\n' + errors,
                    });
                }
            });
        }


        function updateVideo(id) {

            var order = $('#orderUpdate');
            var image = $('#imageUpdate');
            var video_url = $('#urlUpdate');
            var title = $('#titleUpdate');
            var description = $('#descriptionUpdate');
            var category_id = $('#categoryUpdate');
            var imgSrc = $('#videoImg');


            $.ajax({
                type: 'GET',
                url: '{{route('video.get')}}',
                data: {id: id},
                success: function (data) {

                    order.val(data.order);
                    image.attr(data.image);
                    imgSrc.prop('src',data.image) ;
                    title.val(data.title);
                    video_url.val(data.video_url);
                    description.val(data.description);
                    category_id.val(data.category_id);
console.log(data.image)
                    $('#updateId').val(id);

                    $('#update_videos_modal').modal("toggle");


                },
                error: function (data) {
                    var errors = '';
                    for (datas in data.responseJSON.errors) {
                        errors += data.responseJSON.errors[datas] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',

                        html: 'Bilinmeyen bir hata oluştu.\n' + errors,
                    });
                }
            });
        }

        function deleteVideo(id) {
            Swal.fire({
                icon: "warning",
                title: "Emin misiniz?",
                html: "Silmek istediğinize emin misiniz?",
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: "Onayla",
                cancelButtonText: "İptal",
                cancelButtonColor: "#e30d0d"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                        url: '{!! route('video.delete') !!}',
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function () {
                            Swal.fire({
                                icon: "success",
                                title: "Başarılı",
                                showConfirmButton: true,
                                confirmButtonText: "Tamam"
                            });
                            dataTable.ajax.reload();
                        },
                        error: function () {
                            Swal.fire({
                                icon: "error",
                                title: "Hata!",
                                html: "<div id=\"validation-errors\"></div>",
                                showConfirmButton: true,
                                confirmButtonText: "Tamam"
                            });
                            $.each(data.responseJSON.errors, function (key, value) {
                                $('#validation-errors').append('<div class="alert alert-danger">' + value + '</div>');
                            });
                        }
                    });
                }
            });
        }

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                }
            });
        });

        var dataTable = null;

        dataTable = $('#videoTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Turkish.json'
            },
            order: [
                [0, 'ASC']
            ],
            processing: true,
            serverSide: true,
            scrollX: true,
            scrollY: true,
            ajax: '{!! route('video.fetch') !!}',
            columns: [
                {data: 'id'},
                {data: 'order'},
                {data: 'category_id'},
                {data: 'image',
                'render': function(data){
                    return '<img  src="' + data + '" alt="' + data + '" />';
                }
                },
                {data: 'title'},
                {data: 'description'},
                {data: 'update'},
                {data: 'delete'},
            ]
        });


    </script>
@endsection

@section('scripts')
    <script type="text/javascript">
        setTimeout(()=>{
            $("#sidebar-menu-one").addClass("show")
        },1000)
    </script>
@endsection
