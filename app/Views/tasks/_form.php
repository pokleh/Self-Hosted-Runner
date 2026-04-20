<?php
$task = $task ?? [];
$projectOptions = ['' => 'No project'];
foreach ($projects as $project) {
    $projectOptions[(string) $project['id']] = $project['name'];
}

$userOptions = ['' => 'Unassigned'];
foreach ($users as $user) {
    $userOptions[(string) $user['id']] = $user['name'];
}
?>

<div class="grid gap-4 md:grid-cols-2">
    <?= view('components/input', [
        'name' => 'title',
        'label' => 'Title',
        'value' => old('title', $task['title'] ?? ''),
        'error' => session('errors.title') ?? null,
        'required' => true,
    ]) ?>

    <?= view('components/input', [
        'name' => 'due_date',
        'label' => 'Due Date',
        'type' => 'date',
        'value' => old('due_date', $task['due_date'] ?? ''),
        'error' => session('errors.due_date') ?? null,
    ]) ?>

    <?= view('components/select', [
        'name' => 'status',
        'label' => 'Status',
        'value' => old('status', $task['status'] ?? 'todo'),
        'options' => $statuses,
        'error' => session('errors.status') ?? null,
    ]) ?>

    <?= view('components/select', [
        'name' => 'priority',
        'label' => 'Priority',
        'value' => old('priority', $task['priority'] ?? 'medium'),
        'options' => $priorities,
        'error' => session('errors.priority') ?? null,
    ]) ?>

    <?= view('components/select', [
        'name' => 'project_id',
        'label' => 'Project',
        'value' => old('project_id', (string) ($task['project_id'] ?? '')),
        'options' => $projectOptions,
    ]) ?>

    <?= view('components/select', [
        'name' => 'user_id',
        'label' => 'Assignee',
        'value' => old('user_id', (string) ($task['user_id'] ?? '')),
        'options' => $userOptions,
    ]) ?>
</div>

<div class="mt-4">
    <?= view('components/textarea', [
        'name' => 'description',
        'label' => 'Description',
        'value' => old('description', $task['description'] ?? ''),
        'error' => session('errors.description') ?? null,
    ]) ?>
</div>

<div class="mt-6 flex items-center gap-3">
    <?= view('components/button', ['type' => 'submit', 'label' => $submitLabel ?? 'Save Task']) ?>
    <a href="<?= site_url('tasks') ?>" class="rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">Cancel</a>
</div>
