<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{route('home')}}" class="app-brand-link">
      <span class="app-brand-text demo menu-text fw-bold ms-2">Wifi</span>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{request()->routeIs('home') ? 'active open' : ''}}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-home-smile"></i>
        <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{request()->routeIs('home') ? 'active' : ''}}">
          <a href="{{route('home')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Analytics">Analytics</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Forms & Tables -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
    <!-- Forms -->
    <li class="menu-item {{request()->routeIs('clients.index') || request()->routeIs('bills.index') ? 'active open' : ''}}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-detail"></i>
        <div class="text-truncate" data-i18n="Form Elements">Data</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{request()->routeIs('clients.index') ? 'active' : ''}}">
          <a href="{{route('clients.index')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Basic Inputs">Client</div>
          </a>
        </li>
        <li class="menu-item {{request()->routeIs('bills.index') ? 'active' : ''}}">
          <a href="{{route('bills.index')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Input groups">Tagihan</div>
          </a>
        </li>
      </ul>
    </li>
</aside>