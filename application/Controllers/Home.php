<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CardModel;

class Home extends Cct
{
	public function index()
	{
		return view('welcome_message');
	}
	
	public function test()
	{
		$card = new CardModel();
		
		$test = $card->like("name","goblin")->findAll();
		
		poop($test);
	}
}
