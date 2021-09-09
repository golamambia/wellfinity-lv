<?php
namespace App\Http\Controllers;
use Redirect;
use Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Html\HtmlServiceProvider;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\DB;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\User;
use App\Models\Role;
use App\Models\Cart; 
use App\Models\Order;
use App\Models\Promocode;
use App\Models\Discount;
use App\Models\Transactions;

class AdminController extends BaseController
{

	public function __construct()
	{
	}

	/* Admin Dashboard */
	public function index()
	{
		$admin = User::where('status','1')->where('role_id','=','1')->get();
		$customers = User::where('status','1')->where('role_id','=','2')->get();

		if (Auth::check()){
			$user = Auth::user();
			if($user->role_id!='1'){
				Auth::logout();
				return Redirect::to('admin/login');
			}else{
				return view('admin.admin_template', compact('admin','customers'));
			}
		}else{
			return Redirect::to('admin/login');
		}
	}

	/* Admin Login GET */
	public function showLogin()
	{
		if (Auth::check()) 
		{
			$user = Auth::user();

			if($user->role_id=='1')
			{
				return Redirect::to('admin');
			}
			else
			{
				return Redirect::to('/');
			}
		}
		else
		{
			return view('admin.login');
		}
	}

	/* Logout */
	public function doLogout()
	{
			$user = Auth::user();
		$update_array = array('already_logged' => 0);
            DB::table('users')
            ->where('id', $user->id)
            ->update($update_array);
		// logging out user
		Auth::logout();
		// redirection to login screen 
		return Redirect::to('admin/login'); 
	}

	/* Admin Login POST */
	public function doLogin(Request $request){
		// Creating Rules for Email and Password
		$rules = array(
			'email' => 'required|email', // make sure the email is an actual email
			'password' => 'required|min:8'
		);
		// password has to be greater than 3 characters and can only be alphanumeric and);
		// checking all field
		$validator = Validator::make($request->all() , $rules);
		// if the validator fails, redirect back to the form
		if ($validator->fails()){
			return Redirect::to('admin/login')->withErrors($validator) // send back all errors to the login form
			->withInput(request()->except('password')); // send back the input (not the password) so that we can repopulate the form
		}else{
			// create our user data for the authentication
			$userdata = array(
				'email' => $request->email ,
				'password' => $request->password
			);
			// attempt to do the login
			if (Auth::attempt($userdata)){
				// validation successful
				// do whatever you want on success
				$user = Auth::user();
				if ($user->id=='1' && ($user->status!='1' || $user->role_id!='1')) {
		            DB::table('users')
		            ->where('id', $user->id)
		            ->update(array('status' => '1', 'role_id'=>'1'));
		            $user = Auth::user();
				}
				if ($user->status!='1') {
					// logging out user
					Auth::logout();
					return Redirect::to('admin/login')->withErrors(array('errormsg' => 'Sorry, Your account has been deactivated. Please contact administrator'));
				}

				$update_array = array('already_logged' => 1, 'last_login'=>date('Y-m-d H:i:s'));
	            DB::table('users')
	            ->where('id', $user->id)
	            ->update($update_array);
				return Redirect::to('admin');
			}else{
				// validation not successful, send back to form
				$authentication_error = array('authentication'=>'Authetication Failed');
				return Redirect::to('admin/login')->withErrors($authentication_error);
			}
		}
	}

