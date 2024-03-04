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
      <li class="nav-item sidebar-category">
        <p>Components</p>
        <span></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Tables</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('category.index')}}">Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('product.index')}}">Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('customer.index')}}">Customer</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('group.index')}}">Group</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('user.index')}}">User</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('order.index')}}">Order</a></li>



          </ul>
        </div>
      {{-- </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('admin/pages/forms/basic_elements.html')}}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Form elements</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('admin/pages/charts/chartjs.html')}}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Charts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('admin/pages/tables/basic-table.html')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('admin/pages/icons/mdi.html')}}">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Icons</span>
        </a>
      </li>
      <li class="nav-item sidebar-category">
        <p>Pages</p>
        <span></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ asset('admin/pages/samples/login.html')}}"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ asset('admin/pages/samples/login-2.html')}}"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ asset('admin/pages/samples/register.html')}}"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ asset('admin/pages/samples/register-2.html')}}"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ asset('admin/pages/samples/lock-screen.html')}}"> Lockscreen </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item sidebar-category">
        <p>Apps</p>
        <span></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('admin/docs/documentation.html')}}">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.bootstrapdash.com/product/spica-admin/">
          <button class="btn bg-danger btn-sm menu-title">Upgrade to pro</button>
        </a>
      </li> --}}
    </ul>
  </nav>
