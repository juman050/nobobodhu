<!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('siteadmin/dashboard'); ?>"><?php echo $options['title'];?></a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-menu-header text-center">
                            <strong>Settings</strong>
                        </li>
                        <li class="m_2"><a href="<?php echo site_url('siteadmin/settings'); ?>"><i class="fa fa-user"></i> Profile</a></li>
                        <li class="m_2"><a href="<?php echo site_url('siteadmin/settings'); ?>"><i class="fa fa-wrench"></i> Settings</a></li>
                        <li class="m_2"><a href="<?php echo site_url("siteadmin/login/logout");?>"><i class="fa fa-lock"></i> Logout</a></li>  
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right">
              <input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
            </form>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo site_url('siteadmin/dashboard'); ?>"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-book nav_icon"></i>Page<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="grids.html">Home</a>
                                </li>
                                <li>
                                    <a href="grids.html">About</a>
                                </li>
                                <li>
                                    <a href="grids.html">Contact</a>
                                </li>
                            </ul>
                            /.nav-second-level 
                        </li> -->
                        <li>
                            <a href="#"><i class="fa fa-briefcase nav_icon"></i>user<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url('siteadmin/user'); ?>">User List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>