<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php
$statusLabels = $statuses;
$priorityLabels = $priorities;
$assigneeOptions = ['' => 'All assignees'];
foreach ($users as $user) {
    $assigneeOptions[(string) $user['id']] = $user['name'];
}
?>
<div class="mb-4 flex items-center justify-between">
    <h2 class="text-2xl font-semibold text-slate-900">Tasks</h2>
    <a href="<?= site_url('tasks/new') ?>" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Create Task</a>
</div>

<form method="get" action="<?= site_url('tasks') ?>" class="mb-5 rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
    <div class="grid gap-3 md:grid-cols-3 lg:grid-cols-6">
        <div class="lg:col-span-2">
            <input
                type="text"
                name="q"
                value="<?= esc($filters['q']) ?>"
                placeholder="Search title or description"
                class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm outline-none focus:border-slate-500 focus:ring-2 focus:ring-slate-200"
            >
        </div>

        <div>
            <?= view('components/select', [
                'name' => 'status',
                'value' => $filters['status'],
                'options' => ['' => 'All statuses'] + $statusLabels,
            ]) ?>
        </div>

        <div>
            <?= view('components/select', [
                'name' => 'priority',
                'value' => $filters['priority'],
                'options' => ['' => 'All priorities'] + $priorityLabels,
            ]) ?>
        </div>

        <div>
            <?= view('components/select', [
                'name' => 'assignee',
                'value' => $filters['assignee'],
                'options' => $assigneeOptions,
            ]) ?>
        </div>

        <div class="grid grid-cols-2 gap-2">
            <input
                type="date"
                name="due_from"
                value="<?= esc($filters['due_from']) ?>"
                class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm outline-none focus:border-slate-500 focus:ring-2 focus:ring-slate-200"
            >
            <input
                type="date"
                name="due_to"
                value="<?= esc($filters['due_to']) ?>"
                class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm outline-none focus:border-slate-500 focus:ring-2 focus:ring-slate-200"
            >
        </div>
    </div>

    <div class="mt-3 flex items-center gap-2">
        <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Apply Filters</button>
        <a href="<?= site_url('tasks') ?>" class="rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">Reset</a>
    </div>
</form>

<?= view('components/table', [
    'slot' => view('tasks/partials/task_table', [
        'tasks' => $tasks,
        'statusLabels' => $statusLabels,
        'priorityLabels' => $priorityLabels,
        'hasFilters' => $hasFilters,
    ]),
]) ?>
<?= $this->endSection() ?>
