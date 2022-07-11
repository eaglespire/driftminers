<a onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="background-color: #EE3F0E;color:#ffffff;" href="{{route('logout')}}" class="nav-link @if(route('logout') == url()->current()) active @endif">
    {{__('Logout')}}
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
