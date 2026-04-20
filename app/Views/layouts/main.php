<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Task Manager') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body class="bg-slate-50 text-slate-900">
<div class="mx-auto min-h-screen max-w-6xl px-4 py-8">
    <header class="mb-8 flex items-center justify-between rounded-lg border border-slate-200 bg-white px-6 py-4 shadow-sm">
        <div>
            <p class="text-xs uppercase tracking-wide text-slate-500">CodeIgniter 4 + Tailwind</p>
            <h1 class="text-xl font-semibold">Task Management App</h1>
        </div>
        <a href="<?= site_url('tasks/new') ?>" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">New Task</a>
    </header>

    <?= view('components/toast') ?>
    <?= $this->renderSection('content') ?>
</div>
</body>
</html>
