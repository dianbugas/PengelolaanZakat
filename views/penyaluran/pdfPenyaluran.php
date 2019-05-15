<!DOCTYPE html>
<html>
<head>
    <title>Data Penyaluran</title>
    <style>
        .page
        {
            padding:2cm;
        }
        table
        {
            border-spacing:0;
            border-collapse: collapse;
            width:100%;
        }

        table td, table th
        {
            border: 1px solid #ccc;
        }

		table th
        {
            background-color:gray;
        }
    </style>
</head>
<body>
<?php
$ar_judul = ['No','Nama','Jenis Program','Keterangan'];
?>
    <div class="page">
        <h1>Data Penyaluran</h1>
        <table border="0">
        <tr>
            <?php
            foreach ($ar_judul as $jdl) {
                echo '<th>'.$jdl.'</th>';
            }
            ?>

        </tr>
        <?php
        $no = 1;
        foreach($dataProvider->getModels() as $penyaluran){
        ?>
        <tr>
                <td><?= $no++ ?></td>
                <td><?= $penyaluran->relMustahik->nama; ?></td>
                <td><?= $penyaluran->relJenisprogram->nama; ?></td>
                <td><?= $penyaluran->keterangan; ?></td>
        </tr>
        <?php
        }
        ?>
        </table>
    </div>
</body>
</html>
