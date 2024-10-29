<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'task_id';
    protected $hidden = ['task_id'];

    public function getStatusTextAttribute()
    {
        if($this->status == 1) return 'Completed';

        else return 'Pending';
    }
    protected $appends = ['status_text'];
}
