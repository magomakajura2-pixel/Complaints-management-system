<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Complaint extends Model
{
    protected $table = 'complaints';
    protected $primaryKey = 'complaintNumber';

    protected $fillable = [
        'userId',
        'category',
        'subcategory',
        'complaintType',
        'state',
        'noc',
        'complaintDetails',
        'complaintFile',
        'status',
    ];

    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function remarks(): HasMany
    {
        return $this->hasMany(ComplaintRemark::class, 'complaintNumber', 'complaintNumber');
    }
}
