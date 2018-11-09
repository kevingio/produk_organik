@extends('layouts.master')

@section('title')
Hidup Sehat dengan Makan Makanan Organik
@endsection

@section('content')
<div class="container-fluid main">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 non-vege">

        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 vege">

        </div>
    </div>

    <section class="stack">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h3 class="title text-center">APA KEUNGGULAN MAKANAN ORGANIK?</h3>
                <div class="row">
                    <div class="col-md-3 col-sm-6 benefit-box text-center">
                        <div class="benefit-content">
                            <h5>Mencegah berbagai penyakit jantung, kanker, diabetes</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 benefit-box text-center">
                        <div class="benefit-content">
                            <h5>Bebas dari transgenik</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 benefit-box text-center">
                        <div class="benefit-content">
                            <h5>Memiliki tubuh yang sehat dan ideal</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 benefit-box text-center">
                        <div class="benefit-content">
                            <h5>Meningkatkan Kesuburan</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="parallax"></div>

<section class="stack">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title text-center">APA KATA PARA VEGETARIAN?</h3>
                <div class="row justify-content-center mgb-lg fadeIn">
                    <div class="col-md-6 col-lg-4 clearfix">
                        <img src="https://www.grammy.com/sites/com/files/styles/news_detail_header/public/wireimage-697727702_1.jpg?itok=_bN6p35A" alt="gambar" style="width: 100%; height: auto;" />
                    </div>
                    <div class="col-md-6 col-lg-4 quote-box">
                        <div class="quote-content text-left">
                            <p class="lead">"Saya tidak makan daging, ikan atau telur. Saya kini lebih berenergi"</p>
                            <p class="author-quote">Shania Twain, Penyanyi Country Pop dari Canada</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center fadeIn">
                    <div class="col-md-6 col-lg-4 quote-box">
                        <div class="quote-content text-right">
                            <p class="lead">"Sudah delapan bulan saya menjadi vegan, tetapi saya terus mendapatkan ledakan energinya. Sangat bertenaga, dan saya kini menyadari bahwa daging telah menjadi racun bagi saya"</p>
                            <p class="author-quote">Mike Tyson, Juara Tinju Kelas Berat dari Amerika Serikat</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 clearfix">
                        <img src="{{ asset('images/Mike-Tyson.jpg') }}" alt="gambar" style="width: 100%; height: auto;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="stack bg-green">
  <div class="container green-panel top-panel">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
</section>

<section class="container stack fadeIn">
    <div class="row">
        <div class="col-md-12">
            <h3 class="title text-center">INSTAGRAM GALLERY</h3>
        </div>
    </div>
    <div class="card-columns mgb-lg">
        @foreach($result as $key => $data)
        <div class="card clearfix product-box">
            <img src="{{ $data->images->standard_resolution->url }}" class="instagram-image" alt="{{ $data->caption->text or '' }}" style="width: 100%; height: auto;">
        </div>
        @endforeach
    </div>
    <div class="text-center">
        <a href="https://api.whatsapp.com/send?phone=628112596097" class="btn btn-success btn-whatsapp animated pulse infinite"><i class="fa fa-whatsapp"></i>Pesan Sekarang</a>
    </div>
</section>

<!-- Instagram Image Preview Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="image-preview">
  <div id="caption"></div>
</div>

@endsection
