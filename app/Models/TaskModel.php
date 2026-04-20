<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'project_id',
        'user_id',
        'title',
        'description',
        'status',
        'priority',
        'due_date',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'project_id'   => 'permit_empty|integer',
        'user_id'      => 'permit_empty|integer',
        'title'        => 'required|min_length[3]|max_length[180]',
        'description'  => 'permit_empty|string',
        'status'       => 'required|in_list[todo,in_progress,done]',
        'priority'     => 'required|in_list[low,medium,high]',
        'due_date'     => 'permit_empty|valid_date[Y-m-d]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function withRelations(): self
    {
        return $this->select('tasks.*, projects.name AS project_name, users.name AS assignee_name')
            ->join('projects', 'projects.id = tasks.project_id', 'left')
            ->join('users', 'users.id = tasks.user_id', 'left');
    }
}
