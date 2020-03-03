<!doctype html>

<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>Asset/css//lib/datatable/dataTables.bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body>

<div id="right-panel" class="right-panel">
	<div class="breadcrumbs">
		<div class="breadcrumbs-inner">
			<div class="row m-0">
				<div class="col-sm-4">
					<div class="page-header float-left">
						<div class="page-title">
							<h1>Dashboard</h1>
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="page-header float-right">
						<div class="page-title">
							<ol class="breadcrumb text-right">
								<li><a href="#">Dashboard</a></li>
								<li><a href="#">Client Properties</a></li>
								<li class="active">Client table</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="animated fadeIn">
			<div class="row">

				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<strong class="card-title">Client Table</strong>
						</div>
						<div class="card-body">

							<table id="bootstrap-data-table" class="table table-striped table-bordered">
								<thead>
								<tr>
									<th>Email</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Address</th>
									<th>Phone Number</th>
									<th>Active Status</th>
									<th>Account Type</th>
									<th>Type of Institution</th>
									<th>Institution Name</th>
									<th>Institution Address</th>
									<th>NPWP</th>
								</tr>
								</thead>
								<tbody>
								<tr>

								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!-- .animated -->
	</div><!-- .content -->


	<div class="clearfix"></div>

	<footer class="site-footer">
		<div class="footer-inner bg-white">
			<div class="row">
				<div class="col-sm-6">
					Copyright &copy; 2018 Ela Admin
				</div>
				<div class="col-sm-6 text-right">
					Designed by <a href="https://colorlib.com">Colorlib</a>
				</div>
			</div>
		</div>
	</footer>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/admin/main.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/onetech/admin_user/user_manipulate.js"></script>

<script src="<?php echo base_url(); ?>Asset/js/admin/lib/data-table/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>Asset/js/admin/lib/data-table/jquery.dataTables.min.js"></script>

<!--	<script src="--><?php //echo base_url(); ?><!--Asset/js/admin/lib/data-table/dataTables.bootstrap.min.js"></script>-->
<!--    <script src="--><?php //echo base_url(); ?><!--Asset/js/admin/lib/data-table/dataTables.buttons.min.js"></script>-->
<!--    <script src="--><?php //echo base_url(); ?><!--Asset/js/admin/lib/data-table/buttons.bootstrap.min.js"></script>-->
<!--    <script src="--><?php //echo base_url(); ?><!--Asset/js/admin/lib/data-table/jszip.min.js"></script>-->
<!--    <script src="--><?php //echo base_url(); ?><!--Asset/js/admin/lib/data-table/vfs_fonts.js"></script>-->
<!--    <script src="--><?php //echo base_url(); ?><!--Asset/js/admin/lib/data-table/buttons.html5.min.js"></script>-->
<!--    <script src="--><?php //echo base_url(); ?><!--Asset/js/admin/lib/data-table/buttons.print.min.js"></script>-->
<!--    <script src="--><?php //echo base_url(); ?><!--Asset/js/admin/lib/data-table/buttons.colVis.min.js"></script>-->

<script src="<?php echo base_url(); ?>Asset/js/admin/init/datatables-init.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$('#bootstrap-data-table-export').DataTable();
	} );
</script>


</body>
</html>
