<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-primary mb-0">
        <?php foreach ($breadcrumbLinks as $index => $link): ?>
            <?php if ($index + 1 == count($breadcrumbLinks)): ?>
                <li class="breadcrumb-item active text-white" aria-current="page"><?= esc($link['label']) ?></li>
            <?php else: ?>
                <li class="breadcrumb-item">
                    <a href="<?= esc($link['url']) ?>" class="text-white">
                        <i class="bi bi-house-door-fill"></i> <?= esc($link['label']) ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ol>
</nav>