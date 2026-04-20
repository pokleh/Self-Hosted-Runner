<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= view('components/card', [
    'title' => 'Create Task',
    'slot' => '<form method="post" action="' . site_url('tasks') . '">' . csrf_field() . view('tasks/_form', [
        'task' => $task ?? null,
        'projects' => $projects,
        'users' => $users,
        'statuses' => $statuses,
        'priorities' => $priorities,
        'submitLabel' => 'Create Task',
    ]) . '</form>',
]) ?>
<?= $this->endSection() ?>
