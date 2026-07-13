<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComplaintRemark extends Model
{
    protected $table = 'complaint_remarks';

    protected $fillable = [
        'complaintNumber',
        'status',
        'remark',
    ];

    public $timestamps = false;

    public function complaint(): BelongsTo
    {
        return $this->belongsTo(Complaint::class, 'complaintNumber', 'complaintNumber');
    }
}
