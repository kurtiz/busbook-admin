
<header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <div class="header-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                            </div>
                        </div>
                        <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                    </div>
                    <div class="top-menu d-flex align-items-center">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php if(isset($userdata->profile_pic)): ?>
                            <img class="avatar" src="<?=$userdata->profile_pic?> " alt=""></a>
                            <?php else: ?>
                                <img class="avatar" src="<?=base_url()?>/public/img/uploads/users/default-user-image.png" alt="">
                            <?php endif;?>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" loading='true' href="<?= base_url(); ?>/profile"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                <a class="dropdown-item" loading='true' href="<?=base_url()?>/dashboard/logout"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>