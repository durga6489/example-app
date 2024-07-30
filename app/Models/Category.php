<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    
    protected $primaryKey = 'category_id';

  
    protected $fillable = [
        'name',
        'status',
        'parent_id',
    ];

 
    protected $casts = [
        'status' => 'integer',
        'parent_id' => 'integer',
    ];

    
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
