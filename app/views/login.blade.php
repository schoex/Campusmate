<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $panelInit->settingsArray['siteTitle'] . " | " . $panelInit->language['loginToAccount']; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="{{URL::asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/bootstrap/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/plugins/iCheck/square/blue.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{URL::asset('assets/css/login.css')}}" rel="stylesheet" type="text/css" />
	
	
	
    <?php if($panelInit->language['position'] == "rtl"){ ?>
        <link href="{{URL::asset('/')}}/assets/css/rtl.css" rel="stylesheet" type="text/css" />
    <?php } ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <header class="header">
      <nav id="mainNav" class="navbar   ">
          <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand page-scroll logo" href="#page-top"> <span class="logo-icon"></span><span class="campusmate">Campus Mate</span></a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">

                      <li>
                          <a class="page-scroll contactus" href="#contact">Contact Us</a>
                      </li>
                  </ul>
              </div>
              <!-- /.navbar-collapse -->
              <div class="loginbox">
                <div><span>Login</span></div>
                <div><span>Choose your respective profile.</span></div>

          </div>
		   <div class="errorbox">
		  @if($errors->any())
					<h4 style='color:red;'>{{$errors->first()}}</h4>
					@endif
					</div>

          <!-- /.container-fluid -->

      </nav>
    </header>
	
	 <div class="container-fluid container-fluid-960 loginboxcontainer">
      <div class="row">
	     <div class="col-md-4 col-lg-4  text-center  ">
            <div class="service-box studentlogin">

                <div class="studentpic"></div>
                <p class="text-muted"><button class="btn btn-default btn-student btn-home"> Student</button></p>
                <div class="loginform">
                  <p>Student</p>
				    <form action="{{URL::to('/customattemp')}}" method="post">
     <input type="text" name="email" class="user-name" placeholder="<?php echo $panelInit->language['userNameOrEmail']; ?>"/>
        <input type="password" name="password" class="password" placeholder="<?php echo $panelInit->language['password']; ?>"/>
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">               
              <input type="hidden" name="role" value="student">       
<a class="forget-username" href="{{URL::to('/forgetpwd')}}"><?php echo $panelInit->language['restorePwd']; ?></a>
                  

                  <button type="submit" class="btn btn-default btn-student btn-login"> Login</button>
                  <button type="submit" class="btn btn-default btn-admin btn-reset"> Reset Password</button>

</form>
                </div>
            </div>
        </div>
		
		 <div class="col-md-4 col-lg-4 text-center ">
          <div class="service-box studentlogin orangecolor">

              <div class="teacherpic"></div>
              <p class="text-muted"><button class="btn btn-default btn-teacher btn-home"> Teacher</button></p>
              <div class="loginform">
                <p>Teacher</p>
                 <form action="{{URL::to('/customattemp')}}" method="post">
     <input type="text" name="email" class="user-name" placeholder="<?php echo $panelInit->language['userNameOrEmail']; ?>"/>
        <input type="password" name="password" class="password" placeholder="<?php echo $panelInit->language['password']; ?>"/>
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">               
               <input type="hidden" name="role" value="teacher">   
<a class="forget-username" href="{{URL::to('/forgetpwd')}}"><?php echo $panelInit->language['restorePwd']; ?></a>

                  <button type="submit" class="btn btn-default btn-student btn-login"> Login</button>
                  <button type="submit" class="btn btn-default btn-admin btn-reset"> Reset Password</button>

</form>


              </div>
          </div>
        </div>
        <div class=" col-md-4 col-lg-4 text-center ">
          <div class="service-box studentlogin greencolor">

              <div class="adminpic"></div>
              <p class="text-muted"><button class="btn btn-default btn-admin btn-home"> Admin</button></p>
              <div class="loginform">
                <p>Admin</p>
				
                <form action="{{URL::to('/customattemp')}}" method="post">
     <input type="text" name="email" class="user-name" placeholder="<?php echo $panelInit->language['userNameOrEmail']; ?>"/>
        <input type="password" name="password" class="password" placeholder="<?php echo $panelInit->language['password']; ?>"/>
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">               
                <input type="hidden" name="role" value="admin">   
<a class="forget-username" href="{{URL::to('/forgetpwd')}}"><?php echo $panelInit->language['restorePwd']; ?></a>

                  <button type="submit" class="btn btn-default btn-student btn-login"> Login</button>
                  <button type="submit" class="btn btn-default btn-admin btn-reset"> Reset Password</button>

</form>

              </div>

          </div>
        </div>
	  </div>
	  </div>
	      <div class=" footer">
      <div class="container-fluid">
      <div class="row ">
        <div class="col-md-3 col-lg-3  text-center  ">
            <span class="logobot"></span>
        </div>
        <div class="col-md-3 col-lg-3 text-center ">
          <ul class="foooterlist">
            <li><a href="#">Home</a></li>
            <li><a href="#">Company</a></li>
            <li><a href="#">Tie Ups</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-lg-3 text-center ">
          <ul class="foooterlist">
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>

        <div class=" col-md-3 col-lg-3 text-center follow ">
          <div  > Follow</div>
          <div>
             <i class="fa fa-facebook"></i>
             <i class="fa fa-twitter"></i>
             <i class="fa fa-linkedin"></i>
             <i class="fa fa-tumblr"></i>
             <i class="fa fa-rss"></i>




          </div>

        </div>

    </div>
</div>

    </div>
       </div>
  

    <script src="{{URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/login-main.js')}}"></script>
	
    <script src="{{URL::asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
