<?php

namespace App\Http\Controllers;

use App\Models\transactions;
use Illuminate\Http\Request;
use App\Models\transaction;
use App\Models\transaction_details;

use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('transactions')
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->select('transactions.id', 'transactions.no_transaction', 'transactions.transaction_date', DB::raw('SUM(transaction_details.quantity) as quantity'), DB::raw('count(transaction_details.transaction_id) as total', 'transaction_details.item', 'transaction_details.quantity'))
            ->groupBy('transactions.id', 'transactions.no_transaction', 'transactions.transaction_date')
            ->orderBy('transactions.id', 'desc')
            ->get();

        
        return view('welcome', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = new transactions;
        $transaction->no_transaction = $request->no_transaction;
        $transaction->transaction_date = $request->transaction_date;
        $transaction->save();

        foreach ($request->item as $key => $value) {
            $data = array(
                'transaction_id' => $transaction->id,
                'item' => $request->item[$key],
                'quantity' => $request->quantity[$key],
            );
            transaction_details::insert($data);
        }
       
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show data by id
        $data = transaction_details::where('transaction_id', $id)->get();
            // dd($data);
        return view('welcome_edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function edit(transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $transaction = transactions::find($request->id);
        $transaction->no_transaction = $request->no_transaction;
        $transaction->transaction_date = $request->transaction_date;
        $transaction->save();
        if ($request->item != null) {

            $Delete = transaction_details::where('transaction_id',$transaction->id)->get();
            foreach ($Delete as $key => $value) {
                $Delete = transaction_details::find($value->id);
                $Delete->delete();
            }
          
            foreach ($request->item as $key => $value) {
                //  dd($request);
                $data = array(
                    'transaction_id' => $transaction->id,
                    'item' => $request->item[$key],
                    'quantity' => $request->quantity[$key],
                );
                
                transaction_details::insert($data);
            }
        }
      

        return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $transaction = transactions::find($id);
        $transaction->delete();
       
        return back();
    }

    public function getDataDetail($id)
    {
        $data = transaction_details::where('transaction_id', $id)->get();
        return response()->json([
            'status'=>true,
            'message'=>'Data',
            'data'=>$data
        ],200);
       
    }
}
