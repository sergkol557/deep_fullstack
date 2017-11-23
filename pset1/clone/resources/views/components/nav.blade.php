<div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" href={{ route('welcome') }}>{{ config('app.name', 'Laravel') }}</a>
  </div>
  <ul class="nav navbar-nav">
    <li><a href={{ route('home') }}>Home</a></li>
    @if(Auth::check() && Auth::user()->isAdmin())
      <li><a href={{ route('admin.home') }}>Admin panel</a></li>
      <li><a href={{ route('admin.dashboard') }}>Dashboard</a></li>
    @endif
  </ul>
</div>
