<?php

namespace App\Http\Controllers;


use App\Models\Pizza;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the view for ordering.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = auth()->user();
        return view('orden.create',compact('user'));
    }

    /**
     * Store a new order on database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $order = Pedido::create([
                'address' => $request->address,
                'quantity' => $request->quantity,
                'total' => $request->total,
                'user_id' => auth()->user()->id,
            ]);
            Log::info(__METHOD__.' Ha sido creado un pedido por el usuario'.auth()->user()->name);
            return response()->json('Pedido Realizado', 200);
        } catch (\Throwable $th) {
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            return response()->json('Error', 400);
        }
    }

    /**
     * Show view of order confrimation
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'Hawaiana' => 'required',
            'Mexicana' => 'required',
            'CuatroQuesos' => 'required',
            'Margarita' => 'required',
        ]);//pizza validation fields just in case; if the codes gets manipulated and replace the 0 for a " "
        if($request->Hawaiana==0 && $request->Mexicana==0 && $request->CuatroQuesos==0 && $request->Margarita==0){
            return back()->withErrors(['seleccion'=>'Should order at least one pizza'])->withInput($request->input());
        }
        else{
            $meno= Pizza::all()->pluck('price','name');
            $total=0;
            foreach ($meno as $key =>$value) {
                $total=$total+($data[$key]*$value);
            }
            $data=$request->all();
            return view('orden.confirm',compact('data','total'));
        }
    }
}
