<nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">

    <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
      <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-search d-none d-lg-block">
          <div class="input-group">
          </div>
        </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                <img src="{{asset('admin/uploads/user/'.Auth()->guard('web')->user()->image) }}" alt="profile"/>
                <span class="nav-profile-name">{{ Auth()->guard('web')->user()->name }}</span>
              </a>

          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

            <a id="logout-link" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <script>
                document.getElementById('logout-link').addEventListener('click', function(event) {
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                });
            </script>

          </div>
        </li>
        <li class="nav-item dropdown">
            <select class="changeLang">
                <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>EN</option>
                <option value="vn" {{ session()->get('locale') == 'vn' ? 'selected' : '' }}>VN</option>
            </select>
        </li>
      </ul>
    </div>
  </nav>
