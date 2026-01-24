<footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="<?= site_url('privacy_policy') ?>"><?= lang('Footer.privacyPolicy') ?></a></li>
                        <li class="list-inline-item"><a href="<?= site_url('terms_of_use') ?>"><?= lang('Footer.termsOfUse') ?></a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="text-secondary mr-1">
                        <span class="copy">&copy;</span>
                        <script>document.write(new Date().getFullYear())</script>
                    </span>
                    <?= esc($appName) ?> made w/ <i class="bi bi-heart-fill text-danger"></i> by <a
                        href="<?= esc($appAuthWebsite) ?>" target="_blank"><?= esc($appAuthor) ?></a>.
                </div>
            </div>
        </div>
    </footer>