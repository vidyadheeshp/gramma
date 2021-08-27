    <!-- Add modal content -->
    <div id="service2addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ URL::route('author.'.$url.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">New {{ $title }} for <span class="text-info">Paraphrasing and ReWritting</span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->

                    <div class="row col-md-12">

                      
                      <div class="card col-md-6">
                        <div class="card-body">
                          <h2 class="card-title">Delivery</h2>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="" checked value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                              5 Days
                            </label>
                            <br/>
                            Price<span class="text-red" id="5day"></span>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="" value="2">
                            <label class="form-check-label" for="flexRadioDefault2">
                             48 Hrs
                            </label>
                            <br/>
                            Price<span class="text-red" id="48hrs"></span>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="" value="3">
                            <label class="form-check-label" for="flexRadioDefault2">
                              24 Hrs
                            </label>
                            <br/>
                            Price<span class="text-red" id="24hrs"></span>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="" value="4">
                            <label class="form-check-label" for="flexRadioDefault2">
                              12 Hrs
                            </label>
                            <br/>
                            Price<span class="text-red" id="12hrs"></span>
                          </div>
                        </div>
                      </div>
                      <div class="card col-md-12">
                        <div class="card-body">
                          <h4 class="card-title">Total</h4>
                          <span class="total-val"></span>
                            <div class="row">
                                <div class="card col-md-4">
                                  <div class="card-body">
                                      <div class="row"> <input class="form-check-input" type="checkbox" name="Paraphrasing" id="" value="20"> Paraphrasing <span class="extra-amount">20</span></div>
                                  </div>
                                </div>  
                                <div class="card col-md-4">
                                  <div class="card-body">
                                      <div class="row"> <input class="form-check-input" type="checkbox" name="Formatting" id="" value="25"> Formatting <span class="extra-amount">25</span></div>
                                  </div>
                                </div>  
                                <div class="card col-md-4">
                                  <div class="card-body">
                                      <div class="row"> <input class="form-check-input" type="checkbox" name="FlagReport" id="" value="15"> Flag Report <span class="extra-amount">15</span> </div>
                                  </div>
                                </div>  
                            </div>    
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Document Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Article Title" required>

                        <div class="invalid-feedback">
                          Please Provide Document Title.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category">Select a Service</label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="">Select Service</option>
                            @foreach( $categories as $category )
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>

                        <div class="invalid-feedback">
                          Please Select a Request Service.
                        </div>
                    </div>

                    <!--div class="form-group">
                        <label for="details">Document Details</label>
                        <textarea class="form-control summernote" name="details" id="details" rows="8" required></textarea>

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
                        <input type="file" class="form-control" name="file" id="file" placeholder="Upload Document">

                        <div class="invalid-feedback">
                          Please Provide Artilce Document.
                        </div>
                    </div>

                    <!--div class="form-group">
                        <label for="video_id">Youtube Video ID</label>
                        <input type="text" class="form-control" name="video_id" id="video_id" placeholder="Video ID">

                        <div class="invalid-feedback">
                          Please Provide Youtube Video ID.
                        </div>
                    </div-->
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