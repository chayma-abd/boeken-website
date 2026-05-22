<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $fillable = ['name', 'sort_order'];

    public function faqItems()
    {
        return $this->hasMany(FaqItem::class)->orderBy('sort_order');
    }
}