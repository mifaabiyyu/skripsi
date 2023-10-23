@php
  $usr = Auth::guard('web')->user();
@endphp
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('admin.dashboard')}}">
          <img src="{{ asset('assetss/img/brand/tifa.png')}}" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          @if ($usr->can('dashboard.view'))
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard')}}"  >
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
            </li>
          </ul>
          
            <hr class="my-3">
            @endif
            <!-- Heading -->
          @if ($usr->can('user.create') || $usr->can('user.view') ||  $usr->can('user.edit') ||  $usr->can('user.delete'))
          <h6 class="navbar-heading p-0 text-muted">User Action</h6>
          @endif
          <ul class="navbar-nav">
            @if ($usr->can('user.create') || $usr->can('user.view') ||  $usr->can('user.edit') ||  $usr->can('user.delete'))
            <li class="nav-item">
              <a class="nav-link {{ Request::routeIs('users.index') || Request::routeIs('users.create')  ? 'active' : '' }}" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-single-02 text-orange"></i>
                <span class="nav-link-text">User Manajement</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  @if ($usr->can('user.view'))
                  <li class="nav-item {{ Request::routeIs('users.index') ? 'active' : '' }}">
                    <a href="{{route('users.index')}}" class="nav-link">Manage Users</a>
                  </li>
                  @endif
                  @if($usr->can('user.create'))
                  <li class="nav-item {{ Request::routeIs('users.create') ? 'active' : '' }}">
                    <a href="{{ route('users.create')}}" class="nav-link">Create User</a>
                  </li>
                  @endif
                </ul>
              </div>
            </li>
            @endif
            @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
              <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('roles.index') || Request::routeIs('roles.create') || Request::routeIs('roles.edit') ? 'active' : '' }}" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                  <i class="ni ni-atom text-info"></i>
                  <span class="nav-link-text">Roles & Permissions</span>
                </a>
                @if ($usr->can('role.view'))
                <div class="collapse" id="navbar-components">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="{{ route('roles.index')}}" class="nav-link">All Roles</a>
                    </li>
                  </ul>
                </div>
                @endif
                @if ($usr->can('role.create'))
                <div class="collapse" id="navbar-components">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="{{ route('roles.create')}}" class="nav-link">Create Roles</a>
                    </li>
                  </ul>
                </div>
                @endif
              </li>
            @endif
            @if ($usr->can('landing.create') || $usr->can('landing.view') ||  $usr->can('landing.edit') ||  $usr->can('landing.delete'))
            <li class="nav-item">
              <a class="nav-link" href="#navbar-landing" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-landing">
                <i class="ni ni-single-copy-04 text-pink"></i>
                <span class="nav-link-text">Landing Page</span>
              </a>
              <div class="collapse" id="navbar-landing">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{ route('sliders.index')}}" class="nav-link" >Slider Background</a>
                  </li>
                </ul>
              </div>
            </li>
            @endif
            @if ($usr->can('pengurus.create') || $usr->can('pengurus.view') ||  $usr->can('pengurus.edit') ||  $usr->can('pengurus.delete'))
            <li class="nav-item">
              <a class="nav-link" href="#navbar-tentang" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tentang">
                <i class="ni ni-align-left-2 text-default"></i>
                <span class="nav-link-text">Tentang Himatifa</span>
              </a>
              <div class="collapse" id="navbar-tentang">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="#navbar-pengurus" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-pengurus">Manajement Pengurus</a>
                    <div class="collapse show" id="navbar-pengurus" style="">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="{{ route('bph.index')}}" class="nav-link ">BPH</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('anggota.index') }}" class="nav-link ">Anggota Departemen</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('visimisi.index') }}" class="nav-link ">Visi & Misi</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
            @endif
            @if ($usr->can('gallery.create') || $usr->can('gallery.view') ||  $usr->can('gallery.edit') ||  $usr->can('gallery.delete'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('gallery.index')}}">
                <i class="ni ni-archive-2 text-green"></i>
                <span class="nav-link-text">Gallery</span>
              </a>
            </li>
            @endif
            @if ($usr->can('contactus.create') || $usr->can('contactus.view') ||  $usr->can('contactus.edit') ||  $usr->can('contactus.delete'))
            <li class="nav-item">
              <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-maps">
                <i class="ni ni-map-big text-primary"></i>
                <span class="nav-link-text">Contact Us</span>
              </a>
              <div class="collapse" id="navbar-maps">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{ route('contact-us-admin.index')}}" class="nav-link">Pendaftaran Hima</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('contact-us-admin.create')}}" class="nav-link">Kritik & Saran</a>
                  </li>
                </ul>
              </div>
            </li>
            @endif
            @if ($usr->can('berita.create') || $usr->can('berita.view') ||  $usr->can('berita.edit') ||  $usr->can('berita.delete'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('manage-berita.index')}}">
                <i class="ni ni-single-copy-04 text-info"></i>
                <span class="nav-link-text">Berita</span>
              </a>
            </li>
            @endif
            @if ($usr->can('calendar.create') || $usr->can('calendar.view') ||  $usr->can('calendar.edit') ||  $usr->can('calendar.delete'))
            <li class="nav-item">
              <a class="nav-link" href="{{route('manage-calendar.index')}}">
                <i class="ni ni-calendar-grid-58 text-red"></i>
                <span class="nav-link-text">Calendar</span>
              </a>
            </li>
            <hr class="my-3">
            @endif
          </ul>
          <!-- Divider -->
          
          <!-- Heading -->
          
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            @if ($usr->can('proposal.create') || $usr->can('proposal.view') ||  $usr->can('proposal.edit') ||  $usr->can('proposal.delete'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('proposal.indexhima')}}">
                <i class="ni ni-spaceship text-blue"></i>
                <span class="nav-link-text">Ajuan Proposal Kegiatan</span>
              </a>
            </li>
            @endif
            @if ($usr->can('proposal.editprodi'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('proposal.indexprodi')}}">
                <i class="ni ni-ui-04 text-green"></i>
                <span class="nav-link-text">Menu Prodi</span>
              </a>
            </li>
            @endif
            @if ($usr->can('proposal.editfakultas'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('proposal.indexfakultas')}}">
                <i class="ni ni-chart-pie-35 text-orange"></i>
                <span class="nav-link-text">Menu Fakultas</span>
              </a>
            </li>
            @endif
            @if ($usr->can('proposal.edithima'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('tipografi.index')}}">
                <i class="ni ni-palette text-danger"></i>
                <span class="nav-link-text">Deteksi Kesalahan Ketik</span>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </nav>