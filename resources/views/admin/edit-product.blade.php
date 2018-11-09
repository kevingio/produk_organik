@extends('layouts.admin')

@section('title') {{ $product->product_name }} @endsection

@section('content')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#product').addClass('active');
        });
    </script>

    <!-- Top Panel -->
    <div class="bg-green top-panel clearfix product-box">
        <div class="container">
            <span><a href="{{ route('show-product') }}"
                     class="breadcrumbs">Produk</a> / {{ $product->product_name }}</span>
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

        <div class="row">
            <div class="col-lg-4 col-md-6">

            </div>
            <div class="col-lg-8 col-md-6">
                <form action="{{ route('update-product', [$product->id]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="form-group">
                                <label for="product-name">Product Name</label>
                                <input type="text" class="form-control" name="product_name" autocomplete="off"
                                       value="{{ $product->product_name }}" required>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="form-group">
                                <label for="product-price">Price</label>
                                <input type="text" class="form-control" name="price" autocomplete="off"
                                       placeholder="fill the amount only" value="{{ $product->price }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product-description">Product Description</label>
                        <textarea class="form-control" id="description" style="display: none;" name="description" autocomplete="off" required readonly></textarea>
                        <div id="toolbar"></div>
                        <div id="editor">{!! $product->description !!}</div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark" name="add">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
