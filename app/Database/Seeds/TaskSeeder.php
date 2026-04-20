<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $defaultPassword = password_hash('password123', PASSWORD_DEFAULT);

        $this->db->table('users')->insertBatch([
            ['name' => 'Demo User', 'email' => 'demo@example.com', 'password_hash' => $defaultPassword, 'role' => 'admin', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Project Lead', 'email' => 'lead@example.com', 'password_hash' => $defaultPassword, 'role' => 'member', 'created_at' => $now, 'updated_at' => $now],
        ]);

        $this->db->table('projects')->insertBatch([
            ['name' => 'Website Refresh', 'description' => 'Landing page and onboarding updates', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Internal Tooling', 'description' => 'Improve automation scripts and docs', 'created_at' => $now, 'updated_at' => $now],
        ]);

        $this->db->table('tasks')->insertBatch([
            [
                'project_id'   => 1,
                'user_id'      => 1,
                'title'        => 'Set up CI4 project shell',
                'description'  => 'Initialize base project and environment defaults.',
                'status'       => 'done',
                'priority'     => 'high',
                'due_date'     => date('Y-m-d', strtotime('+1 day')),
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'project_id'   => 1,
                'user_id'      => 2,
                'title'        => 'Implement task list UI',
                'description'  => 'Build Tailwind-based task table and filters.',
                'status'       => 'in_progress',
                'priority'     => 'medium',
                'due_date'     => date('Y-m-d', strtotime('+3 days')),
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'project_id'   => 2,
                'user_id'      => 1,
                'title'        => 'Write setup documentation',
                'description'  => 'Document local install, migrate and run steps.',
                'status'       => 'todo',
                'priority'     => 'low',
                'due_date'     => date('Y-m-d', strtotime('+5 days')),
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
        ]);

        $this->db->table('task_comments')->insertBatch([
            ['task_id' => 1, 'user_id' => 2, 'body' => 'Scaffold is ready to review.', 'created_at' => $now, 'updated_at' => $now],
            ['task_id' => 2, 'user_id' => 1, 'body' => 'Please include status badges.', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
