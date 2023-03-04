<?php

namespace App\Models;
use App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Type extends Model
{
    use HasFactory;
    protected $fillable= ['name', 'slug'];

    public static function generateSlug($title){
        return Str::slug($title, '-');
    }
    public function project(){
        return $this->hasMany(Project::class);
    }
}
