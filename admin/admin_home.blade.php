<x-layouts.master>
   <x-slot:pageTitle>
       Dashboard | {{ config('app.name') }}
   </x-slot:pageTitle>
    <div class="row">
        @if(count($boxes) != 0)
            @foreach($boxes as $box)
                <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
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
</x-layouts.master>


