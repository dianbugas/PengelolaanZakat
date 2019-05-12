<!DOCTYPE html>
<html>
<head>
    <title>Data Mustahik</title>
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
$ar_judul = ['No','NIK','Nama','Jenis Kelamin','Tempat Lahir','Tanggal Lahir','Kecamatan','Kelurahan','Alamat'];
?>  
    <div class="page">	
        <h1>Data Mustahik</h1>
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
        foreach($dataProvider->getModels() as $mustahik){ 
        ?>
        <tr>
                <td><?= $no++ ?></td>
                <td><?= $mustahik->nik; ?></td>
                <td><?= $mustahik->nama; ?></td>
                <td><?= $mustahik->jeniskelamin; ?></td>
                <td><?= $mustahik->tempatlahir; ?></td>
                <td><?= $mustahik->tanggallahir; ?></td>
                <td><?= $mustahik->relKecamatan->nama; ?></td>
                <td><?= $mustahik->relKelurahan->nama; ?></td>
                <td><?= $mustahik->alamat; ?></td>
               
        </tr>
        <?php
        }
        ?>
        </table>
    </div>   
</body>
</html>