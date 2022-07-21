<x-layouts.master>
    <x-slot:pageTitle>
        Users | Edit User
    </x-slot:pageTitle>
    <x-slot:header>
        Users | Edit User
    </x-slot:header>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-body bg-secondary">
                <form action="{{ route('users.update', $user->id) }}" method="post" class="">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">UserName</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password" value="{{ $user->track_password }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password_confirmation" value="{{ $user->track_password }}">
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" onclick="return confirm('Are You Sure?')">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.master>
