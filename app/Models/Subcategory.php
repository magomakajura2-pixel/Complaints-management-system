<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subcategory extends Model
{
    protected $table = 'subcategories';

    protected $fillable = [
        'categoryid',
        'subcategory',
    ];

    public $timestamps = false;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categoryid');
    }
}
