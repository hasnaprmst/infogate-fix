<!DOCTYPE html>
<html lang="en">
	
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Joblist</title>
</head>

<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="../../pages/dashboard.php" class="brand">
			<i class='bx bx-compass'></i>
			<span class="text">INFOGATE</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="../../pages/dashboard.php">
					<i class='bx bx-grid-alt' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="../../pages/profile.php">
					<i class='bx bx-user' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			</li>
		    <?php if($_SESSION['role'] == 'Atasan') { ?>
			<li>
			<a href="../../pages/masterData.php">
				<i class='bx bx-data'></i>
				<span class="text">Master Data</span>
			</a>
		    </li>
            <?php } ?>
			<li>
				<a href="../../pages/loghistory.php">
					<i class='bx bx-time' ></i>
					<span class="text">Log History</span>
				</a>
			</li>
			<li class="active">
				<a href="../../pages/joblist.php">
					<i class='bx bx-task' ></i>
					<span class="text">Joblist</span>
				</a>
			</li>
			<li>
				<a href="../../pages/bankfile.php">
					<i class='bx bx-folder' ></i>
					<span class="text">Bank File</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="../../pages/auth/logout.php" class="logout">
					<i class='bx bx-log-out' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
</body>
</html>
</body>
</html>