<?php
namespace App\Http\Controllers;
use Redirect;
use Session;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\Page;
use App\Models\PageExtra;
use App\Models\User;
use App\Models\Category; 
use App\Models\Country;
use App\Models\Settings;
use App\Models\Forms;

use Illuminate\Support\Facades\DB;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

use File;

class ServiceController extends Controller
{
	public function __construct()
	{

	}

	/* Admin Manage Page Get*/
	public function index()
	{
		$sorting_array = array();

		$orderby = Request()->orderby;
		$order = Request()->order;

		if(!$orderby && !$order)
		{
			$orderby = 'menu_order';
			$order = 'asc';
		}

		$column_array = array('id' => 'Id', 'page_name' => 'Location Name', 'parent_id' => 'Parent', 'menu_order' => 'Order');
		$search = Request()->search;
		$where = "posttype='location' ";

		if($search)
		{
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
		$pages = Page::select('pages.*')
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

			$sorting_url = 'page?'.($search!="" ? 'search='.$search.'&' : '').'orderby='.$sorting_url_orderby.'&order='.$sorting_url_order;

			$sorting_array[$key] = array('sorting_class' => $sorting_class, 'sorting_url' => $sorting_url);
		}

		return view('admin.location.index', compact('pages','column_array','sorting_array','search'));
	}


	/* Admin Add Page Get*/
	public function add()
	{
		$all_pages = Page::get();
		return view('admin.location.add', compact('all_pages'));
	}

