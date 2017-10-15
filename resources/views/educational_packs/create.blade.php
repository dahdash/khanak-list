@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    بسته آموزش خلاق جدید
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New EducationalPack Form -->
                    <form action="{{ url('educational-packs/create') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- EducationalPack Name -->
                        <div class="form-group required">
                            <label for="educational-pack-name" class="col-sm-3 control-label">نام</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="educational-pack-name" class="form-control">
                            </div>
                        </div>

                        <!-- EducationalPack Price -->
                        <div class="form-group required">
                            <label for="educational-pack-price" class="col-sm-3 control-label">قیمت</label>

                            <div class="col-sm-6">
                                <input type="text" name="price" id="educational-pack-price" class="form-control">
                            </div>
                        </div>

                        <!-- EducationalPack Age_group -->
                        <div class="form-group">
                            <label for="educational-pack-age_group" class="col-sm-3 control-label">گروه سنی</label>

                            <div class="col-sm-6">
                                <input type="text" name="age_group" id="age_group-name" class="form-control">
                            </div>
                        </div>

                        <!-- EducationalPack Description -->
                        <div class="form-group">
                            <label for="educational-pack-description" class="col-sm-3 control-label">توضیحات</label>

                            <div class="col-sm-6">
                                <textarea name="description" id="educational-pack-description" class="form-control">
                                </textarea>
                            </div>
                        </div>

                        <!-- Add EducationalPack Button -->
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

