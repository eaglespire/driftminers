<div class="authentication-form">
    <form method="POST" action="{{route('register')}}">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group mb-15">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="flaticon-user"></i></span>
                        </div>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name*" required />
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group mb-15">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="flaticon-user"></i></span>
                        </div>
                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username*" required />
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group mb-15">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="flaticon-user"></i></span>
                        </div>
                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address *" required />
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group mb-15">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="flaticon-user"></i></span>
                        </div>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password *" required />
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group mb-15">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="flaticon-user"></i></span>
                        </div>
                        <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password *" required />
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <button type="" class="btn1 orange-gradient full-width">Sign Up</button>
            </div>
        </div>
        <div class="authentication-account-access mt-20">
            <div class="authentication-account-access-item">
                <div class="authentication-checkbox">
                    <input type="checkbox" id="newsletter">
                    <label for="newsletter">Click here to get newsletter</label>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="authentication-divider mt-60">
    <span>Or Sign Up With</span>
</div>
<div class="authentication-social-access mt-10">
    <div class="authentication-social-item social-btn social-btn-fb mt-10">
        <a href="#">Facebook</a>
    </div>
    <div class="authentication-social-item social-btn social-btn-tw mt-10">
        <a href="#">Twitter</a>
    </div>
    <div class="authentication-social-item social-btn social-btn-ld mt-10">
        <a href="#">Linkedin</a>
    </div>
</div>
