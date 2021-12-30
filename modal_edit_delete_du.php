<!-- modal form edit data kriteria -->
<div id="edit_<?php echo $data['id_umkm']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalEditData" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Sektor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="proses-ubah-dataumkm.php?id=<?php echo $data['id_umkm']; ?>">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kode</label>
                        <input type="text" class="form-control" name="id" value="<?php echo $data['id_umkm']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Sektor</label>
                        <select id="inputState" class="form-control" name="sektor">
                            <?php
                            $sql = $pdo->prepare("SELECT * FROM sektor order by id_sektor");
                            $sql->execute();
                            while ($dt = $sql->fetch()) { // Ambil semua data dari hasil eksekusi $sql
                            ?>
                                <option><?php echo $dt['nama']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Lokasi</label>
                        <input type="text" class="form-control" name="lokasi" value="<?php echo $data['lokasi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Pemilik</label>
                        <input type="text" class="form-control" name="pemilik" value="<?php echo $data['pemilik']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Pendapatan</label>
                        <input type="text" class="form-control" name="pendapatan" value="<?php echo $data['pendapatan']; ?>">
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
<div class="modal fade" id="delete_<?php echo $data['id_umkm']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <a href="adapter_dk_hapus?id=<?php echo $data['id_umkm']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Ya, Hapus</a>
            </div>

        </div>
    </div>
</div>