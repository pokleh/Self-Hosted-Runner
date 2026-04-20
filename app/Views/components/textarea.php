<?php $value = $value ?? ''; ?>
<div class="space-y-1">
    <?php if (! empty($label)) : ?>
        <label for="<?= esc($name) ?>" class="block text-sm font-medium text-slate-700"><?= esc($label) ?></label>
    <?php endif; ?>
    <textarea
        id="<?= esc($name) ?>"
        name="<?= esc($name) ?>"
        rows="<?= esc((string) ($rows ?? 4)) ?>"
        class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm outline-none focus:border-slate-500 focus:ring-2 focus:ring-slate-200"
    ><?= esc($value) ?></textarea>
    <?php if (! empty($error)) : ?>
        <p class="text-xs text-rose-600"><?= esc($error) ?></p>
    <?php endif; ?>
</div>
