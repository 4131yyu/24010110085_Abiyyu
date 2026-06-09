<div class="row">
	<div class="col-md-6">
		<div class="card shadow border-0 mb-4">
			<div class="card-header bg-secondary text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
				<div>
					<h5 class="mb-0 fw-bold"><?php echo isset($button) && $button === 'Update' ? 'Ubah Mahasiswa' : 'Tambah Mahasiswa'; ?></h5>
				</div>
				<a class="btn btn-light" href="<?php echo base_url('mahasiswa') ?>">Kembali</a>
			</div>
			<div class="card-body">
				<form action="<?php echo $action; ?>" method="post" novalidate>
					<div class="mb-3">
						<label for="mahasiswa_nim" class="form-label">NIM</label>
						<input type="text" name="mahasiswa_nim" id="mahasiswa_nim" class="form-control <?php echo form_error('mahasiswa_nim') ? 'is-invalid' : (isset($_POST['mahasiswa_nim']) ? 'is-valid' : ''); ?>" value="<?php echo set_value('mahasiswa_nim', isset($mahasiswa['mahasiswa_nim']) ? $mahasiswa['mahasiswa_nim'] : ''); ?>" placeholder="Masukkan NIM">
						<?php if (form_error('mahasiswa_nim')): ?>
							<div class="invalid-feedback"><?php echo form_error('mahasiswa_nim'); ?></div>
						<?php endif; ?>
					</div>
					<div class="mb-3">
						<label for="mahasiswa_nama" class="form-label">Nama</label>
						<input type="text" name="mahasiswa_nama" id="mahasiswa_nama" class="form-control <?php echo form_error('mahasiswa_nama') ? 'is-invalid' : (isset($_POST['mahasiswa_nama']) ? 'is-valid' : ''); ?>" value="<?php echo set_value('mahasiswa_nama', isset($mahasiswa['mahasiswa_nama']) ? $mahasiswa['mahasiswa_nama'] : ''); ?>" placeholder="Masukkan Nama">
						<?php if (form_error('mahasiswa_nama')): ?>
							<div class="invalid-feedback"><?php echo form_error('mahasiswa_nama'); ?></div>
						<?php endif; ?>
					</div>
					<div class="mb-3">
						<label for="mahasiswa_email" class="form-label">Email</label>
						<input type="text" name="mahasiswa_email" id="mahasiswa_email" class="form-control <?php echo form_error('mahasiswa_email') ? 'is-invalid' : (isset($_POST['mahasiswa_email']) ? 'is-valid' : ''); ?>" value="<?php echo set_value('mahasiswa_email', isset($mahasiswa['mahasiswa_email']) ? $mahasiswa['mahasiswa_email'] : ''); ?>" placeholder="Masukkan Email">
						<?php if (form_error('mahasiswa_email')): ?>
							<div class="invalid-feedback"><?php echo form_error('mahasiswa_email'); ?></div>
						<?php endif; ?>
					</div>
					<div class="mb-3">
						<label for="mahasiswa_password" class="form-label">Password</label>
						<div class="input-group has-validation">
							<input type="password" name="mahasiswa_password" id="mahasiswa_password" class="form-control <?php echo form_error('mahasiswa_password') ? 'is-invalid' : (isset($_POST['mahasiswa_password']) ? 'is-valid' : ''); ?>" value="" placeholder="Masukkan Password" aria-describedby="passwordHelp">
							<button class="btn btn-outline-secondary btn-toggle-password" type="button" tabindex="-1" aria-label="Toggle password visibility">
								<i class="bi bi-eye"></i>
							</button>
							<?php if (form_error('mahasiswa_password')): ?>
								<div class="invalid-feedback"><?php echo form_error('mahasiswa_password'); ?></div>
							<?php elseif (isset($_POST['mahasiswa_password'])): ?>
								<div class="valid-feedback">Looks good!</div>
							<?php endif; ?>
						</div>
						<?php if (isset($button) && $button === 'Update'): ?>
							<div id="passwordHelp" class="form-text">Kosongkan jika tidak ingin diubah.</div>
						<?php endif; ?>
					</div>
					<div class="d-flex gap-2">
						<button type="submit" class="btn btn-primary"><?php echo isset($button) ? $button : 'Simpan'; ?></button>
						<a href="<?php echo base_url('mahasiswa') ?>" class="btn btn-secondary">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
