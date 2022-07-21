<x-layouts.master>
    <x-slot:pageTitle>
        Users | Create New User
    </x-slot:pageTitle>
    <x-slot:header>
        Users | Create New User
    </x-slot:header>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-body bg-secondary">
                <form action="{{ route('users.store') }}" method="post" class="">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">UserName</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Register New User</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.master>


