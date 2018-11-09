@extends('layouts.admin')

@section('title') Produk Organik @endsection

@section('content')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#product').addClass('active');
        });
    </script>

    <!-- Top Panel -->
    <div class="bg-green top-panel clearfix product-box">
        <div class="container">
            <span>{{ count($products) }} products</span>
            <a class="btn btn-light float-right" href="{{ route('add-product') }}">Add Product</a>
        </div>
    </div>

    <div class="container stack">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 clearfix product-box">
                    <a href="{{ route('product', [$product->id]) }}" class="product">
                        <div class="card animation">
                            <div class="card-head animation">
                                <img class="card-img-top"
                                     src="https://img.okeinfo.net/content/2016/08/01/481/1452085/inilah-manfaat-makanan-organik-bagi-tubuh-krXWALTMbp.jpg"
                                     alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $product->product_name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
