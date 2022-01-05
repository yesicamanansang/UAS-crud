<?php
    //koneksi database 
    $server = "db4free.net";
    $user = "yesica05";
    $pass ="05012001esi";
    $database ="double_u";

    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

    //jika tombol simpan diklik 
    if(isset($_POST['bsimpan']))
    {
        //Pengujian Apakah data akat diedit atau disimpan baru
        if($_GET['hal'] == "edit")
        {
            //Data akan di edit
            $edit = mysqli_query($koneksi, "UPDATE tsiswa set
                                            nis = '$_POST[tnis]', nama = '$_POST[tnama]', alamat = '$_POST[talamat]', kelas = '$_POST[tkelas]'
                                            WHERE id_siswa = '$_GET[id]'
                                         ");
            if($edit) //jika edit sukses
            {
                echo "<script>
                        alert('Edit data sukses!);
                        document.location='index.php';
                    </script>";
            }
            else
            {
                echo "<script>
                        alert('Edit data Gagal!);
                        document.location='index.php';
                    </script>";
            } 
        }
        else
        {
            //Data akan disimpan baru
            $simpan = mysqli_query($koneksi, "INSERT INTO tsiswa (nis, nama, alamat, kelas)
                                         VALUES ('$_POST[tnis]','$_POST[tnama]', '$_POST[talamat]', '$_POST[tkelas]')
                                         ");
            if($simpan) //jika simpan sukses
            {
                echo "<script>
                        alert('Simpan data sukses!);
                        document.location='index.php';
                    </script>";
            }
            else
            {
                echo "<script>
                        alert('Simpan data Gagal!');
                        document.location='index.php';
                    </script>";
            }
        }

    }


    //pengujian jika tombol Edit / Hapus di Klik
    if(isset($_GET['hal']))
    {
        //Pengujian jika edit data
        if($_GET['hal'] == "edit")
        {
            //Tampilkan Data yang akan diedit
            $tampil = mysqli_query($koneksi,"SELECT * FROM tsiswa WHERE id_siswa ='$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan, maka data ditampung ke dalam variabel
                $vnis = $data['nis'];
                $vnama = $data['nama'];
                $valamat = $data['alamat'];
                $vkelas = $data['kelas'];
            }
        }
        else if ($_GET['hal'] == "hapus")
        {
            //Persiapan hapus data
            $hapus = mysqli_query($koneksi, "DELETE FROM tsiswa WHERE id_siswa = '$_GET[id]' ");
            if($hapus){
                echo "<script>
                alert('Hapus Data Sukses!);
                document.location='index.php';
                </script>";
            }
        }
    }
?>

<DOCTYPE html>
<html>
<head>
    <title><UAS-CRUD</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
 
    <h1 class="text-center">UAS-CRUD</h1>
    <h2 class="text-center">@yesicamanansang</h2>

    <!--Awal card form-->
    <div class="card mt-3">
    <div class="card-header bg-primary text-white ">
        Form Input data siswa
    </div>
    <div class="card-body">
       <form method="post" action="">
           <div class="form-group">
               <label>NIS</label>
               <input type="text" name ="tnis" value="<?=@$vnis?>" class ="form-control" placeholder="Input NIS anda disini" required>
           </div>
           <div class="form-group">
               <label>Nama</label>
               <input type="text" name ="tnama" value="<?=@$vnama?>"class ="form-control" placeholder="Input Nama anda disini" required>
           </div>
           <div class="form-group">
               <label>Alamat</label>
               <textarea class="form-control" name="talamat" placeholder="Input Alamat anda disini"><?=@$valamat?></textarea>
           </div>
           <div class="form-group">
               <label>Kelas</label>
               <select class="form-control" name="tkelas">\
                   <option value="<?=@$vkelas?>"><?=@$vkelas?></option>
                   <option value="10-MIPA">10-MIPA</option>
                   <option value="10-IIS">10-IIS</option>
                   <option value="10-BAHASA">10-BAHASA</option>
                   <option value="11-MIPA">11-MIPA</option>
                   <option value="11-IIS">11-IIS</option>
                   <option value="11-BAHASA">11-BAHASA</option>
                   <option value="12-MIPA">12-MIPA</option>
                   <option value="12-IIS">12-IIS</option>
                   <option value="12-BAHASA">12-BAHASA</option>
               </select>
           </div>

           <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
           <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

       </from>
    </div>
    </div>
    <!--Akhir card form-->

    <!--Awal card Tabel-->
    <div class="card mt-3">
    <div class="card-header bg-success text-white ">
        Daftar siswa
    </div>
    <div class="card-body">
       
        <table class="table table-bordered table-striped">
            <tr>
                <th>No.</th>
                <th>NIS.</th>
                <th>Nama.</th>
                <th>Alamat.</th>
                <th>Kelas.</th>
                <th>aksi</th>
            </tr>
            <?php
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * FROM tsiswa order by id_siswa desc");
                while($data = mysqli_fetch_array($tampil)) :

            ?>
            <tr>
                <td><?=$no++;?></td>
                <td><?=$data['nis']?></td>
                <td><?=$data['nama']?></td>
                <td><?=$data['alamat']?></td>
                <td><?=$data['kelas']?></td>
                <td>
                    <a href="index.php?hal=edit&id=<?=$data['id_siswa']?>" class="btn btn-warning"> Edit </a>
                    <a href="index.php?hal=hapus&id=<?=$data['id_siswa']?>"
                       onclick="return confirm('apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
                </td>
            </tr>
            <?php endwhile; //penutup perulangan while ?>
        </table>
    </div>
    </div>
    <!--Akhir card Tabel-->

</div>
<script type="text/javascript" src="js/bootstrap.min.js">
</body>
</html>