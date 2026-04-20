<div class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4" data-modal-root>
    <div class="w-full max-w-lg rounded-xl border border-slate-200 bg-white p-5 shadow-xl">
        <?php if (! empty($title)) : ?>
            <h3 class="mb-3 text-lg font-semibold text-slate-900"><?= esc($title) ?></h3>
        <?php endif; ?>
        <div class="text-sm text-slate-700">
            <?= $slot ?? '' ?>
        </div>
    </div>
</div>
