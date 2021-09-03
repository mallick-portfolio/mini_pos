<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $fillable = ['title'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public static function arrayForList(){
        $groups = Group::all();
        $listGroup = [];
        foreach($groups as $group){
            $listGroup[$group->id] = $group->title;
        }
        return $listGroup;
    }
}

