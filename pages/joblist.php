<?php
session_start();
require_once('auth/db_login.php');
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

$username = $_SESSION['username'];
$login = $db->query("SELECT * FROM user WHERE username='$username'");

$result = $login->fetch_object();

$thisPage = "Joblist";
?>

<!DOCTYPE html>
<html lang="en">
	
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $thisPage; ?></title>

	<!-- Vendor CSS Files -->
	<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	
	<!-- Datatable CSS File -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" rel="stylesheet">
	
	<!-- Bootstrap CSS File -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<!-- Ajax File -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
    referrerpolicy="no-referrer" /> 

	<!-- CSS File -->
	<link rel="stylesheet" href="../assets/css/style.css">

	<!-- IMG File -->
	<link rel="shortcut icon" type="image/png" href="../assets/img/logo.png">
	
</head>

<body>
	<!-- SIDEBAR -->
	<?php include '../assets/inc/sidebar.php';?>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<?php include '../assets/inc/navbar.php';?>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<center><h1>Joblist</h1></center>
				</div>
				<?php if ($_SESSION['role'] != 'Pegawai'){ ?>
				<div class="modall">
				<button class="searchlist" onclick="window.location.href='../files/Notulen Rapat (Template).docx'" download>Template Notulen</button>
					<!-- Button trigger modal -->
					<button type="button" class="searchlist" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Add Joblist
					</button>
				</div>
				<!-- Modal -->
				<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Joblist</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form method="POST" action="action/addJob.php" enctype="multipart/form-data">
							<div class="modal-body">
								<div class="container-fluid">
									<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="inputgrup" class="label-name">GRUP</label>
											<select class="form-select" name="grup" placeholder="pilih grup" required>
												<option selected value="">Pilih Grup</option>
												<option value="ADMINISTRASI">ADMINISTRASI</option>
												<option value="ALL GRUP">ALL GRUP</option>
												<option value="ARSIP">ARSIP</option>
												<option value="BINALAVOTAS">BINALAVOTAS</option>
												<option value="BINAPENTA & PASKER">BINAPENTA & PASKER</option>
												<option value="BINWASNAKER & PHI">BINWASNAKER & PHI</option>
												<option value="DEVELOPMENT & DWH">DEVELOPMENT & DWH</option>
												<option value="DISPOSISI">DISPOSISI</option>
												<option value="INTERNAL">INTERNAL</option>
												<option value="PROJECT">PROJECT</option>
											</select>
										</div>
					
										<div class="form-group">
											<label for="inputgrup" class="label-name">JUDUL</label>
											<input type="text" class="form-control" name="judul" placeholder="Masukan Judul" required>
										</div>
					
										<div class="form-group">
											<label for="inputgrup" class="label-name">DESKRIPSI</label>
											<textarea class="form-control" name="deskripsi" rows="3" placeholder="Masukan Deskripsi" required></textarea>
										</div>

										<div class="form-group">
											<label for="inputgrup" class="label-name">PIC</label>
											<select id="PIC" name="PIC[]" class="selectpicker form-control" multiple aria-label="size 3 select example" required>
												<?php
												$query = "SELECT * FROM user";
												$result = $db->query($query);
												$no = 0;

												while ($row = $result->fetch_assoc()) {
													$no++;
												?>
													<option value="<?php echo $row['initial_name']; ?>"><?php echo $row['nama_lengkap'] . ", " . $row['initial_name']; ?></option>
												<?php
												}
												?>
											</select>
										</div>

										<div class="form-group">
											<label for="inputgrup" class="label-name">STATUS</label>
											<select class="form-select" name="status" placeholder="Pilih Status" required>
												<!-- <option selected value="">Pilih Status</option> -->
												<option value="OPEN" selected>OPEN</option>
												<option value="PROCESS">PROCESS</option>
												<option value="REPORT">REPORT</option>
												<option value="CLOSE">CLOSE</option>
												<option value="SUNDUL">SUNDUL</option>
												<option value="NOTED">NOTED</option>
											</select>
										</div>

										<div class="form-group">
											<label for="inputgrup" class="label-name">Kategori</label>
											<select class="form-select" name="kategori" placeholder="Pilih Kategori" required>
												<option selected value="">Pilih Kategori</option>
												<option value="TUGAS">TUGAS</option>
												<option value="RAPAT">RAPAT</option>
												<option value="DINAS">DINAS</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="inputgrup" class="label-name">START DATE</label>
											<input type="date" class="form-control" name="start_date" required>
										</div>
					
										<div class="form-group">
											<label for="inputgrup" class="label-name">END DATE</label>
											<input type="date" class="form-control" name="end_date" required>
										</div>
										
										<div class="form-group">
											<label for="inputgrup" class="label-name">TARGET TIME</label>
											<input type="time" class="form-control" name="target_time" required>
										</div>
					
										<div class="form-group">
											<label for="inputgrup" class="label-name">AGENDA</label>
											<select class="form-select" name="agenda" placeholder="Pilih Agenda" required>
												<option selected value="">Pilih Agenda</option>
												<option value="AGENDA">AGENDA</option>
												<option value="NON AGENDA">NON AGENDA</option>
											</select>
										</div>

										<div class="form-group">
											<label for="formFile" class="label-name">FILE LAMPIRAN</label>
											<input type="file" class="form-control" name="file">
										</div>
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
				<?php } ?>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-file-blank' ></i>
					<a class="text" href="myJoblist.php">
						<center><h3>My Job</h3></center>
					</a>
				</li>
				<li>
					<i class='bx bxs-file'></i>
					<a class="text" href="groupJoblist.php">
						<center><h3>Group Job</h3></center>
					</a>
				</li>
				<li>
					<i class='bx bxs-data' ></i>
					<a class="text" href="joblist.php">
						<center><h3>All Job</h3></center>
					</a>
				</li>
			</ul>
			
			<div class="table-data">
				<div style="width: 100%;">
					<span><h3>Joblist</h3></span>
						<table id="example" class="table table-striped " style="width:100%">
							<ul class="boxx">
							<div class="dropdown">
								<button class="btn btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Group</button>
  								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="joblist.php">ALL GROUP</a></li>
    								<li><a class="dropdown-item" href="../pages/action/administrasi.php">ADMINISTRASI</a></li>
    								<li><a class="dropdown-item" href="../pages/action/arsip.php">ARSIP</a></li>
									<li><a class="dropdown-item" href="../pages/action/binalavotas.php">BINALAVOTAS</a></li>
									<li><a class="dropdown-item" href="../pages/action/binapenta&pasker.php">BINAPENTA & PASKER</a></li>
									<li><a class="dropdown-item" href="../pages/action/binwasnaker&phi.php">BINWASNAKER & PHI</a></li>
									<li><a class="dropdown-item" href="../pages/action/development&dwh.php">DEVELOPMENT & DWH</a></li>
									<li><a class="dropdown-item" href="../pages/action/disposisi.php">DISPOSISI</a></li>
									<li><a class="dropdown-item" href="../pages/action/internal.php">INTERNAL</a></li>
									<li><a class="dropdown-item" href="../pages/action/project.php">PROJECT</a></li>
  								</ul>
  								</ul>
								</div>
								&nbsp;
								<div class="dropdown">
								<button class="btn btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Status</button>
  								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="joblist.php">ALL STATUS</a></li>
    								<li><a class="dropdown-item" href="../pages/action/open.php">OPEN</a></li>
    								<li><a class="dropdown-item" href="../pages/action/close.php">CLOSE</a></li>
									<li><a class="dropdown-item" href="../pages/action/report.php">REPORT</a></li>
									<li><a class="dropdown-item" href="../pages/action/process.php">PROCESS</a></li>
    								<li><a class="dropdown-item" href="../pages/action/sundul.php">SUNDUL</a></li>
									<li><a class="dropdown-item" href="../pages/action/noted.php">NOTED</a></li>
								</ul>
								</div>
								&nbsp;
								<div class="dropdown">
									<button class="btn btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Category</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
										<li><a class="dropdown-item" href="joblist.php">ALL CATEGORY</a></li>
										<li><a class="dropdown-item" href="../pages/action/tugas.php">TUGAS</a></li>
										<li><a class="dropdown-item" href="../pages/action/rapat.php">RAPAT</a></li>
										<li><a class="dropdown-item" href="../pages/action/dinas.php">DINAS</a></li>
									</ul>
									</ul>
							</ul>
							<thead style="text-align-last:center;">
								<tr>
									<th>JOB</th>
									<th>JOBLIST</th>
									<th>END DATE/STATUS</th>
									<th>TARGET TIME</th>
									<th>CATEGORY</th>
									<th>PIC</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody style="text-align-last: center;">
								<?php
								$query = "SELECT * FROM joblist";
								$result = $db->query($query);

								while ($row = $result->fetch_assoc()) {
								?>
									<tr>
										<td><?php echo $row['id']; ?></td>
										<td>
											<div class="badge bg-secondary text-uppercase"><?php echo $row['grup']; ?></div>
											<div><?php echo $row['judul']; ?></div>
											<div><p>Input By : <?php echo $row['input_by']; ?></p></div>
											<div><p>
												<?php
												if ($row['report_by'] != '') {
													echo '<p>Report By : ' . $row['report_by'] . '</p>';
												}
												?>
											</p>
											</div>
										</td>
										<td>
											<div><?php echo $row['end_date']; ?><div>
											<?php
											if ($row['status'] == 'OPEN') {
												echo '<span class="badge bg-success" >OPEN</span>';
											} elseif ($row['status'] == 'REPORT') {
												echo '<span class="badge bg-warning">REPORT</span>';
											} elseif ($row['status'] == 'CLOSE') {
												echo '<span class="badge bg-danger">CLOSE</span>';
											} elseif ($row['status'] == 'PROCESS') {
												echo '<span class="badge bg-primary">PROCESS</span>';
											} elseif ($row['status'] == 'SUNDUL') {
												echo '<span class="badge bg-secondary">SUNDUL</span>';
											} elseif ($row['status'] == 'NOTED') {
												echo '<span class="badge bg-info">NOTED</span>';
											}
											?>
										</td>
										<td><?php echo $row['target_time']; ?></td>
										<td>
											<?php
											if ($row['kategori'] == 'TUGAS') {
												echo '<span class="badge rounded-pill bg-success" >TUGAS</span>';
											} elseif ($row['kategori'] == 'RAPAT') {
												echo '<span class="badge rounded-pill bg-danger">RAPAT</span>';
											} elseif ($row['kategori'] == 'DINAS') {
												echo '<span class="badge rounded-pill bg-warning">DINAS</span>';
											}
											?>
										</td>
										<td><?php echo $row['PIC']; ?></td>
										<td>
											<a href="" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#infoModal<?php echo $row['id']; ?>"><i class='bx bxs-info-square' ></i></a>
											<!-- Info Modal -->
											<div class="modal fade bd-example-modal-lg" id="infoModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Detail Joblist</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<form>
														<div class="modal-body">
															<div class="container-fluid">
																<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">GRUP</label>
																		<input type="text" class="form-control" name="grup" value="<?php echo $row['grup']; ?>" readonly>
																	</div>
												
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">JUDUL</label>
																		<input type="text" class="form-control" name="judul" value="<?php echo $row['judul']; ?>" readonly>
																	</div>
												
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">DESKRIPSI</label>
																		<textarea class="form-control" name="deskripsi" rows="3" readonly><?php echo $row['deskripsi']; ?></textarea>
																	</div>

																	<div class="form-group">
																		<label for="inputgrup" class="label-name">PIC</label>
																		<input type="text" class="form-control" name="PIC" value="<?php echo $row['PIC']; ?>" readonly>
																	</div>

																	<div class="form-group">
																		<label for="inputgrup" class="label-name">STATUS</label>
																		<input type="text" class="form-control" name="status" value="<?php echo $row['status']; ?>" readonly>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">START DATE</label>
																		<input type="date" class="form-control" name="start_date" value="<?php echo $row['start_date']; ?>" readonly>
																	</div>
												
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">END DATE</label>
																		<input type="date" class="form-control" name="end_date" value="<?php echo $row['end_date']; ?>" readonly>
																	</div>
																	
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">TARGET TIME</label>
																		<input type="text" class="form-control" name="target_time" value="<?php echo $row['target_time']; ?>" readonly>
																	</div>
												
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">AGENDA</label>
																		<input type="text" class="form-control" name="agenda" value="<?php echo $row['agenda']; ?>" readonly>
																	</div>

																	<div class="form-group">
																		<label for="formFile" class="label-name">FILE LAMPIRAN</label>
																		<!-- check if file_lampiran = '' -->
																		<?php if($row['file_lampiran'] == ''){ ?>
																			<!-- <input type="text" class="form-control" name="file_lampiran" value="Tidak ada file lampiran" > -->
																		<?php }else{ ?>
																			<a href="../files/lampiran/<?php echo $row['file_lampiran']; ?>" target="_blank" class="form-control btn btn-sm">Lihat File</a>
																		<?php } ?>
																	</div>
																	<div class="form-group">
																		<label for="formFile" class="label-name">FILE REPORT</label>
																		<?php if($row['file_report'] == ''){ ?>
																			<!-- <input type="text" class="form-control" name="file_report" value="Tidak ada file lampiran" > -->
																		<?php }else{ ?>
																			<a href="../files/report/<?php echo $row['file_report']; ?>" target="_blank" class="form-control btn btn-sm">Lihat File</a>
																		<?php } ?>
																	</div>
																</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
														</div>
													</form>
												</div>
												</div>
											</div>
											<?php if ($_SESSION['role'] == 'Pegawai') { ?>
											<a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>"><i class='bx bxs-edit' ></i></a>
											<!-- Edit Modal -->
											<div class="modal fade bd-example-modal-lg" id="editModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit Joblist</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<form method="POST" action="action/editJob.php" enctype="multipart/form-data">
														<div class="modal-body">
															<div class="container-fluid">
																<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">GRUP</label>
																		<select class="form-select" name="grup" id="inputgrup"  disabled>
																			<option default value="" disabled>Pilih Grup</option>
																			<option <?= $row['grup'] == 'ADMINISTRASI' ? 'selected' : '' ?> value="ADMINISTRASI">ADMINISTRASI</option>
																			<option <?= $row['grup'] == 'ALL GRUP' ? 'selected' : '' ?> value="ALL GRUP">ALL GRUP</option>
																			<option <?= $row['grup'] == 'ARSIP' ? 'selected' : '' ?> value="ARSIP">ARSIP</option>
																			<option <?= $row['grup'] == 'BINALAVOTAS' ? 'selected' : '' ?> value="BINALAVOTAS">BINALAVOTAS</option>
																			<option <?= $row['grup'] == 'BINAPENTA & PASKER' ? 'selected' : '' ?> value="BINAPENTA & PASKER">BINAPENTA & PASKER</option>
																			<option <?= $row['grup'] == 'BINWASKER & PHI' ? 'selected' : '' ?> value="BINWASKER & PHI">BINWASKER & PHI</option>
																			<option <?= $row['grup'] == 'DEVELOPMENT & DWH' ? 'selected' : '' ?> value="DEVELOPMENT & DWH">DEVELOPMENT & DWH</option>
																			<option <?= $row['grup'] == 'DISPOSISI' ? 'selected' : '' ?> value="DISPOSISI">DISPOSISI</option>
																			<option <?= $row['grup'] == 'INTERNAL' ? 'selected' : '' ?> value="INTERNAL">INTERNAL</option>
																			<option <?= $row['grup'] == 'PROJECT' ? 'selected' : '' ?> value="PROJECT">PROJECT</option>
																		</select>
																	</div>
												
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">JUDUL</label>
																		<input type="text" class="form-control" name="judul" value="<?php echo $row['judul']; ?>" disabled>
																	</div>
												
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">DESKRIPSI</label>
																		<textarea class="form-control" name="deskripsi" rows="3" value="<?php echo $row['deskripsi']; ?>" disabled></textarea>
																	</div>

																	<div class="form-group">
																		<label for="inputgrup" class="label-name">PIC</label>
																		<select id="PIC" name="PIC[]" class="selectpicker form-control" multiple aria-label="size 3 select example" placeholder="Pilih PIC" disabled>
																			<?php
																			$data = "SELECT * FROM user";
																			$hasil = $db->query($data);

																			while ($pic = $hasil->fetch_assoc()) {
																			?>
																				<option value="<?php echo $pic['initial_name']; ?>"><?php echo $pic['nama_lengkap']; ?></option>
																			<?php
																			}
																			?>
																		</select>
																	</div>

																	<div class="form-group">
																		<label for="inputgrup" class="label-name">STATUS</label>
																		<select class="form-select" name="status" id="status">
																			<option default disabled>Pilih Status</option>
																			<option <?= $row['status'] == 'OPEN' ? 'selected' : '' ?> value="OPEN">OPEN</option>
																			<option <?= $row['status'] == 'PROCESS' ? 'selected' : '' ?> value="PROCESS">PROCESS</option>
																			<option <?= $row['status'] == 'REPORT' ? 'selected' : '' ?> value="REPORT">REPORT</option>
																			<option <?= $row['status'] == 'CLOSE' ? 'selected' : '' ?> value="CLOSE">CLOSE</option>
																			<option <?= $row['status'] == 'SUNDUL' ? 'selected' : '' ?> value="SUNDUL">SUNDUL</option>
																			<option <?= $row['status'] == 'NOTED' ? 'selected' : '' ?> value="NOTED">NOTED</option>
																		</select>
																	</div>

																	<div class="form-group">
																		<label for="inputgrup" class="label-name">Kategori</label>
																		<select class="form-select" name="kategori" placeholder="Pilih Kategori" disabled>
																			<option selected value="">Pilih Kategori</option>
																			<option <?= $row['kategori'] == 'TUGAS' ? 'selected' : '' ?> value="TUGAS">TUGAS</option>
																			<option <?= $row['kategori'] == 'RAPAT' ? 'selected' : '' ?> value="RAPAT">RAPAT</option>
																			<option <?= $row['kategori'] == 'DINAS' ? 'selected' : '' ?> value="DINAS">DINAS</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">END DATE</label>
																		<input type="date" class="form-control" name="end_date" value="<?php echo $row['end_date']; ?>" disabled>
																	</div>
																	
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">TARGET TIME</label>
																		<input type="time" class="form-control" name="target_time" value="<?php echo $row['target_time']; ?>" disabled>
																	</div>
												
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">AGENDA</label>
																		<select class="form-select" name="agenda" id="inputagenda" disabled>
																			<option default>Pilih Agenda</option>
																			<option <?= $row['agenda'] == 'AGENDA' ? 'selected' : '' ?> value="AGENDA">AGENDA</option>
																			<option <?= $row['agenda'] == 'NON AGENDA' ? 'selected' : '' ?> value="NON AGENDA">NON AGENDA</option>
																		</select>
																	</div>

																	<div class="form-group">
																		<label for="formFile" class="label-name">FILE LAMPIRAN</label>
																		<input type="file" class="form-control" name="file">
																	</div>

																	<div class="form-group">
																		<label for="formFile" class="label-name">FILE LAPORAN</label>
																		<input type="file" class="form-control" name="fileReport">
																	</div>

																	<div class="form-group">
																		<label for="inputgrup" class="label-name">CATATAN LAPORAN</label>
																		<textarea class="form-control" name="catatan" rows="3" value="<?php echo $row['catatan']; ?>"></textarea>
																	</div>
																</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															
															<button type="submit" class="modal-btn-add" name="save">Save</button>
														</div>
													</form>
												</div>
												</div>
											</div>
											<?php } else { ?>
											<a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>"><i class='bx bxs-edit' ></i></a>
											<!-- Edit Modal -->
											<div class="modal fade bd-example-modal-lg" id="editModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit Joblist</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<form method="POST" action="action/editJob.php" enctype="multipart/form-data">
														<div class="modal-body">
															<div class="container-fluid">
																<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">GRUP</label>
																		<select class="form-select" name="grup" id="inputgrup">
																			<option default value="" disabled>Pilih Grup</option>
																			<option <?= $row['grup'] == 'ADMINISTRASI' ? 'selected' : '' ?> value="ADMINISTRASI">ADMINISTRASI</option>
																			<option <?= $row['grup'] == 'ALL GRUP' ? 'selected' : '' ?> value="ALL GRUP">ALL GRUP</option>
																			<option <?= $row['grup'] == 'ARSIP' ? 'selected' : '' ?> value="ARSIP">ARSIP</option>
																			<option <?= $row['grup'] == 'BINALAVOTAS' ? 'selected' : '' ?> value="BINALAVOTAS">BINALAVOTAS</option>
																			<option <?= $row['grup'] == 'BINAPENTA & PASKER' ? 'selected' : '' ?> value="BINAPENTA & PASKER">BINAPENTA & PASKER</option>
																			<option <?= $row['grup'] == 'BINWASKER & PHI' ? 'selected' : '' ?> value="BINWASKER & PHI">BINWASKER & PHI</option>
																			<option <?= $row['grup'] == 'DEVELOPMENT & DWH' ? 'selected' : '' ?> value="DEVELOPMENT & DWH">DEVELOPMENT & DWH</option>
																			<option <?= $row['grup'] == 'DISPOSISI' ? 'selected' : '' ?> value="DISPOSISI">DISPOSISI</option>
																			<option <?= $row['grup'] == 'INTERNAL' ? 'selected' : '' ?> value="INTERNAL">INTERNAL</option>
																			<option <?= $row['grup'] == 'PROJECT' ? 'selected' : '' ?> value="PROJECT">PROJECT</option>
																		</select>
																	</div>
												
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">JUDUL</label>
																		<input type="text" class="form-control" name="judul" value="<?php echo $row['judul']; ?>">
																	</div>
												
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">DESKRIPSI</label>
																		<textarea class="form-control" name="deskripsi" rows="3" value="<?php echo $row['deskripsi']; ?>"></textarea>
																	</div>

																	<div class="form-group">
																		<label for="inputgrup" class="label-name">PIC</label>
																		<select id="PIC" name="PIC[]" class="selectpicker form-control" multiple aria-label="size 3 select example" placeholder="Pilih PIC" required>
																			<?php
																			$data = "SELECT * FROM user";
																			$hasil = $db->query($data);

																			while ($pic = $hasil->fetch_assoc()) {
																			?>
																				<option value="<?php echo $pic['initial_name']; ?>"><?php echo $pic['nama_lengkap']; ?></option>
																			<?php
																			}
																			?>
																		</select>
																	</div>

																	<div class="form-group">
																		<label for="inputgrup" class="label-name">STATUS</label>
																		<select class="form-select" name="status" id="status">
																			<option default disabled>Pilih Status</option>
																			<option <?= $row['status'] == 'OPEN' ? 'selected' : '' ?> value="OPEN">OPEN</option>
																			<option <?= $row['status'] == 'PROCESS' ? 'selected' : '' ?> value="PROCESS">PROCESS</option>
																			<option <?= $row['status'] == 'REPORT' ? 'selected' : '' ?> value="REPORT">REPORT</option>
																			<option <?= $row['status'] == 'CLOSE' ? 'selected' : '' ?> value="CLOSE">CLOSE</option>
																			<option <?= $row['status'] == 'SUNDUL' ? 'selected' : '' ?> value="SUNDUL">SUNDUL</option>
																			<option <?= $row['status'] == 'NOTED' ? 'selected' : '' ?> value="NOTED">NOTED</option>
																		</select>
																	</div>

																	<div class="form-group">
																		<label for="inputgrup" class="label-name">Kategori</label>
																		<select class="form-select" name="kategori" placeholder="Pilih Kategori">
																			<option selected value="">Pilih Kategori</option>
																			<option <?= $row['kategori'] == 'TUGAS' ? 'selected' : '' ?> value="TUGAS">TUGAS</option>
																			<option <?= $row['kategori'] == 'RAPAT' ? 'selected' : '' ?> value="RAPAT">RAPAT</option>
																			<option <?= $row['kategori'] == 'DINAS' ? 'selected' : '' ?> value="DINAS">DINAS</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">END DATE</label>
																		<input type="date" class="form-control" name="end_date" value="<?php echo $row['end_date']; ?>">
																	</div>
																	
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">TARGET TIME</label>
																		<input type="time" class="form-control" name="target_time" value="<?php echo $row['target_time']; ?>">
																	</div>
												
																	<div class="form-group">
																		<label for="inputgrup" class="label-name">AGENDA</label>
																		<select class="form-select" name="agenda" id="inputagenda">
																			<option default>Pilih Agenda</option>
																			<option <?= $row['agenda'] == 'AGENDA' ? 'selected' : '' ?> value="AGENDA">AGENDA</option>
																			<option <?= $row['agenda'] == 'NON AGENDA' ? 'selected' : '' ?> value="NON AGENDA">NON AGENDA</option>
																		</select>
																	</div>

																	<div class="form-group">
																		<label for="formFile" class="label-name">FILE LAMPIRAN</label>
																		<input type="file" class="form-control" name="file">
																	</div>

																	<div class="form-group">
																		<label for="formFile" class="label-name">FILE LAPORAN</label>
																		<input type="file" class="form-control" name="fileReport">
																	</div>

																	<div class="form-group">
																		<label for="inputgrup" class="label-name">CATATAN LAPORAN</label>
																		<textarea class="form-control" name="catatan" rows="3" value="<?php echo $row['catatan']; ?>"></textarea>
																	</div>
																</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															
															<button type="submit" class="modal-btn-add" name="save">Save</button>
														</div>
													</form>
												</div>
												</div>
											</div>
											<a href="action/delJob.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class='bx bxs-trash' ></i></a>
											<?php } ?>
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table> 
				</div>
			</div>
			<?php include '../assets/inc/copyright.php';?>	
		</main>	
	</section>

	<!-- Vendor JS Files -->
	<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	
	<!-- Bootstrap JS File -->
	<script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script defer src="../assets/js/script.js"></script>
	<script defer src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script defer src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

	<!-- Multiselect JS File -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
	
</body>
</html>
