<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Download extends Model
{
    use HasFactory, Sluggable;
    // protected $fillable = ['name', 'slug',];
    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
