<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id', 'user_id', 'amount', 'date', 'note'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
