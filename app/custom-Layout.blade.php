
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $panelInit->settingsArray['siteTitle'] . " | " . $panelInit->language['dashboard'] ; ?></title>
    <base href="<?php echo $panelInit->baseURL; ?>/" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- custom css-->
	<link href="{{URL::asset('assets/plugins/jquery-polymaps/style.css')}}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{URL::asset('assets/plugins/jquery-metrojs/MetroJs.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/plugins/shape-hover/css/demo.css')}}"  />
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/plugins/shape-hover/css/component.css')}}" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/plugins/owl-carousel/owl.theme.css')}}"  />
<link href="{{URL::asset('assets/plugins/pace/pace-theme-flash.css')}}"  rel="stylesheet" type="text/css" media="screen"/>
<link href="{{URL::asset('assets/plugins/jquery-slider/css/jquery.sidr.light.css')}}"   rel="stylesheet" type="text/css" media="screen"/>
<link rel="stylesheet" href="{{URL::asset('assets/plugins/jquery-ricksaw-chart/css/rickshaw.css')}}"  type="text/css" media="screen" >
<link rel="stylesheet" href="{{URL::asset('assets/plugins/Mapplic/mapplic/mapplic.css')}}" type="text/css" media="screen" >
<!-- BEGIN CORE CSS FRAMEWORK -->
<link  href="{{URL::asset('assets/plugins/boostrapv3/css/bootstrap.min.css')}}"  rel="stylesheet" type="text/css"/>
<link  href="{{URL::asset('assets/plugins/boostrapv3/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{URL::asset('assets/plugins/font-awesome/css/font-awesome.css')}}" href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link  href="{{URL::asset('assets/css/animate.min.css')}}"  rel="stylesheet" type="text/css"/>
<link href="{{URL::asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{URL::asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css')}}"   rel="stylesheet" type="text/css"/>
<link href="{{URL::asset('assets/plugins/bootstrap-select2/select2.css')}}" href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen">
<link href="{{URL::asset('assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css')}}"  rel="stylesheet" type="text/css"/>
	
	<!-- end of custom css-->
	
	<!-- BEGIN CSS TEMPLATE -->
