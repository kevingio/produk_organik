@extends('layouts.master')

@section('title')
  {{ $product->product_name }}
@endsection

@section('content')
<script type="text/javascript">
  $(document).ready(function () {
    $('#product').addClass('active');
  });
</script>

<div class="container stack">
  <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 product-box-left clearfix">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @foreach($images as $key => $image)
            @if($key == 0)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="active"></li>
            @else
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"></li>
            @endif
          @endforeach
        </ol>
        <div class="carousel-inner">
          @foreach($images as $key => $image)
            @if($key == 0)
            <div class="carousel-item active">
              <img class="d-block w-100" src="{{ $image->path }}" alt="Image">
            </div>
            @else
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ $image->path }}" alt="Image">
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
          <a href="https://api.whatsapp.com/send?phone=628112596097" class="btn btn-success btn-whatsapp animated pulse infinite"><i class="fa fa-whatsapp"></i>Pesan Sekarang</a>
      </div>
    </div>
  </div>
</div>
@endsection
