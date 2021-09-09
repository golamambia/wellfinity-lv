<?php
namespace App\Http\Controllers;
use Redirect;
use Auth;
use Session;
use Illuminate\Http\Request;
use URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

use App\Models\Forms;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Form0Export;
use App\Exports\Form1Export;
use App\Exports\Form2Export;
use App\Exports\Form4Export;
use Illuminate\Support\Facades\DB;



class FormController extends Controller
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
		$form = Request()->form>0?Request()->form:0;

		if(!$orderby && !$order)
		{
			$orderby = 'created_at';
			$order = 'desc';
		}
		if ($form=='0') {
		$column_array = array('id' => 'Id', 'fname' => 'First Name', 'lname' => 'Last Name','email' => 'Email','message' => 'Message', 'created_at' => 'Created At');
		}
		else if ($form=='1') {
			$column_array = array('id' => 'Id', 'name' => 'Name','email' => 'Email','phone' => 'Phone','created_at' => 'Created At');
			
		}else if ($form=='3') {
			$column_array = array('id' => 'Id', 'name' => 'Name','email' => 'Email','phone' => 'Phone','created_at' => 'Created At');
			
		}else if ($form=='4') {
			$column_array = array('id' => 'Id', 'name' => 'Name','email' => 'Email','phone' => 'Phone','created_at' => 'Created At');
			
		}else{
			$column_array = array('id' => 'Id', 'fname' => 'First Name', 'lname' => 'Last Name','email' => 'Email','message' => 'Message','created_at' => 'Created At');
		}

		$search = Request()->search;

		$where = "type='".$form."' ";

		if($search)
		{
			//$search_column_array = array('id' => 'Id', 'name' => 'Name','email' => 'Email', 'created_at' => 'Created At');

			$where .= " and (";
			$i=1;
			foreach($column_array as $key=>$val)
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
		$lists = Forms::whereRaw($where)
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

			$sorting_url = 'forms?'.($search!="" ? 'search='.$search.'&' : '').'orderby='.$sorting_url_orderby.'&order='.$sorting_url_order;

			$sorting_array[$key] = array('sorting_class' => $sorting_class, 'sorting_url' => $sorting_url);
		}

		return view('admin.form.index', compact('lists','column_array','sorting_array','search','form'));
	}

	public function view($id)
	{
		$list = Forms::where('id',$id)->first();
		if (!$list) {
			return Redirect::to('admin/forms');
		}
		return view('admin.form.view', compact('list'));
	}

	public function delete($id)
	{
		Forms::destroy($id);
		return redirect()->back()->with('delete_success', true);
	}

	public function export($type) 
    {
		try {
		    if ($type=='1') {
	        	return Excel::download(new Form1Export, 'form-data.xlsx');
		    }elseif ($type=='2') {
	        	return Excel::download(new Form2Export, 'form-data.xlsx');
		    }else if ($type=='3') {
	        	return Excel::download(new Form1Export, 'form-data.xlsx');
		    }else if ($type=='4') {
	        	return Excel::download(new Form4Export, 'form-data.xlsx');
		    }
		    else{
	        	return Excel::download(new Form0Export, 'form-data.xlsx');
		    }
			// Session::flash('message', 'Exported form data successfully.');
	        // return redirect()->back()->with('export_success', true);
		} catch (\Exception $e) {
			return Redirect::back()->withErrors(array('errordetailsd' => $e->getMessage()));
		}
    }

	public function export1($type)
	{
		$lists = Forms::where('type',$type)->orderBy('created_at', 'desc')->get();

	    $headers = array(
	        "Content-type" => "text/csv",
	        "Content-Disposition" => "attachment; filename=file.csv",
	        "Pragma" => "no-cache",
	        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
	        "Expires" => "0"
	    );
	    if ($type=='1') {
	    	$columns = array('ID', 'First Name', 'Last Name', 'Email', 'Phone', 'Job Function', 'I want to...', 'How can We Help?', 'Created');
	    }elseif ($type=='2') {
	    	$columns = array('ID', 'Name', 'Email', 'Phone', 'What Country are you located', 'Where do you want to expand', 'How can We Help?', 'Created');
	    }else{
	    	$columns = array('ID', 'Name', 'Email', 'Company', 'Phone', 'Which Country You area Looking for Services', 'Where are you located?', 'What can we help you with?', 'Remarks', 'Created');
	    }
	    

	    $callback = function() use ($lists, $columns)
	    {
	        $file = fopen('php://output', 'w');
	        fputcsv($file, $columns);

	        foreach($lists as $list) {
	    		if ($type=='1') {
	            	fputcsv($file, array($list->id, $list->fname, $list->lname, $list->email, $list->phone, $list->function, $list->want, $list->help, $list->created_at));
	            }elseif ($type=='2') {
	            	fputcsv($file, array($list->id, $list->name, $list->email, $list->phone, $list->country, $list->expand, $list->help, $list->created_at));
	            }else{
	            	fputcsv($file, array($list->id, $list->name, $list->email, $list->company, $list->phone, $list->service, $list->located, $list->help, $list->remark, $list->created_at));
	            }
	        }
	        fclose($file);
	    };
	    return Response::stream($callback, 200, $headers);
	    // return response()->stream($callback, 200, $headers);
		//return view('admin.form.view', compact('list'));
	}
}