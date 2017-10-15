@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current Activities -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        فعالیت‌ها 
                                <a class="btn" href="activities/create">
                                    <i class="fa fa-btn fa-plus"></i>فعالیت جدید
                                </a>
                    </div>

                    @if (count($activities) > 0)
                    <div class="panel-body">
                        <table class="table table-striped activity-table">
                            <thead>
                                <th>نام</th>
                                <th>قیمت</th>
                                <th>گروه سنی</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($activities as $activity)
                                    <tr>
                                        <td class="table-text"><div>{{ $activity->name }}</div></td>
                                        <td class="table-text"><div>{{ $activity->price }}</div></td>
                                        <td class="table-text"><div>{{ $activity->age_group }}</div></td>

                                        <!-- Activity Delete Button -->
                                        <td>
                                            <a class="btn btn-primary list-edit-btn" href="{{url('activities/edit/' . $activity->id)}}">ویرایش</a>
                                            <form action="{{url('activities/delete/' . $activity->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-activity-{{ $activity->id }}" class="btn btn-danger">
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
                        {{ $activities->links() }}
                    </div>
                    @endif
                </div>
        </div>
    </div>
@endsection


