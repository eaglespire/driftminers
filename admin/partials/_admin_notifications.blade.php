<!-- Messages Dropdown Menu -->
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">{{ count(auth()->user()->unreadNotifications) ?? 0 }}</span>
    </a>
    @if(count(auth()->user()->unreadNotifications) != 0)
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @foreach(auth()->user()->notifications as $notification)
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="{{ asset('dist/img/avatar.png') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            {{ $notification->data['name'] }}
                            <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">{{ $notification->data['message'] }}</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $notification->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <!-- Message End -->
            </a>
        @endforeach
        <a href="{{ route('mark-as-read') }}" class="dropdown-item dropdown-footer">Mark Notifications as Read</a>
    </div>
    @endif
</li>

