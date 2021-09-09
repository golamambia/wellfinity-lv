<?php
namespace App\Http\Controllers;
use Redirect;
use Auth;
use Session;
use Illuminate\Http\Request;
use URL;
use Illuminate\Support\Facades\Validator;

use App\Models\Testimonial_logo;

use Illuminate\Support\Facades\DB;



class Testimonial_logoController extends Controller
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

		$column_array = array('id' => 'Id', 'name' => 'Name', 'rank' => 'Rank', 'status' => 'Status', 'created_at' => 'Created At');

		$search = Request()->search;

		$where = "id>0 ";

		if($search)
		{
			$search_column_array = array('id' => 'Id', 'name' => 'Name', 'rank' => 'Rank', 'status' => 'Status', 'created_at' => 'Created At');

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
		$lists = Testimonial_logo::whereRaw($where)
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

		return view('admin.testimonial_logo.index', compact('lists','column_array','sorting_array','search'));
	}

	public function add()
	{
		return view('admin.testimonial_logo.add');
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
			return Redirect::to('admin/testimonial_logo/add')->withErrors($validator)->withInput(); 
		}
		else
		{
			try {
			$name = $request->name; 
			$status = $request->status;

			$obj = new Testimonial_logo();
			$obj->rank = $request->rank;
			$obj->name = $name;
			// $obj->body = $request->body;
			// $obj->category_id = $request->category_id;
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
		$list = Testimonial_logo::where('id',$id)->first();
		return view('admin.testimonial_logo.edit', compact('list'));
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
			return Redirect::to('admin/testimonial_logo/edit/'.$id)->withErrors($validator)->withInput(); 
		}
		else
		{
			try {

			$obj = Testimonial_logo::find($id); 
			$obj->rank = $request->rank;
			$obj->name = $name;
			// $obj->body = $request->body;
			// $obj->category_id = $request->category_id;
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
		$obj = Testimonial_logo::find($id); 
		if($obj->image!='' && file_exists(public_path().'/uploads/'.$obj->image))
		{
			unlink(public_path().'/uploads/'.$obj->image);
		}
		Testimonial_logo::destroy($id);
		return redirect()->back()->with('delete_success', true);
	}

    public function file_destroy($id)
    {
		$obj = Testimonial_logo::find($id);
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
		DB::table('testimonial_logo')
		->where('id', $id)
		->update($update_array);
		return redirect()->back()->with('status_success', true);
	}
}