@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <b>{{$list->name}}</b>
                </div>

                @if (count($grades) > 0)
                <div class="panel-body">
                    <table class="table table-condensed list-table">
                        @foreach ($grades as $grade)
                        <thead>
                            <th>{{ $grade->name }}</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div>تعداد کلاس: {{ $grade->class_count }}</div></td>
                                <td><div>تعداد دانش‌آموز: {{ $grade->student_count }}</div></td>
                            </tr>
                            @if (count($grade->books) > 0)
                                <tr>
                                    <td><div>کتاب</div></td>
                                    <td><div>تعداد</div></td>
                                </tr>
                                @foreach ($grade->books as $book)
                                    <tr>
                                        <td><div>{{$book->name}}</div></td>
                                        <td><div>{{$book->pivot->count}}</div></td>
                                    </tr>
                                @endforeach
                            @endif
                            @if (count($grade->handbooks) > 0)
                                <tr>
                                    <td><div>دستنامه</div></td>
                                    <td><div>تعداد</div></td>
                                </tr>
                                @foreach ($grade->handbooks as $item)
                                    <tr>
                                        <td><div>{{$item->name}}</div></td>
                                        <td><div>{{$item->pivot->count}}</div></td>
                                    </tr>
                                @endforeach
                            @endif
                            @if (count($grade->activities) > 0)
                                <tr>
                                    <td><div>فعالیت</div></td>
                                    <td><div>تعداد</div></td>
                                </tr>
                                @foreach ($grade->activities as $item)
                                    <tr>
                                        <td><div>{{$item->name}}</div></td>
                                        <td><div>{{$item->pivot->count}}</div></td>
                                    </tr>
                                @endforeach
                            @endif
                            @if (count($grade->educationalTools) > 0)
                                <tr>
                                    <td><div>ابزار کمک‌آموزشی</div></td>
                                    <td><div>تعداد</div></td>
                                </tr>
                                @foreach ($grade->educationalTools as $item)
                                    <tr>
                                        <td><div>{{$item->name}}</div></td>
                                        <td><div>{{$item->pivot->count}}</div></td>
                                    </tr>
                                @endforeach
                            @endif
                            @if (count($grade->educationalPacks) > 0)
                                <tr>
                                    <td><div>بسته آموزش خلاق</div></td>
                                    <td><div>تعداد</div></td>
                                </tr>
                                @foreach ($grade->educationalPacks as $item)
                                    <tr>
                                        <td><div>{{$item->name}}</div></td>
                                        <td><div>{{$item->pivot->count}}</div></td>
                                    </tr>
                                @endforeach
                            @endif
                                    <tr class="active">
                                        <td class="table-text"><div>هزینه پایه</div></td>
                                        <td class="table-text"><div>{{ number_format($grade->cost) }}</div></td>

                                    </tr>
                                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        </tbody>
                        @endforeach
                        <tfoot>
                            <tr class="{{ $grades->sum('cost') > $list->budget ? 'danger' : 'success' }}">
                              <th>هزینه مجموع پایه‌ها</th>
                              <th>{{ number_format($grades->sum('cost')) }}</th>
                            </tr> 
                            <tr class="info">
                              <th>بودجه</th>
                              <th>{{ number_format($list->budget) }}</th>
                            </tr> 
                        </tfoot>
                    </table>
                </div>
                @endif
                <div class="panel-footer text-center hidden-print">
                    <a href="javascript:window.print()"><i class="fa fa-btn fa-print"></i>چاپ</a>
                </div>
            </div>

        </div>
    </div>
@endsection


