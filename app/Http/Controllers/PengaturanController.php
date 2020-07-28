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
}
