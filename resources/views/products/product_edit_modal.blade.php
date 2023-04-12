<!-- Modal -->
<style>
    img{
        float: left;
        width:  93px;
        height: 93px;
        background-size: cover;
        padding: 5px;
        margin: 5px;
        border: 1px solid #000;
        cursor: pointer;
        transition: transform .2s;
    }

    img:hover{
        transform: scale(1.1);
    }

    img.selected {
        border-color: red;
    }
</style>
<div class="modal fade" id="add_media" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Media Library</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('products.edit') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="add-media-section">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-2">
                                        <button type="submit" class="btn shadow-none text-white bg-blue-600 btn-sm">Upload</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10">
                                        @foreach ($images as $row)
                                            <img src="/storage/images/{{ $row->path }}" id="images-{{ $row->id }}" name="images" alt="{{ $row->title }}" onclick="mediaHandler('{{ $row->id }}', '{{ $row->title }}', '{{ $row->caption }}', '{{ $row->path }}', '{{ $row->uploaded_date }}')">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-start">
                                <div class="info">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5>Media Details</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="pictures" id="pictures"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <p>Title</p>
                                        <input type="text" name="media_title" id="media_title" class="form-control" readonly>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <p>Caption</p>
                                        <input type="text" name="media_caption" id="media_caption" class="form-control" readonly>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <p>Uploaded Date</p>
                                        <input type="dates" name="media_dates" id="media_dates" class="form-control" readonly>
                                        <input type="hidden" name="media_id" id="media_id" class="form-control" readonly>
                                        <input type="hidden" name="media_path" id="media_path" class="form-control" readonly>
                                        <input type="hidden" id="select_ids" name="select_ids" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn shadow-none text-white bg-blue-600 btn-sm">Save changes</button>
                    <button type="button" class="border-lime-900" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const mediaHandler = (media_id , media_title , media_caption ,  media_dates) => {
        document.getElementById("media_id").value = media_id;
        document.getElementById("media_title").value = media_title;
        document.getElementById("media_caption").value = media_caption;
        document.getElementById("media_path").value = media_path;
        document.getElementById("media_dates").value = media_dates;
    }
    const selectedImages = new Set(); // create a set to store selected image ids

    // add click event listener to each image
    document.querySelectorAll('img[name="images"]').forEach(img => {
        img.addEventListener('click', () => {
            const id = img.id.split('-')[1]; // get the image id
            if (selectedImages.has(id)) {
                // image is already selected, remove it from the set and unselect it
                selectedImages.delete(id);
                img.style.border = '1px solid black';
            } else {
                // image is not selected, add it to the set and select it
                selectedImages.add(id);
                img.style.border = '2px solid blue';
            }
            // update the selected image IDs in the text input field
            const selectedImageIds = Array.from(selectedImages); // convert the set to an array of image ids
            document.getElementById('select_ids').value = selectedImageIds.join(',');
        });
    });
</script>
