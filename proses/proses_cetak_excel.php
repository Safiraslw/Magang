<?php
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Gardu.xls");
?>

<h1>DATA GARDU</h1>

<table border="1">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Kode Gardu</th>
            <th>Unit</th>
            <th>Latitudey</th>
            <th>Longtitudex</th>
            <th>Tipe</th>
            <th>Jenis</th>
            <th>Status</th>
            <th>Username</th>
            <th>Date-Time</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "gis_gardu")
        or die("koneksi gagal");
        $sql = mysqli_query($conn, "SELECT * FROM gardu");
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
            $no++;
        ?>
            <tr>
                <th scope="row"><?php echo $no ?></th>
                <td><?php echo $data['kode_gardu'] . "<br>"; ?></td>
                <td><?php echo $data['ulp'] . "<br>"; ?></td>
                <td><?php echo $data['latitudey'] . "<br>"; ?></td>
                <td><?php echo $data['longitudex'] . "<br>"; ?></td>
                <td><?php echo $data['type_gardu'] . "<br>"; ?></td>
                <td><?php echo $data['jenis_pelayanan'] . "<br>"; ?></td>
                <td>
                    <?php
                    if ($data['status'] == 1) echo "<span class='badge bg-secondary'>Not Ready</span>";
                    elseif ($data['status'] == 2) echo "<span class='badge bg-warning'>Request Operating</span>";
                    elseif ($data['status'] == 3) echo "<span class='badge bg-success'>Operating</span>";
                    ?>
                </td>
                <td><?php echo $data['username'] . "<br>"; ?></td>
                <td><?php echo $data['datetime'] . "<br>"; ?></td>
            </tr>
        <?php } ?>
</table>