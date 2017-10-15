@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ویرایش پایه مربوط به لیست <a href="{{ url('lists/edit/' . $grade->khanak_list_id) }}">«{{ $grade->khanakList->name }}»</a>
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- Edit Grade Form -->
                    <form action="{{ url('grades/edit/' . $grade->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Grade Name -->
                        <div class="form-group required">
                            <label for="grade-name" class="col-sm-3 control-label">نام</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="grade-name" class="form-control" value="{{ $grade->name }}">
                            </div>
                        </div>

                        <!-- Grade class_count -->
                        <div class="form-group required">
                            <label for="grade-class_count" class="col-sm-3 control-label">تعداد کلاس</label>

                            <div class="col-sm-6">
                                <input type="text" name="class_count" id="grade-class_count" class="form-control" value="{{ $grade->class_count }}">
                            </div>
                        </div>

                        <!-- Grade student_count -->
                        <div class="form-group required">
                            <label for="grade-student_count" class="col-sm-3 control-label">تعداد دانش‌آموز</label>

                            <div class="col-sm-6">
                                <input type="text" name="student_count" id="student_count-name" class="form-control" value="{{ $grade->student_count }}">
                            </div>
                        </div>

                        <!-- Grade Description -->
                        <div class="form-group">
                            <label for="grade-description" class="col-sm-3 control-label">توضیحات</label>

                            <div class="col-sm-6">
                                <textarea name="description" id="grade-description" class="form-control">{{ $grade->description }}</textarea>
                            </div>
                        </div>

                        <!-- Add Grade Button -->
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
                    کتاب‌ها
                        <a class="btn" href="{{url('grades/books/'.$grade->id)}}">
                            <i class="fa fa-btn fa-hand-o-up"></i>انتخاب کتاب
                        </a>
                </div>

                @if (count($grade->books) > 0)
                <div class="panel-body">
                    <table class="table table-striped list-table">
                        <thead>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>گروه سنی</th>
                            <th>اولویت</th>
                            <th>تعداد</th>
                        </thead>
                        <tbody>
                            @php
                                $books_cost = 0;
                            @endphp
                            @foreach ($grade->books as $book)
                                <tr>
                                    <td class="table-text"><div>{{ $book->name }}</div></td>
                                    <td class="table-text"><div>{{ number_format($book->price) }}</div></td>
                                    <td class="table-text"><div>{{ $book->age_group }}</div></td>
                                    <td class="table-text"><div>{{ $book->priority }}</div></td>
                                    <td class="table-text"><div>{{ $book->pivot->count }}</div></td>
                                </tr>
                                @php
                                    $books_cost += $book->price * $book->pivot->count;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="info">
                              <th>هزینه مجموع</th>
                              <th>{{ number_format($books_cost) }}</th>
                            </tr> 
                        </tfoot>
                    </table>
                </div>
                @endif
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    دستنامه‌ها
                        <a class="btn" href="{{url('grades/handbooks/'.$grade->id)}}">
                            <i class="fa fa-btn fa-hand-o-up"></i>انتخاب دستنامه
                        </a>
                </div>

                @if (count($grade->handbooks) > 0)
                <div class="panel-body">
                    <table class="table table-striped list-table">
                        <thead>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>گروه سنی</th>
                            <th>تعداد</th>
                        </thead>
                        <tbody>
                            @php
                                $handbooks_cost = 0;
                            @endphp
                            @foreach ($grade->handbooks as $handbook)
                                <tr>
                                    <td class="table-text"><div>{{ $handbook->name }}</div></td>
                                    <td class="table-text"><div>{{ number_format($handbook->price) }}</div></td>
                                    <td class="table-text"><div>{{ $handbook->age_group }}</div></td>
                                    <td class="table-text"><div>{{ $handbook->pivot->count }}</div></td>
                                </tr>
                                @php
                                    $handbooks_cost += $handbook->price * $handbook->pivot->count;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="info">
                              <th>هزینه مجموع</th>
                              <th>{{ number_format($handbooks_cost) }}</th>
                            </tr> 
                        </tfoot>
                    </table>
                </div>
                @endif
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    فعالیت‌ها
                        <a class="btn" href="{{url('grades/activities/'.$grade->id)}}">
                            <i class="fa fa-btn fa-hand-o-up"></i>انتخاب فعالیت
                        </a>
                </div>

                @if (count($grade->activities) > 0)
                <div class="panel-body">
                    <table class="table table-striped list-table">
                        <thead>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>گروه سنی</th>
                            <th>تعداد</th>
                        </thead>
                        <tbody>
                            @php
                                $activities_cost = 0;
                            @endphp
                            @foreach ($grade->activities as $activity)
                                <tr>
                                    <td class="table-text"><div>{{ $activity->name }}</div></td>
                                    <td class="table-text"><div>{{ number_format($activity->price) }}</div></td>
                                    <td class="table-text"><div>{{ $activity->age_group }}</div></td>
                                    <td class="table-text"><div>{{ $activity->pivot->count }}</div></td>
                                </tr>
                                @php
                                    $activities_cost += $activity->price * $activity->pivot->count;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="info">
                              <th>هزینه مجموع</th>
                              <th>{{ number_format($activities_cost) }}</th>
                            </tr> 
                        </tfoot>
                    </table>
                </div>
                @endif
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    ابزارهای کمک‌آموزشی
                        <a class="btn" href="{{url('grades/educational-tools/'.$grade->id)}}">
                            <i class="fa fa-btn fa-hand-o-up"></i>انتخاب ابزار کمک‌آموزشی
                        </a>
                </div>

                @if (count($grade->educationalTools) > 0)
                <div class="panel-body">
                    <table class="table table-striped list-table">
                        <thead>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>گروه سنی</th>
                            <th>تعداد</th>
                        </thead>
                        <tbody>
                            @php
                                $educational_tools_cost = 0;
                            @endphp
                            @foreach ($grade->educationalTools as $educational_tool)
                                <tr>
                                    <td class="table-text"><div>{{ $educational_tool->name }}</div></td>
                                    <td class="table-text"><div>{{ number_format($educational_tool->price) }}</div></td>
                                    <td class="table-text"><div>{{ $educational_tool->age_group }}</div></td>
                                    <td class="table-text"><div>{{ $educational_tool->pivot->count }}</div></td>
                                </tr>
                                @php
                                    $educational_tools_cost += $educational_tool->price * $educational_tool->pivot->count;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="info">
                              <th>هزینه مجموع</th>
                              <th>{{ number_format($educational_tools_cost) }}</th>
                            </tr> 
                        </tfoot>
                    </table>
                </div>
                @endif
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    بسته‌های آموزش خلاق
                        <a class="btn" href="{{url('grades/educational-packs/'.$grade->id)}}">
                            <i class="fa fa-btn fa-hand-o-up"></i>انتخاب بسته آموزش خلاق
                        </a>
                </div>

                @if (count($grade->educationalPacks) > 0)
                <div class="panel-body">
                    <table class="table table-striped list-table">
                        <thead>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>گروه سنی</th>
                            <th>تعداد</th>
                        </thead>
                        <tbody>
                            @php
                                $educational_packs_cost = 0;
                            @endphp
                            @foreach ($grade->educationalPacks as $educational_pack)
                                <tr>
                                    <td class="table-text"><div>{{ $educational_pack->name }}</div></td>
                                    <td class="table-text"><div>{{ number_format($educational_pack->price) }}</div></td>
                                    <td class="table-text"><div>{{ $educational_pack->age_group }}</div></td>
                                    <td class="table-text"><div>{{ $educational_pack->pivot->count }}</div></td>
                                </tr>
                                @php
                                    $educational_packs_cost += $educational_pack->price * $educational_pack->pivot->count;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="info">
                              <th>هزینه مجموع</th>
                              <th>{{ number_format($educational_packs_cost) }}</th>
                            </tr> 
                        </tfoot>
                    </table>
                </div>
                @endif
            </div>



        </div>
    </div>
@endsection


