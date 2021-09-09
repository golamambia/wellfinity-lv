<?php

namespace App\Http\Controllers;

use Redirect;

//use Input;

use Illuminate\Http\Request;



use Illuminate\Support\Facades\Validator;



use App\Models\Settings;

use App\Models\User;

use App\Models\Role;



use Illuminate\Support\Facades\DB;



class SettingsController extends Controller

{

	public function __construct()

	{

	}



	public function settings()

	{

		$settings = Settings::all();

		return view('admin.settings', compact('settings'));

	}





	public function update(Request $request)

	{

		$site_title = $request->site_title;

		$admin_pagination = $request->admin_pagination;

		$site_pagination = $request->site_pagination;

		$site_meta_title = $request->site_meta_title;

		$site_meta_keyword = $request->site_meta_keyword;

		$site_meta_description = $request->site_meta_description;

		$user_designation = $request->user_designation;

		$site_email = $request->site_email;

		$site_phone = $request->site_phone;

		$site_address = $request->site_address;



		$rules = array(

			'site_title' => 'required|string|max:255',

			'site_contact_email' => 'required|string|email|max:191',

			'site_support_email' => 'required|string|email|max:191',

		); 



		$validator = Validator::make($request->all() , $rules);



		if ($validator->fails())

		{

			return Redirect::to('admin/settings/')->withErrors($validator) 

			->withInput(); 

		}

		else

		{

			

		try {

			if($request->hasfile('site_logo'))

			{

				$site_logo = config('site.logo');

				if($site_logo!='' && file_exists(public_path().'/uploads/'.$site_logo))

				{

					unlink(public_path().'/uploads/'.$site_logo);

				}

				$site_logo = $request->file('site_logo');

				$filename = $site_logo->getClientOriginalName();

				$filename = str_replace("&", "and", $filename);

				$filename = str_replace(" ", "_", $filename);

				$filename = time().$filename;

				$site_logo->move(public_path().'/uploads/', $filename);  



				if ($filename) {

					$update_array = array('value' => $filename);

					Settings::where('id', '2')->update($update_array);

				}

			}
			if($request->hasfile('site_withoutbanner_logo'))

			{

				$site_withoutbanner_logo = config('site.withoutbanner_logo');

				if($site_withoutbanner_logo!='' && file_exists(public_path().'/uploads/'.$site_withoutbanner_logo))

				{

					unlink(public_path().'/uploads/'.$site_withoutbanner_logo);

				}

				$site_withoutbanner_logo = $request->file('site_withoutbanner_logo');

				$filename = $site_withoutbanner_logo->getClientOriginalName();

				$filename = str_replace("&", "and", $filename);

				$filename = str_replace(" ", "_", $filename);

				$filename = time().$filename;

				$site_withoutbanner_logo->move(public_path().'/uploads/', $filename);  



				if ($filename) {

					$update_array = array('value' => $filename);

					Settings::where('id', '30')->update($update_array);

				}

			}

			if($request->hasfile('site_inner_logo'))

			{

				$site_inner_logo = config('site.inner_logo');

				if($site_inner_logo!='' && file_exists(public_path().'/uploads/'.$site_inner_logo))

				{

					unlink(public_path().'/uploads/'.$site_inner_logo);

				}

				$site_inner_logo = $request->file('site_inner_logo');

				$filename = $site_inner_logo->getClientOriginalName();

				$filename = str_replace("&", "and", $filename);

				$filename = str_replace(" ", "_", $filename);

				$filename = time().$filename;

				$site_inner_logo->move(public_path().'/uploads/', $filename);  



				if ($filename) {

					$update_array = array('value' => $filename);

					Settings::where('id', '20')

					->update($update_array);

				}

			}

			if($request->hasfile('site_footer_logo'))

			{

				$site_footer_logo = config('site.footer_logo');

				if($site_footer_logo!='' && file_exists(public_path().'/uploads/'.$site_footer_logo))

				{

					unlink(public_path().'/uploads/'.$site_footer_logo);

				}

				$site_footer_logo = $request->file('site_footer_logo');

				$filename = $site_footer_logo->getClientOriginalName();

				$filename = str_replace("&", "and", $filename);

				$filename = str_replace(" ", "_", $filename);

				$filename = time().$filename;

				$site_footer_logo->move(public_path().'/uploads/', $filename);  



				if ($filename) {

					$update_array = array('value' => $filename);

					Settings::where('id', '21')

					->update($update_array);

				}

			}

			if($request->hasfile('site_logo2'))

			{

				$site_logo2 = config('site.logo2');

				if($site_logo2!='' && file_exists(public_path().'/uploads/'.$site_logo2))

				{

					unlink(public_path().'/uploads/'.$site_logo2);

				}

				$site_logo2 = $request->file('site_logo2');

				$filename = $site_logo2->getClientOriginalName();

				$filename = str_replace("&", "and", $filename);

				$filename = str_replace(" ", "_", $filename);

				$filename = time().$filename;

				$site_logo2->move(public_path().'/uploads/', $filename);  



				if ($filename) {

					$update_array = array('value' => $filename);

					Settings::where('id', '9')

					->update($update_array);

				}

			}



			if ($site_title) {

				$update_array = array('value' => $site_title);

				Settings::where('id', '1')

				->update($update_array);

			}



			if ($admin_pagination) {

				$update_array = array('value' => $admin_pagination);

				Settings::where('id', '3')

				->update($update_array);

			}



			if ($site_pagination) {

				$update_array = array('value' => $site_pagination);

				Settings::where('id', '4')

				->update($update_array);

			}



				$update_array = array('value' => $site_meta_title);

				Settings::where('id', '5')

				->update($update_array);



				$update_array = array('value' => $site_meta_keyword);

				Settings::where('id', '6')

				->update($update_array);



				$update_array = array('value' => $site_meta_description);

				Settings::where('id', '7')

				->update($update_array);



			if($request->hasfile('site_meta_image'))

			{

				$site_meta_image = config('site.meta_image');

				if($site_meta_image!='' && file_exists(public_path().'/uploads/'.$site_meta_image))

				{

					unlink(public_path().'/uploads/'.$site_meta_image);

				}

				$site_meta_image = $request->file('site_meta_image');

				$filename1 = $site_meta_image->getClientOriginalName();

				$filename1 = str_replace("&", "and", $filename1);

				$filename1 = str_replace(" ", "_", $filename1);

				$filename1 = time().$filename1;

				$site_meta_image->move(public_path().'/uploads/', $filename1);  



				if ($filename1) {

					$update_array = array('value' => $filename1);

					Settings::where('id', '8')

					->update($update_array);

				}

			}



				$update_array = array('value' => $request->site_contact_email);

				Settings::where('id', '10')

				->update($update_array);



				$update_array = array('value' => $request->site_support_email);

				Settings::where('id', '11')

				->update($update_array);



				$update_array = array('value' => $site_address);

				Settings::where('id', '12')

				->update($update_array);



				$update_array = array('value' => $site_email);

				Settings::where('id', '13')

				->update($update_array);



				$update_array = array('value' => $site_phone);

				Settings::where('id', '14')

				->update($update_array);



				$update_array = array('value' => $request->site_facebook_link);

				Settings::where('id', '15')

				->update($update_array);



				$update_array = array('value' => $request->site_twitter_link);

				Settings::where('id', '16')

				->update($update_array);



				$update_array = array('value' => $request->site_instagram_link);

				Settings::where('id', '17')

				->update($update_array);



				$update_array = array('value' => $request->site_linkedin_link);

				Settings::where('id', '18')

				->update($update_array);


				$update_array = array('value' => $request->site_pinterest);

				Settings::where('id', '29')

				->update($update_array);


				$update_array = array('value' => $request->site_youtube_link);

				Settings::where('id', '27')

				->update($update_array);


				$update_array = array('value' => $request->site_message_show_time);

				Settings::where('id', '19')

				->update($update_array);



				$update_array = array('value' => $request->site_footer1_content);

				Settings::where('id', '22')

				->update($update_array);

				$update_array = array('value' => $request->site_address_title);
				Settings::where('id', '25')->update($update_array);

				$update_array = array('value' => $request->site_social_title);
				Settings::where('id', '26')->update($update_array);

				$update_array = array('value' => $request->site_google_analytics);
				Settings::where('id', '31')->update($update_array);

				$update_array = array('value' => $request->site_google_body_tag);
				Settings::where('id', '32')->update($update_array);



			return redirect()->back()->with('success', true);

		} catch (\Exception $e) {

			DB::rollback();

			return Redirect::back()->withErrors(array('errordetailsd' => $e->getMessage()))->withInput($request->all());

		}



		}





	}



