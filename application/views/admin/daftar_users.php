<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Daftar Akun di Sisfo RT</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <?= anchor('admin/users/add','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus"> Tambah Akun</i></button>') ?>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>LEVEL</th>
            <th colspan="2">AKSI</th>
        </tr>

        <?php
        $no = 1;

        foreach($user as $u) : ?>

            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?= $u->username ?></td>
                <td><?= $u->email ?></td>
                <td><?= $u->level ?></td>
                <td width="20px"><?= anchor('admin/users/edit/'.$u->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('admin/users/delete/'.$u->id,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

        <?php endforeach ?>
    </table>

</div>