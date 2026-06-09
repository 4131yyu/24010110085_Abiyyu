<div class="row">
	<div class="col-md-8">
		<div class="card shadow border-0 mb-4">

			<div class="card-header bg-secondary text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
				<div>
					<h5 class="mb-0 fw-bold">
						<?php echo isset($button) && $button === 'Update' ? 'Ubah Program Studi' : 'Tambah Program Studi'; ?>
					</h5>
				</div>

				<a class="btn btn-light" href="<?php echo base_url('prodi') ?>">
					Kembali
				</a>
			</div>

			<div class="card-body">

				<form action="<?php echo $action; ?>" method="post" novalidate>

					<div class="mb-3">
						<label class="form-label">ID Prodi</label>

						<input
							type="number"
							name="prodi_id"
							class="form-control <?php echo form_error('prodi_id') ? 'is-invalid' : ''; ?>"
							value="<?php echo set_value('prodi_id', isset($prodi['prodi_id']) ? $prodi['prodi_id'] : ''); ?>"
							placeholder="Masukkan ID Prodi">

						<?php if (form_error('prodi_id')): ?>
							<div class="invalid-feedback">
								<?php echo form_error('prodi_id'); ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="mb-3">
						<label class="form-label">Fakultas</label>

						<select
							name="fakultas_id"
							class="form-select <?php echo form_error('fakultas_id') ? 'is-invalid' : ''; ?>">

							<option value="">-- Pilih Fakultas --</option>

							<?php foreach ($fakultas as $f): ?>
								<option
									value="<?php echo $f['fakultas_id']; ?>"
									<?php echo set_select(
										'fakultas_id',
										$f['fakultas_id'],
										isset($prodi['fakultas_id']) && $prodi['fakultas_id'] == $f['fakultas_id']
									); ?>>
									<?php echo $f['fakultas_name']; ?>
								</option>
							<?php endforeach; ?>

						</select>

						<?php if (form_error('fakultas_id')): ?>
							<div class="invalid-feedback">
								<?php echo form_error('fakultas_id'); ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="mb-3">
						<label class="form-label">Nama Program Studi</label>

						<input
							type="text"
							name="prodi_name"
							class="form-control <?php echo form_error('prodi_name') ? 'is-invalid' : ''; ?>"
							value="<?php echo set_value('prodi_name', isset($prodi['prodi_name']) ? $prodi['prodi_name'] : ''); ?>"
							placeholder="Masukkan Nama Program Studi">

						<?php if (form_error('prodi_name')): ?>
							<div class="invalid-feedback">
								<?php echo form_error('prodi_name'); ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="mb-3">
						<label class="form-label d-block">Strata</label>

						<div class="form-check form-check-inline">
							<input
								class="form-check-input"
								type="radio"
								name="prodi_strata"
								value="D3"
								<?php echo set_radio('prodi_strata', 'D3', isset($prodi['prodi_strata']) && $prodi['prodi_strata'] == 'D3'); ?>>

							<label class="form-check-label">D3</label>
						</div>

						<div class="form-check form-check-inline">
							<input
								class="form-check-input"
								type="radio"
								name="prodi_strata"
								value="S1"
								<?php echo set_radio('prodi_strata', 'S1', isset($prodi['prodi_strata']) && $prodi['prodi_strata'] == 'S1'); ?>>

							<label class="form-check-label">S1</label>
						</div>

						<div class="form-check form-check-inline">
							<input
								class="form-check-input"
								type="radio"
								name="prodi_strata"
								value="S2"
								<?php echo set_radio('prodi_strata', 'S2', isset($prodi['prodi_strata']) && $prodi['prodi_strata'] == 'S2'); ?>>

							<label class="form-check-label">S2</label>
						</div>

						<?php if (form_error('prodi_strata')): ?>
							<div class="text-danger mt-2">
								<?php echo form_error('prodi_strata'); ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="d-flex gap-2">
						<button type="submit" class="btn btn-primary">
							<?php echo isset($button) ? $button : 'Simpan'; ?>
						</button>

						<a href="<?php echo base_url('prodi') ?>" class="btn btn-secondary">
							Batal
						</a>
					</div>

				</form>

			</div>
		</div>
	</div>
</div>