<link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{URL::asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css"/>
<link  href="{{URL::asset('assets/css/custom-icon-set.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{URL::asset('assets/css/magic_space.css')}}"  rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE --> 

    <link href="{{URL::asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/bootstrap/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/css/jquery.gritter.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{URL::asset('assets/dist/css/skins/_all-skins.min.css')}}">
    <link href="{{URL::asset('assets/css/schoex.css')}}" rel="stylesheet" type="text/css" />
    <?php if($panelInit->isRTL == 1){ ?>
        <link href="{{URL::asset('assets/css/rtl.css')}}" rel="stylesheet" type="text/css" />
    <?php } ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <!-- BEGIN BODY -->
<body class="">
<div class="header navbar navbar-inverse ">
  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="navbar-inner">
    <div class="header-seperation" style="height: 61px;display:none;">
      <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">
        <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu" class="">
          <div class="iconset top-menu-toggle-white"></div>
          <a href="index.html"><img src="assets/img/college_name.png" class="logo" alt="" data-src="assets/img/logo.png" data-src-retina="assets/img/logo2x.png" height="21" width="106"></a>

          </a> </li>
      </ul>
      <!-- BEGIN LOGO -->
      <!-- END LOGO -->
      <ul class="nav pull-right notifcation-center">
        <li class="dropdown" id="header_task_bar"> <a href="index.html" class="dropdown-toggle active" data-toggle="">
          <div class="iconset top-home"></div>
          </a> </li>
        <li class="dropdown" id="header_inbox_bar"> <a href="email.html" class="dropdown-toggle">
          <div class="iconset top-messages"></div>
          <span class="badge animated bounceIn" id="msgs-badge">2</span> </a></li>
        <li class="dropdown" id="portrait-chat-toggler" style="display:none"> <a href="#sidr" class="chat-menu-toggle">
          <div class="iconset top-chat-white "></div>
          </a> </li>
      </ul>
    </div>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <div class="header-quick-nav">
      <!-- BEGIN TOP NAVIGATION MENU -->
      <div class="pull-left">
        <ul class="nav quick-section">
          <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle">
            <div class="iconset top-menu-toggle-dark"></div>
            </a> </li>
        </ul>
        <ul class="nav quick-section">
          <li class="quicklinks"> <a href="#" class="">
            <div class="iconset top-reload"></div>
            </a> </li>
          <li class="quicklinks"> <span class="h-seperate"></span></li>
          <li class="quicklinks"> <a href="#" class="">
            <div class="iconset top-tiles"></div>
            </a> </li>
          <li class="m-r-10 input-prepend inside search-form no-boarder"> <span class="add-on"> <span class="iconset top-search"></span></span>
            <input name="" class="no-boarder " placeholder="Search Dashboard" style="width:250px;" type="text">
          </li>
        </ul>
      </div>
      <!-- END TOP NAVIGATION MENU -->
      <!-- BEGIN CHAT TOGGLER -->
      <div class="pull-right">
        <div class="chat-toggler"> <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom" data-content="" data-toggle="dropdown" data-original-title="Notifications">
          <div class="user-details">
            <div class="username"> <span class="badge badge-important">3</span> {{$users['fullName']}}  </div>
          </div>
          <div class="iconset top-down-arrow"></div>
          </a>
          <div id="notification-list" style="display:none">
            <div style="width:300px">
              <div class="notification-messages info">
                <div class="user-profile"> <img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" height="35" width="35"> </div>
                <div class="message-wrapper">
                  <div class="heading"> David Nester - Commented on your wall </div>
                  <div class="description"> Meeting postponed to tomorrow </div>
                  <div class="date pull-left"> A min ago </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="notification-messages danger">
                <div class="iconholder"> <i class="icon-warning-sign"></i> </div>
                <div class="message-wrapper">
                  <div class="heading"> Server load limited </div>
                  <div class="description"> Database server has reached its daily capicity </div>
                  <div class="date pull-left"> 2 mins ago </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="notification-messages success">
                <div class="user-profile"> <img src="assets/img/profiles/h.jpg" alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" height="35" width="35"> </div>
                <div class="message-wrapper">
                  <div class="heading"> You haveve got 150 messages </div>
                  <div class="description"> 150 newly unread messages in your inbox </div>
                  <div class="date pull-left"> An hour ago </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div class="profile-pic"> <img src="{{URL::to('/dashboard/profileImage/'.$users['id'])}}" alt="" data-src="{{URL::to('/dashboard/profileImage/'.$users['id'])}}" data-src-retina="{{URL::to('/dashboard/profileImage/'.$users['id'])}}" height="35" width="35"> </div>
        </div>
        <ul class="nav quick-section ">
          <li class="quicklinks"> <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
            <div class="iconset top-settings-dark "></div>
            </a>
            <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
              <li><a href="user-profile.html"> My Account</a> </li>
              <li><a href="calender.html">My Calendar</a> </li>
              <li><a href="email.html"> My Inbox&nbsp;&nbsp;<span class="badge badge-important animated bounceIn">2</span></a> </li>
              <li class="divider"></li>
              <li><a href="<?php echo URL::to('/logout'); ?>""><i class="fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
            </ul>
          </li>
          <li class="quicklinks"> <span class="h-seperate"></span></li>
          <li class="quicklinks"> <a id="chat-menu-toggle" href="#sidr" class="chat-menu-toggle">
            <div class="iconset top-chat-dark "><span class="badge badge-important animated bounceIn" id="chat-message-count">1</span></div>
            </a>
            <div class="simple-chat-popup chat-menu-toggle hide animated fadeOut">
              <div class="simple-chat-popup-arrow"></div>
              <div class="simple-chat-popup-inner">
                <div style="width:100px">
                  <div class="semi-bold">David Nester</div>
                  <div class="message">Hey you there </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <!-- END CHAT TOGGLER -->
    </div>
    <!-- END TOP NAVIGATION MENU -->
  </div>
</div>

<div class="page-container row-fluid">
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar mini" id="main-menu">
  <!-- BEGIN MINI-PROFILE -->
  <div class="page-sidebar-wrapper" id="main-menu-wrapper">
    
    <!-- END MINI-PROFILE -->
    <!-- BEGIN SIDEBAR MENU -->
      <ul>  <li class="start active "> <a href="../dashboard.html"> <i class="icon-custom-home"></i> <span class="title">Dashboard</span> </a> </li>
	    <li class=""> <a href="email.html"> <i class="fa fa-facilities"></i> <span class="title">Facilities</span>  </a> </li>
	    <li class=""> <a href="../frontend/index.html"> <i class="fa fa-department"></i>  <span class="title">Department</span></a></li>
	     <li class=""> <a href="javascript:;"> <i class="fa fa fa-services"></i> <span class="title">Services</span> </a>

	  </li>
    <li class=""> <a href="campus/mycampus.html"> <i class="fa fa-my-campus"></i> <span class="title">My Campus</span> </a>

    </li>
	  <li class=""> <a href="javascript:;"> <i class="fa fa-my-communication"></i> <span class="title">Communications</span> </a>

	  </li>    </ul>
        
   
    <div class="clearfix"></div>
    <!-- END SIDEBAR MENU -->
  </div>
</div>
<div id='parentDBArea' class="page-content condensed" ng-view></div>
</div>
      <div id='overlay'>
            <div class="loading">
            	<div class="dot"></div>
            	<div class="dot2"></div>
            </div>
      </div>





























    <modal visible="chgAcYearModalShow">
        <div>
            <select class="form-control" id="selectedAcYear" ng-model="dashboardData.selectedAcYear">
              <option ng-selected="year.id == '<?php echo $panelInit->selectAcYear; ?>'" ng-repeat="year in $root.dashboardData.academicYear" value="@{{year.id}}" ng-if="year.isDefault == '0'">@{{year.yearTitle}}</option>
              <option ng-selected="year.id == '<?php echo $panelInit->selectAcYear; ?>'" ng-repeat="year in $root.dashboardData.academicYear" value="@{{year.id}}" ng-if="year.isDefault == '1'">@{{year.yearTitle}} - Default Year</option>
            </select>
            <br/>
            <a class="floatRTL btn btn-success btn-flat pull-right marginBottom15 ng-binding" ng-click="chgAcYear()"><?php echo $panelInit->language['chgYear']; ?></a>
            <div class="clearfix"></div>
        </div>
    </modal>
<!------------------------------------------------------------------------------------------------------------------>
   <script src="{{URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<script src="{{URL::asset('assets/js/load.components.js')}}"  type="text/javascript"></script>
<script   src="{{URL::asset('assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js')}}" type="text/javascript"></script>
<script  src="{{URL::asset('assets/plugins/boostrapv3/js/bootstrap.min.js')}}"  type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/breakpoints.js')}}"  type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/jquery-unveil/jquery.unveil.min.js')}}"  type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/jquery-block-ui/jqueryblockui.js')}}"   type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/jquery-lazyload/jquery.lazyload.min.js')}}"  type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js')}}"  type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->

