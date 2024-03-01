<?php

namespace App\Http\Controllers\Api;

use File;
use Image;
use App\Models\Barang as Barang;
use Validator;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class BarangController extends BaseController
{
    public function index($id=null)
    {
        $barang = Barang::select(
                                'm_barang.id',
                                'm_barang.kode',
                                'm_barang.nama',
                                'm_barang.qty',
                                'm_barang.satuan',
                                'm_barang.harga',
                                'm_barang.harga_jual',
                                'm_barang.status_aktif'
                                );
        if($id){
            $barang->where('m_barang.id', $id);
        }            
        $barang = $barang->get();
        $result = [];
        if(count($barang) > 0 ){
            foreach($barang as $key => $val){
                $result[] = [
                        'id'            => $val->id,
                        'kode'          => $val->kode,
                        'name'          => $val->nama,
                        'qty'           => $val->qty,
                        'satuan'        => $val->satuan,
                        'harga_beli'    => $val->harga,
                        'harga_jual'    => $val->harga_jual,
                        'status_aktif'  => $val->status_aktif
                    ];
            } 
        }else{
            return $this->sendError('Barang not found');
        }   
        return $this->sendResponse($result,'Barang successfull to retrived');
    }
    
    
    public function barangUsers($id)
    {
        $barang = Barang::select(
                                'm_barangs.id',
                                'm_barangs.kode',
                                'm_barangs.name',
                                'm_barangs.unit_id',
                                'm_units.name as unit_name',
                                'm_barangs.qty',
                                'm_barangs.satuan',
                                'm_barangs.harga_beli',
                                'm_barangs.harga_jual',
                                'm_barangs.status_aktif',
                                'm_barangs.user_id',
                                'm_barangs.photo',
                                'users.name as client_name',
                                'users.images'
                                )
                    ->join('m_units', 'm_units.id', 'm_barangs.unit_id')
                    ->join('users', 'users.id', 'm_barangs.user_id');
        $barang->where('m_barangs.user_id', $id);         
        $barang = $barang->get();
        $result = [];
        if(count($barang) > 0 ){
            foreach($barang as $key => $val){
                $result[] = [
                        'id'            => $val->id,
                        'kode'          => $val->kode,
                        'name'          => $val->name,
                        'unit_id'       => $val->unit_id,
                        'unit_name'     => $val->unit_name,
                        'qty'           => $val->qty,
                        'satuan'        => $val->satuan,
                        'harga_beli'    => $val->harga_beli,
                        'harga_jual'    => $val->harga_jual,
                        'status_aktif'  => $val->status_aktif,
                        'client_name'   => $val->client_name,
                        'photo'         => url('images')."/".$val->photo,
                        'images'        => url('images')."/".$val->images
                    ];
            } 
        }else{
            return $this->sendResponse($result,'Barang not found');
        }   
        return $this->sendResponse($result,'Barang successfull to retrived');
    }
    
    
    public function store(Request $request)
    {
        
        $input = $request->all();

        $validator = Validator::make($input, [
            'token'         => 'required',
            'kode'          => 'required',
            'name'          => 'required',
            'unit_id'       => 'required',
            'qty'           => 'required',
            'satuan'        => 'required',
            'harga_beli'    => 'required',
            'harga_jual'    => 'required',
        ]);
        
        if ($input['image']) {
            $png_url = "barang-".time().".png";
    		//$path = public_path().'/images/' . $png_url;
    		$path = '/images/' . $png_url;

    		\Storage::put($path, base64_decode($input['image']));

    		$gambarnya = base64_decode($input['image']);
    		$filegambar = imagecreatefromstring($gambarnya);

    		imagejpeg($filegambar, "images/$png_url");
    		imagedestroy($filegambar);
    		
        } else {
            $file_name = "";
        }

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        
        $checktoken = DB::table('users')->where('api_token', $request->token)->get()->first();
        
        if(!$checktoken){
            return $this->sendError('Invalid token ');
        }
        
        $data = [
            'kode'              => $request->kode,
            'name'              => $request->name,
            'unit_id'           => $request->unit_id,
            'qty'               => $request->qty,
            'satuan'            => $request->satuan,
            'harga_beli'        => $request->harga_beli,
            'harga_jual'        => $request->harga_jual,
            'photo'             => $png_url,
            'status_aktif'      => 1,
            'user_id'           => $checktoken->id
        ];

        $barang = Barang::create($data);

        return $this->sendResponse($barang->toArray(),'Barang successfull to created');
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        if (is_null($barang)) {
            return $this->sendError('Barang not found');
        }
        
        return $this->sendResponse($barang->toArray(),'Barang retrived successfull');
    }

    public function update(Request $request,$id)
    {
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'token'         => 'required',
            'kode'          => 'required',
            'name'          => 'required',
            'unit_id'       => 'required',
            'qty'           => 'required',
            'satuan'        => 'required',
            'harga_beli'    => 'required',
            'harga_jual'    => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        
        
        $checkdata = Barang::where('id', $id)->get()->first();
        $checktoken = DB::table('users')->where('api_token', $request->token)->get()->first();
        
        if(!$checktoken){
            return $this->sendError('Invalid tokens ');
        }
        
        if($checkdata->user_id != $checktoken->id){
            return $this->sendError('Invalid token ');
        }
        
        $barang               = Barang::findOrFail($id);
        $barang->kode         = $request->kode;
        $barang->name         = $request->name;
        $barang->unit_id      = $request->unit_id;
        $barang->qty          = $request->qty;
        $barang->satuan       = $request->satuan;
  		$barang->harga_beli   = $request->harga_beli;
  		$barang->harga_jual   = $request->harga_jual;
  		$png_url = "profile-".time().".png";
		//$path = public_path().'/images/' . $png_url;
		$path = '/images/' . $png_url;
		$gambarnya = base64_decode($request['image']);
		$filegambar = imagecreatefromstring($gambarnya);
		
	
		
		imagejpeg($filegambar, "images/$png_url");
		imagedestroy($filegambar);
		$barang->photo      = $png_url;
        $barang->save();

        return $this->sendResponse($barang->toArray(),'Barang updated successfull');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        
        return $this->sendResponse($user->toArray(),'Barang succesfull to deleted');
    }
}
