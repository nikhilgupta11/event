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
                    @foreach($artist as $art)
                    <h1 class="category-browse__header--content">Artists/{{ $art->name }}
                        <div class="eds-text-bl"></div>
                    </h1>
                    @endforeach
                    <p></p>
                </div>
            </div>
            <!-- <aside class="category-browse--header-image category-browse--header-image--square"><img fetchpriority="high" class="full-width-img" loading="eager" src="" alt="[object Object]"></aside> -->
        </div>
    </div>
</div>

<!-- bradcam_area end -->
<!-- about_area_start  -->
<div class="about_area  extra_padd py-5">
    <div class="container">
        <!-- <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section_title text-center mb-80">
                    <h3 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s"></h3>
                </div>
            </div>
        </div> -->
        <div class="row">
            @foreach($artist as $artistDetails)
            <div class="col-12 col-md text-center">
                <div class="about_thumb">
                    <div class="shap_3  wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">
                    </div>
                    <div class="thumb_inner  wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <img src="{{asset('Assets/images/' .$artistDetails->image)}}" alt="" width="400px" height="200px" class="astist_image">
                    </div>
                </div>
            </div>
            <div class="col col-12 col-md artist-details">
                <div class="about_info pl-68 mb-4">
                    <h4 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">{{ ucfirst($artistDetails->name) }}</h4>
                    <h6><i class="fa-solid fa-user"></i> {{$artistDetails->nick_name}}</h6>
                    <h6><i class="fa-solid fa-envelope"></i> {{$artistDetails->email}}</h6>
                    <h6><i class="fa-solid fa-phone"></i> {{$artistDetails->contact_number}}</h6>
                    <h6><i class="fa-solid fa-globe"></i> {{$artistDetails->country}}</h6>
                </div>
                @if(count($expertize)>0)
                <div class="about_info pl-68">
                    <h4 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">Artist Expertize</h4>
                    @foreach($expertize as $index=>$exoer)
                    {{$index+1}}. {{$exoer->name}}
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach

            @foreach($artist as $art)
            <div class="col-md-12 mt-4 about_info pl-68 artist-details">

                <h4 class="wow fadeInLeft " data-wow-duration="1s" data-wow-delay=".5s">Bio</h4>
                <div class="scroller-height bio">
                    {!! $art->bio !!}
                </div>

            </div>
            @endforeach
            @if($artist[0]->gallary_images)
            <div class="col-md-12 mt-4 about_info pl-68 artist-details">
                <h4 class="wow">Gallery</h4>
                <div class="row gallery-item">
                    @if(is_array(json_decode($gallary_images->gallary_images)))
                    <h5>Food Store Gallery</h5>
                    <?php
                    foreach (json_decode($gallary_images->gallary_images) as $index=>$a1) {
                    ?>
                        <a href="#myGallery">
                            <img src="{{asset('Assets/images/' .$a1)}}" id="image-<?php echo $index;?>" data-toggle="modal" data-target="#myModal" alt="" height="70px" width="70px">
                        </a>

                    <?php } ?>
                    @endif
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">

                                     <!-- carousel body-->
                                    <div id="myGallery" class="carousel slide" data-interval="false">
                                        <div class="carousel-inner">
                                            <?php
                                            foreach (json_decode($gallary_images->gallary_images) as $index=>$a1) {
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
            @endif
            <div class="col-md-12 mt-4 about_info events pl-68">
                <div class="container">
                    <div class="properties-listing spacer">
                        <h2 class="category-heading d-inline-block">Respective Events</h2>
                        <div class="row mt-5">
                            <div class="col-lg-4 col-sm-6 mb-5">
                                <div class="card event">
                                    <div class="card-img-top single-defination">
                                        <a href="#"> <img class="img-fluid" src="https://bicevent.com/wp-content/uploads/2012/04/img-meeting-conference-home.jpg" height="250px"><br></a>
                                        <span class="favrcon">
                                            <button>
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <a href="#">
                                            <h4 class="mb-15">Hand Drawn & Crafted</h4>
                                        </a>
                                        <div class="d-flex justify-content-between time-date">
                                            <span>
                                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                Sat, 22 Apr 2023
                                            </span>
                                            <span>
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                12:00 AM
                                            </span>
                                        </div>
                                        <div class="address">
                                            <span>
                                                <i class="fa fa-map-marker mt-2" aria-hidden="true"></i>
                                                JLN Marg, Tilak Nagar, Jaipur, Rajasthan, India
                                            </span>
                                        </div>
                                        <div class="type">
                                            <span>Music</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 mb-5">
                                <div class="card event">
                                    <div class="card-img-top single-defination">
                                        <a href="#"> <img class="img-fluid" src="https://bicevent.com/wp-content/uploads/2012/04/img-meeting-conference-home.jpg" height="250px"><br></a>
                                        <span class="favrcon">
                                            <button>
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <a href="#">
                                            <h4 class="mb-15">Hand Drawn & Crafted</h4>
                                        </a>
                                        <div class="d-flex justify-content-between time-date">
                                            <span>
                                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                Sat, 22 Apr 2023
                                            </span>
                                            <span>
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                12:00 AM
                                            </span>
                                        </div>
                                        <div class="address">
                                            <span>
                                                <i class="fa fa-map-marker mt-2" aria-hidden="true"></i>
                                                JLN Marg, Tilak Nagar, Jaipur, Rajasthan, India
                                            </span>
                                        </div>
                                        <div class="type">
                                            <span>Music</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 mb-5">
                                <div class="card event">
                                    <div class="card-img-top single-defination">
                                        <a href="#"> <img class="img-fluid" src="https://bicevent.com/wp-content/uploads/2012/04/img-meeting-conference-home.jpg" height="250px"><br></a>
                                        <span class="favrcon">
                                            <button>
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <a href="#">
                                            <h4 class="mb-15">Hand Drawn & Crafted</h4>
                                        </a>
                                        <div class="d-flex justify-content-between time-date">
                                            <span>
                                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                Sat, 22 Apr 2023
                                            </span>
                                            <span>
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                12:00 AM
                                            </span>
                                        </div>
                                        <div class="address">
                                            <span>
                                                <i class="fa fa-map-marker mt-2" aria-hidden="true"></i>
                                                JLN Marg, Tilak Nagar, Jaipur, Rajasthan, India
                                            </span>
                                        </div>
                                        <div class="type">
                                            <span>Music</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="section mt-5 about_info pl-68">
            <h4 class="wow ">Gallery</h4>
            <div class="row gallery-item">
                @foreach($artist as $artistDetails1)
                @if(is_array(json_decode($artistDetails1->gallary_images)))
                <?php $a = json_decode($artistDetails1->gallary_images); ?>
                <div class="col-sm-12">
                    <div class="">
                        <?php for ($i = 0; $i < count($a); $i++) { ?>
                            <a class="img-pop-up ms-4">
                                <img class="single-gallery-image" src="{{asset('Assets/images/'.$a[$i]) }}" style="height:150px; width:150px" />
                            </a>
                        <?php } ?>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div> -->

    </div>
</div>
<script>
    function showLargeImage(imageSrc, imageId) {
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
                justifyContent: 'center',
                zIndex: 99,
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
    };
    $('#myGallery').carousel({

    interval: 2000,

    });
</script>
<style>
    .astist_image {
        border-radius: 10px;
        /* position: fixed; */
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
</style>
<!-- about_area_end  -->
@endsection('UserContent')