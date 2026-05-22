<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqItem extends Model
{
    protected $fillable = ['category_id', 'question', 'answer', 'sort_order'];

    public function category()
    {
        return $this->belongsTo(FaqCategory::class);
    }
}