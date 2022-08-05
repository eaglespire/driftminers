<x-layouts.master>
    <x-slot:pageTitle>
        Users | {{ config('app.name') }}
    </x-slot:pageTitle>
    <x-slot:header>
        Users | All Users
    </x-slot:header>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card bg-secondary">
                <div class="card-header">
                    {{ $users->links() }}
                    <h4>List of Users</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($users->isNotEmpty())
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->track_password }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">
                                                    <i class="fas fa-edit"></i> edit
                                                </a>
                                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">
                                                    <i class="fas fa-eye"></i> view
                                                </a>
                                                <form action="{{ route('users.destroy', $user->id) }}" class="d-inline" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure You Want To Proceed?')">
                                                        <i class="fas fa-trash-alt"></i> remove
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.master>
