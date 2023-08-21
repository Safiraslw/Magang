<?php require "proses/session.php"; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                    id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/Safiraslw.png" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong><?php echo $_SESSION['username']; ?></strong>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="profile.php">Profile</a></li> -->
                    <li><a class="dropdown-item" href="proses/proses_logout.php">Sign out</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>