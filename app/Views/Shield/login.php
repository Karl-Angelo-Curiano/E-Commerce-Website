<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?>
<?= lang('Auth.login') ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>


<div class="container">

    <div class="card login-card">

        <div class="login-header">
            <h3><?= lang('Auth.login') ?></h3>
            <p class="mb-0">Sign in to your account</p>
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

            <?php if (session('message') !== null) : ?>
                <div class="alert alert-success">
                    <?= esc(session('message')) ?>
                </div>
            <?php endif ?>

            <form action="<?= url_to('login') ?>" method="post">

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
                    <label class="form-label"><?= lang('Auth.password') ?></label>
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        placeholder="Enter your password"
                        required>
                </div>

                <?php if (setting('Auth.sessionConfig')['allowRemembering']) : ?>
                    <div class="form-check mb-3">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="remember"
                            id="remember"
                            <?= old('remember') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="remember">
                            <?= lang('Auth.rememberMe') ?>
                        </label>
                    </div>
                <?php endif ?>

                <button type="submit" class="btn btn-dark">
                    <?= lang('Auth.login') ?>
                </button>

            </form>
<!-- 
            <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
                <div class="text-center mt-3">
                    <a href="<?= url_to('magic-link') ?>">
                        <?= lang('Auth.useMagicLink') ?>
                    </a>
                </div>
            <?php endif ?> -->

            <?php if (setting('Auth.allowRegistration')) : ?>
                <div class="text-center mt-4">
                    <?= lang('Auth.needAccount') ?>
                    <a href="<?= url_to('register') ?>">
                        <?= lang('Auth.register') ?>
                    </a>
                </div>
            <?php endif ?>

        </div>

    </div>

</div>

<?= $this->endSection() ?>