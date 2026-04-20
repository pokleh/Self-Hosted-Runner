<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mx-auto max-w-md">
    <section class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="mb-1 text-xl font-semibold text-slate-900">Sign in</h2>
        <p class="mb-4 text-sm text-slate-500">Use your account to access task management.</p>

        <form method="post" action="<?= site_url('login') ?>" class="space-y-4">
            <?= csrf_field() ?>
            <?= view('components/input', [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'email',
                'value' => old('email'),
                'required' => true,
            ]) ?>

            <?= view('components/input', [
                'name' => 'password',
                'label' => 'Password',
                'type' => 'password',
                'required' => true,
            ]) ?>

            <button type="submit" class="w-full rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
                Login
            </button>
        </form>

        <p class="mt-4 text-xs text-slate-500">
            Demo credentials: <strong>demo@example.com</strong> / <strong>password123</strong>
        </p>
    </section>
</div>
<?= $this->endSection() ?>
