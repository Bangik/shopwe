<?php

    $pagination = isset($_GET['pagination']) ? $_GET['pagination']:1;
    $data_per_halaman = 3;
    $start = ($pagination-1) * $data_per_halaman;
    $queryAdmin = mysqli_query($koneksi, "SELECT * FROM user ORDER BY nama ASC LIMIT $start, $data_per_halaman");
    $no=1+ $start;
    if(mysqli_num_rows($queryAdmin) == 0)
    {
        echo "<h3>Saat ini belum ada data user yang dimasukan</h3>";
    }
    else
    {
        echo "<table class='tabel-list'>";

            echo "<tr class='baris-title'>
                    <th class='kolom-nomor'>No</th>
                    <th class='kiri'>Nama</th>
                    <th class='kiri'>Email</th>
                    <th class='kiri'>Phone</th>
                    <th class='kiri'>Level</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'>Action</th>
                 </tr>";

            while($rowUser=mysqli_fetch_array($queryAdmin))
            {
                echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$rowUser[nama]</td>
                        <td>$rowUser[email]</td>
                        <td>$rowUser[phone]</td>
                        <td>$rowUser[level]</td>
                        <td class='tengah'>$rowUser[status]</td>
                        <td class='tengah'><a class='btn-action' href='".BASE_URL."index.php?page=profile&module=user&action=form&user_id=$rowUser[user_id]"."'>Edit</a></td>
                     </tr>";

                $no++;
            }

        //AKHIR DARI TABLE
        echo "</table>";
        $query = "SELECT * FROM user";
        paginations($query, $data_per_halaman, $pagination, "index.php?page=profile&module=user&action=list");
    }
?>
