<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php
$statusLabels = ['todo' => 'To Do', 'in_progress' => 'In Progress', 'done' => 'Done'];
$priorityLabels = ['low' => 'Low', 'medium' => 'Medium', 'high' => 'High'];
?>
<div class="mb-4 flex items-center justify-between">
    <h2 class="text-2xl font-semibold text-slate-900">Tasks</h2>
    <a href="<?= site_url('tasks/new') ?>" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Create Task</a>
</div>

<?= view('components/table', [
    'slot' => view('tasks/partials/task_table', [
        'tasks' => $tasks,
        'statusLabels' => $statusLabels,
        'priorityLabels' => $priorityLabels,
    ]),
]) ?>
<?= $this->endSection() ?>