	public function delete($key)

	{

		if ($key=='site_logo') {

			$site_logo = Settings::where('id',2)->get();

			if($site_logo[0]->value!='' && file_exists(public_path().'/uploads/'.$site_logo[0]->value))

			{

				unlink(public_path().'/uploads/'.$site_logo[0]->value);

			}

			$update_array = array('value' => '');

			Settings::where('id', '2')

			->update($update_array);			

		}elseif ($key=='site_meta_image') {

			$site_meta_image = Settings::where('id',8)->get();

			if($site_meta_image[0]->value!='' && file_exists(public_path().'/uploads/'.$site_meta_image[0]->value))

			{

				unlink(public_path().'/uploads/'.$site_meta_image[0]->value);

			}

			$update_array = array('value' => '');

			Settings::where('id', '8')

			->update($update_array);

		}elseif ($key=='site_footer_map') {

			$site_footer_map = Settings::where('id',26)->get();

			if($site_footer_map[0]->value!='' && file_exists(public_path().'/uploads/'.$site_footer_map[0]->value))

			{

				unlink(public_path().'/uploads/'.$site_footer_map[0]->value);

			}

			$update_array = array('value' => '');

			Settings::where('id', '23')

			->update($update_array);

		}



		return redirect()->back()->with('delete_success', true);

	}



}