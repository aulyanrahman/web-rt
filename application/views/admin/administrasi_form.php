<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <h5><i class="fas fa-fw fa-book"></i> Form Tambah Data Warga</h5>
    </div>

    <form method="post" action="<?= base_url('admin/administrasi/add_administrasi') ?>">
        <div class="form-group">
            <label>Nama Warga</label>
            <input type="text" name="nm_warga" placeholder="Masukkan Nama Warga" class="form-control">
            <?= form_error('nm_warga', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>NKK</label>
            <input type="number" name="nkk" placeholder="Masukkan NKK" class="form-control">
            <?= form_error('nkk', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>NIK</label>
            <input type="number" name="nik" placeholder="Masukkan NIK" class="form-control">
            <?= form_error('nik', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tpt_lahir" placeholder="Masukkan Tempat Lahir" class="form-control">
            <?= form_error('tpt_lahir', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control">
            <?= form_error('tgl_lahir', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
			<select name="jk" class="form-control">
				<option value="L">Laki-laki</option>
				<option value="P">Perempuan</option>
    		</select>
            <?= form_error('jk', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label for="gol_darah">Golongan Darah</label>
			<select name="gol_darah" class="form-control">
				<option value="A">A</option>
				<option value="B">B</option>
                <option value="AB">AB</option>
                <option value="O">O</option>
    		</select>
            <?= form_error('gol_darah', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control">
            <?= form_error('alamat', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Agama</label>
            <input type="text" name="agama" placeholder="Masukkan Agama" class="form-control">
            <?= form_error('agama', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
			<select name="status" class="form-control">
				<option value="Belum Menikah">Belum Menikah</option>
				<option value="Menikah">Menikah</option>
                <option value="Cerai Hidup">Cerai Hidup</option>
                <option value="Cerai Mati">Cerai Mati</option>
    		</select>
            <?= form_error('status', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" placeholder="Masukkan Pekerjaan" class="form-control">
            <?= form_error('pekerjaan', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label for="warganegara">Kewarganegaraan</label>
			<select name="warganegara" class="form-control">
				<option value="Indonesia">Indonesia</option>
				<option value="Asing">Asing</option>
    		</select>
            <?= form_error('warganegara', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="number" name="telp" placeholder="Masukkan Telepon" class="form-control">
            <?= form_error('telp', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" placeholder="Masukkan Email" class="form-control">
            <?= form_error('email', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label for="id_user">Diisi Oleh</label>
			<select name="id_user" class="form-control">
	    		<option value="<?= $id ?>"><?= $username ?></option>
			</select>
            <?= form_error('id_user', '<div class="text-danger small ml-3">') ?>
        </div>
    
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="<?= base_url('admin/administrasi') ?>" class="btn btn-danger">Kembali</a>
    </form>

</div>