<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Laporan Warga</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <form method="post" action="<?= base_url('user/laporan/add_laporan') ?>">
        <div class="form-group">
            <label>Nama Warga</label>
            <input type="text" name="nm_warga" placeholder="Masukkan Nama Anda" class="form-control">
            <?= form_error('nm_warga', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Jenis</label>
            <input type="text" name="jenis" placeholder="Masukkan Jenis Aduan" class="form-control">
            <?= form_error('jenis', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Uraian</label>
            <input type="text" name="uraian" placeholder="Masukkan Uraian Masalah" class="form-control">
            <?= form_error('uraian', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" name="status" placeholder="Masukkan Status Laporan" class="form-control">
            <?= form_error('status', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tgl" placeholder="Masukkan Tanggal" class="form-control">
            <?= form_error('tgl', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label for="id_user">Pelapor</label>
			<select name="id_user" class="form-control">
	    		<option value="<?= $id ?>"><?= $username ?></option>
			</select>
            <?= form_error('id_user', '<div class="text-danger small ml-3">') ?>
        </div>
    
        <button type="submit" class="btn btn-primary">Kirim</button>
        <a href="<?= base_url('user/laporan') ?>" class="btn btn-danger">Ulangi</a>
    </form>

</div>