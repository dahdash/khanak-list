@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    انتخاب دستنامه برای پایه <a href="{{ url('grades/edit/' . $grade->id) }}">«{{ $grade->name }}»</a> مربوط به لیست <a href="{{ url('lists/edit/' . $grade->khanak_list_id) }}">«{{ $grade->khanakList->name }}»</a>
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Grade Form -->
                    <form action="{{ url('grades/handbooks/' . $grade->id) }}" method="POST" class="form-horizontal">
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
                                    @foreach ($handbooks as $handbook)
                                        <tr>
                                            <td><input class="checkbox" type="checkbox" name="checkbox[]" value="{{$handbook->id}}" {{ in_array($handbook->id, $grade_handbooks_ids) ? 'checked' : '' }} ></td>
                                            <td class="table-text"><div><a href="{{ url('handbooks/edit/' . $handbook->id) }}">{{ $handbook->name }}</a></div></td>
                                            <td class="table-text"><div>{{ $handbook->price }}</div></td>
                                            <td class="table-text"><div>{{ $handbook->age_group }}</div></td>
                                            <td class="col-xs-2">
                                                <input class="form-control" name="count-{{$handbook->id}}" type="text" value="{{ isset($grade_handbooks_counts[$handbook->id]) ? $grade_handbooks_counts[$handbook->id] : $grade->class_count }}">
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


