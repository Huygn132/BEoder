<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProjectUpdateController extends Controller
{
    /**
     * 
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = DB::table('t_projects')->where('id', $id)->first();
        if (!$project) {
            return redirect()->back()->withErrors(['error' => 'Không tìm thấy dự án.']);
        }
        return view('project.edit', compact('project'));
    }

    /**
     * 
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        DB::table('t_projects')->where('id', $id)->update([
            'project_name' => $request->project_name,
            'order_number' => $request->order_number,
            'client_name'  => $request->client_name,
            'order_date'   => $request->order_date,
            'status'       => $request->status,
            'order_income' => $request->order_income,
            'internal_unit_price' => $request->internal_unit_price,
            'del_flg' => 0,
            // 'updated_user' => Auth::user()->id ?? null, 
            'updated_datetime' => now()->setTimezone('Asia/Ho_Chi_Minh'),
        ]);

        return redirect()->route('project.edit', $id)->with('success', 'Order information is successfully inserted!!');
    }
}
