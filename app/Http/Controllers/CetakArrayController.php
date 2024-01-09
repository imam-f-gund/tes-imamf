<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaction;
use App\Models\transaction_details;
use App\Models\activity;
use App\Models\activity_details;

use Illuminate\Support\Facades\DB;

class CetakArrayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $datas = [
            ['no_transaction' => '0001',
            'item' => [
                ['id' => 1, 'name' => 'milk', 'quantity' => 4],
                ['id' => 2, 'name' => 'coffee', 'quantity' => 2],
               
            ],
        ],['no_transaction' => '0002',
                'item' => [
                    ['id' => 1, 'name' => 'tea', 'quantity' => 7],
                    ['id' => 2, 'name' => 'sugar', 'quantity' => 1],
                    ['id' => 2, 'name' => 'coffee', 'quantity' => 5],
                   
                ],
            ]
        ];


        foreach ($datas as $key => $value) {
            echo $value['no_transaction'];
            echo "<br>";
            foreach ($value['item'] as $key => $value) {
                echo $value['name'];
                echo '('.$value['quantity'].')';
                echo "<br>";
            }
            echo "<br>";
        }


        $customer = ['rio','ari','yuki'];

        $contac = [
            'ari'=> '08123456789',
            'dewi'=> '08123456788789',
            'beni'=> '081234567897',
            'rio'=> '081288869456789',
            'fitri'=> '081234567867',
            
        ];

        foreach ($customer as $key => $value) {
            if(!array_key_exists($value, $contac)){
                echo $value.": no contact";
                echo "<br>";
            }else{
                echo $value.':'.$contac[$value];
                echo "<br>";
            }
        }
        
            
                
           

            // return $datas;
          
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
        //
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

    public function query()
    {
        
        $data = DB::table('activities')
        ->join('activity_details', 'activities.id', '=', 'activity_details.id_activity')
            ->select('activities.*', 'activity_details.*')
            ->get();

        $a = DB::table('activities')
            ->join('activity_details', 'activities.id', '=', 'activity_details.id_activity')
            ->select('activities.title', 'activity_details.type', DB::raw('SUM(activity_details.weight) as total_weight'))
            ->groupBy('activities.title', 'activity_details.type')
            ->orderBy('activities.title')
            ->orderBy('activity_details.type')
            ->get();

        $b = DB::table('activities')
            ->select('activities.title', DB::raw('COUNT(activity_details.id) as total_detail_activity'), DB::raw('SUM(activity_details.weight) as total_weight'))
            ->leftJoin('activity_details', 'activities.id', '=', 'activity_details.id_activity')
            ->groupBy('activities.title')
            ->orderBy('activities.title')
            ->get();

        $c = DB::table('activities')
        ->select('activities.title', DB::raw('COUNT(DISTINCT activity_details.type) as total_activity_type'), DB::raw('SUM(activity_details.weight) as total_weight'))
        ->leftJoin('activity_details', 'activities.id', '=', 'activity_details.id_activity')
        ->groupBy('activities.title')
        ->orderBy('activities.title')
        ->get();

        $d  = DB::table('activities')
        ->select('activities.title', 'activity_details.type', 'activity_details.weight')
        ->join('activity_details', function ($join) {
            $join->on('activities.id', '=', 'activity_details.id_activity')
                ->whereRaw('activity_details.id IN (SELECT MAX(id) FROM activity_details GROUP BY id_activity)');
        })
        ->orderBy('activities.title')
        ->get();
            
        $data=[
            'soal a'=>$a,
            'soal b'=>$b,
            'soal c'=>$c,
            'soal d'=>$d,
        ];

        return $data;
      
    }
}
