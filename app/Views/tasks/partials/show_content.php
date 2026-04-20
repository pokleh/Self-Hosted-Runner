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
        <form method="post" action="<?= site_url('tasks/' . $task['id'] . '/comments') ?>" class="mb-3 space-y-2 rounded-lg border border-slate-200 bg-white p-3">
            <?= csrf_field() ?>
            <textarea
                name="body"
                rows="3"
                required
                placeholder="Add a comment..."
                class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm outline-none focus:border-slate-500 focus:ring-2 focus:ring-slate-200"
            ><?= esc(old('body', '')) ?></textarea>
            <button type="submit" class="rounded-md bg-slate-900 px-3 py-2 text-xs font-medium text-white hover:bg-slate-700">Add Comment</button>
        </form>

        <div class="space-y-2">
            <?php if (empty($comments)) : ?>
                <p class="rounded-lg border border-slate-200 bg-white p-3 text-sm text-slate-500">No comments yet.</p>
            <?php endif; ?>
            <?php foreach ($comments as $comment) : ?>
                <div class="rounded-lg border border-slate-200 bg-white p-3">
                    <div class="mb-2 flex items-center justify-between">
                        <p class="text-xs text-slate-500"><?= esc($comment['author_name'] ?? 'Unknown user') ?></p>
                        <?php $canManage = ! empty($currentUser) && (($currentUser['role'] ?? 'member') === 'admin' || (int) ($currentUser['id'] ?? 0) === (int) ($comment['user_id'] ?? 0)); ?>
                        <?php if ($canManage) : ?>
                            <form method="post" action="<?= site_url('tasks/' . $task['id'] . '/comments/' . $comment['id'] . '/delete') ?>">
                                <?= csrf_field() ?>
                                <button type="submit" class="rounded-md bg-rose-600 px-2.5 py-1 text-xs font-medium text-white hover:bg-rose-500" onclick="return confirm('Delete this comment?');">Delete</button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <p class="mb-2 text-sm text-slate-800"><?= esc($comment['body']) ?></p>
                    <?php if ($canManage) : ?>
                        <form method="post" action="<?= site_url('tasks/' . $task['id'] . '/comments/' . $comment['id']) ?>" class="space-y-2">
                            <?= csrf_field() ?>
                            <textarea
                                name="body"
                                rows="2"
                                required
                                class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm outline-none focus:border-slate-500 focus:ring-2 focus:ring-slate-200"
                            ><?= esc($comment['body']) ?></textarea>
                            <button type="submit" class="rounded-md border border-slate-300 bg-white px-2.5 py-1 text-xs font-medium text-slate-700 hover:bg-slate-100">Update</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
