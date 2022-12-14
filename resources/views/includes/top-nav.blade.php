
<ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="{{ route('landing') }}">HOME</a></li>
    <li class="nav-item active"><a class="nav-link link text-white text-primary display-4" href="{{ url($bdf->slug_url)}}"> {{ strtoupper($bdf->post_title)  }}</a></li>
    <li class="nav-item dropdown">
        <a class="nav-link link text-black text-primary display-4 dropdown-toggle" href="#" id="dropdownProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ABOUT
        </a>
        <ul class="dropdown-menu bg-white" aria-labelledby="dropdownProfile">
            @foreach($about as $r)
                <li><a class="dropdown-item" href="{{ url($r->slug_url) }}">{{ $r->post_title }}</a></li>
            @endforeach
           
        </ul>
    </li>
    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="{{ route('history') }}">HISTORY</a></li>
    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="{{ route('gallery') }}">GALLERY</a></li>
    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="{{ route('ipd') }}">IPD</a></li>
    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="{{ route('publication') }}">PUBLICATION</a></li>
    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="{{ route('mediaadvisory') }}">MEDIA</a></li>
    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="{{ route('contact') }}">CONTACT</a></li>
    @if(Auth::guard('admin')->check())
    <li class="nav-item dropdown">
        <a class="nav-link link text-black text-primary display-4 dropdown-toggle" href="#" id="dropdownLayanan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            REGISTRATION
        </a>
        <ul class="dropdown-menu bg-white" aria-labelledby="dropdownLayanan">
            <li><a class="dropdown-item" href="{{ route('physicalattendance') }}">Physical Attendance</a></li>
            <li><a class="dropdown-item" href="{{ route('virtualattendance') }}">Virtual Attendance</a></li>
            <li><a class="dropdown-item" href="{{ route('media') }}">Media</a></li>
            <li><a class="dropdown-item" href="{{ route('guest') }}">Guest</a></li>
            <li><a class="dropdown-item" href="{{ route('commitee') }}">Commitee</a></li>
           
        </ul>
    </li>

    @else
    
       
        @if(Auth::guard('web')->check())
        <li class="nav-item dropdown">
            <a class="nav-link link text-black text-primary display-4 dropdown-toggle" href="#" id="dropdownLayanan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                REGISTRATION
            </a>
            <ul class="dropdown-menu bg-white" aria-labelledby="dropdownLayanan">
                @if(Auth::user()->type_user == 'Physical Attendance')
                <li><a class="dropdown-item" href="{{ route('physicalattendance') }}">Physical Attendance</a></li>
                @endif
                @if(Auth::user()->type_user == 'Virtual Attendance')
                <li><a class="dropdown-item" href="{{ route('virtualattendance') }}">Virtual Attendance</a></li>
                @endif
                @if(Auth::user()->type_user == 'Media')
                <li><a class="dropdown-item" href="{{ route('media') }}">Media</a></li>
                @endif
                @if(Auth::user()->type_user == 'Guest')
                <li><a class="dropdown-item" href="{{ route('guest') }}">Guest</a></li>
                @endif
                @if(Auth::user()->type_user == 'Commitee')
                <li><a class="dropdown-item" href="{{ route('commitee') }}">Commitee</a></li>
                @endif
            </ul>
        </li>
        @endif

    @endif
</ul>
