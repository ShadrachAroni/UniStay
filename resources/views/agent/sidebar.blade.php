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
            <a href="{{route('admin.MyListings')}}" class="nav-link">
              <i class="link-icon" data-feather="home"></i>
              <span class="link-title">My listings</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="link-icon" data-feather="check-circle"></i>
              <span class="link-title">Booking requests</span>
            </a>
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
          
          
        </ul>
      </div>
    </nav>