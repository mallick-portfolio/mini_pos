<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserReceiptsController extends Controller
{
    public function index($id)
    {
        $this->data['user']         = User::findOrFail($id);
        $this->data['menu_active']  = 'receipts';
        
        return view('users.receipts.receipts', $this->data);
    }
}
