<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Receipt;

use App\Http\Requests\ReceiptsRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserReceiptsController extends Controller
{
    public function index($id)
    {
        $this->data['user']         = User::findOrFail($id);
        $this->data['menu_active']  = 'receipts';
        
        return view('users.receipts.receipts', $this->data);
    }

    public function store(ReceiptsRequest $request, $id)
    {
        $this->data['receipt']              = $request->all();
        $this->data['receipt']['user_id']   = $id;
        $this->data['receipt']['admin_id']   = Auth::id();

        if (Receipt::create($this->data['receipt'])) {
            Session::flash('message', 'Payment Successfully');
        }

        return redirect()->route('users.receipts', ['id' => $id]);
    }


    public function destroy($id, $receipt_id)
    {
        $userPayment    = Receipt::findOrFail($receipt_id);
        $user           = User::findOrFail($id);

        if ($userPayment->delete()) {
            Session::flash('message', $user->name . ' Payment Deleted Successfully');
        }

        return redirect()->route('users.receipts', ['id' => $id]);
    }
}
