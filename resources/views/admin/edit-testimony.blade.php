@extends('layouts.admin')

@section('title') Testimony {{ $testimony->name }} @endsection

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
                    <img src="{{ $testimony->picture }}" id="imgModal" class="image" alt="preview">
                </div>
            </div>
        </div>
    </div>

    <!-- Top Panel -->
    <div class="bg-green top-panel clearfix product-box">
        <div class="container">
            <span><a href="{{ route('show-testimony') }}"
                     class="breadcrumbs">Testimoni</a> / {{ $testimony->name }}</span>
        </div>
    </div>

    <!-- Error Message -->
    <div class="container stack">
        @if ($errors->any())
            <div class="alert alert-danger">
      <span>
        @foreach ($errors->all() as $error)
              {{ $error }}
          @endforeach
      </span>
            </div>
        @endif

        <form action="{{ route('update-testimony', [$testimony->id]) }}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <a href="#" data-toggle="modal" data-target="#previewImgModal">
                            <img src="{{ $testimony->picture }}" id="preview" class="image img-thumbnail" alt="preview">
                        </a>
                        <input type="file" name="photo" accept="image/*" onchange="readURL(this);" required>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="name" autocomplete="off"
                               value="{{ $testimony->name }}" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                <label for="origin">Origin</label>
                                <input type="text" class="form-control" name="origin" autocomplete="off"
                                       value="{{ $testimony->origin }}" required>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="form-group">
                                <label for="occupation">Occupation</label>
                                <input type="text" class="form-control" name="occupation" autocomplete="off"
                                       value="{{ $testimony->occupation }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="testimony">Testimony</label>
                        <textarea class="form-control" id="editor-bootstrap" name="testimony" rows="10"
                                  autocomplete="off" required>{{ $testimony->testimony }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark" name="add">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
