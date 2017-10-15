@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    ویرایش لیست
                            <a class="btn left" href="{{url('lists/export/' . $list->id)}}">
                                <i class="fa fa-btn fa-file-text"></i>خروجی
                            </a>
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New List Form -->
                    <form action="{{ url('lists/edit/' . $list->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- List Name -->
                        <div class="form-group required">
                            <label for="list-name" class="col-sm-3 control-label">نام</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="list-name" class="form-control" value="{{ $list->name }}">
                            </div>
                        </div>

                        <!-- List budget -->
                        <div class="form-group required">
                            <label for="list-budget" class="col-sm-3 control-label">بودجه</label>

                            <div class="col-sm-6">
                                <input type="text" name="budget" id="list-budget" class="form-control" value="{{ $list->budget }}">
                            </div>
                        </div>

                        <!-- List Description -->
                        <div class="form-group">
                            <label for="list-description" class="col-sm-3 control-label">توضیحات</label>

                            <div class="col-sm-6">
                                <textarea name="description" id="list-description" class="form-control">{{ $list->description }}</textarea>
                            </div>
                        </div>

                        <!-- Add List Button -->
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

            <div class="panel panel-default">
                <div class="panel-heading">
                    پایه‌های لیست
                            <a class="btn" href="{{url('grades/create/' . $list->id)}}">
                                <i class="fa fa-btn fa-plus"></i>پایه جدید
                            </a>
                </div>

                @if (count($grades) > 0)
                <div class="panel-body">
                    <table class="table table-striped list-table">
                        <thead>
                            <th>نام</th>
                            <th>هزینه</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($grades as $grade)
                                <tr>
                                    <td class="table-text"><div>{{ $grade->name }}</div></td>
                                    <td class="table-text"><div>{{ number_format($grade->cost) }}</div></td>

                                    <!-- Grade Delete Button -->
                                    <td>
                                        <a class="btn btn-primary list-edit-btn" href="{{url('grades/edit/' . $grade->id)}}">ویرایش</a>
                                        <form action="{{url('grades/delete/' . $grade->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-grade-{{ $grade->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>حذف
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="info">
                              <th>هزینه مجموع</th>
                              <th>{{ number_format($grades->sum('cost')) }}</th>
                            </tr> 
                        </tfoot>
                    </table>
                </div>
                @endif
            </div>

        </div>
    </div>
@endsection


