<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Halaman Berita</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <?= anchor('admin/berita/add','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus"> Tambah Berita</i></button>') ?>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>JUDUL</th>
            <th>TANGGAL</th>
            <th>GAMBAR</th>
            <th>BERITA</th>
            <th>PENULIS</th>
            <th colspan="2">AKSI</th>

            <?php
            $no = 1;
            foreach ($humas_berita as $hb) : ?>

            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?= $hb->judul ?></td>
                <td><?= $hb->tgl ?></td>
                <td><?= $hb->gambar ?></td>
                <td><?= $hb->berita ?></td>
                <td><?= $hb->id_admin ?></td>
                <td width="20px"><?= anchor('admin/berita/edit/'.$hb->id_berita,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('admin/berita/delete/'.$hb->id_berita,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

            <?php endforeach; ?>
        </tr>
    </table>
</div>