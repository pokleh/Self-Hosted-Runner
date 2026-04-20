<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mb-4 flex items-center justify-between">
    <a href="<?= site_url('tasks') ?>" class="text-sm font-medium text-slate-600 hover:text-slate-900">← Back to tasks</a>
    <a href="<?= site_url('tasks/' . $task['id'] . '/edit') ?>" class="rounded-md border border-slate-300 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">Edit task</a>
</div>

<?= view('components/card', [
    'title' => $task['title'],
    'slot' => view('tasks/partials/show_content', ['task' => $task, 'comments' => $comments]),
]) ?>
<?= $this->endSection() ?>
