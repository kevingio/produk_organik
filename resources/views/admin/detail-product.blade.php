@extends('layouts.admin')

@section('title')
    {{ $product->product_name }}
@endsection

@section('content')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#product').addClass('active');
        });
    </script>

    <!-- Modal Delete Confirmation -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this testimony?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <a href="#" class="btn btn-dark modal-delete">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-green top-panel clearfix product-box">
        <div class="container">
            <span><a href="{{ route('show-product') }}"
                     class="breadcrumbs">Produk</a> / {{ $product->product_name }}</span>
        </div>
    </div>

    <div class="container stack">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 product-box-left clearfix">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($images as $key => $image)
                            @if($key == 0)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                    class="active"></li>
                            @else
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"></li>
                            @endif
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($images as $key => $image)
                            @if($key == 0)
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ $image->path }}" alt="First slide">
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ $image->path }}" alt="Second slide">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 product-box-right">
                <h2>{{ $product->product_name }}</h2>
                <p class="price-tag">{{ $product->price }},- (belum termasuk ongkir)</p>
                <article class="caption">
                    {!! $product->description !!}
                </article>
                <br>
                <div class="checkout">
                    <a href="{{ route('edit-product', [$product->id]) }}" class="btn btn-warning btn-md"><i class="fa fa-pencil"></i>Edit</a>
                    <button type="button" data-href="{{ route('delete-product', [$product->id]) }}"
                            class="btn btn-danger delete-item" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i>Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
