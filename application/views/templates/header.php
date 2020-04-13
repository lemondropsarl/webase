<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

global $app;
$this->load->config('app',TRUE);
$this->app = $this->config->item('application','app');
$active = '';
?>
<!doctype html>
<html lang="en">

<head>
  <title><?php echo $this->app['name'];?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="<?php echo base_url('assets/css/material-dashboard.css?v=2.1.0');?>" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="./assets/img/sidebar-2.jpg">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          <?php echo $this->app['name']; ?>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        <?php 
          foreach ($menus as $menu) {
             
            if (in_array($menu['name'],$acl_modules) && $menu['name'] == $menu['parent']) { ?>
                <li class="nav-item <?php if ($menu['name'] == $this->uri->segment(1))
                {
                  echo 'active';
                } ?>">
                  <a class="nav-link" href="<?php echo base_url($menu['url']);?>">
                    <i class="<?php echo $menu['icon'];?>"><?php echo $menu['icon-name'];?></i>
                    <span><?php echo $menu['text'];?></span>
                  </a>
                </li>
           <?php }else { 
             
             $colnum = 1; ?>
             
              <li class="nav-item <?php if ($menu['name'] == $this->uri->segment(1))
                {
                  echo 'active';
                } ?>">
                <a class="nav-link collapse" href="#" data-toggle="collapse" data-target="#collapse<?php echo $colnum;?>" aria-expanded="true" aria-controls="collapse<?php echo $colnum;?>">
                  <?php if (in_array($menu['name'],$acl_modules)) {?>
                    
                    <i class="<?php echo $menu['icon'];?>"><?php echo $menu['icon-name'];?></i>
                    <span><?php echo $menu['text'];?></span>
                <?php  } ?>
                </a>
                <div id="collapse<?php echo $colnum;?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class=" bg-transparent py-1 rounded">
                  <?php foreach ($subs as $sub) {
                    if ($sub['parent'] == $menu['name']) { ?>
                      <a class="hover" href="<?php echo base_url($sub['url']);?>"><?php echo $sub['text'];?></a><br>
                     
                   <?php }
                 } ?>   
                 
                  </div>
                </div>
              </li>
         <?php  
            $colnum++;
                }
          }
        ?>
         
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
          <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="javascript:void(0)">Mike John responded to your email</a>
                  <a class="dropdown-item" href="javascript:void(0)">You have 5 new tasks</a>
                  <a class="dropdown-item" href="javascript:void(0)">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another Notification</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another One</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
