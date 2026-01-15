<?php if (session('error') !== null): ?>
    <div class="alert bg-white alert-danger" role="alert">
        <div class="iq-alert-icon">
            <i class="bi bi-exclamation-circle"></i>
        </div>
        <div class="iq-alert-text">
            <?= esc(session('error')) ?>
        </div>
    </div>
<?php elseif (session('errors') !== null): ?>
    <div class="alert bg-white alert-danger" role="alert">
        <div class="iq-alert-icon">
            <i class="bi bi-exclamation-circle"></i>
        </div>
        <div class="iq-alert-text">
            <?php if (is_array(session('errors'))): ?>
                <?php foreach (session('errors') as $error): ?>
                    <?= esc($error) ?>
                    <br>
                <?php endforeach ?>
            <?php else: ?>
                <?= esc(session('errors')) ?>
            <?php endif ?>
        </div>
    </div>
<?php endif ?>