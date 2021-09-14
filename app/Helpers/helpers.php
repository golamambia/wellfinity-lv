<?php 
session_start();
// use Session;
// use Auth;
// use Redirect;
use App\Models\User;
use App\Models\Role;

$currency_with_code_array = array('eur' => 'EUR');
$currency_with_icon_array = array('eur' => '€');
define("Currency_With_Code_Array", serialize($currency_with_code_array));
define("Currency_With_Icon_Array", serialize($currency_with_icon_array));

$_SESSION['currency'] = (isset($_SESSION['currency']) && in_array($_SESSION['currency'], $currency_with_code_array)) ? $_SESSION['currency'] : 'eur';

$_SESSION['session_id'] = (isset($_SESSION['session_id'])) ? $_SESSION['session_id'] : session_id();

define("Order_ID", "1000");
define("Short_Description_Length", "100");
define("Short_Title_Length", "20");
define("Ajax_Call_Per_Second", "10");

$page_display_in_array = array('0'=>'None', '1'=>'Header', '2'=>'Footer', '3'=>'Header & Footer');
define("Page_Display_In_Array", serialize($page_display_in_array));

$user_status_array = array('0'=>'Inactive', '1'=>'Active', '2'=>'Delete');
define("User_Status_Array", serialize($user_status_array)); 

$page_template_array = array('0'=>'None','1'=>'Home','2'=>'About Us','3'=>'Services','4'=>'Blog','5'=>'Gallery','6'=>'Privacy Policy',
'7'=>'Contact','8'=>'Service Details','9'=>'Blog Details');//,'3'=>'','4'=>''
define("Page_Template_Array", serialize($page_template_array));

/*$page_template_extra_array['0'] = array('0'=>array('type'=>'0','row'=>'0'));
$page_template_extra_array['1'] = array('0'=>array('type'=>'1','row'=>'1'),'1'=>array('type'=>'2','row'=>'1'),'2'=>array('type'=>'3','row'=>'1'),'3'=>array('type'=>'4','row'=>'3'),'4'=>array('type'=>'4','row'=>'3'));
$page_template_extra_array['0'] = array('0'=>'0');
$page_template_extra_array['1'] = array('1'=>'0','2'=>'1','3'=>'1','4'=>'1','5'=>'3','6'=>'1','7'=>'8','8'=>'1','9'=>'1','10'=>'6','11'=>'1','12'=>'8','13'=>'1','14'=>'1','15'=>'1');

define("Page_Template_Extra_Array", serialize($page_template_extra_array));*/
$form_array = array('0'=>'Contact Form');//
define("Form_Array", serialize($form_array)); 

$page_section_array = array(
  '0'=>'None',
  '1'=>'1. Banner',
  '2'=>'2. Title',
  '3'=>'3. Image',
  '4'=>'4. Content',
  '5'=>'5. Button',
  '6'=>'6. Button Text Only',
  '7'=>'7. Title & Button',
  '8'=>'8. Title & Sub Title',
  '9'=>'9. Title, Sub Title & Image',
  '10'=>'10. Title, Sub Title, Image & Button',
  '11'=>'11. Title, Sub Title, Image & Image2',
  '12'=>'12. Title, Sub Title, Image, Image2 & Button',
  '13'=>'13. Title & Content',
  '14'=>'14. Title, Sub Title & Content',
  '15'=>'15. Title, Sub Title, Content & Button',
  '16'=>'16. Title, Sub Title, Image & Content',
  '17'=>'17. Title, Sub Title, Image, Content & Button',
  '18'=>'18. Title, Sub Title, Image, Image2 & Content',
  '19'=>'19. Title, Sub Title, Image, Image2, Content & Button',
  '20'=>'20. Title, Image, Content & Button',
  '21'=>'21. Title, Image & Content ',
  '22'=>'22. Title, Image, Image2 & Content',
  '23'=>'23. Title, Image, Image2, Content & Button',
);
define("Page_Section_Array", serialize($page_section_array));

function get_orderID($order_id) {
	$od = Order_ID;
	$return = $order_id;
	if (is_int($od)) {
		$return = $od + $return;
	}else{
		$return = $od . $return;
	}
	$return = '#'.$return;
	return $return;
} 

if (!function_exists('get_fields_value')) {
	function get_fields_value_where($tbl_nm, $where, $orderby = "", $order = 'desc',$limit = "") {
		//$where = "status!='2' and (role_id='1' or role_id='1') ";
		if(!$orderby)
		{
			$orderby = 'id';
		}
		if($limit){
			$data = DB::table($tbl_nm)->whereRaw($where)->orderBy($orderby, $order)->limit($limit)->get();
		}else{
			$data = DB::table($tbl_nm)->whereRaw($where)->orderBy($orderby, $order)->get();
		}
		
		return @$data;
	}
}

if (!function_exists('get_field_value')) {
	function get_field_value($tbl_nm, $fld_nm, $search_fld, $row_id, $orderby = "", $order = 'desc',$limit = "") {
		$data = DB::table($tbl_nm)->where($search_fld, $row_id)->first();
		return @$data->$fld_nm;
	}
}

