<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProjectCreationController extends Controller
{
    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|regex:/^[\p{Han}]{2}$/u',
            'order_number' => 'required|string|max:255',
            'client_name'  => 'required|string|max:255',
            'order_date'   => 'required|date',
            'status'       => 'required|integer|between:0,4',
            'order_income' => 'required|regex:/^[0-9]+$/',
            'internal_unit_price' => 'required|regex:/^[0-9]+$/'
        ], [
            'project_name.required' => 'err_mess 04',
            'project_name.regex'    => 'err_mess 05',
            'order_number.required' => 'err_mess 04',
            'client_name.required'  => 'err_mess 04',
            'order_date.date'       => 'err_mess 08',
            'status.required'       => 'err_mess 07',
            'order_income.required' => 'err_mess 04',
            'order_income.regex'    => 'err_mess 09',
            'internal_unit_price.required' => 'err_mess 04',
            'internal_unit_price.regex'    => 'err_mess 09',
        ]);

        DB::table('t_projects')->insert([
            'project_name' => $request->project_name,
            'order_number' => $request->order_number,
            'client_name'  => $request->client_name,
            'order_date'   => $request->order_date,
            'status'       => $request->status,
            'order_income' => $request->order_income,
            'internal_unit_price' => $request->internal_unit_price,
            'del_flg' => 0,
            // 'created_user' => Auth::user()->id,
            'created_datetime' => now()->setTimezone('Asia/Ho_Chi_Minh'),
            // 'updated_user' => Auth::user()->id,
            'updated_datetime' => now()->setTimezone('Asia/Ho_Chi_Minh'),
        ]);

        session()->flash('success', 'New Order ID is successfully inserted!');
        return redirect()->route('project.create');
    }
}
