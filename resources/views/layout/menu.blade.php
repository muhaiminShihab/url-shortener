<div class="row py-4">
    <div class="col-12 text-center text-md-end">
        <a href="{{ route('home_page') }}" class="px-3 text-dark">Home</a>
        @if ( Auth::check() )
            <a href="{{ route('dashboard_page') }}" class="px-3 text-dark">Dashboard</a>
            <a href="{{ route('sign_out') }}" class="px-3 text-dark">Logout</a>
        @else
            <a href="{{ route('sign_in_page') }}" class="px-3 text-dark">Sign-in</a>
            <a href="{{ route('sign_up_page') }}" class="px-3 text-dark">Sign-up</a>
        @endif
    </div>
</div>
