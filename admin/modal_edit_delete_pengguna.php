<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UMKM Kare-Edit</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <!-- modal form edit data kriteria -->
    <div id="edit_<?php echo $data['id_admin']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalEditData" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="proses-ubah-dataadmin.php?id=<?php echo $data['id_admin']; ?>">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Kode</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $data['id_admin']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group custom-file">
                            <input type="file" class="custom-file-input form-control-user" id="customFile" name="foto">
                            <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                        </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /modal form edit data kriteria -->
    <!-- Delete -->
    <div class="modal fade" id="delete_<?php echo $data['id_admin']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Peringatan Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Apakah yakin ingin menghapus data</p>
                    <h3 class="text-center"><?php echo $data['nama']; ?></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                    <a href="adapter_dk_hapus?id=<?php echo $data['id_admin']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Ya, Hapus</a>
                </div>

            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        // Add the following code if you want the name of the file appear on select
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var name = document.getElementById("customFile").files[0].name;
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = name
        })
    </script>
</body>

</html>