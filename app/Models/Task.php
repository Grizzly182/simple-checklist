<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
        'checklist_id'
    ];

    public function checklist(): BelongsTo
    {
        return $this->belongsTo(Checklist::class, 'checklist_id', 'id');
    }

    public function steps(): HasMany
    {
        return $this->hasMany(Step::class, 'task_id', 'id');
    }
}