@extends('layouts.admin')

@section('title') Testimoni Produk Organik @endsection

@section('content')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#testimony').addClass('active');
        });
    </script>

    <!-- Top Panel -->
    <div class="bg-green top-panel clearfix product-box">
        <div class="container">
            <span>{{ count($testimonies) }} testimonies</span>
            <a class="btn btn-light float-right" href="{{ route('add-testimony') }}">Add Testimony</a>
        </div>
    </div>

    <div class="container stack">

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

        <div class="card-columns">
            @foreach($testimonies as $key => $testimony)
                <div class="card clearfix product-box">
                    <img class="card-img-top" src="{{ $testimony->picture }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $testimony->name }}, {{ $testimony->origin }}</h5>
                        <p class="card-text caption font-italic">"{{ $testimony->testimony }}"</p>
                        <a href="{{ route('edit-testimony', [$testimony->id]) }}"
                           class="btn btn-warning clearfix">Edit</a>
                        <button type="button" data-href="{{ route('delete-testimony', [$testimony->id]) }}"
                                class="btn btn-danger delete-item" data-toggle="modal" data-target="#deleteModal">Delete
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
