<div class="col-xs-6">
    <div class="login-form">
        <div class="mb-3">
            <div><h3><?= $_ENV['APP_NAME'] ?> Login</h3></div>
        </div>

        <form method="POST" name="frmLogin" action="login/auth">
            <?= generateFormTokenHTML() ?>
            <div class="mb-3">
                <label for="email" class="form-label">Your email address</label>
                <input type="email" class="form-control" name="email" id="email" value="ruud@mail.com" required />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required />
            </div>

            <input type="hidden" name="crf_token" value="<?= createToken() ?>">

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-dark" value="Login" />
                    </div>
                    <div class="col-md-6">
                        <div id="login-message"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>




<script src="js/partials/login.js"></script>