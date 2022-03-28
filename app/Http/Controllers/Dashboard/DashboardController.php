<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AccountBalance;
use App\Models\AccountBalanceTransaction;
use DateTime;
use Illuminate\Http\Request;


class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $user_id = auth()->user()->getAuthIdentifier();

        $accountBalance = AccountBalance::where('user_id', $user_id)->first();
//        $accountBalance = AccountBalance::get();

//        dd($accountBalance);

        if ($request->dateFrom && $request->dateTo)
        {
            $dateFrom = DateTime::createFromFormat('d-m-Y', $request->dateFrom);
            $dateTo = DateTime::createFromFormat('d-m-Y', $request->dateTo);

            $transactions = AccountBalanceTransaction::where('account_balance_id', $accountBalance->id)->where('created_at', '>=', $dateFrom)->where('created_at', '<=', $dateTo)->get();

        } else {
            $transactions = AccountBalanceTransaction::where('account_balance_id', $accountBalance->id)->get();
        }

        return view('dashboard', [
            'accountBalance' => $accountBalance,
            'transactions' => $transactions
        ]);
    }
}
