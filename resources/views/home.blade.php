@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">به سامانه تهیه لیست با‌من‌بخوان خوش آمدید</div>

                <div class="panel-body">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/books') }}">کتاب‌ها</a></li>
                    <li><a href="{{ url('/handbooks') }}">دستنامه‌ها</a></li>
                    <li><a href="{{ url('/activities') }}">فعالیت‌ها</a></li>
                    <li><a href="{{ url('/educational-tools') }}">ابزارهای کمک‌آموزشی</a></li>
                    <li><a href="{{ url('/educational-packs') }}">بسته‌های آموزش خلاق</a></li>
                    <li><a href="{{ url('/lists') }}">لیست‌ها</a></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
