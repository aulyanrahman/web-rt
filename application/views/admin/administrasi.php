<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <h5><i class="fas fa-fw fa-book"></i> Halaman Administrasi Warga</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <?= anchor('admin/administrasi/add','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus"> Tambah Data Warga</i></button>') ?>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>NAMA WARGA</th>
            <th>NKK</th>
            <th>NIK</th>
            <th>TEMPAT LAHIR</th>
            <th>TANGGAL LAHIR</th>
            <th>JENIS KELAMIN</th>
            <th>GOLONGAN DARAH</th>
            <th>ALAMAT</th>
            <th>AGAMA</th>
            <th>STATUS</th>
            <th>PEKERJAAN</th>
            <th>KEWARGANEGARAAN</th>
            <th>TELEPON</th>
            <th>EMAIL</th>
            <th>PETUGAS</th>
            <th colspan="2">AKSI</th>

            <?php
            $no = 1;
            foreach ($admin_warga as $aw) : ?>

            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?= $aw->nm_warga ?></td>
                <td><?= $aw->nkk ?></td>
                <td><?= $aw->nik ?></td>
                <td><?= $aw->tpt_lahir ?></td>
                <td><?= $aw->tgl_lahir ?></td>
                <td><?= $aw->jk ?></td>
                <td><?= $aw->gol_darah ?></td>
                <td><?= $aw->alamat ?></td>
                <td><?= $aw->agama ?></td>
                <td><?= $aw->status ?></td>
                <td><?= $aw->pekerjaan ?></td>
                <td><?= $aw->warganegara ?></td>
                <td><?= $aw->telp ?></td>
                <td><?= $aw->email ?></td>
                <td><?= $aw->id_user ?></td>
                <td width="20px"><?= anchor('admin/administrasi/edit/'.$aw->id_warga,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('admin/administrasi/delete/'.$aw->id_warga,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

            <?php endforeach; ?>
        </tr>
    </table>
</div>