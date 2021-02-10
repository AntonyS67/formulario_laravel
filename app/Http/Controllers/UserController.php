<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserCreateRequest;
use App\Mail\SuccessRegister;
use Carbon\Carbon;
use Mail;
use DB;

class UserController extends Controller
{
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request){
        
        try {
            DB::beginTransaction();

            $departmento = DB::table('departamentos')->where('id',$request->department)->get('nombre')->first();
            $provincia = DB::table('provincias')->where('id',$request->province)->get('nombre')->first();
            $distrito = DB::table('sedes')->where('id',$request->distrit)->get('nombre')->first();
            
            //code...
            $date = date_parse($request->birthday);
            $user = new User();
            $user->fullname = $request->fullname;
            $user->doc_type = 'DNI';
            $user->number_doc = $request->number_doc;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->birthday = $date['year'].'-'.$date['month'].'-'. $date['day'];
            $user->address = $departmento->nombre.'-'.$provincia->nombre.'-'.$distrito->nombre.'-'.$request->address;
            $user->save();

            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new SuccessRegister());

            DB::commit();

            $output = ['success' => true,
                'msg' => "Usuario creado con exito"
            ];

        } catch (\Throwable $th) {
            DB::rollback();
            $output = ['success' => false,
                'msg' => 'Ocurrio un problema'
            ];
        }
            
        return $output;

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
