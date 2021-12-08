<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit User</h5>
    </div>

    <?php foreach($user as $u) : ?>

    <form method="post" action="<?= base_url('admin/users/edit_users') ?>">
        <div class="form-group">
            <label>Username</label>
            <input type="hidden" name="id" value="<?= $u->id ?>">
            <input type="text" name="username" class="form-control" value="<?= $u->username ?>">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control" value="<?= $u->password ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="<?= $u->email ?>">
        </div>
        <div class="form-group">
            <label for="level">Level</label>
			<select name="level" class="form-control">
	    		<option value="admin" <?= ($u->level ? 'admin' : 'selected' ); ?> >Admin</option>
				<option value="warga" <?= ($u->level ? 'warga' : 'selected' ); ?>>Warga</option>
			</select>
        </div>
    
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="<?= base_url('admin/users') ?>" class="btn btn-danger">Kembali</a>
    </form>

    <?php endforeach; ?>

</div>