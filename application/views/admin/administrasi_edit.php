<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Data Warga</h5>
    </div>

    <?php foreach($admin_warga as $aw) : ?>

    <form method="post" action="<?= base_url('admin/administrasi/edit_administrasi') ?>">
        <div class="form-group">
            <label>Nama Warga</label>
            <input type="hidden" name="id_warga" value="<?= $aw->id_warga ?>">
            <input type="text" name="nm_warga" class="form-control" value="<?= $aw->nm_warga ?>">
        </div>
        <div class="form-group">
            <label>NKK</label>
            <input type="number" name="nkk" class="form-control" value="<?= $aw->nkk ?>">
        </div>
        <div class="form-group">
            <label>NIK</label>
            <input type="number" name="nik" class="form-control" value="<?= $aw->nik ?>">
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tpt_lahir" class="form-control" value="<?= $aw->tpt_lahir ?>">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="<?= $aw->tgl_lahir ?>">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <input type="text" name="jk" class="form-control" value="<?= $aw->jk ?>">
        </div>
        <div class="form-group">
            <label>Golongan Darah</label>
            <input type="text" name="gol_darah" class="form-control" value="<?= $aw->gol_darah ?>">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= $aw->alamat ?>">
        </div>
        <div class="form-group">
            <label>Agama</label>
            <input type="text" name="agama" class="form-control" value="<?= $aw->agama ?>">
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="<?= $aw->status ?>">
        </div>
        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" value="<?= $aw->pekerjaan ?>">
        </div>
        <div class="form-group">
            <label>Kewarganegaraan</label>
            <input type="text" name="warganegara" class="form-control" value="<?= $aw->warganegara ?>">
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="number" name="telp" class="form-control" value="<?= $aw->telp ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="<?= $aw->email ?>">
        </div>
        <div class="form-group">
            <label>Petugas</label>
            <input type="text" name="id_user" class="form-control" value="<?= $aw->id_user ?>">
        </div>
    
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="<?= base_url('admin/administrasi') ?>" class="btn btn-danger">Kembali</a>
    </form>

    <?php endforeach; ?>

</div>