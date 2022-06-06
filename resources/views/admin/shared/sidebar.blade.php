<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img id="staff-avatar" src="" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a id="staff-name" href="#" class="d-block">Huy - Long</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" ng-controller='sidebar'>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open big-item">
            <a href="/admin/index" class="nav-link big-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item big-item">
            <a href="#" class="nav-link big-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manager
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li id="nav-category" class="nav-item small-item">
                <a href="/admin/category" class="nav-link small-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Manager</p>
                </a>
              </li>
              <li id="nav-sub-category" class="nav-item small-item">
                <a href="/admin/sub_category" class="nav-link small-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category Manager</p>
                </a>
              </li>
              <li id="nav-product" class="nav-item small-item ">
                <a href="/admin/product" class="nav-link small-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Manager</p>
                </a>
              </li>
              <li id="nav-customer" class="nav-item small-item ">
                <a href="/admin/customer" class="nav-link small-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Manager</p>
                </a>
              </li>
              <li id="nav-staff" class="nav-item small-item ">
                <a href="/admin/staff" class="nav-link small-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff Manager</p>
                </a>
              </li>
              <li id="nav-brand" class="nav-item small-item ">
                <a href="/admin/brand" class="nav-link small-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand Manager</p>
                </a>
              </li>
              <li id="nav-order" class="nav-item small-item ">
                <a href="/admin/order" class="nav-link small-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order Manager</p>
                </a>
              </li>
              <li id="nav-news" class="nav-item small-item ">
                <a href="/admin/news" class="nav-link small-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News Manager</p>
                </a>
              </li>
              <li id="nav-payment" class="nav-item small-item ">
                <a href="/admin/payment" class="nav-link small-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Manager</p>
                </a>
              </li>
              <li id="nav-position" class="nav-item small-item ">
                <a href="/admin/position" class="nav-link small-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Position Manager</p>
                </a>
              </li>
              <li id="nav-role" class="nav-item small-item ">
                <a href="/admin/role" class="nav-link small-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Role Manager</p>
                </a>
              </li>
              <li id="nav-supplier" class="nav-item small-item ">
                <a href="/admin/supplier" class="nav-link small-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier Manager</p>
                </a>
              </li>
              <li id="nav-transport" class="nav-item small-item ">
                <a href="/admin/transport" class="nav-link small-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transport Manager</p>
                </a>
              </li>
            </ul>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
</div>
