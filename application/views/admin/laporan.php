<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Halaman Pengaduan Warga</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>NAMA WARGA</th>
            <th>JENIS</th>
            <th>URAIAN</th>
            <th>TANGGAL</th>
            <th>USER</th>
            <th>HAPUS</th>

            <?php
            $no = 1;
            foreach ($humas_lapor as $hl) : ?>

            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?= $hl->nm_warga ?></td>
                <td><?= $hl->jenis ?></td>
                <td><?= $hl->uraian ?></td>
                <td><?= $hl->tgl ?></td>
                <td><?= $hl->id_user ?></td>
                <td width="20px"><?= anchor('admin/laporan/delete/'.$hl->id_lapor,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

            <?php endforeach; ?>
        </tr>
    </table>
</div>