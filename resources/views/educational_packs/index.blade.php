@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current EducationalPacks -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        بسته‌های آموزش خلاق
                                <a class="btn" href="educational-packs/create">
                                    <i class="fa fa-btn fa-plus"></i>بسته آموزش خلاق جدید
                                </a>
                    </div>
                    @if (count($educational_packs) > 0)

                    <div class="panel-body">
                        <table class="table table-striped educational-pack-table">
                            <thead>
                                <th>نام</th>
                                <th>قیمت</th>
                                <th>گروه سنی</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($educational_packs as $educational_pack)
                                    <tr>
                                        <td class="table-text"><div>{{ $educational_pack->name }}</div></td>
                                        <td class="table-text"><div>{{ $educational_pack->price }}</div></td>
                                        <td class="table-text"><div>{{ $educational_pack->age_group }}</div></td>

                                        <!-- EducationalPack Delete Button -->
                                        <td>
                                            <a class="btn btn-primary list-edit-btn" href="{{url('educational-packs/edit/' . $educational_pack->id)}}">ویرایش</a>
                                            <form action="{{url('educational-packs/delete/' . $educational_pack->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-educational-pack-{{ $educational_pack->id }}" class="btn btn-danger">
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
                        {{ $educational_packs->links() }}
                    </div>
                    @endif
                </div>
        </div>
    </div>
@endsection


