<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Service::all();
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
        $service = new Service();

        $path = public_path()."/foto";
        $img = $request->file('foto');
        $img->move($path,$img->getClientOriginalName());

        $service->nama = $request->nama;
        $service->tlp = $request->tlp;
        $service->tanggal = $request->tanggal;
        $service->tanggal_selesai = "0";
        $service->jenis = $request->jenis;
        $service->serial_number = $request->serial_number;
        $service->foto ='foto/'.$img->getClientOriginalName();
        $service->keluhan = $request->keluhan;
        $service->status = " ";

        $service->save();

        return response()->json([
            'message'=>'data berhasil ditambahkan'
        ]);
    }

    public function done(Request $request, $id){    
        $service = Service::find($id);
        $service->status = "Selesai";        
        $service->tanggal_selesai = date("Y-m-d");
        $service->solved = $request->solved;
        $service->save();
        return response()->json([
            'msg' => 'data berhasil diubah',
        ]);        
    }    

    public function editService(Request $request , $id){                
        $service = Service::findOrFail($id);                        
        $service->nama = $request->nama;
        $service->tlp = $request->tlp;
        $service->tanggal = $request->tanggal;
        $service->tanggal_selesai = $request->tanggal;
        $service->jenis = $request->jenis;
        $service->serial_number = $request->serial_number;
        $service->keluhan = $request->keluhan;
        $service->status = $request->status;
        $service->solved = $request->solved;
        $service->save();
        return response()->json([
            'msg'=>'data sudah diubah',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service , $id)
    {   
        //
        Service::where('id',$id)->delete();
        return response()->json([
            'msg' => 'data berhasil dihapus',
        ]);
    }
}