<script src="{{URL::asset('assets/plugins/pace/pace.min.js')}}"  type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js')}}"  type="text/javascript"></script>
<script  src="{{URL::asset('assets/plugins/jquery-ricksaw-chart/js/raphael-min.js')}}" ></script>
<script src="{{URL::asset('assets/plugins/jquery-ricksaw-chart/js/d3.v2.js')}}" ></script>
<script src="{{URL::asset('assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js')}}"  ></script>
<script src="{{URL::asset('assets/plugins/jquery-sparkline/jquery-sparkline.js')}}"  ></script>
<script src="{{URL::asset('assets/plugins/skycons/skycons.js')}}" ></script>
<script src="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.min.js')}}"  type="text/javascript"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/google_maps_api.js')}}" ></script>
<script src="{{URL::asset('assets/plugins/jquery-gmap/gmaps.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/shape-hover/js/snap.svg-min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-flot/jquery.flot.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/jquery-flot/jquery.flot.resize.min.js')}}"  type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/jquery-metrojs/MetroJs.min.js')}}"   type="text/javascript" ></script>
<script src="{{URL::asset('assets/plugins/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js')}}"  type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/jquery-jvectormap/js/jquery-jvectormap-us-lcc-en.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/Mapplic/js/jquery.easing.js')}}"   type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/Mapplic/js/jquery.mousewheel.js')}}"  type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/Mapplic/js/hammer.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/Mapplic/mapplic/mapplic.js')}}"  type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="{{URL::asset('assets/js/core.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/js/chat.js')}}"  type="text/javascript"></script>
<script src="{{URL::asset('assets/js/demo.js')}}"  type="text/javascript"></script>
<script src="{{URL::asset('assets/js/widgets.js')}}"   type="text/javascript"></script>
<script src="{{URL::asset('assets/plugins/bootstrap-select2/select2.min.js')}}"  type="text/javascript"></script>

    <!--<script src="{{URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>

    <script src="{{URL::asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/dist/js/moment.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/humanize-duration/humanize-duration.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.gritter.min.js')}}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{URL::asset('assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/knob/jquery.knob.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/chartjs/Chart.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.colorbox-min.js')}}"></script>

    <script src="{{URL::asset('assets/dist/js/app.js')}}"></script>
    <script src="{{URL::asset('assets/dist/js/demo.js')}}"></script>
    <script src="{{URL::asset('assets/js/schoex.js')}}" type="text/javascript"></script>-->

    <script src="{{URL::asset('assets/js/Angular/angular.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('assets/js/Angular/AngularModules.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('assets/js/Angular/app.js')}}"></script>
    <script src="{{URL::asset('assets/js/Angular/routes.js')}}" type="text/javascript"></script>
  </body>
</html>
