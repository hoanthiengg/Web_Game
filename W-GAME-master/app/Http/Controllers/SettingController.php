<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function establish($id){
        $thongtin = DB::table('users')->where('id',$id)->first();  
        $vocal = DB::table('users')->orderBy('id','DESC')->get();  
        return view ('setting.establish',['item'=>$thongtin,'user'=>$vocal]);
    }
    public function edit(Request $request, $id){
        $data =($request->except('_token'));

        $imageName = time().'.'.$data['image']->getClientOriginalExtension();
        $data['image']->move(public_path('imag'), $imageName);
        $data['image'] = $imageName;
        
        $data['created_at'] = new DateTime();
        DB::table('users')->where('id',$id)->update($data);     
        return redirect()->route('setting.profile',[$id]);
    }
    public function profile($id){
        $thongtin = DB::table('users')->where('id',$id)->first();  
        $vocal = DB::table('users')->orderBy('id','DESC')->get();  
        return view ('setting.profile',['tt'=>$thongtin,'user'=>$vocal]);    
    }
    public function account($id){
        $vocal = DB::table('users')->where('id',$id)->first();  
        return view ('setting.account',['user'=>$vocal]);
        
    }
    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Mật khẩu hiện tại của bạn không khớp với mật khẩu bạn đã cung cấp. Vui lòng thử lại.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Mật khẩu mới không được giống với mật khẩu hiện tại của bạn. Vui lòng chọn một mật khẩu khác.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Thay đổi mật khẩu thành công !");

    }
}
