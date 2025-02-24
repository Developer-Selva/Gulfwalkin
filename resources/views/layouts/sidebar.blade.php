@extends('layouts.app')
@section('content')
<div class="container">
<div class="content">
<div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->			
		<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
			<li class="sidebar-toggler-wrapper">
				<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				<div class="sidebar-toggler">
				</div>
				<!-- END SIDEBAR TOGGLER BUTTON -->
			</li>
			<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
			<li class="sidebar-search-wrapper">
				
			</li>
			<li class="start">
				<a href="../">
					<i class="fa fa-reply"></i>
					<span class="title">Back to Website</span><span class="arrow"></span>
				</a>
			</li>
			<li>
				<a href="donate.php">
					<i class="fa fa-reply"></i>
					<span class="title" style="color:green;font-weight: bold" >Donate</span><span class="arrow"></span>
				</a>
			</li>
			<li>
				<a href="../employer-details.php>">
					<i class="fa fa-user"></i>
					<span class="title">My Profile</span><span class="arrow"></span>
				</a>
			</li>
			<li class="">
				<a href="jobs.php">
					<i class="fa fa-file-text"></i>
					<span class="title">Jobs Management</span><span class="arrow "></span>
				</a>
			</li>
            
            
			<li class="">
				<a href="employees.php">
					<i class="fa fa-group"></i>
					<span class="title">Search CV’s</span><span class="arrow"></span>
				</a>
			</li>
            
            
			<li class="">
				<a href="employeesviewed.php">
					<i class="fa fa-group"></i>
					<span class="title">Viewed</span><span class="arrow"></span>
				</a>
			</li>
          
            
            
			<li class="">
				<a href="legal-docs.php">
					<i class="fa fa-upload"></i>
					<span class="title">Legal Documents</span><span class="arrow"></span>
				</a>
			</li>
			<li class="">
				<a href="settings.php">
					<i class="fa fa-pencil"></i>
					<span class="title">Account Settings</span><span class="arrow"></span>
				</a>
			</li>
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>
</div>
</div>
@endsection