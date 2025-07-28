  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->


      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">

                  @php
                      $settingsRoutes = [
                          'show.brand.page',
                          'show.category.page',
                          'show.subcategory.page',
                          'show.unit.page',
                          'show.companyInfo.page',
                      ];
                  @endphp

                  @php
                      $contactsRoutes = ['show.contact', 'contact.data'];
                  @endphp





                  {{-- sidebar -contact  --}}
                  <li
                      class="nav-item has-treeview {{ in_array(Route::currentRouteName(), $contactsRoutes) ? 'menu-open' : '' }}">
                      <a href="#"
                          class="nav-link {{ in_array(Route::currentRouteName(), $contactsRoutes) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-address-book"></i>
                          <p>
                              Contact
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('show.contact') }}"
                                  class="nav-link {{ Route::currentRouteName() == 'show.contact' ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add New Contact</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('contact.data') }}"
                                  class="nav-link {{ Route::currentRouteName() == 'contact.data' ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Manage Contact</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- /sidebar -contact  --}}



                  {{-- setting  --}}
                  <li
                      class="nav-item has-treeview {{ in_array(Route::currentRouteName(), $settingsRoutes) ? 'menu-open' : '' }}">
                      <a href="#"
                          class="nav-link {{ in_array(Route::currentRouteName(), $settingsRoutes) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-cog"></i>
                          <p>
                              Settings
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>

                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('show.brand.page') }}"
                                  class="nav-link {{ Route::currentRouteName() == 'show.brand.page' ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Brand</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('show.category.page') }}"
                                  class="nav-link {{ Route::currentRouteName() == 'show.category.page' ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('show.subcategory.page') }}"
                                  class="nav-link {{ Route::currentRouteName() == 'show.subcategory.page' ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Sub Category</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('show.unit.page') }}"
                                  class="nav-link {{ Route::currentRouteName() == 'show.unit.page' ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Unit</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('show.companyInfo.page') }}"
                                  class="nav-link {{ Route::currentRouteName() == 'show.companyInfo.page' ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Company Information</p>
                              </a>
                          </li>
                      </ul>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->




          {{-- this is previous code  --}}
          <!-- Sidebar Menu -->
          {{-- <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-cog"></i>
                          <p>
                              Settings
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">6</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('show.brand.page') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Brand</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('show.category.page') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('show.subcategory.page') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Sub Category</p>
                              </a>
                          </li>


                          <li class="nav-item">
                              <a href="{{ route('show.unit.page') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Unit</p>
                              </a>
                          </li>


                          <li class="nav-item">
                              <a href="{{ route('show.companyInfo.page') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Company Information</p>
                              </a>
                          </li>

                      </ul>
                  </li>
              </ul>
          </nav> --}}
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
