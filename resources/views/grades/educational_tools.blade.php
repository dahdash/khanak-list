@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    انتخاب ابزار آموزشی برای پایه <a href="{{ url('grades/edit/' . $grade->id) }}">«{{ $grade->name }}»</a> مربوط به لیست <a href="{{ url('lists/edit/' . $grade->khanak_list_id) }}">«{{ $grade->khanakList->name }}»</a>
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Grade Form -->
                    <form action="{{ url('grades/educational-tools/' . $grade->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <table class="table table-striped list-table">
                                <thead>
                                    <th>&nbsp;</th>
                                    <th>نام</th>
                                    <th>قیمت</th>
                                    <th>گروه سنی</th>
                                    <th>تعداد</th>
                                </thead>
                                <tbody>
                                    @foreach ($educational_tools as $educational_tool)
                                        <tr>
                                            <td><input class="checkbox" type="checkbox" name="checkbox[]" value="{{$educational_tool->id}}" {{ in_array($educational_tool->id, $grade_educational_tools_ids) ? 'checked' : '' }} ></td>
                                            <td class="table-text"><div><a href="{{ url('educational-tools/edit/' . $educational_tool->id) }}">{{ $educational_tool->name }}</a></div></td>
                                            <td class="table-text"><div>{{ $educational_tool->price }}</div></td>
                                            <td class="table-text"><div>{{ $educational_tool->age_group }}</div></td>
                                            <td class="col-xs-2">
                                                <input class="form-control" name="count-{{$educational_tool->id}}" type="text" value="{{ isset($grade_educational_tools_counts[$educational_tool->id]) ? $grade_educational_tools_counts[$educational_tool->id] : $grade->class_count }}">
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group text-center">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-edit"></i>ثبت
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


