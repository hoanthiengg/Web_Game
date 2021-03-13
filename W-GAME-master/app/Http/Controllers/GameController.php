<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('game')->orderBy('id','DESC')->get();

        return view('cpadmin.modules.game.index',['games' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpadmin.modules.game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =($request->except('_token','category'));   

        $sub = "";
        $test = unserialize(serialize($request['category']));
           foreach ($test as $value) {
             $sub = $sub."{$value} " ;
          }
        //$data =($request->except('subject'));
        $data['category'] = $sub;
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        

        
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' =>'required|unique:category|max:191',
            'description' =>'required',
            'description' => 'bail|required|min:8',
        ],[
            'name.required' => 'vui lòng nhập tên game',
            'name.unique' =>'tên game đã tồn tại',
            'name.max' => 'tên game không được vượt quá 191 ký tự',
            'image.max' => 'Hình ảnh có thể không lớn hơn 2048 kilobyte',
            'image.required' => 'vui lòng chọn ảnh',
            'description.required' => 'vui lòng nhập nội dung'
        ]);
          
        //category
        $sub = "";
        $test = unserialize(serialize($request['category']));
            foreach ($test as $key => $value) {
                $sub = $sub."{$value} " ;
        }
        $data['category'] = $sub;



        $imageName = time().'.'.$data['image']->getClientOriginalExtension();
        $data['image']->move(public_path('imag'), $imageName);
        $data['image'] = $imageName;
        @header('Content-type: text/html; charset=utf-8');
        DB::table('game')->insert($data);
        return redirect()->route('admin.game.index');
        //return back()->with('success','You have successfully upload image.')->with('image',$imageName);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $game = DB::table('game')->orderBy('created_at','DESC')->get();
        $data = DB::table('category')->orderBy('id','DESC')->get();
        $topdown = DB::table('game')->orderBy('dowloand','DESC')->take(9)->get();
        $randomSlider = DB::table('game')->orderBy('created_at','DESC')->take(4)->get();
        $data1 = DB::table('game')->orderBy('updated_at','DESC')->get()->take(9);
        return view('welcome',['listcategory'=>$data,'GameView'=>$game,'topdown'=>$topdown,'slider'=>$randomSlider,'Gupdate'=>$data1,'topdown'=>$topdown]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $category =  DB::table('game')->where('id',$id)->first();
        return view('cpadmin.modules.game.edit',['game' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data= $request->except('_token'); 
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' =>'required|unique:category|max:191',
            'description' =>'required',
            'category' => 'bail|required'
        ],[
            'name.required' => 'vui lòng nhập tên thể loại',
            'name.unique' =>'tên thể loại đã tồn tại',
            'name.max' => 'tên thể loại không được vượt quá 191 ký tự',
            'image.max' => 'Hình ảnh có thể không lớn hơn 2048 kilobyte',
            'image.required' => 'vui lòng chọn ảnh',
            'description.required' => 'vui lòng nhập nội dung'
        ]);
            
        //update category
        $sub = "";
        $test = unserialize(serialize($request['category']));
            foreach ($test as $key => $value) {
                $sub = $sub."{$value} " ;
        }
        $data['category'] = $sub;

        //update image
        $imageName = time().'.'.$data['image']->getClientOriginalExtension();
        $data['image']->move(public_path('imag'), $imageName);
        $data['image'] = $imageName;
        $data['updated_at'] = new DateTime;
        DB::table('game')->where('id',$id)->update($data);
        return redirect()->route('admin.game.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $imagePath = DB::table('game')->select('image')->where('id', $id)->first();

         $filePath = $imagePath->image;

                   if (file_exists($filePath)) {

                   unlink($filePath);

           DB::table('game')->where('id',$id)->delete();

        }else{

            DB::table('game')->where('id',$id)->delete();
        }

        return redirect()->route('admin.game.index');
    }
}
