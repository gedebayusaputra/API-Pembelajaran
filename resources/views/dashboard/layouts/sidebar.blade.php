<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active' : ' '}} " aria-current="page" href="/dashboard">
              <svg class="bi "><use xlink:href="#house-fill"/></svg>
              Dashboard
              
            </a>
          </li>
          
          <li class="nav-item">
            {{-- pada route dashboard/informations* ada wildcard: * yg mana ini digunakan utk membuat apa saja di dalamnya akan dikasi aktif --}}
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/informations*') ? 'active' : ' '}} " href="/dashboard/informations">
              <i class="bi bi-file-earmark-text-fill"></i>
              My Informations
            </a>
          </li>
        </ul>
        
        @can('admin')
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>ADMINISTRATOR</span>
          </h6>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/categories*') ? 'active' : ' '}} " href="/dashboard/categories">
                <i class="bi bi-tags-fill"></i>
                Information Categories
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/database-warga*') ? 'active' : ' '}} " href="/dashboard/database-warga">
                <i class="bi bi-database-fill"></i>
                Database Warga
              </a>
            </li>
          </ul>
            
        @endcan

       

        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="/">
              <i class="bi bi-window-stack"></i>
              View Website
            </a>
          </li>
          <li class="nav-item">
              <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="nav-link d-flex align-items-center gap-2"><i class="bi bi-person-fill-exclamation pe-2"></i>Log Out</button>
              </form>
          </li>
        </ul>
      </div>
    </div>
  </div>