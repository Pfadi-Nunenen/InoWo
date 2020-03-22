<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('search') == null) {
            $transactions = DB::table('points')
                ->leftJoin('participations', 'points.FK_PRT', 'participations.id')
                ->select('points.*', 'participations.first_name', 'participations.last_name', 'participations.scout_name')->get();
        }else {
            $search_string = $request->input('search');
            $transactions = DB::table('points')
                ->leftJoin('participations', 'points.FK_PRT', 'participations.id')
                ->where('scout_name', 'LIKE', "%$search_string%")
                ->orWhere('last_name', 'LIKE', "%$search_string%")
                ->orWhere('first_name', 'LIKE', "%$search_string%")
                ->orWhere('barcode', 'LIKE', "%$search_string%")->get();
        }

        return view('transactions.transactions', ['transactions' => $transactions]);
    }

    public function create()
    {
        $participations = DB::table('participations')->select('*')->get();

        return view('transactions.add', ['participations' => $participations]);
    }

    public function store(Request $request)
    {
        $participant = $request->input('participant');
        $points = $request->input('points');
        $reason = $request->input('reason');
        $is_addition = !empty($request->input('is_addition')) ? true : false;

        DB::table('points')->insert(['reason' => $reason, 'points' => $points, 'is_addition' => $is_addition, 'FK_PRT' => $participant]);

        return redirect()->back()->with('message', 'Transaktion wurde erstellt.');
    }

    public function edit($trid)
    {
        $point = DB::table('points')->where('id', '=', $trid)->first();
        $participations = DB::table('participations')->select('*')->get();

        return view('transactions.edit', ['point' => $point, 'participations' => $participations]);
    }

    public function update(Request $request, $trid)
    {
        $participant = $request->input('participant');
        $points = $request->input('points');
        $reason = $request->input('reason');
        $is_addition = !empty($request->input('is_addition')) ? true : false;

        DB::table('points')->where('id', '=', $trid)->update(['reason' => $reason, 'points' => $points, 'is_addition' => $is_addition, 'FK_PRT' => $participant]);

        return redirect()->back()->with('message', 'Transaktion wurde aktualisiert.');
    }

    public function destroy($trid)
    {
        DB::table('points')->where('id', '=', $trid)->delete();

        return redirect()->back()->with('message', 'Transaktion erfolgreich gelöscht.');
    }
}
