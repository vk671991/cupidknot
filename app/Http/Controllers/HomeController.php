<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Auth;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        try {

            if ($request->ajax()) {

                $total_factor = 4;
                $expected_annual_income_from = Auth::user()->prefrences->expected_annual_income_from;
                $expected_annual_income_to = Auth::user()->prefrences->expected_annual_income_to;
                $occupation = [];
                if (strpos(Auth::user()->prefrences->occupation, ',') !== false) {
                    $occupation = explode(',', Auth::user()->prefrences->occupation);
                } else {
                    array_push($occupation, Auth::user()->prefrences->occupation);
                }

                $family_type = [];
                if (strpos(Auth::user()->prefrences->family_type, ',') !== false) {
                    $family_type = explode(',', Auth::user()->prefrences->famiy_type);
                } else {
                    array_push($family_type, Auth::user()->prefrences->famiy_type);
                }

                $manglik = Auth::user()->prefrences->manglik;

                $data = User::select('id', 'first_name', 'last_name', 'email', 'annual_income', 'occupation', 'famiy_type', 'manglik')->with('prefrences')->where('id', '!=', Auth::user()->id);

                return Datatables::of($data)
                                ->addIndexColumn()
                                ->addColumn('match_percentage', function ($row) use ($expected_annual_income_from, $expected_annual_income_to, $occupation, $family_type, $manglik, $total_factor) {
                                    $totalPoints = 0;

                                    if ($row->annual_income >= $expected_annual_income_from && $row->annual_income <= $expected_annual_income_to) {
                                        $totalPoints += 1;
                                    }

                                    if (in_array($row->occupation, $occupation)) {
                                        $totalPoints += 1;
                                    }

                                    if (in_array($row->family_type, $family_type)) {
                                        $totalPoints += 1;
                                    }

                                    if ($manglik == 'Both') {
                                        $totalPoints += 1;
                                    } elseif ($manglik === $row->manglik) {
                                        $totalPoints += 1;
                                    }
                                    return number_format((float) (($totalPoints / $total_factor) * 100), 2, '.', '');
                                })
                                ->rawColumns(['match_percentage'])
                                ->make(true);
            }
            return view('home');
        } catch (\Exception $e) {
            return abort(500);
        }
    }

}
