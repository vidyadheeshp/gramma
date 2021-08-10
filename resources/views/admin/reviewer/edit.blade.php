    <!-- Add modal content -->
    <div id="editModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ URL::route($url.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit {{ $title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="name">Reviewer Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Reviewer Name" value="{{ $row->name}}" required>

                        <div class="invalid-feedback">
                          Please Provide Reviewer Name.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" disabled placeholder="Email" value="{{ $row->email }}" required>

                        <div class="invalid-feedback">
                          Please Provide Email Address.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{ $row->password }}" min="8" required>

                        <div class="invalid-feedback">
                          Please Provide A Password.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $row->phone }}" placeholder="Phone">

                        <div class="invalid-feedback">
                          Please Provide Phone Number.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ $row->address }}" placeholder="Address" required>

                        <div class="invalid-feedback">
                          Please Provide Address.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" class="form-control" name="dob" id="dob" value="{{ $row->dob }}" placeholder="Date Of Birth" required>

                        <div class="invalid-feedback">
                          Please Provide Date Of Birth.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">Photo</label>
                        <input type="file" class="form-control" name="image" id="image"   placeholder="Photo">

                        <div class="invalid-feedback">
                          Please Provide Profile Photo.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="details">Profile Details</label>
                        <textarea class="form-control summernote" name="details" id="details" rows="8">{{ $row->details }}</textarea>
                    </div>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->