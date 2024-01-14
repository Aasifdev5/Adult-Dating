<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $table = 'pages';

	protected $fillable = ['page_title', 'page_content'];



	public $timestamps = false;


	public static function getPageInfo($id, $field_name)
	{
		$page_info = Page::where('status', '1')->where('id', $id)->first();

		if ($page_info) {
			return  $page_info->$field_name;
		} else {
			return  '';
		}
	}
}
