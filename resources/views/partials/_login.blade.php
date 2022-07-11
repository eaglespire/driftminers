<div class="authentication-form">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{route('login')}}">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group mb-15">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="flaticon-user"></i></span>
                        </div>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address *" value="{{old('email')}}" autocomplete="email" autofocus required />
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group mb-15">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="flaticon-user"></i></span>
                        </div>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" autocomplete="current-password" required />
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <button class="btn1 orange-gradient full-width" type="submit">Login</button>
            </div>
        </div>
        <div class="authentication-account-access mt-20">
            <div class="authentication-account-access-item">
                <div class="authentication-checkbox">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : ''  }}>
                    <label for="remember">Remember me</label>
                </div>
            </div>
            <div class="authentication-account-access-item">
                <div class="authentication-link">
                    <a href="{{route('password.request')}}">Forgot password?</a>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="authentication-divider mt-20">
    <span>Or Login With</span>
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
