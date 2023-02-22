<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <nav>
        <i class='bx bx-menu' ></i>
        <a href="#" class="nav-link"><b>INFOGATE</b></a>
        <form action="#">
            <div class="form-input" style="text-align: center;">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
            </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification">
            <i class='bx bxs-bell' ></i>
            <span class="num"></span>
        </a>	
        <div class="drop_down">
            <button class="drop_btn"><?php echo $result->nama_lengkap?></button>
            <div class="drop_down-content">
                <a href="profile.php">Edit Profile</a>
                <a href="auth/logout.php">Logout</a>
            </div>
        </div>
        
    </nav>
</body>
</html>