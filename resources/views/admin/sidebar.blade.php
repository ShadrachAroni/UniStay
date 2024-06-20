<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Uni<span>Stay</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">

          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Users" role="button" aria-expanded="false" aria-controls="Users">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Users</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="Users">
              <ul class="nav sub-menu">
              <li class="nav-item">
                  <a href="{{ route('users.index') }}" :active="request()->routeIs('users.index')" class="nav-link">All Users</a>
                </li>
              <li class="nav-item">
                  <a href="{{ route('users.Admins') }}" :active="request()->routeIs('users.Admins')"class="nav-link">Administrators</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('users.Students') }}" :active="request()->routeIs('users.Students')" class="nav-link">Students</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('users.Agents') }}" :active="request()->routeIs('users.Agents')" class="nav-link">Agents</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Pending verification</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Listings" role="button" aria-expanded="false" aria-controls="Listings">
              <i class="link-icon" data-feather="home"></i>
              <span class="link-title">Listings</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="Listings">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="#" class="nav-link">Approved Listings</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Pending Approval</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Types</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Amenities</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Features</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Surrounding Area</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Data" role="button" aria-expanded="false" aria-controls="Data">
              <i class="link-icon" data-feather="bar-chart-2"></i>
              <span class="link-title">Data</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="Data">
              <ul class="nav sub-menu">
              <li class="nav-item">
                  <a href="#" class="nav-link">Invoices</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Receipts</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Transaction History</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Reports</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Messages</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="link-icon" data-feather="check-circle"></i>
              <span class="link-title">Feedbacks</span>
            </a>
          </li>

        </ul>
      </div>
    </nav>