<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <h5><i class="fas fa-fw fa-chart-area"></i> Form Tambah Pengeluaran</h5>
    </div>

    <form method="post" action="<?= base_url('admin/keuangan/add_uangkeluar') ?>">
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tgl" placeholder="Masukkan Tanggal" class="form-control">
            <?= form_error('tgl', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="ket" placeholder="Masukkan Keterangan" class="form-control">
            <?= form_error('ket', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" placeholder="Masukkan Jumlah Pengeluaran" class="form-control">
            <?= form_error('jumlah', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label for="id_admin">Petugas</label>
			<select name="id_admin" class="form-control">
	    		<option value="<?= $id ?>"><?= $username ?></option>
			</select>
            <?= form_error('id_admin', '<div class="text-danger small ml-3">') ?>
        </div>
    
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="<?= base_url('admin/keuangan/uangkeluar') ?>" class="btn btn-danger">Kembali</a>
    </form>

</div>