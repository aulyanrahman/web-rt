<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Pemasukkan</h5>
    </div>

    <?php foreach($keuangan_masuk as $km) : ?>

    <form method="post" action="<?= base_url('admin/keuangan/edit_uangmasuk') ?>">
        <div class="form-group">
            <label>Tanggal</label>
            <input type="hidden" name="id_uangmasuk" value="<?= $km->id_uangmasuk ?>">
            <input type="date" name="tgl" class="form-control" value="<?= $km->tgl ?>">
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="ket" class="form-control" value="<?= $km->ket ?>">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="text" name="jumlah" class="form-control" value="<?= $km->jumlah ?>">
        </div>
        <div class="form-group">
            <label for="id_admin">Penulis</label>
			<select name="id_admin" class="form-control">
	    		<option value="<?= $km->id_admin ?>"><?= $username ?></option>
			</select>
        </div>
    
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="<?= base_url('admin/keuangan/uangmasuk') ?>" class="btn btn-danger">Kembali</a>
    </form>

    <?php endforeach; ?>

</div>