@extends('layouts.admin')
@section('title', '過去の投稿の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>投稿のレビュー一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.review.create') }}" role="button" class="btn btn-primary">新規投稿</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.review.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="5%">番号</th>
                                <th width="25%">タイトル</th>
                                <th width="40%">感想</th>
                                <th width="15%">編集</th>
                                <th width="15%">お気に入り</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $review)
                                <tr>
                                    <th>{{ $review->id }}</th>
                                    <td>{{ Str::limit($review->title, 100) }}</td>
                                    <td>{{ Str::limit($review->content, 250) }}</td>
                                    {{-- 編集を追加 --}}
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.review.edit', ['review' => $review]) }}">編集</a>
                                        </div>
                                    </td>
                                    {{-- お気に入りのボタン追加 --}}
                                    <td><button id="button" type="//">お気に入り登録</ / />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
