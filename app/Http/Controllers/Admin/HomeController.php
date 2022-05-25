<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller {

    public function index(Request $request) {
        try {

            if ($request->ajax()) {

                $data = User::select('id', 'first_name', 'last_name', 'email', 'annual_income', 'occupation', 'famiy_type', 'manglik', 'phone', 'date_of_birth', 'gender', 'famiy_type')->with('prefrences');

                if ($request->annual_income) {
                    $income = explode('-', $request->annual_income);
                    $annual_income_from = $income[0];
                    $annual_income_to = $income[1];
                    $data->where('annual_income', '>=', $annual_income_from);
                    $data->where('annual_income', '<=', $annual_income_to);
                }

                if ($request->age) {
                    $age = explode('-', $request->age);
                    $age_from = $age[0];
                    $age_to = $age[1];

                    $currentDateTime = Carbon::now();
                    $to_date = Carbon::now()->subYears($age_from)->format('Y-m-d');
                    $from_date = Carbon::now()->subYears($age_to)->format('Y-m-d');

                    $data->whereBetween('date_of_birth', [$from_date, $to_date]);
                }

                if ($request->gender) {
                    $data->where('gender', $request->gender);
                }

                if ($request->famiy_type) {
                    $data->where('famiy_type', 'like', '%' . $request->famiy_type . '%');
                }

                if ($request->manglik) {
                    if ($request->manglik != 'Both') {
                        $data->where('manglik', $request->manglik);
                    }
                }

                return Datatables::of($data)
                                ->addIndexColumn()
                                ->make(true);
            }
            return view('admin.home');
        } catch (\Exception $e) {
            return abort(500);
        }
    }

}
