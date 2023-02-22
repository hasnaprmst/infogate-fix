<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<section id="sidebar">
	<a href="dashboard.php" class="brand">
		<i class='bx bx-compass'></i>
		<span class="text">INFOGATE</span>
	</a>
	<ul class="side-menu top">
		<li <?php if($thisPage == "Dashboard") echo "class='active'"; ?>>
			<a href="dashboard.php">
				<i class='bx bx-grid-alt' ></i>
				<span class="text">Dashboard</span>
			</a>
		</li>
		<li <?php if($thisPage == "Profile") echo "class='active'"; ?>>
			<a href="profile.php">
				<i class='bx bx-user' ></i>
				<span class="text">Profile</span>
			</a>
		</li>
		<?php if($_SESSION['role'] == 'Atasan') { ?>
			<li <?php if($thisPage == "Master Data") echo "class='active'"; ?>>
			<a href="master_data.php">
				<i class='bx bx-data'></i>
				<span class="text">Master Data</span>
			</a>
		</li>
		<?php } ?>
		<li <?php if($thisPage == "Log History") echo "class='active'"; ?>>
			<a href="loghistory.php">
				<i class='bx bx-time' ></i>
				<span class="text">Log History</span>
			</a>
		</li>
		<li <?php if($thisPage == "Joblist") echo "class='active'"; ?>>
			<a href="joblist.php">
				<i class='bx bx-task' ></i>
				<span class="text">Joblist</span>
			</a>
		</li>
		<li <?php if($thisPage == "Bank File") echo "class='active'"; ?>>
			<a href="bankfile.php">
				<i class='bx bx-folder' ></i>
				<span class="text">Bank File</span>
			</a>
		</li>
	</ul>
	<ul class="side-menu">
	
		<li>
			<a href="auth/logout.php" class="logout">
				<i class='bx bx-log-out' ></i>
				<span class="text">Logout</span>
			</a>
		</li>
	</ul>
</section>
</body>
</html>