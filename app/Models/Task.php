<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['title', 'description', 'status', 'manager_id', 'employee_id'])]
class Task extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';

    /**
     * Get the manager who created the task.
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    /**
     * Get the employee assigned to the task.
     */
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