if (!function_exists('get_fields_value')) {
	function get_fields_value($tbl_nm, $search_fld, $row_id, $orderby = "", $order = 'desc',$limit = "") {
		if(!$orderby)
		{
			$orderby = 'id';
		}
		if($limit){
			$data = DB::table($tbl_nm)->where($search_fld, $row_id)->orderBy($orderby, $order)->limit($limit)->get();
		}else{
			$data = DB::table($tbl_nm)->where($search_fld, $row_id)->orderBy($orderby, $order)->get();
		}		
		return @$data;
	}
}

if (!function_exists('get_fields_value2')) {
	function get_fields_value2($tbl_nm, $search_fld, $row_id, $search_fld2, $row_id2, $orderby = "", $order = 'desc',$limit = "") {
		if(!$orderby)
		{
			$orderby = 'id';
		}
		$data = DB::table($tbl_nm)->where($search_fld, $row_id)->where($search_fld2, $row_id2)->orderBy($orderby, $order)->get();
		return @$data;
	}
}

if (!function_exists('get_fields_value3')) {
	function get_fields_value3($tbl_nm, $search_fld, $row_id, $search_fld2, $row_id2, $search_fld3, $row_id3, $orderby = "", $order = 'desc',$limit = "") {
		if(!$orderby)
		{
			$orderby = 'id';
		}
		$data = DB::table($tbl_nm)->where($search_fld, $row_id)->where($search_fld2, $row_id2)->where($search_fld3, $row_id3)->orderBy($orderby, $order)->get();
		return @$data;
	}
}

if (!function_exists('defineOptions')) {

	function defineOptions() {
		$settings = DB::table('mf_settings')->get();
        foreach($settings as $setting)
        {
            // config([$setting->key => $setting->value]);
            define("$setting->key", $setting->value);
        }
	}
}

if (!function_exists('date_convert')) {

	function date_convert($date, $date_format=1){
	  $unx_stamp = strtotime($date);
	  $blank='';
	  if($date!=''){  
	  	switch ($date_format) {
	  		case '1':
	  			$date_str = (date("d/m/Y", $unx_stamp));
	  			break;
	  		case '2':
	  			$date_str = (date("d/m/Y,  h:i A", $unx_stamp));
	  			break;
	  		case '3':
	  			$date_str = (date("F jS, Y", $unx_stamp));
	  			break;
	  		case '4':
	  			$date_str = (date("F jS, Y, h:i A", $unx_stamp));
	  			break;
	  		case '5':
	  			$date_str = (date("m/d/Y", $unx_stamp));
	  			break;
	  		case '6':
	  			if (date("Y", $unx_stamp)==date("Y")) {
	  				$date_str = (date("D, M d", $unx_stamp)); // Thu, Nov 05
	  			}else{
	  				$date_str = (date("D, M d, Y", $unx_stamp)); // Thu, Nov 05, 2021
	  			}	  			
	  			break;
	  		case '7':
	  			$date_str = (date("M d, Y", $unx_stamp)); // Nov 05, 2021
	  			break;
	  		case '8':
	  			$date_str = (date("d M, Y", $unx_stamp)); // 05 Nov, 2021
	  			break;
	  		case '9':
	  			$date_str = (date("h:i", $unx_stamp)); // 05 Nov, 2021
	  			break;
	  		
	  		default:
	  			$date_str = (date("d-m-Y", $unx_stamp));
	  			break;
	  	}
	   return $date_str;

	  }else{
	    return $blank;
	  }
	}
}


if (!function_exists('userDetails')) {

	function userDetails($id) {
		$user = User::select('users.*','roles.display_name as role_name')
				->join('roles', 'users.role_id', '=', 'roles.id')
				->whereRaw("users.status!='2' and users.id='".$id."'")
				->orderBy('users.id', 'desc')
				// ->limit(1)
				->first();
		if (isset($user) && $user->count()>0) {
			
			$avatar_url = ( $user->avatar && File::exists(public_path('uploads/'.$user->avatar)) ) ? url('/uploads/'.$user->avatar) : url('/frontend/images/profile.jpg');
			$user->avatar_url = $avatar_url;
			$retVal = $user;
		}else{
			$retVal = array();
		}
		return $retVal;
	}
}
if (!function_exists('currentUserDetails')) {

	function currentUserDetails() {
		if (Auth::check()){
			$user = Auth::user();
			// $userDetails = ($user->role_id!='1') ? userDetails($user->id) : $user ;
			$userDetails = userDetails($user->id);
		}else{
			$userDetails = array();
		}
		return $userDetails;
	}
}

