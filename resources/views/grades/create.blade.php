@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    پایه جدید برای لیست <a href="{{ url('lists/edit/' . $list->id) }}">«{{ $list->name }}»</a>
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Grade Form -->
                    <form action="{{ url('grades/create/' . $list->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-info">
                            لطفا بعد از ایجاد پایه و از طریق ویرایش پایه، موارد مورد نیاز را به پایه اضافه کنید.
                        </div> 
                        <br/>


                        <!-- Grade Name -->
                        <div class="form-group required">
                            <label for="grade-name" class="col-sm-3 control-label">نام</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="grade-name" class="form-control">
                            </div>
                        </div>

                        <!-- Grade class_count -->
                        <div class="form-group required">
                            <label for="grade-class_count" class="col-sm-3 control-label">تعداد کلاس</label>

                            <div class="col-sm-6">
                                <input type="text" name="class_count" id="grade-class_count" class="form-control">
                            </div>
                        </div>

                        <!-- Grade student_count -->
                        <div class="form-group required">
                            <label for="grade-student_count" class="col-sm-3 control-label">تعداد دانش‌آموز</label>

                            <div class="col-sm-6">
                                <input type="text" name="student_count" id="grade-student_count" class="form-control">
                            </div>
                        </div>

                        <!-- Grade Description -->
                        <div class="form-group">
                            <label for="grade-description" class="col-sm-3 control-label">توضیحات</label>

                            <div class="col-sm-6">
                                <textarea name="description" id="grade-description" class="form-control">
                                </textarea>
                            </div>
                        </div>

                        <!-- Add Grade Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>اضافه کن
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

