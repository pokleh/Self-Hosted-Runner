<thead class="bg-slate-50">
<tr>
    <th class="px-4 py-3 text-left font-medium text-slate-600">Title</th>
    <th class="px-4 py-3 text-left font-medium text-slate-600">Status</th>
    <th class="px-4 py-3 text-left font-medium text-slate-600">Priority</th>
    <th class="px-4 py-3 text-left font-medium text-slate-600">Project</th>
    <th class="px-4 py-3 text-left font-medium text-slate-600">Assignee</th>
    <th class="px-4 py-3 text-left font-medium text-slate-600">Due</th>
    <th class="px-4 py-3 text-right font-medium text-slate-600">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 bg-white">
<?php if (empty($tasks)) : ?>
    <tr>
        <td colspan="7" class="px-4 py-8 text-center text-slate-500">
            <?= ! empty($hasFilters) ? 'No tasks match your current filters.' : 'No tasks yet. Create your first task.' ?>
        </td>
    </tr>
<?php endif; ?>
<?php foreach ($tasks as $task) : ?>
    <tr>
        <td class="px-4 py-3">
            <a href="<?= site_url('tasks/' . $task['id']) ?>" class="font-medium text-slate-900 hover:underline"><?= esc($task['title']) ?></a>
            <?php if (! empty($task['description'])) : ?>
                <p class="mt-1 line-clamp-1 text-xs text-slate-500"><?= esc($task['description']) ?></p>
            <?php endif; ?>
        </td>
        <td class="px-4 py-3"><?= view('components/badge', ['tone' => $task['status'], 'label' => $statusLabels[$task['status']] ?? $task['status']]) ?></td>
        <td class="px-4 py-3"><?= view('components/badge', ['tone' => $task['priority'], 'label' => $priorityLabels[$task['priority']] ?? $task['priority']]) ?></td>
        <td class="px-4 py-3 text-slate-700"><?= esc($task['project_name'] ?? '—') ?></td>
        <td class="px-4 py-3 text-slate-700"><?= esc($task['assignee_name'] ?? '—') ?></td>
        <td class="px-4 py-3 text-slate-700"><?= esc($task['due_date'] ?? '—') ?></td>
        <td class="px-4 py-3">
            <div class="flex justify-end gap-2">
                <a href="<?= site_url('tasks/' . $task['id'] . '/edit') ?>" class="rounded-md border border-slate-300 px-3 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-100">Edit</a>
                <form method="post" action="<?= site_url('tasks/' . $task['id'] . '/delete') ?>" onsubmit="return confirm('Delete this task?');">
                    <?= csrf_field() ?>
                    <button type="submit" class="rounded-md bg-rose-600 px-3 py-1.5 text-xs font-medium text-white hover:bg-rose-500">Delete</button>
                </form>
            </div>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
