<?php
$type = $type ?? 'button';
$variant = $variant ?? 'primary';
$className = $className ?? '';
$variants = [
    'primary' => 'bg-slate-900 text-white hover:bg-slate-700',
    'secondary' => 'bg-white border border-slate-300 text-slate-700 hover:bg-slate-100',
    'danger' => 'bg-rose-600 text-white hover:bg-rose-500',
];
?>
<button type="<?= esc($type) ?>" class="rounded-md px-4 py-2 text-sm font-medium transition <?= esc($variants[$variant] ?? $variants['primary']) ?> <?= esc($className) ?>">
    <?= esc($label ?? 'Button') ?>
</button>
