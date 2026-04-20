<?php
$statusLabels = ['todo' => 'To Do', 'in_progress' => 'In Progress', 'done' => 'Done'];
$priorityLabels = ['low' => 'Low', 'medium' => 'Medium', 'high' => 'High'];
?>
<div class="space-y-4">
    <div class="flex flex-wrap items-center gap-2">
        <?= view('components/badge', ['tone' => $task['status'], 'label' => $statusLabels[$task['status']] ?? $task['status']]) ?>
        <?= view('components/badge', ['tone' => $task['priority'], 'label' => $priorityLabels[$task['priority']] ?? $task['priority']]) ?>
    </div>

    <div class="grid gap-4 rounded-lg bg-slate-50 p-4 text-sm text-slate-700 md:grid-cols-3">
        <div><span class="block text-xs uppercase tracking-wide text-slate-500">Project</span><?= esc($task['project_name'] ?? '—') ?></div>
        <div><span class="block text-xs uppercase tracking-wide text-slate-500">Assignee</span><?= esc($task['assignee_name'] ?? '—') ?></div>
        <div><span class="block text-xs uppercase tracking-wide text-slate-500">Due Date</span><?= esc($task['due_date'] ?? '—') ?></div>
    </div>

    <div>
        <h3 class="mb-2 text-sm font-semibold text-slate-800">Description</h3>
        <p class="rounded-lg border border-slate-200 bg-white p-4 text-sm text-slate-700">
            <?= esc($task['description'] ?: 'No description provided.') ?>
        </p>
    </div>

    <div>
        <h3 class="mb-2 text-sm font-semibold text-slate-800">Comments</h3>
        <div class="space-y-2">
            <?php if (empty($comments)) : ?>
                <p class="rounded-lg border border-slate-200 bg-white p-3 text-sm text-slate-500">No comments yet.</p>
            <?php endif; ?>
            <?php foreach ($comments as $comment) : ?>
                <div class="rounded-lg border border-slate-200 bg-white p-3">
                    <p class="text-xs text-slate-500"><?= esc($comment['author_name'] ?? 'Unknown user') ?></p>
                    <p class="mt-1 text-sm text-slate-800"><?= esc($comment['body']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
