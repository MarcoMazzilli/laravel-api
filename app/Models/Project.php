<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    public static function generateSlug($str)
    {
        $slug = Str::slug($str, '-');
        $original_slug = $slug;

        $slug_exixts = Project::where('slug', $slug)->first();
        $c = 1;
        while ($slug_exixts) {
            $slug = $original_slug . '-' . $c;
            $slug_exixts = Project::where('slug', $slug)->first();
            $c++;
        }
        return $slug;
    }

    protected $fillable = [
        'project_name',
        'url',
        'description',
        'slug',
        'status',
        'license',
        'image_path',
        'image_original_name',
        'type_id'
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany('App\Models\Technology');
    }
}
