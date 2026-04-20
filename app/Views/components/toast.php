<?php if (session()->has('message')) : ?>
    <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
        <?= esc(session('message')) ?>
    </div>
<?php endif; ?>

<?php if (session()->has('errors')) : ?>
    <div class="mb-6 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
        <p class="font-semibold">Please fix the following:</p>
        <ul class="mt-2 list-inside list-disc space-y-1">
            <?php foreach ((array) session('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
