    <!-- Edit modal content -->
    <div id="editModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ URL::route('author.'.$url.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit {{ $title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="title">Document Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $row->title }}" placeholder="Article Title" required>

                        <div class="invalid-feedback">
                          Please Provide Document Title.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category">Select a Service</label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="">Select Service</option>
                            @foreach( $categories as $category )
                            <option value="{{ $category->id }}" @if( $category->id == $row->category_id ) selected @endif>{{ $category->title }}</option>
                            @endforeach
                        </select>

                        <div class="invalid-feedback">
                          Please Select Document Service.
                        </div>
                    </div>

                    <!--div class="form-group">
                        <label for="details">Document Details</label>
                        <textarea class="form-control summernote" name="details" id="details" rows="8" required>{{ $row->description }}</textarea>

                        <div class="invalid-feedback">
                          Please Provide Document Details.
                        </div>
                    </div-->

                    <!--div class="form-group">
                        <label for="image">Thumbnail Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Thumbnail Image">

                        <div class="invalid-feedback">
                          Please Provide Thumbnail Image.
                        </div>
                    </div-->

                    <div class="form-group">
                        <label for="file">Upload Document</label>
                        <input type="file" class="form-control" name="file" id="file" placeholder="Upload Document" value="upload/article/{{ $row->file_path }}">

                        <div class="invalid-feedback">
                          Please Provide the Upload Document.
                        </div>
                    </div>

                    <!--div class="form-group">
                        <label for="video_id">Youtube Video ID</label>
                        <input type="text" class="form-control" name="video_id" id="video_id" value="{{ $row->video_id }}" placeholder="Video ID">

                        <div class="invalid-feedback">
                          Please Provide Youtube Video ID.
                        </div>
                    </div-->
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->