if (!function_exists('orderid')) {
	function orderid() {
		$salt = "abchefghjkminpqrstuvwxyz0123456789";
		srand((double)microtime() * 1000000);
		$i = 0;
		$pass = "";
		$pass = date('Y');

		while ($i <= 5) {
			$num = rand() % 33;
			$tmp = substr($salt, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}
		return strtoupper($pass);
	}
}

if (!function_exists('random_strings')) {
	// This function will return a random 
	// string of specified length 
	function random_strings($length_of_string=8) 
	{ 
	    // String of all alphanumeric character 
	    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
	  
	    // Shufle the $str_result and returns substring 
	    // of specified length 
	    return substr(str_shuffle($str_result), 0, $length_of_string); 
	}
}

function datediff($interval, $datefrom, $dateto, $using_timestamps = false) {
	/*
		    $interval can be:
		    yyyy - Number of full years
		    q    - Number of full quarters
		    m    - Number of full months
		    y    - Difference between day numbers
		           (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
		    d    - Number of full days
		    w    - Number of full weekdays
		    ww   - Number of full weeks
		    h    - Number of full hours
		    n    - Number of full minutes
		    s    - Number of full seconds (default)
	*/

	if (!$using_timestamps) {
		$datefrom = strtotime($datefrom, 0);
		$dateto = strtotime($dateto, 0);
	}

	$difference = $dateto - $datefrom; // Difference in seconds
	$months_difference = 0;

	switch ($interval) {
	case 'yyyy': // Number of full years
		$years_difference = floor($difference / 31536000);
		if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom) + $years_difference) > $dateto) {
			$years_difference--;
		}

		if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto) - ($years_difference + 1)) > $datefrom) {
			$years_difference++;
		}

		$datediff = $years_difference;
		break;

	case "q": // Number of full quarters
		$quarters_difference = floor($difference / 8035200);

		while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom) + ($quarters_difference * 3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
			$months_difference++;
		}

		$quarters_difference--;
		$datediff = $quarters_difference;
		break;

	case "m": // Number of full months
		$months_difference = floor($difference / 2678400);

		while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom) + ($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
			$months_difference++;
		}

		$months_difference--;

		$datediff = $months_difference;
		break;

	case 'y': // Difference between day numbers
		$datediff = date("z", $dateto) - date("z", $datefrom);
		break;

	case "d": // Number of full days
		$datediff = floor($difference / 86400);
		break;

	case "w": // Number of full weekdays
		$days_difference = floor($difference / 86400);
		$weeks_difference = floor($days_difference / 7); // Complete weeks
		$first_day = date("w", $datefrom);
		$days_remainder = floor($days_difference % 7);
		$odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?

		if ($odd_days > 7) {
			// Sunday
			$days_remainder--;
		}

		if ($odd_days > 6) {
			// Saturday
			$days_remainder--;
		}

		$datediff = ($weeks_difference * 5) + $days_remainder;
		break;

	case "ww": // Number of full weeks
		//$datediff = floor($difference / 604800);
		$datediff = round($difference / 604800);
		break;

	case "h": // Number of full hours
		$datediff = floor($difference / 3600);
		break;

	case "n": // Number of full minutes
		$datediff = floor($difference / 60);
		break;

	case "s": // Number of full seconds
		$datediff = floor($difference);
		break;

	default: // Number of full seconds (default)
		$datediff = $difference;
		break;
	}

	return $datediff;
}

if (!function_exists('description_show')) {
	function description_show($description, $Short_Description_Length = Short_Description_Length) 
	{ 
		$description = strip_tags($description);
	    $str_length = strlen($description);
	    if ($Short_Description_Length<$str_length) {
	    	$return = ''.substr($description, 0, $Short_Description_Length).'...';
	    	//$return .= '<div class="longDesc">'.$description.'</div>';<div class="shortDesc"></div>
	    }else{
	    	$return = ''.$description.'';//<div class="shortDesc"></div>
	    }
	  
	    // Shufle the $str_result and returns substring 
	    // of specified length 
	    return $return; 
	}
}

if (!function_exists('get_rating_html')) {
	function get_rating_html($rating=0, $product_id=0) 
	{ 
		$return = '';
		$no = round($rating,2);
		$no = explode('.', $no);
		$no0 = (@$no[0]>0) ? $no[0] : 0 ;
		$no1 = (@$no[1]>0) ? $no[1] : 0 ;
	    $decimal = floatval('0.'.substr($no1,0,2)); // cut only 2 number
	    $total_star = 5;
		for ($i=0; $i < $no0; $i++) { 
			$total_star--;
			$return .= '<span><img src="'.asset('/frontend/images/star.svg').'"></span>';
		}
	    if($decimal > 0) {
			$total_star--;
	    	$return .= '<span><img src="'.asset('/frontend/images/star.svg').'"></span>';
	    }
		for ($i=0; $i < $total_star; $i++) {
			$return .= '<span><img src="'.asset('/frontend/images/star1.svg').'"></span>';
		}

	    if ($product_id>0) {
	    	$total_count = DB::table('edbg_cart')->whereRaw("product_id='".$product_id."' and rating>0")->count();
	    	if ($total_count<=1) {
	    		$return .= '<div class="review_text">'.$total_count.' Review</div>';
	    	}else{
	    		$return .= '<div class="review_text">'.$total_count.' Reviews</div>';
	    	}	    	
	    }
	    return $return; 
	}
}

if (!function_exists('get_short_name')) {
	function get_short_name($name, $Short_Title_Length = Short_Title_Length) 
	{ 
		$return = $name;
		$return = Str::limit($return, $Short_Title_Length);
	    return $return; 
	}
}





?>