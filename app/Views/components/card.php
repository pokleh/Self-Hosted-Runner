<section class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
    <?php if (! empty($title)) : ?>
        <h2 class="mb-4 text-lg font-semibold text-slate-900"><?= esc($title) ?></h2>
    <?php endif; ?>
    <?= $slot ?? '' ?>
</section>
