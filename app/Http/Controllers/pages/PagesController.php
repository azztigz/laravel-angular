<?php namespace App\Http\Controllers\pages;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller {

	public function __construct(){
		
	}

	public function index(){
		return view('pages.index');
	}

	public function tutorial(){
		return view('pages.tutorial');
	}

	public function contact(){
		return view('pages.contact');
	}

}