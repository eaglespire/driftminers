<x-layouts.master>
   <x-slot:pageTitle>
       Dashboard | {{ config('app.name') }}
   </x-slot:pageTitle>
    @push('scripts')
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Users', 'Subscribers', 'Plans', 'Withdrawals'],
                    datasets: [{
                        label: 'total number ',
                        data: [{{ $totalUsers }}, {{ $totalSubscribers }}, {{ $totalPlans }}, {{ $totalWithdrawals }}],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
    <div class="row">
        @if(count($boxes) != 0)
            @foreach($boxes as $box)
                <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box {{ $box->color }}">
                <div class="inner">
                    <h3>{{ $box->count }}</h3>
                    <p>{{ $box->title }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route($box->url) }}" class="small-box-footer">More Information<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
            @endforeach
        @endif
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-body">
                <canvas id="myChart" width="400" height="100"></canvas>
            </div>
        </div>
    </div>
</x-layouts.master>


