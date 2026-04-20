<?php
$tone = $tone ?? 'default';
$tones = [
    'todo' => 'bg-slate-100 text-slate-700',
    'in_progress' => 'bg-amber-100 text-amber-700',
    'done' => 'bg-emerald-100 text-emerald-700',
    'low' => 'bg-blue-100 text-blue-700',
    'medium' => 'bg-purple-100 text-purple-700',
    'high' => 'bg-rose-100 text-rose-700',
    'default' => 'bg-slate-100 text-slate-700',
];
?>
<span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium <?= esc($tones[$tone] ?? $tones['default']) ?>">
    <?= esc($label ?? 'Badge') ?>
</span>
