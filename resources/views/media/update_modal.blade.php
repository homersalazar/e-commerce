<div class="modal fade" id="editMedia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Media</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/media" method="POST" id="update_form" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4 text-center">
                            <img id="image" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <label for="">Title</label>
                            <input type="text" name="titles" id="titles" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt-3">
                            <label for="">Caption</label>
                            <input type="text" name="captions" id="captions" class="form-control" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt-3">
                            <label for="">Date Uploaded</label>
                            <input type="date" name="dates" id="dates" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="media_path" id="media_path" class="form-control">
                    <input type="hidden" name="media_id" id="media_id" class="form-control">
                    <button type="submit" id="saveBtn" class="btn shadow-none text-white bg-blue-600 btn-sm shadow-none">Save</button>
                    <button type="button" class="btn shadow-none text-white bg-gray-400 btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
