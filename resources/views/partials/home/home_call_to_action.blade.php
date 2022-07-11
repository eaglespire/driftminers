<section class="home-contact-section overflow-hidden blue-gradient pt-100 pb-80">
    <div class="home-contact-bg-circle">
        <div class="home-contact-circle-item">
            <img src="/assets/images/lg-circle-1.png" alt="circle">
        </div>
        <div class="home-contact-circle-item">
            <img src="/assets/images/lg-circle-1.png" alt="circle">
        </div>
    </div>
    <div class="container">
        <div class="home-contact-inner">
            @guest
            <h2>Create account now</h2>
            @endguest
            <p>What’s next in {{config('app.name')}}? <a href="{{route('about')}}">Learn more</a></p>
            <ul class="section-button">
                @guest
                <li>
                    <a href="{{route('register')}}" class="btn1 orange-gradient btn-with-image">
                        <i class="flaticon-agenda"></i>
                        <i class="flaticon-agenda"></i>
                        Create Your Account
                    </a>
                </li>
                @else
                    <li>
                        <a href="{{role_checker()}}" class="btn1 orange-gradient btn-with-image">
                            <i class="flaticon-agenda"></i>
                            <i class="flaticon-agenda"></i>
                            Access Your Dashboard
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</section>
