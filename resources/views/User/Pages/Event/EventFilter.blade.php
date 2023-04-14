<div class="event-type-list row" id="event-type-list">

    @if(!$eventDetail->isEmpty())
    @foreach($eventDetail as $eventDetails)
    <div class="blog_left_sidebar col-lg-6 mb-5">
        <article class="blog_item">
            <div class="blog_item_img">
                @if(!is_null($eventDetails->image))
               <a href="{{route('EventShowDetail', ['id' => $eventDetails->id])}}"> <img class="card-img rounded-img" src="{{asset('Assets/images/' .$eventDetails->image)}}" height="400px" width="300px" alt=""></a>
                @else
                <img class="card-img rounded-img" src="{{asset('Assets/DefaultImage/bannerDefault.jpg')}}" height="400px" width="300px" alt="">
                @endif
                <div class="blog_item_date">
                    <!-- <h3></h3> -->
                    <p>{{ date('d ', strtotime($eventDetails->start_date)); }} {{ date(' M Y', strtotime($eventDetails->start_date)); }}</p>
                </div>
            </div>

            <div class="blog_details">
                <a class="d-inline-block" href="{{route('EventShowDetail', ['id' => $eventDetails->id])}}">
                    <h2>{{ucfirst($eventDetails->title)}}</h2>
                </a>
                <p>{!! \Illuminate\Support\Str::limit($eventDetails->about, 180, $end = '...') !!}</p>
                <!-- <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                            </ul> -->

            </div>
        </article>
    </div>
    
    @endforeach
    @else
    <div class="card no-data">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBx7l4tvO1L16xHjipR0d7hkK75Yd_Fn1J3A&usqp=CAU" alt="no-data-icon">
        <h1>Oops!</h1>
        <h2>No Data Found, Try Another Result</h2>
    </div>
    @endif

    <p class="pagination">{{$eventDetail->links()}}</p>

</div>
<style>
    .no-data{
        text-align: center;
        padding: 20px;
    }
    .no-data img{
        width: 150px;
        height: 150px;
        margin: auto;
        margin-bottom: 8px;
    }
    .no-data h1{
        font-weight: bold;
        font-family: 'Lato';
        margin-bottom: 8px;
        text-transform: capitalize;
    }
    .no-data h2{
        font-size: 16px;
        color: #001D38;
        font-weight: bold;
        font-family: 'Lato';
    }
    .pagination{
        font-size: 10px;
    }
    svg{
        display: none;
    }

    .justify-between .flex-1 {
        display: none;
    }
</style>