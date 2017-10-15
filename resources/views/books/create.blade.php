@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    کتاب جدید
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Book Form -->
                    <form action="{{ url('books/create') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Book Name -->
                        <div class="form-group required">
                            <label for="book-name" class="col-sm-3 control-label">نام</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="book-name" class="form-control">
                            </div>
                        </div>

                        <!-- Book author -->
                        <div class="form-group">
                            <label for="book-author" class="col-sm-3 control-label">نویسنده</label>

                            <div class="col-sm-6">
                                <input type="text" name="author" id="author-price" class="form-control">
                            </div>
                        </div>

                        <!-- Book illustrator -->
                        <div class="form-group">
                            <label for="book-illustrator" class="col-sm-3 control-label">تصویرگر</label>

                            <div class="col-sm-6">
                                <input type="text" name="illustrator" id="illustrator-price" class="form-control">
                            </div>
                        </div>

                        <!-- Book translator -->
                        <div class="form-group">
                            <label for="book-translator" class="col-sm-3 control-label">مترجم</label>

                            <div class="col-sm-6">
                                <input type="text" name="translator" id="translator-price" class="form-control">
                            </div>
                        </div>

                        <!-- Book publisher -->
                        <div class="form-group">
                            <label for="book-publisher" class="col-sm-3 control-label">ناشر</label>

                            <div class="col-sm-6">
                                <input type="text" name="publisher" id="publisher-price" class="form-control">
                            </div>
                        </div>

                        <!-- Book publishing_year -->
                        <div class="form-group">
                            <label for="book-publishing_year" class="col-sm-3 control-label">سال نشر</label>

                            <div class="col-sm-6">
                                <input type="text" name="publishing_year" id="publishing_year-price" class="form-control">
                            </div>
                        </div>

                        <!-- Book Price -->
                        <div class="form-group required">
                            <label for="book-price" class="col-sm-3 control-label">قیمت</label>

                            <div class="col-sm-6">
                                <input type="text" name="price" id="book-price" class="form-control">
                            </div>
                        </div>

                        <!-- Book Age_group -->
                        <div class="form-group">
                            <label for="book-age_group" class="col-sm-3 control-label">گروه سنی</label>

                            <div class="col-sm-6">
                                <input type="text" name="age_group" id="age_group-name" class="form-control">
                            </div>
                        </div>

                        <!-- Book educational_stage -->
                        <div class="form-group">
                            <label for="book-educational_stage" class="col-sm-3 control-label">مقطع آموزشی</label>

                            <div class="col-sm-6">
                                <input type="text" name="educational_stage" id="educational_stage-price" class="form-control">
                            </div>
                        </div>

                        <!-- Book type -->
                        <div class="form-group">
                            <label for="book-type" class="col-sm-3 control-label">گونه</label>

                            <div class="col-sm-6">
                                <input type="text" name="type" id="type-price" class="form-control">
                            </div>
                        </div>

                        <!-- Book illustration -->
                        <div class="form-group">
                            <label for="book-illustration" class="col-sm-3 control-label">تصویر</label>

                            <div class="col-sm-6">
                                <input type="text" name="illustration" id="illustration-price" class="form-control">
                            </div>
                        </div>

                        <!-- Book priority -->
                        <div class="form-group required">
                            <label for="book-priority" class="col-sm-3 control-label">اولویت</label>

                            <div class="col-sm-6">
                                <input type="text" name="priority" id="priority-price" class="form-control">
                            </div>
                        </div>

                        <!-- Book has_handbook -->
                        <div class="form-group">
                            <label for="book-has_handbook" class="col-sm-3 control-label">دستنامه دارد</label>

                            <div class="col-sm-1">
                                <input type="checkbox" name="has_handbook" id="has_handbook-price" class="form-control">
                            </div>
                        </div>

                        <!-- Book has_activity -->
                        <div class="form-group">
                            <label for="book-has_activity" class="col-sm-3 control-label">فعالیت دارد</label>

                            <div class="col-sm-1">
                                <input type="checkbox" name="has_activity" id="has_activity-price" class="form-control">
                            </div>
                        </div>

                        <!-- Book reading_aloud -->
                        <div class="form-group">
                            <label for="book-reading_aloud" class="col-sm-3 control-label">قابلیت بلندخوانی</label>

                            <div class="col-sm-1">
                                <input type="checkbox" name="reading_aloud" id="reading_aloud-price" class="form-control">
                            </div>
                        </div>

                        <!-- Book Description -->
                        <div class="form-group">
                            <label for="book-description" class="col-sm-3 control-label">توضیحات</label>

                            <div class="col-sm-6">
                                <textarea name="description" id="book-description" class="form-control">
                                </textarea>
                            </div>
                        </div>

                        <!-- Add Book Button -->
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

