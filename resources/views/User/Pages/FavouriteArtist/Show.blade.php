@extends('User/Layouts/Layout/HomeLayout')
@section('UserContent')
<div class="container-fluid bg-light ">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 94px">
    </div>
</div>
<div class="category-browse--header">
    <div class="category-browse--header-">
        <div class="container" style="padding:1rem";>
            <div class="category-browse--header-text">
                <div class="category-browse--header-text__wrapper">
                    <h1 class="category-browse__header--content">Favourite Artists <div class="eds-text-bl" style="color:#FFF58C;padding-top:8px"></div>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-10">
    <div class="row">

        @foreach($artist as $art)
        <div class="col-lg-4 col-sm-6 mb-5 performar_area pt-0">
            <div class="single_performer wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                <div class="thumb">
                    <img src="{{asset('Assets/images/' .$art->image)}}" alt="">
                    <div class="performer_heading">
                        <a href="{{ route('ArtistShowDetail' , $art->id) }}">
                            <h4>{{$art->name}}</h4>
                        </a>
                        <p>
                            {{ Str::length($art->bio) > 50 ? substr($art->bio, 0,50) . '...' : $art->bio }}
                        </p>
                        <h5 style="font-weight: bold">{{$art->title}}</h3>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection('UserContent')

<style>
    .card .card-body {
        height: 300px;
        width: 300px;
    }

    .card .card-body img {
        height: 280px !important;
        width: 250px !important;
    }
</style>