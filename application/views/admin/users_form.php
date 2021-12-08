<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Form Tambah User</h5>
    </div>

    <form method="post" action="<?= base_url('admin/users/add_users') ?>">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
            <?= form_error('username', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
            <?= form_error('password', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" placeholder="Masukkan Email" class="form-control">
            <?= form_error('email', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label for="level">Level</label>
			<select name="level" class="form-control">
				<option value="admin">Admin</option>
				<option value="warga">Warga</option>
    		</select>
            <?= form_error('level', '<div class="text-danger small ml-3">') ?>
        </div>
    
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="<?= base_url('admin/users') ?>" class="btn btn-danger">Kembali</a>
    </form>

</div>