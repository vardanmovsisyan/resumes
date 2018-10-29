<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function verify(Request $request, $id){
        $res=User::findOrFail($id);
        $res->verifiedByAdmin=((intval($res->verifiedByAdmin)+1)%2);
        $res->save();
    }

}
