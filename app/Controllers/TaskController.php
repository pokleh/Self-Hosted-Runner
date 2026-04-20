<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\TaskCommentModel;
use App\Models\TaskModel;
use App\Models\UserModel;

class TaskController extends BaseController
{
    private TaskModel $taskModel;
    private ProjectModel $projectModel;
    private UserModel $userModel;
    private TaskCommentModel $commentModel;

    public function __construct()
    {
        $this->taskModel    = new TaskModel();
        $this->projectModel = new ProjectModel();
        $this->userModel    = new UserModel();
        $this->commentModel = new TaskCommentModel();
    }

    public function index(): string
    {
        return view('tasks/index', [
            'tasks' => $this->taskModel->withRelations()->orderBy('due_date', 'ASC')->findAll(),
        ]);
    }

    public function show(int $id): string
    {
        $task = $this->taskModel->withRelations()->find($id);
        if (! $task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Task not found.');
        }

        $comments = $this->commentModel
            ->select('task_comments.*, users.name AS author_name')
            ->join('users', 'users.id = task_comments.user_id', 'left')
            ->where('task_comments.task_id', $id)
            ->orderBy('task_comments.created_at', 'ASC')
            ->findAll();

        return view('tasks/show', ['task' => $task, 'comments' => $comments]);
    }

    public function create(): string
    {
        return view('tasks/create', $this->formData());
    }

    public function store()
    {
        $payload = $this->request->getPost([
            'title',
            'description',
            'status',
            'priority',
            'due_date',
            'project_id',
            'user_id',
        ]);

        if (! $this->taskModel->insert($payload)) {
            return redirect()->back()->withInput()->with('errors', $this->taskModel->errors());
        }

        return redirect()->to('/tasks')->with('message', 'Task created successfully.');
    }

    public function edit(int $id): string
    {
        $task = $this->taskModel->find($id);
        if (! $task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Task not found.');
        }

        return view('tasks/edit', $this->formData($task));
    }

    public function update(int $id)
    {
        if (! $this->taskModel->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Task not found.');
        }

        $payload = $this->request->getPost([
            'title',
            'description',
            'status',
            'priority',
            'due_date',
            'project_id',
            'user_id',
        ]);

        if (! $this->taskModel->update($id, $payload)) {
            return redirect()->back()->withInput()->with('errors', $this->taskModel->errors());
        }

        return redirect()->to('/tasks')->with('message', 'Task updated successfully.');
    }

    public function delete(int $id)
    {
        if ($this->taskModel->find($id)) {
            $this->taskModel->delete($id);
        }

        return redirect()->to('/tasks')->with('message', 'Task deleted.');
    }

    private function formData(?array $task = null): array
    {
        return [
            'task' => $task,
            'projects' => $this->projectModel->orderBy('name', 'ASC')->findAll(),
            'users' => $this->userModel->orderBy('name', 'ASC')->findAll(),
            'statuses' => [
                'todo' => 'To Do',
                'in_progress' => 'In Progress',
                'done' => 'Done',
            ],
            'priorities' => [
                'low' => 'Low',
                'medium' => 'Medium',
                'high' => 'High',
            ],
        ];
    }
}
