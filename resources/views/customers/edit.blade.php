@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> កែប្រែអតិថិជន&nbsp;&nbsp;
                    <a href="{{url('/customer')}}" class="btn btn-link btn-sm">{{$lb_back_to_list}}</a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif

                    <form action="{{url('/customer/update')}}" class="form-horizontal" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$customer->id}}">
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-1 col-sm-2">{{$lb_name}}</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" required name="name" id="name" class="form-control" autofocus value="{{$customer->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="control-label col-lg-1 col-sm-2">{{$lb_gender}}</label>
                            <div class="col-lg-6 col-sm-8">
                               <select name="gender" id="gender" class="form-control">
                                    <option value="M" {{$customer->gender=='M'?'selected':''}}>Male</option>
                                    <option value="F" {{$customer->gender=='F'?'selected':''}}>Female</option>
                               </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="control-label col-lg-1 col-sm-2">{{$lb_phone}}</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" required name="phone" id="phone" class="form-control" value="{{$customer->phone}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="control-label col-lg-1 col-sm-2">{{$lb_address}}</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" required name="address" id="address" class="form-control" value="{{$customer->address}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-1 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">{{$lb_save}}</button>
                                <button class="btn btn-danger" type="reset">{{$lb_cancel}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection