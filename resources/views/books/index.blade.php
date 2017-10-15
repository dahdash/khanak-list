@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current Books -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        کتاب‌ها 
                                <a class="btn" href="books/create">
                                    <i class="fa fa-btn fa-plus"></i>کتاب جدید
                                </a>
                    </div>

                    @if (count($books) > 0)
                    <div class="panel-body">
                        <table class="table table-striped book-table">
                            <thead>
                                <th>نام</th>
                                <th>قیمت</th>
                                <th>اولویت</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td class="table-text"><div>{{ $book->name }}</div></td>
                                        <td class="table-text"><div>{{ $book->price }}</div></td>
                                        <td class="table-text"><div>{{ $book->priority }}</div></td>

                                        <!-- Book Delete Button -->
                                        <td>
                                            <a class="btn btn-primary list-edit-btn" href="{{url('books/edit/' . $book->id)}}">ویرایش</a>
                                            <form action="{{url('books/delete/' . $book->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-book-{{ $book->id }}" class="btn btn-danger">
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
                        {{ $books->links() }}
                    </div>
                    @endif
                </div>
        </div>
    </div>
@endsection


