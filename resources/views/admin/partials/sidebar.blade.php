<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('dashboard') }}">{{ env('APP_NAME') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="index.html">St</a>
  </div>
  <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ Request::route()->getName() == 'dashboard' ? ' active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fa fa-columns"></i> <span>Dashboard</span></a></li>
      @if(Auth::user()->can('manage-users'))
      <li class="menu-header">Users</li>
      <li class="{{ Request::route()->getName() == 'users' ? ' active' : '' }}"><a class="nav-link" href="{{ route('users') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
      @endif
      <li class="menu-header">Food</li>
      <li class="{{ Request::route()->getName() == 'food' ? ' active' : '' }}"><a class="nav-link" href="{{ route('food') }}"><i class="fa fa-users"></i> <span>Food</span></a></li>
    </ul>
</aside>
