<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['image_path', 'description', 'category_id','uploader_name',];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

