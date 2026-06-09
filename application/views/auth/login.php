<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Pemrograman Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light min-vh-100 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card shadow border-0">
                    <div class="card-header bg-dark text-white text-center py-3">
                        <h4 class="mb-0 fw-bold">Login</h4>
                        <small>Pemrograman Web &mdash; Universitas Bumigora</small>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?php echo base_url('auth'); ?>" method="post" novalidate>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : (isset($_POST['email']) ? 'is-valid' : ''); ?>" value="<?php echo set_value('email'); ?>" placeholder="Masukkan email">
                                <?php if (form_error('email')): ?>
                                    <div class="invalid-feedback"><?php echo form_error('email'); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group has-validation">
                                    <input type="password" name="password" id="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : (isset($_POST['password']) ? 'is-valid' : ''); ?>" value="<?php echo set_value('password'); ?>" placeholder="Masukkan password">
                                    <button class="btn btn-outline-secondary btn-toggle-password" type="button" tabindex="-1" aria-label="Toggle password visibility">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <?php if (form_error('password')): ?>
                                        <div class="invalid-feedback"><?php echo form_error('password'); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger py-2">
                                    <small><?php echo $error; ?></small>
                                </div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-dark w-100 fw-semibold">Login</button>
                        </form>
                    </div>
                </div>
                <p class="text-center text-muted mt-3"><small>&copy; 2026 Pemrograman Web</small></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.btn-toggle-password', function () {
                var input = $(this).closest('.input-group').find('input');
                var icon = $(this).find('i');

                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('bi-eye').addClass('bi-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('bi-eye-slash').addClass('bi-eye');
                }
            });
        });
    </script>
</body>
</html>
