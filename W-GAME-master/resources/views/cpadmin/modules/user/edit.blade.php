@extends('cpadmin.master')
@section('title','edit')
@section('content')
<form action="{{route('admin.user.update',['id' => $item->id])}}" method="post">
    @csrf
    <table id="example1" class="table table-bordered table-striped">
        <tbody>   
            <tr><td>ID</td><td>{{$item->id}}</td></tr>
            <tr><td>NAME: </td><td><input type="text" class="form-control" name="name" value="{{$item->name}}"></td></tr>
            <tr><td>EMAIL: </td><td>{{$item->email}}</td></tr>
            <tr><td>CREATED_AT: </td><td>{{date("d/m/Y-h:i:s",strtotime($item->created_at))}}</td></tr>
            <tr><td>BIRTHDAY: </td><td><input type="text" class="form-control" name="birthday" value="{{$item->birthday}}"></td></tr>
            <tr><td>PHONE: </td><td><input type="text" class="form-control" name="phone" value="{{$item->phone}}"></td></tr>
            <tr><td>ADDRESS: </td><td><input type="text" class="form-control" name="address" value="{{$item->address}}"></td></tr>
            <tr><td>MONEY: </td><td><input type="text" class="form-control" name="money" value="{{$item->money}}"></td></tr>
            <tr>
                 <td></td>
                 <td><button type="submit"  onclick="return checkdelete('Are You Sure for this changed ?')" class="btn btn-primary ">Confirm Update</button></td>
             </tr>          
        </tbody>
     </table>
</form>
@endsection