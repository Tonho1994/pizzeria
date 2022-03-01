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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $pedido = Pedido::create([
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

    public function confirm(Request $request){

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'Hawaiana' => 'required',
            'Mexicana' => 'required',
            'CuatroQuesos' => 'required',
            'Margarita' => 'required',
        ]);
        //dd($data);
        if($request->Hawaiana==0 && $request->Mexicana==0 && $request->CuatroQuesos==0 && $request->Margarita==0){
            //como regreso un mensaje de error??? es por que no se eligio al menos una pizza
            return redirect()->route('pedidos.create');
        }
        else{
            $data=$request->all();
            //dd($data);
            $hawaiana=Pizza::select('price')->where('name','Hawaiana')->first();
            $mexicana=Pizza::select('price')->where('name','Mexicana')->first();
            $quesos=Pizza::select('price')->where('name','CuatroQuesos')->first();
            $margarita=Pizza::select('price')->where('name','Margarita')->first();
            $total=(($data['Hawaiana']*$hawaiana->price)+($data['Mexicana']*$mexicana->price)+($data['CuatroQuesos']*$quesos->price)+($data['Margarita']*$margarita->price));
            return view('orden.confirm',compact('data','total'));
        }
    }
}