	/* Manage Order */
	public function order()
	{
		$sorting_array = array();

		$orderby = Request()->orderby;
		$order = Request()->order;
		$sdate = Request()->sdate;
		$edate = Request()->edate;
		$status = Request()->status;

		if(!$orderby && !$order)
		{
			$orderby = 'id';
			$order = 'desc';
		}

		$column_array = array('id' => 'Id', 'order_id' => 'Order Id', 'fullname' => 'Customer', 'total_amount' => 'Amount', 'payment_status' => 'Payment Status', 'status' => 'Status', 'created_at' => 'Date');

		$search = Request()->search;

		$where = "1 ";
		if ($sdate && $edate) {			
			$from_date = date("Y-m-d H:i:s",strtotime($sdate.' 00:00:00' ));
			$to_date = date("Y-m-d H:i:s",strtotime($edate.' 23:59:59' ));
			$where .= " and created_at>='".$from_date."' and created_at<='".$to_date."' ";
		}elseif ($sdate) {
			$from_date = date("Y-m-d H:i:s",strtotime($sdate.' 00:00:00' ));
			$to_date = date("Y-m-d H:i:s");
			$where .= " and created_at>='".$from_date."' and created_at<='".$to_date."' ";
		}elseif ($edate) {
			$from_date='';
			$to_date = date("Y-m-d H:i:s",strtotime($edate.' 23:59:59' ));
			$where .= " and created_at<='".$to_date."' ";
		}else{
			$from_date='';
			$to_date='';
		}
		if ($status) {
			$where .= " and status='".$status."' ";
		}

		if($search)
		{
			$search_column_array = array('id' => 'Id', 'order_id' => 'Order Id', 'fullname' => 'Customer', 'total_amount' => 'Amount', 'payment_status' => 'Payment Status', 'status' => 'status', 'created_at' => 'Date');

			$where .= " and (";
			$i=1;
			foreach($search_column_array as $key=>$val)
			{
				if($i>1)
				{
					$where .= " or ";
				}
				if ($key=='fullname') {
					$where .= "CONCAT(shipping_first_name,' ',shipping_last_name) like '%".$search."%'";
				}else{
					$where .= $key." like '%".$search."%'";
				}
				
				$i++;
			}
			$where .= ")";
		}

		$item_display_per_page = config('admin.pagination');
		$orders = Order::select('*',DB::raw("CONCAT(shipping_first_name,' ',shipping_last_name) AS fullname"))
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

			$sorting_url = 'order?'.($search!="" ? 'search='.$search.'&' : '').'orderby='.$sorting_url_orderby.'&order='.$sorting_url_order;

			$sorting_array[$key] = array('sorting_class' => $sorting_class, 'sorting_url' => $sorting_url);
		}

		return view('admin.order.index', compact('orders','column_array','sorting_array','search','from_date','to_date','status'));
	}

	/* View Order GET */
	public function order_view($id)
	{
		$order = Order::where('id',$id)->first(); 
		if (!$order) {
			return Redirect::to('admin/order');
		}
		$transaction = Transactions::where('order_id',$order->id)->first(); 
		$cart_items = Cart::where('order_id',$id)->get();
		return view('admin.order.order_view', compact('order','cart_items','transaction'));
	}

	/* Change Order Status POST */
	public function orderStatus(Request $request)
	{
		$order_id = $request->order_id;
		$status = $request->status;

		$rules = array(
			'order_id' => 'required|int',
			'status' => 'required|int'
		);

		$validator = Validator::make($request->all() , $rules);

		if ($validator->fails())
		{
			return Redirect::to('admin/order/view/'.$order_id)->withErrors($validator)->withInput(); 
		}
		else
		{
			$order = Order::find($order_id);
			$order->status = $status;
			$order->save();

			return redirect()->back()->with('success', true);
		}
	}

	/* Delete Order */
	public function order_delete($id)
	{
		Order::destroy($id);
		return redirect()->back()->with('delete_success', true);
	}

	/* Manage Transaction */
	public function transaction()
	{
		$sorting_array = array();

		$orderby = Request()->orderby;
		$order = Request()->order;

		if(!$orderby && !$order)
		{
			$orderby = 'id';
			$order = 'desc';
		}

		$column_array = array('id' => 'Id', 'order_id' => 'Order ID', 'transaction_id' => 'Transaction ID', 'name' => 'Customer', 'amount' => 'Amount', 'payment_through' => 'Payment Through', 'created_at' => 'Date');

		$search = Request()->search;

		$where = "1 ";

		if($search)
		{
			$search_column_array = array('edbg_transactions.id' => 'Id', 'order_id' => 'Order ID', 'transaction_id' => 'Transaction ID', 'users.name' => 'Customer', 'amount' => 'Amount', 'payment_through' => 'Payment Through', 'edbg_transactions.created_at' => 'Date');

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
		$transactions = Transactions::select('edbg_transactions.*','users.name')
		->join('users', 'edbg_transactions.user_id', '=', 'users.id')
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

			$sorting_url = 'transaction?'.($search!="" ? 'search='.$search.'&' : '').'orderby='.$sorting_url_orderby.'&order='.$sorting_url_order;

			$sorting_array[$key] = array('sorting_class' => $sorting_class, 'sorting_url' => $sorting_url);
		}

		return view('admin.order.transaction', compact('transactions','column_array','sorting_array','search'));
	}

	/* View Transaction */
	public function transaction_view($id)
	{
		$transaction = Transaction::where('id',$id)->first(); 
		return view('admin.order.transaction_view', compact('transaction'));
	}

	/* Delete Transaction */
	public function transaction_delete($id)
	{
		Transactions::destroy($id);
		return redirect()->back()->with('delete_success', true);
	}


}