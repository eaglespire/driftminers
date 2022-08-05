<div class="row">
    <div class="col">
        <div class="card bg-primary">
            <h6 class="card-header">All Plans</h6>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>ROI(in %)</th>
                        <th>Minimum Investment(in USD)</th>
                        <th>Duration(In Days)</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>{{$plan->roi}}</td>
                            <td>{{$plan->minimum_investment}}</td>
                            <td>{{$plan->duration}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('edit_plan', $plan->id)}}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> edit
                                    </a>
                                    <form action="{{ route('delete_plan', $plan->id) }}" class="d-inline" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure')">
                                            <i class="fas fa-trash"></i> delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>ROI(in %)</th>
                            <th>Minimum Investment(in USD)</th>
                            <th>Duration(In Days)</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
