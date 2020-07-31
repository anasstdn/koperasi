<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Traits\ActivityTraits;
use Illuminate\Support\Facades\Auth;
use App\Models\Perusahaan;
use App\Models\Profile;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Support\Facades\DB;
use Response;
use DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\ConfigId;

class PengaturanController extends Controller
{
    //
    use ActivityTraits;

	public function __construct()
	{
		$this->middleware('auth');
		// $this->middleware('permission:read-pengaturan');
	}

	public function index()
	{
		$this->menuAccess(\Auth::user(),'Pengaturan');
		return view('pengaturan.index');
	}

	public function getData()
	{
		$GLOBALS['nomor']=\Request::input('start',1)+1;
		$dataList = ConfigId::select('*')
		->get();

		if (request()->get('status') == 'trash') {
			$dataList->onlyTrashed();
		}
		return DataTables::of($dataList)
		->addColumn('nomor',function($kategori){
			return $GLOBALS['nomor']++;
		})
		->addColumn('action', function ($data) {
			$edit=url("pengaturan/".$data->id)."/edit";
			$delete=url("pengaturan/".$data->id)."/delete";
			$content = '';
			$content .= "<a onclick='show_modal(\"$edit\")' style='color:white' class='btn btn-primary btn-sm' data-toggle='tooltip' data-original-title='Edit'><i class='fa fa-edit' aria-hidden='true'></i></a>";
			$content .= " <a onclick='hapus(\"$delete\")' style='color:white' class='btn btn-danger btn-sm' data-toggle='tooltip' data-original-title='Hapus'><i class='fa fa-trash' aria-hidden='true'></i></a>";

			return $content;
		})
		->make(true);
	}

	public function store(Request $request)
	{
		$all_data=$request->all();

		if($all_data['mode']=='perusahaan')
		{
			$validation = Validator::make($request->all(), [
				'nama_ps'  		=> 'required',
				'alamat_ps'		=> 'required',
				'email_ps'		=> 'required',
				'telp_ps'		=> 'required',
				'tgl_berdiri_ps'=> 'required',
				'flag_aktif'	=> 'required',
			]);

			if (!$validation->passes()){
				$count_err=count($validation->errors()->all());
				$i=0;
				foreach($validation->errors()->all() as $val)
				{
					message(false,'',$val);
					$i++;
				}
				if($count_err==$i)
				{
					return redirect('/pengaturan');
				}
			}

			DB::beginTransaction();
			try {

				$data=array(
					'nama_ps'  	=>  $all_data['nama_ps'],
					'alamat_ps' 	=>  $all_data['alamat_ps'],
					'email_ps'	=>  $all_data['email_ps'],
					'alamat_ps'	=>  $all_data['description'],
				);

				$this->logCreatedActivity(Auth::user(),$data,'Config ID','config_ids');
				$act=ConfigId::create($data);

				message($act,'Data berhasil disimpan!','Data gagal disimpan!');

			}catch (Exception $e) {
				echo 'Message' .$e->getMessage();
				DB::rollback();
			}
			DB::commit();
		}
		elseif($all_data['mode']=='user_settings')
		{

		}

		return redirect('/pengaturan');
	}

	public function createConfig()
	{
		$title='Form Config ID';
        $mode='create';
        $url=route('pengaturan.simpan-config');
		$this->menuAccess(\Auth::user(),'Pegawai (Nonaktifkan)');
        return view('pengaturan.popup',compact('title','mode','id','url'));
	}

	public function simpanConfig(Request $request)
	{
		$all_data=$request->all();

		$validation = Validator::make($request->all(), [
            'config_name'  	=> 'required',
            'config_value'	=> 'required',
        ]);

        if (!$validation->passes()){
            $count_err=count($validation->errors()->all());
            $i=0;
            foreach($validation->errors()->all() as $val)
            {
                message(false,'',$val);
                $i++;
            }
            if($count_err==$i)
            {
                return redirect('/pengaturan');
            }
        }

        DB::beginTransaction();
        try {

                $data=array(
                    'config_name'  	=>  $all_data['config_name'],
                    'table_source' 	=>  $all_data['table_source'],
                    'config_value'	=>  $all_data['config_value'],
                    'description'	=>  $all_data['description'],
                );

            $this->logCreatedActivity(Auth::user(),$data,'Config ID','config_ids');
        	$act=ConfigId::create($data);

            message($act,'Data berhasil disimpan!','Data gagal disimpan!');

        }catch (Exception $e) {
            echo 'Message' .$e->getMessage();
            DB::rollback();
        }
        DB::commit();

        return redirect('/pengaturan');
    }

	public function editConfig(Request $request, $id)
	{  
		$title='Form Config ID';
        $mode='edit';
        $data=ConfigId::find($id);
        $url=action('PengaturanController@updateConfig', $id);
		$this->menuAccess(\Auth::user(),'Config ID');
        return view('pengaturan.popup',compact('title','mode','id','url','data'));
	}

	public function updateConfig(Request $request, $id)
	{
		$all_data=$request->all();

		$validation = Validator::make($request->all(), [
            'config_name'  	=> 'required',
            'config_value'	=> 'required',
        ]);

        if (!$validation->passes()){
            $count_err=count($validation->errors()->all());
            $i=0;
            foreach($validation->errors()->all() as $val)
            {
                message(false,'',$val);
                $i++;
            }
            if($count_err==$i)
            {
                return redirect('/pengaturan');
            }
        }

        DB::beginTransaction();
        try {

        	$get=ConfigId::find($id);

            $data=array(
                'config_name'  	=>  $all_data['config_name'],
                'table_source' 	=>  $all_data['table_source'],
                'config_value'	=>  $all_data['config_value'],
                'description'	=>  $all_data['description'],
            );

            $this->logUpdatedActivity(Auth::user(),$get->getAttributes(),$data,'Config ID','config_ids');
        	$act=$get->update($data);

            message($act,'Data berhasil disimpan!','Data gagal disimpan!');

        }catch (Exception $e) {
            echo 'Message' .$e->getMessage();
            DB::rollback();
        }
        DB::commit();

        return redirect('/pengaturan');
	}

	public function destroy(Request $request,$kode)
	{
		$user=ConfigId::find($kode);
		$act=false;
		try {
			$this->logDeletedActivity($user,'Delete data id='.$kode.' di menu Config ID','Config ID','config_ids');
			$act=$user->forceDelete();
			message($act,'Data berhasil dihapus!','Data gagal dihapus!');
		} catch (\Exception $e) {
			$this->logDeletedActivity($user,'Delete data id='.$kode.' di menu Config ID','Config ID','config_ids');
			$user=ConfigId::find($user->id);
			$act=$user->delete();
			message($act,'Data berhasil dihapus!','Data gagal dihapus!');
		}
	}

}
