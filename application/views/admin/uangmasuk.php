<div class="container-fluid">

    <!-- Table Keuangan Masuk -->
    <div class="alert alert-success mt-4" role="alert">
        <h5><i class="fas fa-fw fa-chart-area"></i> Keuangan Masuk</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>
    <?= anchor('admin/keuangan/add_um','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus"> Tambah Pemasukkan</i></button>') ?>
    <?= anchor('admin/keuangan','<button class="btn btn-sm btn-danger mb-3"><i class="fas fa-times"> Kembali</i></button>') ?>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>TANGGAL</th>
            <th>KETERANGAN</th>
            <th>JUMLAH</th>
            <th>PETUGAS</th>
            <th colspan="2">AKSI</th>

            <?php
            $no = 1;
            foreach ($keuangan_masuk as $km) : ?>

            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?= $km->tgl ?></td>
                <td><?= $km->ket ?></td>
                <td><?= $km->jumlah ?></td>
                <td><?= $km->id_admin ?></td>
                <td width="20px"><?= anchor('admin/keuangan/edit_um/'.$km->id_uangmasuk,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('admin/keuangan/delete_um/'.$km->id_uangmasuk,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

            <?php endforeach; ?>
        </tr>
    </table>

</div>