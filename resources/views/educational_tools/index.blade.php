@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current EducationalTools -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        ابزارهای کمک‌آموزشی
                                <a class="btn" href="educational-tools/create">
                                    <i class="fa fa-btn fa-plus"></i>ابزار کمک‌آموزشی جدید
                                </a>
                    </div>
                    @if (count($educational_tools) > 0)

                    <div class="panel-body">
                        <table class="table table-striped educational-tool-table">
                            <thead>
                                <th>نام</th>
                                <th>قیمت</th>
                                <th>گروه سنی</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($educational_tools as $educational_tool)
                                    <tr>
                                        <td class="table-text"><div>{{ $educational_tool->name }}</div></td>
                                        <td class="table-text"><div>{{ $educational_tool->price }}</div></td>
                                        <td class="table-text"><div>{{ $educational_tool->age_group }}</div></td>

                                        <!-- EducationalTool Delete Button -->
                                        <td>
                                            <a class="btn btn-primary list-edit-btn" href="{{url('educational-tools/edit/' . $educational_tool->id)}}">ویرایش</a>
                                            <form action="{{url('educational-tools/delete/' . $educational_tool->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-educational-tool-{{ $educational_tool->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>حذف
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        {{ $educational_tools->links() }}
                    </div>
                    @endif
                </div>
        </div>
    </div>
@endsection


