<?php
if (isset($_SESSION["user_session"])) {
    if($_SESSION['usertype'] == "admin"){
?>
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-success p-0">
    <div class="container-fluid d-flex flex-column p-0"><br><img src="../assets/img/logo.png" width="80%"/><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"></div>
            <div class="sidebar-brand-text mx-3 fs-3"><span><br>BROASS<hr></span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-white" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link" href="appointments.php"><i class="fas fa-calendar-alt"></i><span> Appointments</span></a></li>
            <li class="nav-item"><a class="nav-link" href="announcements.php"><i class="fas fa-bullhorn"></i><span> Announcements</span></a></li>
            <li class="nav-item"><a class="nav-link" href="summary.php"><i class="fas fa-chart-pie"></i><span> Summary of Past Transactions</span></a></li>
            <li class="nav-item"><a class="nav-link" href="users.php"><i class="fas fa-users"></i><span> User Accounts</span></a></li>
            <li class="nav-item"><a class="nav-link" href="staff.php"><i class="fas fa-users-cog"></i><span> Staff Accounts</span></a></li>
            <li class="nav-item"><a class="nav-link" href="student_id.php"><i class="fas fa-id-card"></i><span> Student ID List</span></a></li>
            <li class="nav-item"><a class="nav-link" href="schedule.php"><i class="fas fa-clock"></i><span> Manage Schedule</span></a></li>
            <li class="nav-item"><a class="nav-link" href="account.php"><i class="fas fa-user-cog"></i><span> Account Settings</span></a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>
<?php }
elseif($_SESSION['usertype'] == "user"){
    ?>
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-success p-0">
    <div class="container-fluid d-flex flex-column p-0"><br><img src="../assets/img/logo.png" width="80%"/><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"></div>
            <div class="sidebar-brand-text mx-3 fs-3"><span><br>BROASS<hr></span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-white" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-calendar-check"></i><span> Create an Appointment</span></a></li>
            <li class="nav-item"><a class="nav-link" href="my_appointments.php"><i class="fas fa-calendar-alt"></i><span> My Appointments</span></a></li>
            <li class="nav-item"><a class="nav-link" href="account.php"><i class="fas fa-user-cog"></i><span> Account Settings</span></a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>
<?php }
elseif($_SESSION['usertype'] == "staff"){
    ?>
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-success p-0">
    <div class="container-fluid d-flex flex-column p-0"><br><img src="../assets/img/logo.png" width="80%"/><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"></div>
            <div class="sidebar-brand-text mx-3 fs-3"><span><br>BROASS<hr></span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-white" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link" href="appointments.php"><i class="fas fa-calendar-alt"></i><span> Appointments</span></a></li>
            <li class="nav-item"><a class="nav-link" href="summary.php"><i class="fas fa-chart-pie"></i><span> Summary of Past Transactions</span></a></li>
            <?php if($_SESSION['perm2'] == 1){?>
            <li class="nav-item"><a class="nav-link" href="schedule.php"><i class="fas fa-clock"></i><span> Manage Schedule</span></a></li>
            <?php } ?>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>
<?php
}
} 
?>