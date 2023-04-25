@extends('layout.app')

@section('content')
@include('media.update_modal')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-2xl pb-3 border-b-4 border-blue-500">Media</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 mt-4">
                <form method="POST" action="{{ route('media.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <input type="file" class="form-control form-control-sm shadow-none" name="image" id="image">
                        <button class="btn shadow-none text-white bg-blue-600 btn-sm shadow-none" type="submit" id="image">Upload</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="media-section">
                <div class="col-lg-12 mt-4">
                    <table class="table media-table">
                        <tbody>
                            @foreach ($images as $row)
                               <img src="/storage/images/{{$row->path}}" onclick="editMedia('{{ $row->id }}' , '{{ $row->path }}', '{{ $row->title }}' , '{{ $row->caption }}' , '{{ $row->uploaded_date }}')" />
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        const editMedia = (media_id , media_path ,media_title, media_caption, dates) =>{
            $('#editMedia').modal('show');
            document.getElementById("media_id").value = media_id;
            document.getElementById("media_path").value = media_path;
            document.getElementById("titles").value = media_title;
            document.getElementById("captions").value = media_caption;
            document.getElementById("dates").value = dates;
            const img = document.querySelector("#image");
            img.src = `/storage/images/${media_path}`;
            img.width = 160;
            img.height = 160;
            $('#update_form').attr('action','/media/'+media_id);
        }

        $(document).ready(function() {
            $('.media-table').DataTable( {
                "paging":   false,
                "ordering": false,
                "info":     false
            } );
        });
    </script>
@endsection
