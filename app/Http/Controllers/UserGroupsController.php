<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\Group;


class UserGroupsController extends Controller
{
    public function index()
    {
        $this->data['groups'] = Group::all();
        return view('groups.groups', $this->data);
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $formData = $request->all();
        if (Group::create($formData)) {
            Session::flash('message', 'Group Created Successfully');
        }
        return redirect()->to('/groups');
    }

    public function destroy($id)
    {
        $groupUser = Group::findOrFail($id);
        if ($groupUser->delete()) {
            Session::flash('message', 'Group Delete Successfully');
        }
        return redirect()->back();
    }
}
