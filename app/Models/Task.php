<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // If needed, define fillable or guarded attributes
    protected $fillable = ['title', 'description', 'long_description', 'completed'];

    public function toggleCompleted()
    {
        $this->update([
            'completed' => !$this->completed
        ]);
    }
}
