<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;

// Models
use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;

class WithdrawController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $userAccount = $user->account()->get();
        return view('user.withdraw', compact('userAccount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = Auth::user();
        $userAccount = $user->account()->select('balance','available_balance','account_id')->get();
        $rules = array(
            'amount'    => 'required|numeric|min:50',
        );
 
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route("user.withdraw.create")->withErrors($validator);

        }elseif ($request->amount % 50 != 0) {
            return redirect()->route('user.withdraw.create')->with(['message' => $request->amount."  is not a multiple of 50 , Please enter the 50EGP and double ",'type' => 'error']);
        
        }elseif ($request->amount > $userAccount[0]->available_balance -50) {

            return redirect()->route('user.withdraw.create')->with(['message' => $request->amount." EGP more than your available balance ",'type' => 'error']);
        } else {
          $updateBalancel =  Account::whereAccount_id($userAccount[0]->account_id)->update(
            ['balance' => $userAccount[0]->balance - $request->amount ,
            'available_balance' => $userAccount[0]->available_balance - $request->amount ]);
          if ($updateBalancel ) {
         
            $data['tr_amount']          = $request->amount;
            $data['account_id']         = $userAccount[0]->account_id;
            $data['tr_name']            = "withdraw";
            $data['category_id']        = 1;
            $data['balance']            = $userAccount[0]->available_balance;
            $data['balance_after_tr']   = $userAccount[0]->available_balance - $request->amount;

            //$data['created_by'] = $user->name;
    
            Transaction::create($data);
            return redirect()->route('user.dashboard')->with(['message' => "Successfully withdraw your available balance  " ,'type' => 'success']);
          }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
