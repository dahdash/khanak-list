@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    انتخاب فعالیت برای پایه <a href="{{ url('grades/edit/' . $grade->id) }}">«{{ $grade->name }}»</a> مربوط به لیست <a href="{{ url('lists/edit/' . $grade->khanak_list_id) }}">«{{ $grade->khanakList->name }}»</a>
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Grade Form -->
                    <form action="{{ url('grades/activities/' . $grade->id) }}" method="POST" class="form-horizontal">
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
                                    @foreach ($activities as $activity)
                                        <tr>
                                            <td><input class="checkbox" type="checkbox" name="checkbox[]" value="{{$activity->id}}" {{ in_array($activity->id, $grade_activities_ids) ? 'checked' : '' }} ></td>
                                            <td class="table-text"><div><a href="{{ url('activities/edit/' . $activity->id) }}">{{ $activity->name }}</a></div></td>
                                            <td class="table-text"><div>{{ $activity->price }}</div></td>
                                            <td class="table-text"><div>{{ $activity->age_group }}</div></td>
                                            <td class="col-xs-2">
                                                <input class="form-control" name="count-{{$activity->id}}" type="text" value="{{ isset($grade_activities_counts[$activity->id]) ? $grade_activities_counts[$activity->id] : round($grade->student_count/10) }}">
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


