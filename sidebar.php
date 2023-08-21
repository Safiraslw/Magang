<!-- Sidbar -->
<div class="navigation">
    <h1><img src="images/logo.png" alt=""></h1>
    <ul>
        <li id="home">
            <a href="dashboard" class="nav-link <?php echo (isset ($_GET['x']) && $_GET['x']=='dashboard') ? 'active link-warning' : 'link-light' ; ?>">
                <i class="icon"><ion-icon name="home-outline"></ion-icon></i>
                <span>Home</span>
            </a>
        </li>
        <li id="peta">
            <a href="peta" class="nav-link <?php echo ((isset ($_GET['x']) && $_GET['x']=='peta') || !isset($_GET['x'])) ? 'active link-warning' : 'link-light' ; ?>">
                <i class="icon"><ion-icon name="location-outline"></ion-icon></i>
                <span>Map</span>
            </a>
        </li>
        <li id="ecom">
            <a href="#ecom" class="nav-link <?php echo (isset ($_GET['x']) && $_GET['x']=='#ecom') ?>">
                <i class="icon"><ion-icon name="folder-outline"></ion-icon></i>
                <span>Data Aset</span>
                <i class="fa fa-angle-right"></i>
            </a>
            <ul>
                <li>
                    <a href="gardu" class="dropdown <?php echo (isset ($_GET['x']) && $_GET['x']=='gardu') ? 'active link-warning' : 'link-light' ; ?>">Data Gardu</a>
                </li>
                <li>
                    <a href="tiang" class="dropdown <?php echo (isset ($_GET['x']) && $_GET['x']=='tiang') ? 'active link-warning' : 'link-light' ; ?>">Data Tiang</a>
                </li>
                <li>
                    <a href="pelanggan" class="dropdown <?php echo (isset ($_GET['x']) && $_GET['x']=='pelanggan') ? 'active link-warning' : 'link-light' ; ?>">Data Pelanggan</a>
                </li>
            </ul>
        </li>
        <li id="comp">
            <a href="#comp" class="nav-link <?php echo (isset ($_GET['x']) && $_GET['x']=='#comp')?>">
                <i class="icon"><ion-icon name="add-circle-outline"></ion-icon></i>
                <span>Tambah Data Aset</span>
                <i class="fa fa-angle-right"></i>
            </a>
            <ul>
                <li>
                    <a href="gardu1" class="dropdown <?php echo (isset ($_GET['x']) && $_GET['x']=='gardu1') ? 'active link-warning' : 'link-light' ; ?>">Data Gardu</a>
                </li>
                <li>
                    <a href="tiang2" class="dropdown <?php echo (isset ($_GET['x']) && $_GET['x']=='tiang2') ? 'active link-warning' : 'link-light' ; ?>">Data Tiang</a>
                </li>
                <li>
                    <a href="pelanggan3" class="dropdown <?php echo (isset ($_GET['x']) && $_GET['x']=='pelanggan3') ? 'active link-warning' : 'link-light' ; ?>">Data Pelanggan</a>
                </li>
            </ul>
        </li>
        <li id="rawat">
            <a href="#" class="nav-link <?php echo (isset ($_GET['x']) && $_GET['x']=='pemeliharaan') ? 'active link-warning' : 'link-light' ; ?>">
                <i class="icon"><ion-icon name="documents-outline"></ion-icon></i>
                <span>Pemeliharaan</span>
            </a>
        </li>
    </ul>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!-- Akhir Sidebar -->