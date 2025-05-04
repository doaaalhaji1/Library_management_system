<nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ __('puplic.nav') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas {{ app()->getLocale() == 'ar' ? 'offcanvas-start' : 'offcanvas-end' }}" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav {{ app()->getLocale() == 'ar' ? 'text-end' : 'text-start' }} flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">{{ __('puplic.home') }}</a>
                    </li>
                    @can('admin-only')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('puplic.User_management')}}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('users.create')}}">{{__('puplic.Add_user')}}</a></li>
                            <li><a class="dropdown-item" href="{{route('users.index')}}">{{__('puplic.all_users')}}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('puplic.Book_management')}}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('books.create')}}">{{__('puplic.Add_book')}}</a></li>
                            <li><a class="dropdown-item" href="{{route('books.index')}}">{{__('puplic.all_book')}}</a></li>
                        </ul>
                    </li>
                    @endcan

                    <li><a class="dropdown-item" href="{{route('books.available')}}">{{__('puplic.all_book')}}</a></li>

                    <li class="nav-item">
                        <form method="GET" action="{{ route('setLocale') }}" class="d-inline">
                            <select name="locale" onchange="this.form.submit()" class="form-select form-select-sm">
                                <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
                                <option value="ar" {{ session('locale') == 'ar' ? 'selected' : '' }}>عربي</option>
                            </select>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
