@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    لیست جدید
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New List Form -->
                    <form action="{{ url('lists/create') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-info">
                            لطفا بعد از ایجاد لیست و از طریق ویرایش لیست پایه‌های مربوط به لیست را ایجاد کنید.
                        </div> 
                        <br/>

                        <!-- List Name -->
                        <div class="form-group required">
                            <label for="list-name" class="col-sm-3 control-label">نام</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="list-name" class="form-control">
                            </div>
                        </div>

                        <!-- List budget -->
                        <div class="form-group required">
                            <label for="list-budget" class="col-sm-3 control-label">بودجه</label>

                            <div class="col-sm-6">
                                <input type="text" name="budget" id="list-budget" class="form-control">
                            </div>
                        </div>

                        <!-- List Description -->
                        <div class="form-group">
                            <label for="list-description" class="col-sm-3 control-label">توضیحات</label>

                            <div class="col-sm-6">
                                <textarea name="description" id="list-description" class="form-control">
                                </textarea>
                            </div>
                        </div>

                        <!-- Add List Button -->
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

