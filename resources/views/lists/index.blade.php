@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current lists -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        لیست‌ها 
                                <a class="btn" href="lists/create">
                                    <i class="fa fa-btn fa-plus"></i>لیست جدید
                                </a>
                    </div>

                    @if (count($lists) > 0)
                    <div class="panel-body">
                        <table class="table table-striped list-table">
                            <thead>
                                <th>نام</th>
                                <th>بودجه</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($lists as $list)
                                    <tr>
                                        <td class="table-text"><div>{{ $list->name }}</div></td>
                                        <td class="table-text"><div>{{ number_format($list->budget) }}</div></td>

                                        <!-- list Delete Button -->
                                        <td>
                                            <a class="btn btn-success list-edit-btn" href="{{url('lists/export/' . $list->id)}}">خروجی</a>
                                            <a class="btn btn-primary list-edit-btn" href="{{url('lists/edit/' . $list->id)}}">ویرایش</a>
                                            <form action="{{url('lists/delete/' . $list->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-list-{{ $list->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>حذف
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                    <div class="text-center">
                        {{ $lists->links() }}
                    </div>
                </div>
        </div>
    </div>
@endsection


