<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\coba;
use App\Models\chat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
class Kontrolku extends Controller
{
    //
    public function __construct()
    {
    	$this-> dataModel = new chat();
    }
    public function index(){

    	$data = [
    		"halo" => "Halllo",
    		"judul" => "Dokumentasi",
    	];
    	return view('example', $data);
    }
    public function getAll($id){
        $data = [
            "pesan" => "Berhasil",
            'data' => $this->dataModel->data()->where('iduser',$id)->get()
        ];
        return $data;
    }
    public function insert(Request $request){
        $validator = Validator::make($request->all(),[
        'email' => [
            'required',
            'unique:user,email'
        ],
        'name' => 'required',
        'password' => 'required'
         ]);


        // Validasi Error
        if ($validator->fails()){
            $msg = $validator->errors();
            Request()->email = null;
        }else{

            // Generate Token
            $token = md5(Request()->name . microtime());
            $this->dataModel->data()->insert([
                'name' => Request()->name,
                'email' => Request()->email,
                'password' => Request()->password,
                'token' => $token,
                'foto' => 'default.png'
            ]);
            $msg = 'Success';
        }

        // Rekam Data
        $data = [
            "Pesan" => $msg,
            'data' => $this->dataModel->data()->where('email', Request()->email)->get()
        ];
        return $data;
    }
    public function pesan(Request $request){
        // csrf_token();
        $validator = Validator::make($request->all(),[
        'iduser_to' => [
            'required',
            'unique:user,email',
            'exists:user,iduser'
        ],
        'iduser_send' => 'required|exists:user,iduser',
        'token' => [
            'required',
            Rule::exists('user')->where(function($query){
                return $query->where('iduser',Request()->iduser_send);
            }),
        ],
         ]);
        $time = now();
        if ($validator->fails()){
            $msg = $validator->errors();
        }else{
            $token = md5(Request()->name . microtime());
            $this->dataModel->msg()->insert([
                'iduser_to' => Request()->iduser_to,
                'iduser_send' => Request()->iduser_send,
                'msg' => Request()->msg,
                'created_at' => $time
            ]);
            $msg = 'Success';
        }
        $data = [
            "Pesan" => $msg,
            'data' => $this->dataModel->msg()->where('iduser_to',Request()->iduser_to)->where('created_at',$time)->get()
        ];
        return $data;
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
        'email' => [
            'required',
            'exists:user,email'
        ],
        'password' => [
            'required',
            Rule::exists('user')->where(function($query){
                return $query->where('email',Request()->email);
            }),
        ],
         ]);
        $time = now();
        if ($validator->fails()){
            $msg = $validator->errors();
        }else{
            #Buat Token
            $token = md5(Request()->email . microtime());

            #Update Data Token
            $data=[
                'token' => $token
            ];
            $this->dataModel->data()->where('email', Request()->email)->update($data);
            $msg = 'Success';
        }
        $data = [
            "Pesan" => $msg,
            'data' => $this->dataModel->data()->where('email',Request()->email)->get()
        ];
        return $data;
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(),[
        'name' => [
            'required'
        ],
        'password' => 'required',
        'token' => [
            'required',
            'exists:user,token',
        ]
         ]);

        // Validasi Error
        if ($validator->fails()){
            $msg = $validator->errors();
            Request()->token = null;
        }else{
            #Simpan Data Terbaru
            $data=[
                'password' => Request()->password,
                'name' => Request()->name,
                'hp' => Request()->hp
            ];

            $this->dataModel->data()->where('token', Request()->token)->update($data);
            $msg = 'Success';
        }

        // Rekam Data
        $data = [
            "Pesan" => $msg,
            'data' => $this->dataModel->data()->where('token', Request()->token)->get()
        ];
        return $data;
    }
    public function updateFoto(Request $request){
        $validator = Validator::make($request->all(),[
        'file' => [
            'required',
            'mimes:jpg,bmp,png'
        ],
        'token' => [
            'required',
            'exists:user,token'
        ]
         ]);

        // Validasi Error
        if ($validator->fails()){
            $msg = $validator->errors();
            Request()->token = null;
        }else{
            // Hapus File terdahulu
            $dataOld = $this->dataModel->data()->select('foto')->where('token', Request()->token)->get();
            $fileOld = $dataOld[0]->foto;
            if($fileOld != 'default.png'){
                @unlink(public_path('/d/').$dataOld[0]->foto);
            }
            
            // Get File IMG
            $file = Request()->file;
            $filename = $file->getClientOriginalName();
            $nameFileNew = md5($filename . microtime()).'.'.$file->extension();
            // echo Request()->nip. "|| $file || $nameFileOld";
            $file->move(public_path('d'),$nameFileNew);

            #Simpan Data Terbaru
            $data=[
                'foto' => $nameFileNew
            ];
            $this->dataModel->data()->where('token', Request()->token)->update($data);
            $msg = 'Success';
        }

        // Rekam Data
        $data = [
            "Pesan" => $msg,
            'data' => $this->dataModel->data()->where('token', Request()->token)->get()
        ];
        return $data;
    }
    public function delfoto(Request $request){
        $validator = Validator::make($request->all(),[
        'email' => [
            'required',
            'exists:user,email'
        ],
        'token' => [
            'required',
            Rule::exists('user')->where(function($query){
                return $query->where('email',Request()->email);
            }),
        ]
         ]);

        // Validasi Error
        if ($validator->fails()){
            $msg = $validator->errors();
            Request()->email = null;
        }else{
            // Hapus File terdahulu
            $dataOld = $this->dataModel->data()->select('foto')->where('email', Request()->email)->get();
            $fileOld = $dataOld[0]->foto;
            if($fileOld != 'default.png'){
                @unlink(public_path('/d/').$dataOld[0]->foto);
            }

            #Simpan Data Terbaru
            $data=[
                'foto' => 'default.png'
            ];
            $this->dataModel->data()->where('email', Request()->email)->update($data);
            $msg = 'Success';
        }

        // Rekam Data
        $data = [
            "Pesan" => $msg,
            'data' => $this->dataModel->data()->where('email', Request()->email)->get()
        ];
        return $data;
    }
    public function del(Request $request){
        $validator = Validator::make($request->all(),[
        'email' => [
            'required',
            'exists:user,email'
        ],
        'token' => [
            'required',
            Rule::exists('user')->where(function($query){
                return $query->where('email',Request()->email);
            }),
        ],
         ]);
        if ($validator->fails()){
            $msg = $validator->errors();
        }else{
            // Hapus Gambar
            $dataOld = $this->dataModel->data()->select('foto')->where('token', Request()->token)->get();
            $iduser = $this->dataModel->data()->select('iduser')->where('token', Request()->token)->get();
            $fileOld = $dataOld[0]->foto;
            if($fileOld != 'default.png'){
                @unlink(public_path('/d/').$dataOld[0]->foto);
            }

            // Hapus Data
            $email = Request()->email;
            $this->dataModel->msg()->where('iduser_send', $iduser[0]->iduser)->delete();
            $this->dataModel->data()->where('email', $email)->delete();
            $msg = 'Success';
        }
        // Ouput JSON
        $data = [
            "Pesan" => $msg,
        ];
        return $data;
    }
    
}
