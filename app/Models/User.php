<?php

namespace App\Models;

use App\Models\Group;
use App\Models\SaleInvoice;
use App\Models\PurchaeInvoice;
use App\Models\Payment;
use App\Models\Receipt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['group_id', 'name', 'email', 'phone', 'address'];



    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function sales()
    {
        return $this->hasMany(SaleInvoice::class);
    }
    public function purchases()
    {
        return $this->hasMany(PurchaeInvoice::class, 'user_id', 'id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function receipts()
    {
        return $this->hasMany(Receipt::class, 'user_id', 'id');
    }

}
