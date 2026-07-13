<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'categoryName',
        'categoryDescription',
    ];

    public $timestamps = false;

    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class, 'categoryid');
    }

    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class, 'category');
    }
}
