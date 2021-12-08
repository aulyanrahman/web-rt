<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Berita</h5>
    </div>

    <?php foreach($humas_berita as $hb) : ?>

    <form method="post" action="<?= base_url('admin/berita/edit_berita') ?>">
        <div class="form-group">
            <label>Judul Berita</label>
            <input type="hidden" name="id_berita" value="<?= $hb->id_berita ?>">
            <input type="text" name="judul" class="form-control" value="<?= $hb->judul ?>">
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tgl" class="form-control" value="<?= $hb->tgl ?>">
        </div>
        <div class="form-group">
            <label>Gambar</label>
            <input type="text" name="gambar" class="form-control" value="<?= $hb->gambar ?>">
        </div>
        <div class="form-group">
            <label>Berita</label>
            <input type="text" name="berita" class="form-control" value="<?= $hb->berita ?>">
        </div>
        <div class="form-group">
            <label for="id_admin">Penulis</label>
			<select name="id_admin" class="form-control">
	    		<option value="<?= $hb->id_admin ?>"><?= $username ?></option>
			</select>
        </div>
    
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="<?= base_url('admin/berita') ?>" class="btn btn-danger">Kembali</a>
    </form>

    <?php endforeach; ?>

</div>