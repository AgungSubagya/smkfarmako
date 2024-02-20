<?php

namespace App\Models;

use App\Models\seragam;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function seragam()
    {
        return $this->hasMany(seragam::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'jurusan'
            ]
        ];
    }
}
