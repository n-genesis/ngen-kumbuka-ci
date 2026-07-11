<div class="card mb-3 shadow-sm">
    <div class="card-body">
        <h6 class="card-subtitle mb-2 text-muted">
            By <?= esc($note->username) ?> on <?= $this->getFormattedDate() ?>
        </h6>
        <p class="card-text"><?= nl2br(esc($note->content)) ?></p>
        
    </div>
</div>
