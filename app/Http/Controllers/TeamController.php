<?php
namespace App\Http\Controllers;
use Redirect;
use Auth;
use Session;
use Illuminate\Http\Request;
use URL;
use Illuminate\Support\Facades\Validator;

use App\Models\Team;
use App\Models\Team_category;

use Illuminate\Support\Facades\DB;



class TeamController extends Controller
{
	public function __construct()
	{
		// $this->middleware(['auth','verified']);
	}

	public function index()
	{
		$sorting_array = array();

		$orderby = Request()->orderby;
		$order = Request()->order;

		if(!$orderby && !$order)
		{
			$orderby = 'rank';
			$order = 'asc';
		}

		$column_array = array('id' => 'Id', 'name' => 'Name', 'designation' => 'Designation', 'cat_name' => 'Category', 'rank' => 'Rank', 'status' => 'Status', 'created_at' => 'Created At');

		$search = Request()->search;

		$where = "gs_team.id>0 ";

		if($search)
		{
			$search_column_array = array('gs_team.id' => 'Id', 'gs_team.name' => 'Name', 'gs_team.designation' => 'Designation', 'gs_team_category.name' => 'Category', 'gs_team.rank' => 'Rank', 'gs_team.status' => 'Status', 'gs_team.created_at' => 'Created At');

			$where .= " and (";
			$i=1;
			foreach($search_column_array as $key=>$val)
			{
				if($i>1)
				{
					$where .= " or ";
				}

				$where .= $key." like '%".$search."%'";
				$i++;
			}
			$where .= ")";
		}

		$item_display_per_page = config('admin.pagination');
		$lists = Team::select('gs_team.*','gs_team_category.name as cat_name')
		->leftjoin('gs_team_category', 'gs_team.category_id', '=', 'gs_team_category.id')
		->whereRaw($where)
		->orderBy($orderby, $order)
		->paginate($item_display_per_page);

		foreach($column_array as $key => $value)
		{
			$sorting_class = 'sorting';
			$sorting_url_orderby = $key;
			$sorting_url_order = 'asc';

			if($orderby==$key)
			{
				$sorting_class = ( $order=='asc' ? 'sorting_asc' : 'sorting_desc' );

				$sorting_url_order = ( $order=='asc' ? 'desc' : 'asc' );
			}

			$sorting_url = 'team?'.($search!="" ? 'search='.$search.'&' : '').'orderby='.$sorting_url_orderby.'&order='.$sorting_url_order;

			$sorting_array[$key] = array('sorting_class' => $sorting_class, 'sorting_url' => $sorting_url);
		}

		return view('admin.team.index', compact('lists','column_array','sorting_array','search'));
	}

	public function add()
	{
		$category_list = Team_category::orderBy('rank', 'asc')->get();
		return view('admin.team.add', compact('category_list'));
	}

	public function insert(Request $request)
	{
		$data = $request->all();

		$rules = array(
			//'designation' => 'required|string|max:191',
			'name' => 'required|string|max:191', 
			'status' => 'required|int'
		);
		if($request->hasfile('image'))
		{
			$rules['image'] = 'mimes:jpeg,png,jpg,gif,svg|max:2048';
		}

		$validator = Validator::make($data , $rules);

		if ($validator->fails())
		{
			return Redirect::to('admin/team/add')->withErrors($validator)->withInput(); 
		}
		else
		{
			try {
			$name = $request->name; 
			$status = $request->status;

			$obj = new Team();
			$obj->designation = $request->designation;
			$obj->rank = $request->rank;
			$obj->name = $name;
			$obj->body = $request->body;
			$obj->category_id = $request->category_id;
			$obj->status = $status; 
			if($request->hasfile('image'))
			{
				$image = $request->file('image');
				$filename = $image->getClientOriginalName();
				$filename = str_replace("&", "and", $filename);
				$filename = str_replace(" ", "_", $filename);
				$filename = time().$filename;
				$image->move(public_path().'/uploads/', $filename);
				$obj->image = $filename;
			}
			$obj->save();

			return redirect()->back()->with('success', true);

			} catch (\Exception $e) {
				DB::rollback();
				return Redirect::back()->withErrors(array('errordetailsd' => $e->getMessage()))->withInput($request->all());
			}

		}


	}

	public function edit($id)
	{
		$list = Team::where('id',$id)->first();
		$category_list = Team_category::orderBy('rank', 'asc')->get();
		return view('admin.team.edit', compact('list','category_list'));
	}

	public function update(Request $request)
	{
		$id = $request->id;
		$name = $request->name;
		$status = $request->status;

		$rules = array(
			'name' => 'required|string|max:255',
			'status' => 'required|int',
		);
		if($request->hasfile('image'))
		{
			$rules['image'] = 'mimes:jpeg,png,jpg,gif,svg|max:2048';
		}

		$validator = Validator::make($request->all() , $rules);

		if ($validator->fails())
		{
			return Redirect::to('admin/team/edit/'.$id)->withErrors($validator)->withInput(); 
		}
		else
		{
			try {

			$obj = Team::find($id); 
			$obj->designation = $request->designation;
			$obj->rank = $request->rank;
			$obj->name = $name;
			$obj->body = $request->body;
			$obj->category_id = $request->category_id;
			$obj->status = $status;
			if($request->hasfile('image'))
			{
				if($obj->image!='' && file_exists(public_path().'/uploads/'.$obj->image))
				{
					unlink(public_path().'/uploads/'.$obj->image);
				}
				$image = $request->file('image');
				$filename = $image->getClientOriginalName();
				$filename = str_replace("&", "and", $filename);
				$filename = str_replace(" ", "_", $filename);
				$filename = time().$filename;
				$image->move(public_path().'/uploads/', $filename);
				$obj->image = $filename;
			}
			$obj->save();

			return redirect()->back()->with('success', true);

			} catch (\Exception $e) {
				DB::rollback();
				return Redirect::back()->withErrors(array('errordetailsd' => $e->getMessage()))->withInput(Request()->all());
			}
		}
	}

	public function delete($id)
	{
		$obj = Team::find($id); 
		if($obj->image!='' && file_exists(public_path().'/uploads/'.$obj->image))
		{
			unlink(public_path().'/uploads/'.$obj->image);
		}
		Team::destroy($id);
		return redirect()->back()->with('delete_success', true);
	}

    public function file_destroy($id)
    {
		$obj = Team::find($id);
		if($obj->image!='' && file_exists(public_path().'/uploads/'.$obj->image))
		{
			unlink(public_path().'/uploads/'.$obj->image);
		}
		$obj->image='';
		$obj->save();
		$msg = 'Image deleted successfully.';
        return redirect()->back()->with('file_destroy', $msg);
    }

	public function status($id,$status)
	{
		if ($status==1) {
			$status = '0';
		}else{
			$status = '1';
		}
		$update_array = array('status' => $status);
		DB::table('gs_team')
		->where('id', $id)
		->update($update_array);
		return redirect()->back()->with('status_success', true);
	}
}