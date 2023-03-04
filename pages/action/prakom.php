<?php
session_start();
require_once('../../pages/auth/db_login.php');
if(!isset($_SESSION['username'])){
    header('Location: ../../pages/login.php');
}

$username = $_SESSION['username'];
$login = $db->query("SELECT * FROM user WHERE username='$username'");

$result = $login->fetch_object();

$thisPage = "Bank File";
?>

<!DOCTYPE html>
<html lang="en">
	
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $thisPage; ?></title>

	<!-- Vendor CSS Files -->
	<link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	
	<!-- Datatable CSS File -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" rel="stylesheet">
	
	<!-- Bootstrap CSS File -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<!-- CSS File -->
	<link rel="stylesheet" href="../../assets/css/style.css">

	<!-- IMG File -->
	<link rel="shortcut icon" type="image/png" href="../../assets/img/logo.png">
	
</head>

<body>
	<!-- SIDEBAR -->
	<?php include '../../assets/inc/sidebar-filter.php';?>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<?php include '../../assets/inc/navbar-filter.php';?>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<center><h1>Bank File</h1></center>
				</div>
				<!-- Button trigger modal -->
				<button type="button" class="searchlist" data-bs-toggle="modal" data-bs-target="#exampleModal">
					Add File
				</button>
				
				<!-- Modal -->
				<div class="modal fade bd-example-modal-md" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-md">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form method="POST" action="action/addFile.php" enctype="multipart/form-data">
							<div class="modal-body">
								<div class="container-fluid">
									<div class="row">
										<div class="form-group">
											<label for="inputstatus" class="label">Jenis File</label>
											<select class="form-select" id="inputstatus" name="jenis_file" placeholder="Pilih Jenis File">
												<option selected value="">Pilih Jenis File</option>
												<option value="dokumen">DOKUMEN</option>
												<option value="mou">MOU</option>
												<option value="paparan">PAPARAN</option>
												<option value="prakom">PRAKOM</option>
												<option value="regulasi">REGULASI</option>
											</select>
										</div>

										<div class="form-group">
											<label for="inputgrup" class="label-name">Informasi File</label>
											<textarea class="form-control" rows="3" name="informasi_file" placeholder="Masukan Informasi File"></textarea>
										</div>

										<div class="form-group">
											<label for="formFile" class="label-name">FILE LAMPIRAN</label>
											<input type="file" class="form-control" name="file">
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="modal-btn-cancel" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="modal-btn-add">Add</button>
							</div>
						</form>
					</div>
					</div>
				</div>
			</div>
			
			<div class="table-data">
				<div style="width: 100%;">
					<table id="example" class="table table-striped " style="width:100%">
						<ul class="boxx">
						<div class="dropdown">
								<button class="btn btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">FILE</button>
  								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="../bankfile.php">ALL FILE</a></li>
    								<li><a class="dropdown-item" href="../pages/action/dokumen.php">DOKUMEN</a></li>
    								<li><a class="dropdown-item" href="../pages/action/mou.php">MOU</a></li>
									<li><a class="dropdown-item" href="../pages/action/paparan.php">PAPARAN</a></li>
									<li><a class="dropdown-item" href="../pages/action/prakom.php">PRAKOM</a></li>
    								<li><a class="dropdown-item" href="../pages/action/regulasi.php">REGULASI</a></li>
								</ul>
						</div>
						</ul>
						<thead style="text-align:center;">
							<tr>
								<th>NO</th>
								<th>DOKUMEN</th>
								<th>FILE</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query = "SELECT * FROM bankfile WHERE jenis_file='prakom'";
							$result = $db->query($query);
							$no = 0;

							while ($row = $result->fetch_assoc()) {
								$no++;
							?>
								<tr>
									<td><?php echo $no; ?></td>
									<td>
										<div class="boxfile">
											<b class="badge bg-secondary text-uppercase"><?php echo $row['jenis_file']; ?></b>
											<span><?php echo $row['input_by']; ?></span><span> | </span>
											<span><?php echo $row['time']; ?></span>
										</div>	
										<?php echo $row['informasi_file']; ?>
									</td>
									<td>
										<a href="../../files/bankfile/<?php echo $row['file_lampiran']; ?>" target="_blank" class="btn btn-info btn-sm"><i class='bx bxs-file-pdf'></i></a>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table> 
				</div>
			</div>
			<?php include '../../assets/inc/copyright.php';?>	
		</main>	
	</section>

	<!-- Vendor JS Files -->
	<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	
	<!-- Bootstrap JS File -->
	<script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script defer src="../../assets/js/script.js"></script>
	<script defer src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script defer src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
	
</body>
</html>
