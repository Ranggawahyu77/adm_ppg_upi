{{-- <div class="d-flex flex-column  flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <img src="" alt="" width="32" height="32" class="rounded-circle me-2">
    <span class="fs-4">Administrasi PPG</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li>
      <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }} text-white">
        <i class="bi bi-speedometer2 pe-none me-2"></i>
        Dashboard
      </a>
    </li>
    <li>
      <a href="/kegiatan" class="nav-link {{ Request::is('kegiatan') ? 'active' : '' }} text-white">
        <i class="bi bi-calendar2-week pe-none me-2"></i>
        Kegiatan
      </a>
    </li>
    <li>
      <a href="/peserta" class="nav-link {{ Request::is('peserta') ? 'active' : '' }} text-white">
        <i class="bi bi-person-lines-fill pe-none me-2"></i>
        Peserta
      </a>
    </li>
  </ul>
  <hr>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
      <strong>mdo</strong>
    </a>
  </div>
  
</div> --}}

<div class="sidebar" id="side_nav">
  <div class="header-box px-3 pt-3 d-flex justify-content-between">
    <h1 class="fs-4 fw-bold">
      {{-- <span class="bg-white text-dark rounded shadow px-2 me-2">UPI</span> --}}
      <img src="/img/logo_upi.png" alt="logo UPI" width="35" height="35">
      <span class="text-white">ADM UPI</span>
    </h1>
    <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="bi bi-list-nested"></i></button>
  </div>

  <hr class="h-color mx-3">

  <ul class="list-unstyled px-3">
    <li class="{{ Request::is('dashboard') ? 'active' : '' }} nav-item"><a href="/dashboard" class="text-decoration-none px-3 py-2 d-block nav-link"><i class="bi bi-speedometer2 pe-none me-2"></i> Dashboard</a></li>
    <li class="{{ Request::is('kegiatan*') ? 'active' : '' }} nav-item"><a href="/kegiatan" class="text-decoration-none px-3 py-2 d-block nav-link"><i class="bi bi-calendar2-week pe-none me-2"></i> Kegiatan</a></li>
    <li class="{{ Request::is('participant*') ? 'active' : '' }} nav-item"><a href="/participant" class="text-decoration-none px-3 py-2 d-block nav-link"><i class="bi bi-person-lines-fill pe-none me-2"></i> Peserta</a></li>
    <li class="{{ Request::is('undangan*') ? 'active' : '' }} nav-item"><a href="/undangan" class="text-decoration-none px-3 py-2 d-block nav-link"><i class="bi bi-envelope-paper-fill pe-none me-2"></i> Undangan</a></li>
    <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block nav-link"><i class="bi bi-card-list pe-none me-2"></i> Project</a></li>
  </ul>
  
  <hr class="h-color mx-3">

  <ul class="list-unstyled px-3">
    @role('admin')
      <li class="">
        <a href="#admins" 
        class="text-decoration-none px-3 py-2 d-flex align-items-center nav-link"
        data-bs-toggle="collapse" data-target="#admins" aria-expanded="true" aria-controls="admins">
          <i class="bi bi-house-gear-fill pe-none me-2"></i>
          Admin Setting
          <span class="ms-auto">
            <span class="right-icon">
              <i class="bi bi-chevron-down"></i>
            </span>
          </span>
        </a>
        <div class="collapse {{ Request::is('admin*') ? 'show' : '' }}" id="admins">
          <ul class="navbar-nav ps-3">
            <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
              <a href="/admin/users" class="nav-link px-3">
                <span class="me-2"
                  ><i class="bi bi-person-circle"></i
                ></span>
                <span>Users</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
              <a href="/admin/roles" class="nav-link px-3">
                <span class="me-2"
                  ><i class="bi bi-person-fill-gear"></i
                ></span>
                <span>Roles</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/permissions*') ? 'active' : '' }}">
              <a href="/admin/permissions" class="nav-link px-3">
                <span class="me-2"
                  ><i class="bi bi-key"></i
                ></span>
                <span>Permissions</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    @endrole
    <li class="nav-item"><a href="#" class="text-decoration-none px-3 py-2 d-block nav-link"><i class="bi bi-gear pe-none me-2"></i> Setting</a></li>
    <li class="nav-item"><a href="#" class="text-decoration-none px-3 py-2 d-block nav-link"><i class="bi bi-bell-fill pe-none me-2"></i> Notification</a></li>
  </ul>
</div>