@extends('User/Layouts/Layout/HomeLayout')
@section('UserContent')
<!-- bradcam_area -->
<div class="container-fluid bg-light ">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 94px">
    </div>
</div>
<div class="category-browse--header">
    <div class="category-browse--header-">
        <div class="container">
            <div class="category-browse--header-text">
                <div class="category-browse--header-text__wrapper">
                    <h1 class="category-browse__header--content">Food Store/{{$foodStore->name}}
                        <div class="eds-text-bl"></div>
                    </h1>
                    <p></p>
                </div>
            </div>
            <!-- <aside class="category-browse--header-image category-browse--header-image--square"><img fetchpriority="high" class="full-width-img" loading="eager" src="" alt="[object Object]"></aside> -->
        </div>
    </div>
</div>

<!-- bradcam_area end -->
<!-- about_area_start  -->
<div class="about_area  extra_padd">

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="food-card">
                    <div class="container-fluid">
                        <h2 class="category-heading mb-5">{{$foodStore->name}}</h2>
                        <div class="row w-100 mx-auto">
                            <div class="row food-detail d-flex">
                                <div class="img col">
                                    <img src="{{ asset('Assets/images/' . $foodStore->image) }}" alt="Food Store" height="200px" width="240px">
                                </div>
                                <div class="about col">
                                    <h5>About Us</h5>
                                    <p>{!! $foodStore->description !!}</p> <br>

                                    <h5>Contact Us</h5>
                                    <p><i class="fa-solid fa-location-dot"></i> {{$foodStore->address}}</p>
                                    <p><i class="fa-solid fa-phone"></i> {{$foodStore->contact_number}}</p>
                                    <p><i class="fa-solid fa-envelope"></i> {{$foodStore->email}}</p>
                                </div>
                            </div>
                            <hr class="mt-4 mb-0">
                            <div class="col-sm-12 p-0 mt-4 food-gallery-item">
                                @if(is_array(json_decode($foodStore->gallary_images)))
                                <h3 class="category-heading">Food Store Gallery</h3>
                                <?php
                                foreach (json_decode($foodStore->gallary_images) as $index=>$a1) {
                                ?>
                                    <a href="#myGallery">
                                        <img src="{{asset('Assets/images/' .$a1)}}" id="image-<?php echo $index;?>" data-toggle="modal" data-target="#GalleryModal" alt="" height="70px" width="70px">
                                    </a>
                                <?php } ?>

                                @endif
                                <div class="modal fade" id="GalleryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">

                                                <!-- carousel body-->
                                                <div id="myGallery" class="carousel slide" data-interval="false">
                                                    <div class="carousel-inner">
                                                        <?php
                                                        foreach (json_decode($foodStore->gallary_images) as $index=>$a1) {
                                                        ?>
                                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                            <img src="{{asset('Assets/images/' .$a1)}}" alt="galler-image">
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                    <!-- Previous and Next buttons-->
                                                    <a class="carousel-control-prev w-auto" href="#myGallery" role="button" data-slide="prev">
                                                    <i class="fa-solid fa-arrow-left"></i></a> 
                                                    <a class="carousel-control-next w-auto" href="#myGallery" role="button" data-slide="next">
                                                    <i class="fa-solid fa-arrow-right"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4">                                   
                        <?php
                        $currency = currency();
                        $currency_symbol = $currency[0]->currency_symbol;
                        ?>
                        @if(count($foodmenu)>0)
                        <h3 class="category-heading">Available Food Menu</h3>
                        <div class="row">
                            @foreach($foodmenu as $foodItem)
                            <div class="col-md-4 col-sm-6">
                                <div class="menu-item">
                                    <img class="img-fluid card-img-top" src="{{ asset('Assets/images/' . $foodItem->image) }}" width="100" alt="Image">
                                    <div class="menu-body">   
                                        <h4>{{$foodItem->name}}</h4>
                                        <p class="description">
                                            @if(Str::length($foodItem->description) > 80) 
                                            {!!str::substr($foodItem->description , 0 , 80 )!!} . '...' . 
                                            <a href="#" onclick='togglemodel(<?php echo $foodItem->id  ?>)'>View More</a>
                                            @else
                                            {!!$foodItem->description!!}
                                            @endif
                                        </p>
                                        <p class="text-muted price">Price: {{ $currency[0]->currency_symbol }}{{$foodItem->price}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- model value -->
                            <div id="myModel<?php echo $foodItem->id; ?>" class="modal food-detail-modal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Food Menu Detail</h3>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <img class="img-fluid modal-img-top" src="{{ asset('Assets/images/' . $foodItem->image) }}" width="100" alt="Image">
                                                <h4>{{$foodItem->name}}</h4>
                                                <p>{!! $foodItem->description !!}</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="deleteButton" onclick="closeModel()" class="btn btn-primary">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- model value -->
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let nikh


    // function togglemodel(id) {
    // nikh = id;
    // // alert(nikh)
    // document.getElementById('myModel').style.display = "block";
    // }

    function togglemodel(id) {
        nikh = id
        let mod = document.getElementById('myModel' + nikh).style.display = "block"
    }

    function closeModel() {
        let clos = document.getElementById('myModel' + nikh).style.display = "none"
    }
    $('#myGallery').carousel({

        interval: 2000,

    });
</script>
<style>
    /* p {
        color: black !important;
    } */

    .card .card-body {
        height: auto;
        width: auto;
    }

    .card .card-body img {
        height: 200px;
        width: 100px;
    }

    .menu-item {
        margin-bottom: 24px;
        background-color: #eeeeee;
        border-radius: 0;
    }
    .menu-item .menu-body{
        padding: 16px;
        text-align: center;
    }
    .menu-item .menu-body .description{
        text-align: center;
        font-size: 14px;
    }
    .menu-item .menu-body .description a{
        font-weight: 600;
        margin-top: 4px;
        display: block;
    }
    .menu-item .menu-body .description a:hover{
        text-shadow: 0px 0px 1px #0a58ca;
    }
    .menu-item .menu-body .price{
        margin-top: 4px;
    }
    .menu-item:hover {
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    .menu-item h4 {
        font-weight: bold;
        font-size: 18px;
        text-transform: uppercase;
        text-align: center
    }

    .menu-item p {
        margin-bottom: 0;
    }

    /* .col-sm-12 {
        margin-bottom: 20px;
    } */

    .img-fluid {
        height: 180px;
        width: 100%;
        object-fit: cover;
    }

    .about_area {
        padding: 50px 0;
        /* position: relative; */
        margin-top: 0;
    }
    .modal.show{
        display: flex!important;
        justify-content: center;
        align-items: center;
        padding-right: 0!important;
    }
    .modal.show .modal-dialog{
        width: 50%;
        height: 50%;
        max-width: 100%;
        margin: 0;
    }
    .modal.show .modal-content{
        background: transparent;
        box-shadow: none;
        border: none;
        border-radius: 0;
        height: 100%;
    }
    .modal.show .modal-body{
        padding: 0;
        height: 100%;
    }
    .modal.show #myGallery,
    .modal.show #myGallery .carousel-inner, 
    .modal.show #myGallery .carousel-inner .carousel-item{
        height: 100%;
    }
    .modal.show #myGallery .carousel-inner .carousel-item img{
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    .modal.show #myGallery .carousel-control-next, .modal.show #myGallery .carousel-control-prev{
        font-size: 40px;
        height: 40px;
        display: flex;
        background: rgba(0, 0, 0, 0.8);
        padding: 0 20px;
        margin: 0;
        top: 50%;
        transform: translateY(-50%);
    }
    .modal.show #myGallery .carousel-control-next{
        right: -74.5px;
    }
    .modal.show #myGallery .carousel-control-prev{
        left: -75px;
    }
    p {
        margin-bottom: 0;
    }
    .food-detail-modal {
    background: rgba(0, 0, 0, 0.7);
    }
    .food-detail-modal .modal-title{
        font-weight: bold;
        margin-bottom: 0;
    }
    .food-detail-modal .modal-body .modal-img-top{
        max-width: 100%;
        height: 150px;
        object-fit: cover;
        margin-bottom: 16px;
        width: 250px;
    }
    .food-detail-modal .modal-body h4{
        font-weight: bold;
        color: #037ee6;
    }
</style>
<script>
    function showLargeImage(imageSrc, imageId ) {
        // console.log(imageId, imageSrc);
        // create a new image element with the large image source
        var largeImage = new Image();
        // console.log(largeImage);
        largeImage.src = `{{asset('Assets/images/' .$a1)}}`;
     

        // when the image is loaded, show it in an overlay
        largeImage.onload = function() {
            // create the overlay element
            var overlay = $('<div>').css({
                position: 'fixed',
                top: 0,
                left: 0,
                width: '100%',
                height: '100%',
                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center'
            });

            // create the large image element and add it to the overlay
            var img = $('<img>').css({
                maxWidth: '50%',
                maxHeight: '50%',
            }).attr('src', `{{asset('${imageSrc}')}}`).appendTo(overlay);

            // add the overlay to the document
            $('body').append(overlay);

            // when the overlay is clicked, remove it from the document
            overlay.click(function() {
                overlay.remove();
            });
        };
    }
</script>
@endsection('UserContent')