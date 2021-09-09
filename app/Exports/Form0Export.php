<?php

namespace App\Exports;

use App\Models\Forms;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Form0Export implements FromCollection, WithHeadings
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$lists = Forms::where('type','0')->orderBy('created_at', 'desc')->get();

		// Define the Excel spreadsheet headers
		// $exportArray[] = ['Role','Name','Email','Status'];

		if ($lists->count()) {
			foreach ($lists as $list) {
				//$exportArray[] = $user->toArray();
				$exportArray[] = array($list->id, $list->fname, $list->lname, $list->email, $list->phone, $list->address, $list->zip, $list->state, $list->city, $list->reason, $list->message,  $list->created_at);//$list->phone, $list->service, $list->located, $list->help, $list->remark,
			}
		}else{
			$exportArray = [];
		}
        return collect([$exportArray]);
        // return User::all();
    }

    public function headings(): array
    {
        return [
            'ID', 'First Name','Last Name', 'Email','Phone','Address','Zip code','State','City','Reason for Contact', 'Message', 'Created'
        ];
    }
    
}
