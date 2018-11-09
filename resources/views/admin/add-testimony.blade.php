@extends('layouts.admin')

@section('title') Testimony Produk Organik @endsection

@section('content')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#testimony').addClass('active');
        });
    </script>

    <!-- Modal preview Image -->
    <div class="modal fade" id="previewImgModal" tabindex="-1" role="dialog" aria-labelledby="previewImgModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Image Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="https://www.autocar.co.uk/sites/autocar.co.uk/files/styles/gallery_slide/public/images/car-reviews/first-drives/legacy/1-aston-martin-vantage-2018-otr-front.jpg?itok=-sAl_bE9"
                         id="imgModal" class="image" alt="preview">
                </div>
            </div>
        </div>
    </div>

    <div class="container stack">

        <!-- Error Message -->
        @if ($errors->any())
            <div class="alert alert-danger">
      <span>
        @foreach ($errors->all() as $error)
              {{ $error }}
          @endforeach
      </span>
            </div>
        @endif

        <form action="{{ route('submit-testimony') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <a href="#" data-toggle="modal" data-target="#previewImgModal">
                            <img src="https://www.autocar.co.uk/sites/autocar.co.uk/files/styles/gallery_slide/public/images/car-reviews/first-drives/legacy/1-aston-martin-vantage-2018-otr-front.jpg?itok=-sAl_bE9"
                                 id="preview" class="image img-thumbnail" alt="preview">
                        </a>
                        <input type="file" name="photo" accept="image/*" onchange="readURL(this);" required>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="name" autocomplete="off" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                <label for="origin">Origin</label>
                                <input type="text" class="form-control" name="origin" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="form-group">
                                <label for="occupation">Occupation</label>
                                <input type="text" class="form-control" name="occupation" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="testimony">Testimony</label>
                        <textarea class="form-control" name="testimony" rows="10" autocomplete="off"
                                  required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark" name="add">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
