<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Tambah Berita</h5>
    </div>

    <form method="post" action="<?= base_url('admin/berita/add_berita') ?>">
        <div class="form-group">
            <label>Judul Berita</label>
            <input type="text" name="judul" placeholder="Masukkan Judul Berita" class="form-control">
            <?= form_error('judul', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tgl" placeholder="Masukkan Tanggal" class="form-control">
            <?= form_error('tgl', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Gambar</label>
            <input type="text" name="gambar" placeholder="Masukkan Gambar" class="form-control">
            <?= form_error('gambar', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Berita</label>
            <input type="text" name="berita" placeholder="Masukkan Isi Berita" class="form-control">
            <?= form_error('berita', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label for="id_admin">Penulis</label>
			<select name="id_admin" class="form-control">
	    		<option value="<?= $id ?>"><?= $username ?></option>
			</select>
            <?= form_error('id_admin', '<div class="text-danger small ml-3">') ?>
        </div>
    
        <button type="submit" class="btn btn-primary">Posting</button>
        <a href="<?= base_url('admin/berita') ?>" class="btn btn-danger">Kembali</a>
    </form>

</div>