<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   protected function casts(): array
    {
        return [
            'due_date' => 'date',   // Notwendig für $tasks->due_date->format('d.m.Y'); // da ansonsten ein String
        ];
    }

    // Relation
    // tasks->user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
