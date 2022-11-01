{{-- <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="@yield('link_fp')">@yield('fp')</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">@yield('sp')</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">@yield('sp')</h6>
</nav> --}}

<nav aria-label="breadcrumb">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a href="{{ route('vmatrixkeputusan') }}" class="btn btn-outline-info m-2">SAW</a>
            <a href="{{ route('wpjumbobot') }}" class="btn btn-outline-info m-2">WP</a>
        </div>
    </div>
</nav>
