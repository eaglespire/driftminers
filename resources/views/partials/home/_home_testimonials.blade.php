<div class="home-client-section p-tb-100">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <h2 class="carousel_h2">Customer <b>Testimonials</b></h2>
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        @for($i=0; $i < count(get_testimonials()); $i++)
                            <li data-target="#myCarousel" data-slide-to="{{$i}}" class="@if($i == 0) active @endif"></li>
                        @endfor
                    </ol>
                    <!-- Wrapper for carousel items -->

                    <div class="carousel-inner">
                        @foreach(get_testimonials() as $testimonial)
                            <div class="carousel-item @if($loop->index == 1) active @endif">
                                <div class="row">
                                    @foreach($testimonial as $item)
                                        <div class="col-sm-6">
                                            <div class="testimonial">
                                                <p>
                                                    {{$item['description']}}
                                                </p>
                                            </div>
                                            <div class="media">
                                                <img src="{{$item['image']}}" class="mr-3" alt="">
                                                <div class="media-body">
                                                    <div class="overview">
                                                        <div class="name"><b>{{$item['name']}}</b></div>
                                                        <div class="details">{{$item['position']}}</div>
                                                        <div class="star-rating">
                                                            <ul class="list-inline">
                                                                @for($i=0; $i<$item['star_rating']; $i++)
                                                                    <li class="list-inline-item"><i class='bx bx-star'></i></li>
                                                                @endfor
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <i class='bx bxs-left-arrow'></i>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                        <i class='bx bxs-right-arrow'></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
