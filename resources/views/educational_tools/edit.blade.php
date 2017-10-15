@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ویرایش ابزار کمک‌آموزشی
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New EducationalTool Form -->
                    <form action="{{ url('educational-tools/edit/' . $educational_tool->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- EducationalTool Name -->
                        <div class="form-group required">
                            <label for="educational-tool-name" class="col-sm-3 control-label">نام</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="educational-tool-name" class="form-control" value="{{ $educational_tool->name }}">
                            </div>
                        </div>

                        <!-- EducationalTool Price -->
                        <div class="form-group required">
                            <label for="educational-tool-price" class="col-sm-3 control-label">قیمت</label>

                            <div class="col-sm-6">
                                <input type="text" name="price" id="educational-tool-price" class="form-control" value="{{ $educational_tool->price }}">
                            </div>
                        </div>

                        <!-- EducationalTool Age_group -->
                        <div class="form-group">
                            <label for="educational-tool-age_group" class="col-sm-3 control-label">گروه سنی</label>

                            <div class="col-sm-6">
                                <input type="text" name="age_group" id="age_group-name" class="form-control" value="{{ $educational_tool->age_group }}">
                            </div>
                        </div>

                        <!-- EducationalTool Description -->
                        <div class="form-group">
                            <label for="educational-tool-description" class="col-sm-3 control-label">توضیحات</label>

                            <div class="col-sm-6">
                                <textarea name="description" id="educational-tool-description" class="form-control">{{ $educational_tool->description }}</textarea>
                            </div>
                        </div>

                        <!-- Add EducationalTool Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-edit"></i>ویرایش
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection


