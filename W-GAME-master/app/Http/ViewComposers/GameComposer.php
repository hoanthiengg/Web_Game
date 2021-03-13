<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use Illuminate\Support\Facades\DB;

 class GameComposer
 {
     public $GameList;
     public function __construct()
     {
        $this->GameList =  DB::table('category')->orderBy('id','DESC')->get();
        
     }

     
     public function compose(View $view)
     {
         $view->with('list', end($this->GameList));
     }
 }