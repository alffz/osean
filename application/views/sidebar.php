<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Osean Water</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets\dist\air.jpg') ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="" class="d-block"><?= $user->nama_user  ?></a>
      </div>
    </div>

    <div class="text">
      <a href="<?php echo base_url('logout'); ?>" class="brand-link">
        <span class="brand-text font-weight-light">Logout</span> </a>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- loop user menu -->
        <?php
        $role_id    = $this->session->userdata('role_id');
        $is_user_active = $this->session->userdata('is_user_active');

        // tampilkan user yang user menu == user_access_menu.role_menu
        // join user_menu and user_access_menu
        $user_menu = $this->db->query("SELECT menu,icon,user_menu.role_menu
                                      FROM `user_menu` inner JOIN `user_access_menu`
                                      ON `user_menu`.`role_menu` = `user_access_menu`.`role_menu`
                                      WHERE `user_access_menu`.`role_access` = $role_id
                                      ORDER BY `user_access_menu`.`role_menu` ASC")->result_array();
        foreach ($user_menu as $menu) {
        ?>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link active">
              <i class="nav-icon <?php echo $menu['icon'] ?>"></i>
              <p>
                <?php echo $menu['menu'] ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <!-- loop user sub menu -->
            <?php
            // select user_sub_menu where id_menu = $menu['id_menu']
            $user_sub_menu = $this->db->query("SELECT * from user_sub_menu where role_menu = $menu[role_menu]")->result_array();
            foreach ($user_sub_menu as $sub_menu) {
            ?>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url($sub_menu['url'])  ?>" class="nav-link active">
                    <i class="<?php echo ($sub_menu['icon'])  ?>"></i>
                    <p><?php echo ($sub_menu['judul'])  ?></p>
                  </a>
                </li>
              </ul>
              <!-- end foreach $user_sub_menu -->
            <?php } ?>
          </li>
          <!-- endforeach $user_menu -->
        <?php  } ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<div class='content-wrapper'>