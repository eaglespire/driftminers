<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">See all plans you have created. You can filter and search as well and toggle
                visibility of each columns</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>ROI(in %)</th>
                        <th>Minimum Investment(in USD)</th>
                        <th>Duration(In Days)</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <td>
                                <a href="{{route('edit_plan', $plan->id)}}">{{$plan->name}} (click to edit)</a>
                            </td>
                            <td>{{$plan->roi}}</td>
                            <td>{{$plan->minimum_investment}}</td>
                            <td>{{$plan->duration}}</td>
                            <td>{{$plan->description}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>ROI(in %)</th>
                            <th>Minimum Investment(in USD)</th>
                            <th>Duration(In Days)</th>
                            <th>Description</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
