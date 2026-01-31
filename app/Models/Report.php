<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    const UPDATED_AT = null;

    protected $fillable = [
        'id',
        'user_id',
        'longitude',
        'latitude',
        'road_name',
        'before_image_url',
        'after_image_url',
        'description',
        'destruct_class',
        'location_score',
        'total_score',
        'status',
        'worker_id',
        'admin_notes',
        'deadline',
    ];

    protected $casts = [
        'longitude' => 'decimal:6',
        'latitude' => 'decimal:6',
        'location_score' => 'decimal:2',
        'total_score' => 'decimal:2',
        'created_at' => 'datetime',
        'deleted_at' => 'datetime',
        'deadline' => 'datetime',
    ];

    // Scope to get only non-deleted reports
    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }

    // Scope to get reports with non-good destruct class (for map display)
    public function scopeWithDamage($query)
    {
        return $query->whereNotNull('destruct_class')
            ->where('destruct_class', '!=', '')
            ->where('destruct_class', '!=', 'good');
    }
}
