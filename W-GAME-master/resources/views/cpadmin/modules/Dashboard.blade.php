@extends('cpadmin.master')
@section('title','Dashboard')
@section('content')


<div class="container">
    <div class="row ">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fas fa-gamepad"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>Game</h3></span>
                <span class="info-box-number">TOTAL : {{$count['game']}}</span>
                <p class="card-text"><small class="text-muted">Last updated {{$count['date']}}</small></p>
                <p class="card-text"><small class="text-muted">{{$count['time']}}</small></p>
                <a _ngcontent-ldw-c121="" class="small text-primary stretched-link" href="/admin/game/index">View Details</a>
              </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-success "><i class="fas fa-gamepad"></i></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>Category</h3></span>
                <span class="info-box-number">TOTAL : {{$count['category']}}</span>
                <p class="card-text"><small class="text-muted">Last updated {{$count['date']}}</small></p>
                <p class="card-text"><small class="text-muted">{{$count['time']}}</small></p>
                <a _ngcontent-ldw-c121="" class="small text-primary stretched-link" href="/admin/category/index">View Details</a>
              </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-comment-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>Comment</h3></span>
                <span class="info-box-number">TOTAL : {{$count['cmt']}}</span>
                <p class="card-text"><small class="text-muted">Last updated {{$count['date']}}</small></p>
                <p class="card-text"><small class="text-muted">{{$count['time']}}</small></p>
                <a _ngcontent-ldw-c121="" class="small text-primary stretched-link" href="/admin/comment/index">View Details</a>
              </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="ion ion-ios-people-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>User</h3></span>
                <span class="info-box-number">TOTAL : {{$count['uers']}}</span>
                <p class="card-text"><small class="text-muted">Last updated {{$count['date']}}</small></p>
                <p class="card-text"><small class="text-muted">{{$count['time']}}</small></p>
                <a _ngcontent-ldw-c121="" class="small text-primary stretched-link" href="/admin/user/index">View Details</a>
              </div>
            </div>
        </div>
    </div>
  </div>
@endsection