	/* Admin insert Page Post*/
	public function insert(Request $request)
	{
		$id = $request->id;

		$rules = array(
			'page_name' => 'required|string|max:255',
			'slug' => 'required|string|max:255|unique:pages',
			// 'display_in' => 'required|integer',
			// 'parent_id' => 'required|integer',
		);

		$validator = Validator::make($request->all() , $rules);

		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator)->withInput($request->all()); 
		}
		else
		{ 
			try {
				$slug = $request->slug;
				$page_name = $request->page_name;
				$page_title = $request->page_title;
				$bannertext = $request->bannertext;
				$body = $request->body;
				$posttype = $request->posttype;
				$meta_title = $request->meta_title;
				$meta_keyword = $request->meta_keyword;
				$meta_description = $request->meta_description;
				$parent_id = $request->parent_id;
				$display_in = $request->display_in;
				$menu_order = $request->menu_order;
				$menu_link = $request->menu_link;
		$page_template = $request->page_template>0?$request->page_template:0;

				$update_array = array('page_name' => $page_name, 'page_title' => $page_title, 'bannertext' => $bannertext, 'body' => $body, 'posttype' => $posttype, 'meta_title' => $meta_title, 'meta_keyword' => $meta_keyword, 'meta_description' => $meta_description, 'display_in' => $display_in, 'menu_order' => $menu_order, 'menu_link' => $menu_link);//, 'parent_id' => $parent_id

					$update_array['schema_code'] = $request->schema_code;
				if($request->hasfile('bannerimage'))
				{
					$bannerimage = $request->file('bannerimage');
					$filename = $bannerimage->getClientOriginalName();
					$filename = str_replace("&", "and", $filename);
					$filename = str_replace(" ", "_", $filename);
					$filename = time().$filename;
					$bannerimage->move(public_path().'/uploads/', $filename);  
					$update_array['bannerimage'] = $filename;
				}

				if ($slug) {
					$update_array['slug'] = $slug;
				}

				$update_array['page_template'] = $page_template;
				$page_id = DB::table('pages')->insertGetId($update_array);
				// print_r($page_id);exit();

				if ( isset($request->section_type) && count($request->section_type)>0) {
						$section_type = $request->section_type;
						$coun_img1 = $coun_img3 = $coun_img9 = $coun_img10 = $coun_img11 = $coun_img12 = $coun_img15 = $coun_img16 = $coun_img17 = $coun_img18 = 0;
						$coun2_img11 = $coun2_img12 = $coun2_img17 = $coun2_img18 = 0;
					for ($i=0; $i < count($request->section_type); $i++) {
						$cur_section_type = $section_type[$i];
						if ($cur_section_type=='1') {
							$type=1;
						}else{
							$type=$i + 1;
						}

						$max_rank = get_fields_value_where('pages_extra',"page_id='".$page_id."' and type='".$type."'",'rank','desc');
						$rank = ($max_rank && count($max_rank)>0) ? $max_rank[0]->rank + 1 : 1 ;

						$a ='section_new_t';
						$section_new_t = $request->$a;
						$b ='section_new_st';
						$section_new_st = $request->$b;
						$c ='section_new_c';
						$section_new_c = $request->$c;
						$d ='section_new_btn_text';
						$section_new_btn_text = $request->$d;
						$e ='section_new_btn_url';
						$section_new_btn_url = $request->$e;

						$section_new_img = $request->section_new_img;
						$section_new_img2 = $request->section_new_img2;

						@$title = $section_new_t[$i];
						@$sub_title = $section_new_st[$i];
						@$body = $section_new_c[$i];
						@$btn_text = $section_new_btn_text[$i];
						@$btn_url = $section_new_btn_url[$i];
						$image = '';
						$image2 = '';

						$obj = new PageExtra;
						$obj->page_id = $page_id;
						$obj->type = $type;
						$obj->section_type = $cur_section_type;
						if ( isset($section_new_img) && count($section_new_img)>0) {
							if($request->hasfile('section_new_img'))
							{
								$cur_img_count = 0;
								foreach($request->file('section_new_img') as $file){
									if ($cur_img_count==$i) {
										$filename = $file->getClientOriginalName();
										$filename = str_replace("&", "and", $filename);
										$filename = str_replace(" ", "_", $filename);
										$filename = time().$filename;
										$file->move(public_path().'/uploads/', $filename);
										$image = $filename;
									}
									$cur_img_count++;
								}
							}
						}
						if ( isset($section_new_img2) && count($section_new_img2)>0) {
							if($request->hasfile('section_new_img2'))
							{
								$cur_img_count = 0;
								foreach($request->file('section_new_img2') as $file){
									if ($cur_img_count==$i) {
										$filename = $file->getClientOriginalName();
										$filename = str_replace("&", "and", $filename);
										$filename = str_replace(" ", "_", $filename);
										$filename = time().$filename;
										$file->move(public_path().'/uploads/', $filename);
										$image2 = $filename;
									}
									$cur_img_count++;
								}
							}
						}/**/

						$obj->title = $title;
						$obj->sub_title = $sub_title;
						$obj->body = $body;
						$obj->btn_text = $btn_text;
						$obj->btn_url = $btn_url;
						$obj->image = $image;
						$obj->image2 = $image2;
						$obj->rank = $rank;
						$obj->save();

							//DB::insert('insert into pages_extra (page_id, type, section_type, title, sub_title, body, btn_text, body, btn_url) values (?, ?, ?, ?)', [$id, $type, $cur_section_type, $title, $sub_title, $body, $btn_text, $btn_url, $image, $image2]);
					}
				}

				//return redirect()->back()->with('success', true);
				return Redirect::to('admin/location/edit/'.$page_id)->with('admin_msg', 'Page has been added successfully.');

			} catch (\Exception $e) {
				DB::rollback();
				return Redirect::back()->withErrors(array('errordetailsd' => $e->getMessage()))->withInput($request->all());
			}

		}
	}

	/* Admin Update Page Get*/
	public function edit($id)
	{
		$all_pages = Page::where('id','!=',$id)->get();
		$page = Page::where('id',$id)->get();
		$page_extra = PageExtra::where('page_id',$id)->orderBy('type', 'asc')->orderBy('rank', 'asc')->get();

		return view('admin.location.edit', compact('page','page_extra','all_pages'));
	}

	/* Admin Update Page Post*/
	public function update(Request $request)
	{
		$id = $request->id;
		$page_extra = PageExtra::where('page_id',$id)->orderBy('type', 'asc')->get();//where('type', '!=', '1')->

		$slug = $request->slug;
		$page_name = $request->page_name;
		$page_title = $request->page_title;
		$bannertext = $request->bannertext;
		$body = $request->body;
		$posttype = $request->posttype;
		$meta_title = $request->meta_title;
		$meta_keyword = $request->meta_keyword;
		$meta_description = $request->meta_description;
		$parent_id = $request->parent_id;
		$display_in = $request->display_in;
		$menu_order = $request->menu_order;
		$menu_link = $request->menu_link;
		$page_template = $request->page_template>0?$request->page_template:0;

		$rules = array(
			'page_name' => 'required|string|max:255',
			'slug' => 'required|string|max:255|unique:pages,slug,'.$id,
			//'display_in' => 'required|integer',
			//'parent_id' => 'required|integer',
		);

		if($request->hasfile('bannerimage'))
		{
			$rules['bannerimage'] = 'mimes:jpeg,png,jpg,gif,svg|max:2048';
		}

		$validator = Validator::make($request->all() , $rules);

		if ($validator->fails())
		{
			return Redirect::to('admin/location/edit/'.$id)->withErrors($validator) 
			->withInput(); 
		}
		else
		{
			foreach ($page_extra as $val) {
				$x ='section_title_'.$val->id;
				$page_extra_title = $request->$x;
				$y ='section_sub_title_'.$val->id;
				$page_extra_sub_title = $request->$y;
				$z ='section_body_'.$val->id;
				$page_extra_body = $request->$z;
				$a ='section_btn_text_'.$val->id;
				$page_extra_btn_text = $request->$a;
				$b ='section_btn_url_'.$val->id;
				$page_extra_btn_url = $request->$b;
				$c ='section_rank_'.$val->id;
				$page_extra_rank = $request->$c;
				$update_array1 = array('title' => $page_extra_title,'body' => $page_extra_body,'sub_title' => $page_extra_sub_title,'btn_text' => $page_extra_btn_text,'btn_url' => $page_extra_btn_url);
				if ($page_extra_rank>0) {
					$update_array1['rank'] = $page_extra_rank;
				}
				if($request->hasfile('section_file_'.$val->id))
				{
					if($val->image!='' && file_exists(public_path().'/uploads/'.$val->image))
					{
						unlink(public_path().'/uploads/'.$val->image);
					}
					$file = $request->file('section_file_'.$val->id);
					$filename = $file->getClientOriginalName();
					$filename = str_replace("&", "and", $filename);
					$filename = str_replace(" ", "_", $filename);
					$filename = time().$filename;
					$file->move(public_path().'/uploads/', $filename);  
					$update_array1['image'] = $filename;
				}
				if($request->hasfile('section_file2_'.$val->id))
				{
					if($val->image2!='' && file_exists(public_path().'/uploads/'.$val->image2))
					{
						unlink(public_path().'/uploads/'.$val->image2);
					}
					$file = $request->file('section_file2_'.$val->id);
					$filename = $file->getClientOriginalName();
					$filename = str_replace("&", "and", $filename);
					$filename = str_replace(" ", "_", $filename);
					$filename = time().$filename;
					$file->move(public_path().'/uploads/', $filename);  
					$update_array1['image2'] = $filename;
				}
				DB::table('pages_extra')->where('id', $val->id)->update($update_array1);
			}

			$update_array = array('page_name' => $page_name, 'page_title' => $page_title, 'bannertext' => $bannertext, 'body' => $body, 'posttype' => $posttype, 'meta_title' => $meta_title, 'meta_keyword' => $meta_keyword, 'meta_description' => $meta_description, 'display_in' => $display_in, 'menu_order' => $menu_order, 'menu_link' => $menu_link, 'parent_id' => $parent_id);//

				$update_array['page_template'] = $page_template;
					$update_array['schema_code'] = $request->schema_code;
			if ($slug && $id!='1') {
				$update_array['slug'] = $slug;
			}

				if($request->hasfile('bannerimage'))
				{
					$page = Page::where('id',$id)->first();
					if($page->bannerimage!='' && file_exists(public_path().'/uploads/'.$page->bannerimage))
					{
						unlink(public_path().'/uploads/'.$page->bannerimage);
					}

					$bannerimage = $request->file('bannerimage');
					$filename = $bannerimage->getClientOriginalName();
					$filename = str_replace("&", "and", $filename);
					$filename = str_replace(" ", "_", $filename);
					$filename = time().$filename;
					$bannerimage->move(public_path().'/uploads/', $filename);  
					$update_array['bannerimage'] = $filename;
				}

			DB::table('pages')
			->where('id', $id)
			->update($update_array);

					$page_id = $id;

				if ( isset($request->section_type) && count($request->section_type)>0) {
						$section_type = $request->section_type;
						$type = $request->type;
						$coun_img1 = $coun_img3 = $coun_img9 = $coun_img10 = $coun_img11 = $coun_img12 = $coun_img15 = $coun_img16 = $coun_img17 = $coun_img18 = 0;
						$coun2_img11 = $coun2_img12 = $coun2_img17 = $coun2_img18 = 0;
					for ($i=0; $i < count($request->section_type); $i++) {
						$cur_section_type = $section_type[$i];
						$cur_type = $type[$i];
						if ($cur_type=='add') {
							$max_types = get_fields_value_where('pages_extra',"page_id='".$page_id."'",'type','desc');
							$max_type = ($max_types && count($max_types)>0) ? $max_types[0]->type + 1 : 1 ;
							$cur_type = $max_type;
						}
					  if ($cur_type>0 && $cur_section_type>0) {

						$max_rank = get_fields_value_where('pages_extra',"page_id='".$page_id."' and type='".$cur_type."'",'rank','desc');
						$rank = ($max_rank && count($max_rank)>0) ? $max_rank[0]->rank + 1 : 1 ;

						$a ='section_new_t';
						$section_new_t = $request->$a;
						$b ='section_new_st';
						$section_new_st = $request->$b;
						$c ='section_new_c';
						$section_new_c = $request->$c;
						$d ='section_new_btn_text';
						$section_new_btn_text = $request->$d;
						$e ='section_new_btn_url';
						$section_new_btn_url = $request->$e;

						$section_new_img = $request->section_new_img;
						$section_new_img2 = $request->section_new_img2;

						@$title = $section_new_t[$i];
						@$sub_title = $section_new_st[$i];
						@$body = $section_new_c[$i];
						@$btn_text = $section_new_btn_text[$i];
						@$btn_url = $section_new_btn_url[$i];
						$image = '';
						$image2 = '';

						$obj = new PageExtra;
						$obj->page_id = $page_id;
						$obj->type = $cur_type;
						$obj->section_type = $cur_section_type;
						if ( isset($section_new_img) && count($section_new_img)>0) {
							if($request->hasfile('section_new_img'))
							{
								$cur_img_count = 0;
								foreach($request->file('section_new_img') as $file){
									if ($cur_img_count==$i) {
										$filename = $file->getClientOriginalName();
										$filename = str_replace("&", "and", $filename);
										$filename = str_replace(" ", "_", $filename);
										$filename = time().$filename;
										$file->move(public_path().'/uploads/', $filename);
										$image = $filename;
									}
									$cur_img_count++;
								}
							}
						}
						if ( isset($section_new_img2) && count($section_new_img2)>0) {
							if($request->hasfile('section_new_img2'))
							{
								$cur_img_count = 0;
								foreach($request->file('section_new_img2') as $file){
									if ($cur_img_count==$i) {
										$filename = $file->getClientOriginalName();
										$filename = str_replace("&", "and", $filename);
										$filename = str_replace(" ", "_", $filename);
										$filename = time().$filename;
										$file->move(public_path().'/uploads/', $filename);
										$image2 = $filename;
									}
									$cur_img_count++;
								}
							}
						}/**/

						$obj->title = $title;
						$obj->sub_title = $sub_title;
						$obj->body = $body;
						$obj->btn_text = $btn_text;
						$obj->btn_url = $btn_url;
						$obj->image = $image;
						$obj->image2 = $image2;
						$obj->rank = $rank;
						$obj->save();

							//DB::insert('insert into pages_extra (page_id, type, section_type, title, sub_title, body, btn_text, body, btn_url) values (?, ?, ?, ?)', [$id, $type, $cur_section_type, $title, $sub_title, $body, $btn_text, $btn_url, $image, $image2]);
					  }
					}
				}

			return redirect()->back()->with('success', true);

		}


	}



	/* Page Extra Fields Remove Image Get*/
	public function page_extra_remove_image($id)
	{
		$pages_extra = PageExtra::where('id',$id)->get();
		if($pages_extra[0]->image!='' && file_exists(public_path().'/uploads/'.$pages_extra[0]->image))
		{
			unlink(public_path().'/uploads/'.$pages_extra[0]->image);
		}
		if($pages_extra[0]->image2!='' && file_exists(public_path().'/uploads/'.$pages_extra[0]->image2))
		{
			unlink(public_path().'/uploads/'.$pages_extra[0]->image2);
		}
		/*if ($pages_extra[0]->type==1 || ($pages_extra[0]->type==3)) {
			DB::delete('delete from pages_extra where id = ?',[$id]);
		}else{
			DB::table('pages_extra')->where('id', $id)->update( array('image' => '', 'image2' => '') );
		}*/
			DB::delete('delete from pages_extra where id = ?',[$id]);
		//return redirect()->back()->with('remove_image_success', true);
		return redirect()->back()->with('admin_msg', 'Section data removed successfully.');
	}

	/* Page Extra Fields Remove Image Get*/
	public function page_extra_remove($id)
	{
		$pages_extra = PageExtra::where('id',$id)->get();
		$msg = '';
		if ($pages_extra[0]->type==4 && $pages_extra[0]->page_id==3) {
			DB::delete('delete from pages_extra where id = ?',[$id]);
			$msg = 'FAQ Content has been removed successfully.';
		}
		return redirect()->back()->with('admin_msg', $msg);
	}

	public function delete($id)
	{
		if ($id>0) {
		$page = Page::where('id',$id)->first();
		if($page->bannerimage!='' && file_exists(public_path().'/uploads/'.$page->bannerimage))
		{
			unlink(public_path().'/uploads/'.$page->bannerimage);
		}
		$pages_extra = PageExtra::where('page_id',$id)->get();
		foreach ($pages_extra as $key => $value) {
			if($value->image!='' && file_exists(public_path().'/uploads/'.$value->image))
			{
				unlink(public_path().'/uploads/'.$value->image);
			}
			if($value->image2!='' && file_exists(public_path().'/uploads/'.$value->image2))
			{
				unlink(public_path().'/uploads/'.$value->image2);
			}
		}
			DB::delete('delete from pages_extra where page_id = ?',[$id]);
			DB::delete('delete from pages where id = ?',[$id]);

			return redirect()->back()->with('delete_success', true);
		}
		return redirect()->back()->withErrors(array('errordetailsd' => 'Nothing is deleted.'));
	}



	/* Front end*/

	/* Contact Page Get
	public function contact()
	{
		$setting = Settings::whereIn('id', array(5, 6, 7))->get();

		$page = Page::where('id',5)->first();
		if(count($page))
		{
			if($page->meta_title)
			{
				@$setting[0]->value = $page->meta_title;
				// @$setting[0]->value = $page->page_name;
			}
			if($page->meta_keyword)
			{
				@$setting[1]->value = $page->meta_keyword;
			}
			if($page->meta_description)
			{
				@$setting[2]->value = $page->meta_description;
			}

			$page_image = '';
			$page_url = url('/'.$page->slug);
			$site_logo = config('site.logo');
			if($site_logo && File::exists(public_path('uploads/'.$site_logo)) )
			{
				$page_image = url('/uploads/'.$site_logo);
			}
			return view('frontend.pages.contact', compact('page','setting','page_url','page_image'));
		}else{
			//return view('frontend.pages.contact');
			return redirect('404');
		}
		
	}*/

	/* Contact Page Post*/
	public function contactform(Request $request)
	{
		$name = $request->name;
		$email = $request->email;
		$message = $request->message;
		//$company = $request->company;
		//$phone = $request->phone;
		//$service = $request->service;
		//$located = $request->located;
		//$help = $request->help;
		//$remark = $request->remark;

		$rules = array(
			'name' => 'required',
			'email' => 'required|string|email|max:191',
			'message' => 'required',
		);

		$validator = Validator::make($request->all() , $rules);

		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator)->withInput(); 
		}
		else
		{
			try {
				$obj = new Forms;
				$obj->type = 0;
				$obj->name = $name;
				$obj->email = $request->email;
				$obj->message = $request->message;
				
				$obj->save();
			$admin_message = "Dear Admin,<br><br> 
			
			This e-mail was sent from the contact form on ".config('site.title')." website.<br><br>
			
			Name: ".$name."<br>
			Email: ".$email."<br>
			Message: ".$message."<br>";

			$admin_message_content = ['content' => $admin_message];

			Mail::send('mail', $admin_message_content, function ($msg) use ($request) {

				$admin_email = config('site.contact_email');
				$support_email = config('site.support_email');

				$msg->to($admin_email)->subject(config('site.title').': Contact Us Form');
				$msg->from($support_email, $request->name);
			});
			return redirect()->back()->with('message', "Thank you for getting in touch!");
			} catch (\Exception $e) {
				DB::rollback();
				return Redirect::back()->withErrors(array('errordetailsd' => $e->getMessage()))->withInput($request->all());
			}
		}
	}

	/* Need Support Form on Help Page Post*/
	public function enquiry(Request $request)
	{
		$fname = $request->fname;
		$lame = $request->lame;
		$email = $request->email;
		$phone = $request->phone;
		$subject = $request->subject;
		$state = $request->state;
		$course = $request->course;
		$message = $request->message;

		$rules = array(
			'fname' => 'required',
			'email' => 'required|string|email|max:191',
			//'message' => 'required',
		);

		$validator = Validator::make($request->all() , $rules);

		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator)->withInput(); 
		}
		else
		{
			try {
			$admin_message = "Dear Admin,<br><br> 
			
			This e-mail was sent from the help desk form on ".config('site.title')." website.<br><br>
			
			First Name: ".$fname."<br>
			Last Name: ".$lame."<br>
			Email: ".$email."<br>
			Phone: ".$phone."<br>
			Subject: ".$subject."<br>
			State: ".$state."<br>
			Phone: ".$course."<br>
			Message: ".$message."<br><br>";

			$admin_message_content = ['content' => $admin_message];

			Mail::send('mail', $admin_message_content, function ($msg) use ($request) {

				$admin_email = config('site.contact_email');
				$support_email = config('site.support_email');

				$msg->to($admin_email)->subject(config('site.title').': Need Support');
				$msg->from($support_email, $request->name);
			});
			return redirect()->back()->with('message', "Thank you for getting in touch!");
			} catch (\Exception $e) {
				DB::rollback();
				return Redirect::back()->withErrors(array('errordetailsd' => $e->getMessage()))->withInput($request->all());
			}
		}
	}


	/* Show Page by Slug Get*/
	public function ShowPage($slug)
	{
		//echo $slug;
		$setting = Settings::whereIn('id', array(5, 6, 7))->get();
		$country = Country::where('status','1')->orderBy('rank', 'asc')->get();

		$page = Page::where('slug',$slug)->first();
		$extra_data = array();
		//$page2 = Page::where('slug',3)->first();
		
		if($page)
		{
			if($page->meta_title)
			{
				@$setting[0]->value = $page->meta_title;
				//@$setting[0]->value = $page->page_name;
			}
			if($page->meta_keyword)
			{
				@$setting[1]->value = $page->meta_keyword;
			}
			if($page->meta_description)
			{
				@$setting[2]->value = $page->meta_description;
			}

			$page_image = '';
			$page_url = url('/'.$page->slug);
			$site_logo = config('site.logo');
			if($site_logo && File::exists(public_path('uploads/'.$site_logo)) )
			{
				$page_image = url('/uploads/'.$site_logo);
			}
			
					$extra_data = PageExtra::where('page_id',$page->id)->get();


			if ($page->page_template=='1') {
				
				//print_r($extra_data2);
				return view('frontend.home', compact('page','setting','page_url','page_image', 'extra_data'));
			}elseif($page->page_template=='2'){
				return view('frontend.pages.where_to_begin', compact('page','setting','page_url','page_image', 'extra_data'));
			}elseif($page->page_template=='3'){
				return view('frontend.pages.services_offered', compact('page','setting','page_url','page_image', 'extra_data','country'));
			}elseif($page->page_template=='4'){
				return view('frontend.pages.location', compact('page','setting','page_url','page_image', 'extra_data'));
			}elseif($page->page_template=='5'){
				return view('frontend.pages.contact_us', compact('page','setting','page_url','page_image', 'extra_data'));
			}elseif($page->page_template=='6'){
				return view('frontend.pages.employment', compact('page','setting','page_url','page_image', 'extra_data'));
			}elseif($page->page_template=='7'){
				return view('frontend.pages.payment', compact('page','setting','page_url','page_image', 'extra_data'));
			}else{
				return view('frontend.pages.pages', compact('page','setting','page_url','page_image', 'extra_data'));
			}

			if($page->id=='2'){
				$extra_data = PageExtra::where('page_id',$page->id)->get();
				return view('frontend.pages.about', compact('page','setting','page_url','page_image', 'extra_data'));
			}elseif($page->id=='3'){
				$extra_data = PageExtra::where('page_id',$page->id)->get();
				return view('frontend.pages.faq', compact('page','setting','page_url','page_image', 'extra_data'));
			}elseif($page->id=='4'){
				$extra_data = PageExtra::where('page_id',$page->id)->get();
				return view('frontend.pages.careers', compact('page','setting','page_url','page_image', 'extra_data'));
			}elseif($page->id=='5'){
				$extra_data = PageExtra::where('page_id',$page->id)->get();
				return view('frontend.pages.our_global_reach', compact('page','setting','page_url','page_image', 'extra_data','country'));
			}elseif($page->id=='6'){
				$extra_data = PageExtra::where('page_id',$page->id)->get();
				return view('frontend.pages.contact_us', compact('page','setting','page_url','page_image', 'extra_data'));
			}else{
				return view('frontend.pages.pages', compact('page','setting','page_url','page_image'));
			}
			
		}
		else
		{
			return view('errors.404');
			// return redirect('404');
		}
	}

	/* Not Found Get*/
	public function not_found()
	{
		return view('errors.404');
	}

}