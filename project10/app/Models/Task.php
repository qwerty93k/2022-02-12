<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function taskStatus()
    {
        return $this->BelongsTo(TaskStatus::class, 'status_id', 'id');
    }
}
