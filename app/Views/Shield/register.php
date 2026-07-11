<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?>
<?= lang('Auth.register') ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="container">

    <div class="card login-card">

        <div class="login-header">
            <h3><?= lang('Auth.register') ?></h3>
            <p class="mb-0">Create your MyShop account</p>
        </div>

        <div class="card-body p-4">

            <?php if (session('error') !== null) : ?>
                <div class="alert alert-danger">
                    <?= esc(session('error')) ?>
                </div>
            <?php elseif (session('errors') !== null) : ?>
                <div class="alert alert-danger">
                    <?php if (is_array(session('errors'))) : ?>
                        <?php foreach (session('errors') as $error) : ?>
                            <?= esc($error) ?><br>
                        <?php endforeach ?>
                    <?php else : ?>
                        <?= esc(session('errors')) ?>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <form action="<?= url_to('register') ?>" method="post">

                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label"><?= lang('Auth.email') ?></label>
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        value="<?= old('email') ?>"
                        placeholder="Enter your email"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><?= lang('Auth.username') ?></label>
                    <input
                        type="text"
                        class="form-control"
                        name="username"
                        value="<?= old('username') ?>"
                        placeholder="Choose a username"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><?= lang('Auth.password') ?></label>
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        placeholder="Create a password"
                        required>
                </div>

                <div class="mb-4">
                    <label class="form-label"><?= lang('Auth.passwordConfirm') ?></label>
                    <input
                        type="password"
                        class="form-control"
                        name="password_confirm"
                        placeholder="Confirm your password"
                        required>
                </div>

                <button type="submit" class="btn btn-dark">
                    <?= lang('Auth.register') ?>
                </button>

            </form>

            <div class="text-center mt-4">
                <?= lang('Auth.haveAccount') ?>
                <a href="<?= url_to('login') ?>">
                    <?= lang('Auth.login') ?>
                </a>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>