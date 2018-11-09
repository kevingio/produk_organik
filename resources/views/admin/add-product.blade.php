@extends('layouts.admin')

@section('title') Produk Organik @endsection

@section('content')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#product').addClass('active');
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <span>
                  @foreach ($errors->all() as $error)
                      {{ $error }}
                  @endforeach
                </span>
            </div>
        @endif

        <form action="{{ route('submit-product') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="form-group images-to-upload">
                        <label for="photo">Photo (multiple)</label>
                        <input type="file" class="image" accept="image/*" id="images" name="images[]" multiple required>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="form-group">
                                <label for="product-name">Product Name</label>
                                <input type="text" class="form-control" name="product_name" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="form-group">
                                <label for="product-price">Price</label>
                                <input type="text" class="form-control" name="price" autocomplete="off"
                                       placeholder="fill the amount only" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product-description">Product Description</label>
                        <textarea class="form-control" id="description" style="display: none;" name="description" autocomplete="off" required readonly></textarea>
                        <div id="toolbar"></div>
                        <div id="editor"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark" name="add">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
