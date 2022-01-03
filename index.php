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
               <input type="text" name ="tnis" class ="form-control" placeholder="Input NIS anda disini" required>
           </div>
           <div class="form-group">
               <label>Nama</label>
               <input type="text" name ="tnama" class ="form-control" placeholder="Input Nama anda disini" required>
           </div>
           <div class="form-group">
               <label>Alamat</label>
               <textarea class="form-control" name="talamat" placeholder="Input Alamat anda disini"></textarea>
           </div>
           <div class="form-group">
               <label>Kelas</label>
               <select class="form-control" name="tkelas">\
                   <option></option>
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

       </from>
    </div>
    </div>
    <!--Akhir card form-->

</div>
<script type="text/javascript" src="js/bootstrap.min.js">
</body>
</html>