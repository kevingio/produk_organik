@extends('layouts.master')

@section('title') Testimoni Produk Organik @endsection

@section('content')
<script type="text/javascript">
  $(document).ready(function () {
    $('#testimony').addClass('active');
  });
</script>

<div class="container stack">

  <div class="card-columns">
    @foreach($testimonies as $key => $testimony)
    <div class="card clearfix product-box">
      <img class="card-img-top" src="{{ $testimony->picture }}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">{{ $testimony->name }}, {{ $testimony->origin }}</h5>
        <p class="card-text caption font-italic">"{{ $testimony->testimony }}"</p>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
