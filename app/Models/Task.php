<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Task model mapped to tasks table in DB
 */
class Task extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'priority', 'project_id'
    ];

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @param $taskIds
     * @return void
     */
    public static function reorder($taskIds): void
    {
        foreach ($taskIds as $index => $taskId) {
            self::where('id', $taskId)->update(['priority' => $index + 1]);
        }
    }
}
