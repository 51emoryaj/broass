<?php
if (isset($_SESSION["user_session"])) {
?>
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav flex-nowrap ms-auto">
            <div class="d-sm-block topbar-divider"></div>
            <li class="nav-item">
                <div class="nav-item"><a class="nav-link" href="../logout.php" >
                    <span class="d-lg-inline me-2 text-gray-600"><font color="red"><i class="fas fa-power-off"></i> Logout</font></span></a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<?php } ?>