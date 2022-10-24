<script src="<?=base_url()?>/public/js/kit.fontawesome.js" crossorigin="anonymous"></script>
<div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a class="header-brand" href="<?= base_url(); ?>/dashboard">
                        <div class="logo-img">
                            <img src="<?= base_url(); ?>/public/src/img/brand-white.png" class="header-brand-img" alt="lavalite">
                        </div>
                        <span class="text">&nbsp;cPanel</span>
                    </a>
                    <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                </div>

                <div class="sidebar-content">
                    <div class="nav-container">
                        <nav id="main-menu-navigation" class="navigation-main">
                            <div class="nav-lavel">Overview</div>
                            <div class="nav-item <?=session()->getTempdata('dashboard')?>">
                                <a loading="true" href="<?= base_url(); ?>/dashboard"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                            </div>
                            <div class="nav-item <?=session()->getTempdata('profile')?>">
                                <a loading="true" href="<?= base_url(); ?>/profile"><i class="ik ik-user"></i><span>Profile</span></a>
                            </div>
                            <div class="nav-lavel">Management</div>
                            <div class="nav-item <?=session()->getTempdata('bookings')?> has-sub">
                                <a href="#" ><i class="fas fa-file-invoice"></i><span>Bookings</span></a>
                                <div class="submenu-content">
                                    <a href="<?= base_url(); ?>/bookings" class="menu-item"><i class="fas fa-file-invoice"></i><span>Manage Bookings</span></a>
                                </div>
                            </div>

                            <div class="nav-item <?=session()->getTempdata('tickets')?> has-sub">
                                <a href="#" ><i class="fas fa-receipt"></i><span>Tickets</span></a>
                                <div class="submenu-content">
                                    <a href="<?= base_url(); ?>/tickets/add" class="menu-item"><i class="ik ik-plus"></i><span>Create Ticket</span></a>
                                    <a href="<?= base_url(); ?>/tickets" class="menu-item"><i class="fa fa-receipt"></i><span>Manage Tickets</span></a>
                                </div>
                            </div>

                            <div class="nav-item <?=session()->getTempdata('buses')?> has-sub">
                                <a href="#"><i class="fa fa-bus"></i><span>Buses</span></a>
                                <div class="submenu-content">
                                    <a loading="true" href="<?= base_url(); ?>/buses/add" class="menu-item"><i class="ik ik-plus"></i><span>Add Bus</span></a>
                                    <a loading="true" href="<?= base_url(); ?>/buses" class="menu-item"><i class="fas fa-bus-alt"></i><span>Manage Buses</span></a>
                                </div>
                            </div>

                            <div class="nav-item <?=session()->getTempdata('destinations')?> has-sub">
                                <a href="#"><i class="fa fa-search-location"></i><span>Destinations</span></a>
                                <div class="submenu-content">
                                    <a loading="true" href="<?= base_url(); ?>/destinations/add" class="menu-item"><i class="ik ik-plus"></i><span>Add Destination</span></a>
                                    <a loading="true" href="<?= base_url(); ?>/destinations" class="menu-item"><i class="fas fa-location-arrow"></i><span>Manage Destinations</span></a>
                                </div>
                            </div>

                            <div class="nav-item <?=session()->getTempdata('drivers')?> has-sub">
                                <a href="#"><i class="fas fa-taxi"></i><span>Drivers</span></a>
                                <div class="submenu-content">
                                    <a loading="true" href="<?= base_url(); ?>/drivers/add" class="menu-item"><i class="ik ik-plus"></i><span>Add Driver</span></a>
                                    <a loading="true" href="<?= base_url(); ?>/drivers" class="menu-item"><i class="fa fa-taxi"></i><span>Manage Drivers</span></a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
