<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{-- <li class="nav-item sidebar-category">
        <p>Navigation</p>
        <span></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('admin/index.html')}}">
          <i class="mdi mdi-view-quilt menu-icon"></i>
          <span class="menu-title">Dashboard</span>
          <div class="badge badge-info badge-pill">2</div>
        </a>
      </li> --}}

        <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}">{{ __('language.category') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">{{ __('language.product') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('product.index') }}">{{ __('language.list') }}</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('product.trash') }}">{{ __('language.trash') }}</a></li>
                </ul>
            </div>
        <li class="nav-item"> <a class="nav-link" href="{{ route('customer.index') }}">{{ __('language.customer') }}</a>
        </li>
        <li class="nav-item"> <a class="nav-link" href="{{ route('group.index') }}">{{ __('language.group') }}</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{ route('user.index') }}">{{ __('language.user') }}</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{ route('order.index') }}">{{ __('language.order') }}</a>
        </li>
        </li>

    </ul>
</nav>
