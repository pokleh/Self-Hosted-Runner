<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= view('components/card', [
    'title' => 'Edit Task',
    'slot' => '<form method="post" action="' . site_url('tasks/' . $task['id']) . '">' . csrf_field() . view('tasks/_form', [
        'task' => $task,
        'projects' => $projects,
        'users' => $users,
        'statuses' => $statuses,
        'priorities' => $priorities,
        'submitLabel' => 'Update Task',
    ]) . '</form>',
]) ?>
<?= $this->endSection() ?>
