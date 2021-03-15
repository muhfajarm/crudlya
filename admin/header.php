<header class="main-header">
    <!-- Logo -->
    <a href="./" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>DM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Halaman </b>Admin</span>
    </a>
	
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
    	<!-- Sidebar toggle button-->
    	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    		<span class="sr-only">Toggle navigation</span>
    	</a>
    	<!-- Navbar Right Menu -->
    	<div class="navbar-custom-menu">
    		<ul class="nav navbar-nav">
    			<!-- User Account Menu -->
    			<li class="dropdown user user-menu">
		            <!-- Menu Toggle Button -->
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		              <!-- The user image in the navbar-->
		              <img src="../asset/dist/img/mdaudio.jpg" class="user-image" alt="User Image">
		              <!-- hidden-xs hides the username on small devices so only the image appears. -->
		              <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
		            </a>
		            <ul class="dropdown-menu">
		            	<!-- The user image in the menu -->
		            	<li class="user-header">
		            		<img src="../../asset/dist/img/mdaudio.jpg" class="img-square" alt="User Image">
		            		<p>
		            			<?php echo $_SESSION['username']; ?>
		            		</p>
		            	</li>
		              	<!-- Menu Body -->
		              	<li class="user-body">
			              	<div class="row">

			                </div>
		                	<!-- /.row -->
		              	</li>
		              	<!-- Menu Footer-->
		              	<li class="user-footer">
		                	<div class="pull-right">
		                  		<a href="../auth/logout.php" class="btn btn-default btn-flat">Logout</a>
		                	</div>
		            	</li>
        			</ul>
      			</li>
      		</ul>
      	</div>
	</nav>
</header>