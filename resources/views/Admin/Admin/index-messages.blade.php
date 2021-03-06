@extends('layouts.Admin.index')
@section('title')
    <style type="text/css">
        .fas {
            margin-left: 1px > < / i > < / button > /*</a>*/ < / td > < td > < button type =;
        }
    </style>
    <li class="m-nav__item">
        <a href="" class="m-nav__link">
            <span class="m-nav__link-text">الرسائل</span>
        </a>
    </li>
    <li class="m-nav__separator">-</li>
{{--    <li class="m-nav__item">--}}
{{--        <a href="{{route('ShowAdmins.create')}}" class="m-nav__link">--}}
{{--            <span class="m-nav__link-text">اضافة مشرف جديد</span>--}}
{{--        </a>--}}
{{--    </li>--}}

@endsection
@section('content')


    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            الرسائل
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <button type="button" class="dt-button btn btn-danger delBtn btn_space" style="left: auto!important;" onclick="multycheck(); return false;"  id="pass"><i class="fa fa-trash"></i></button>
                            <input type="hidden" id="check_id" attr_route="{{route('ShowAdminsCheckDelete')}}" name="id" value="" />
                        </li>
                        <li class="m-portlet__nav-item"></li>

{{--                        <li class="m-portlet__nav-item">--}}
{{--                            <a href="{{route('ShowAdmins.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" >--}}
{{--                            <span>--}}
{{--                                <i class="la la-plus"></i>--}}
{{--                                <span> جديد</span>--}}
{{--                            </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">

                <!--begin: Datatable -->






                <table id="example" class="table table-striped- table-bordered table-hover table-checkable" style="width:100%">
                    <thead style="background-color: #34bfa3;">
                    <tr>
                        <th class="not-exported" style="width: 30px!important;">
                            <input type="checkbox" class="check_all" style="box-sizing: border-box;background-color: indigo!important;font-size: 10px" onclick="check_all()" />
                        </th>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>البريد الإلكترونى</th>
                        <th>رقم التليفون</th>
                        <th class="not-exported">الرسالة</th>
                        <th class="not-exported">منذ</th>
                        <th class="not-exported">الرد </th>
                        <th class="not-exported">حذف</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
{{--                        @if($user->id != auth('admin')->user()->id)--}}
                            <tr>
                                <td>
                                    <input type="checkbox" name="checkvalue" id="checkItem" class="item_checkbox" style="margin-right: -21px!important;" value="{{$message->id}}">
                                </td>
                                <td>{{$i}}</td>

                                <td>{{$message->name}}</td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->phone_number}}</td>
                                <td>
{{--                                    <img style="width: 70px;height: 70px" src="{{get_file($user->image)}}" alt="user" onclick="window.open(this.src)"/></td>--}}
                                    <a href="{{route('ShowMessage',$message->id)}}"> التفاصيل</a>
                                    {{--                                    <a href="{{route('ShowMessage',$message->id)}}"> {{$out = strlen($message->message)> 15 ?substr($message->message ,0,15)."..." : $message->message }}</a>--}}
                                </td>
                                <td>{{$message->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('ReplyForm',$message->id)}}">
                                        <button type="submit" class="btn btn-info btn-sm"   >  <i class="fas fa-envelope"></i></button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('destroyMessage',$message->id)}}">
                                    @method('post')
                                    <button type="button" class="btn btn-danger btn-sm"  id="submit_delete"><i class="fa fa-trash" style="margin-left: 1px"></i> </button>
                                    </a>
                                </td>

                                <?php
                                $i++?>
                                <div id="delete{{$message->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="" method="post" enctype="application/x-www-form-urlencoded">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$message->id}}" />
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" style="margin-left: 390px">&times;</button>
                                                    <h4 class="modal-title" style="margin-right:-2%">حذف</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>هل انت متأكد من حذف <strong style="color: red">{{$message->name}}</strong>؟!</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-info" data-dismiss="modal">غلق</button>
                                                    <input type="submit" name="submit"  id="action" value="تأكيد" style="width: 60px" class="btn btn-danger">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
{{--                        @endif--}}
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
    <div id="check" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" enctype="application/x-www-form-urlencoded">
                    @csrf
                    <input type="hidden" name="id" value="" />
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" style="margin-left: 85%">&times;</button>
                        <h4 class="modal-title" style="margin-top: -5px">حذف</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger text-center">
                            <h4 id="text">هل انت موافق على حذف الرسائل المحددة<br> وعددهم <span id="span" style="color:red;"></span> ! </h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">غلق</button>
                        <input type="submit" name="submit"  id="action" value="تأكيد" style="width: 60px" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
