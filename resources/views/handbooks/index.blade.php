@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current Handbooks -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        دستنامه‌ها 
                                <a class="btn" href="handbooks/create">
                                    <i class="fa fa-btn fa-plus"></i>دستنامه جدید
                                </a>
                    </div>

                    @if (count($handbooks) > 0)
                    <div class="panel-body">
                        <table class="table table-striped handbook-table">
                            <thead>
                                <th>نام</th>
                                <th>قیمت</th>
                                <th>گروه سنی</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($handbooks as $handbook)
                                    <tr>
                                        <td class="table-text"><div>{{ $handbook->name }}</div></td>
                                        <td class="table-text"><div>{{ $handbook->price }}</div></td>
                                        <td class="table-text"><div>{{ $handbook->age_group }}</div></td>

                                        <!-- Handbook Delete Button -->
                                        <td>
                                            <a class="btn btn-primary list-edit-btn" href="{{url('handbooks/edit/' . $handbook->id)}}">ویرایش</a>
                                            <form action="{{url('handbooks/delete/' . $handbook->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-handbook-{{ $handbook->id }}" class="btn btn-danger">
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
                        {{ $handbooks->links() }}
                    </div>
                    @endif
                </div>
        </div>
    </div>
@endsection


