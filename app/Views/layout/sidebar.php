      <!-- Main Sidebar Container -->
<!--<aside class="main-sidebar sidebar-bg-dark sidebar-color-primary shadow">-->
<aside class="main-sidebar sidebar-bg-light sidebar-color-primary shadow">
  <div class="brand-container">
    <a href="javascript:;" class="brand-link">
      <img src="<?= base_url('asset/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image opacity-80 shadow">
      <span class="brand-text fw-light">CoffeeShop</span>
    </a>
    <a class="pushmenu mx-1" data-lte-toggle="sidebar-mini" href="javascript:;" role="button"><i class="fas fa-angle-double-left"></i></a>
  </div>
  <!-- Sidebar -->
  <div class="sidebar">
    <nav class="mt-2">
      <!-- Sidebar Menu -->
      <ul class="nav nav-pills nav-sidebar flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="javascript:;" class="nav-link active">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Dashboard
              <i class="end fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              
              <a href="<?= base_url('productos') ?>" class="nav-link active">
                <i class="nav-icon far fa-circle"></i>
                <p>Productos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('categorias') ?>" class="nav-link ">
                <i class="nav-icon far fa-circle"></i>
                <p>Categorias</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('ventas') ?>"" class="nav-link ">
                <i class="nav-icon far fa-circle"></i>
                <p>Ventas</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>
  <!-- /.sidebar -->
</aside>