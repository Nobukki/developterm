@extends('layouts.admin')
@section('title', '過去の投稿の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>投稿のレビュー一覧</h2>
        </div>
        <div class="row">
            <div class="h4 col-6">
                <a href="{{ route('admin.review.create') }}">新規投稿</a>
            </div>
            <div class="h4 col-6 text-right">
                <a href="{{ route('admin.review.favoriteIndex') }}" class="primary">お気に入り一覧</a>
            </div>
        </div>
        <div class="row">
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
                                <th>番号</th>
                                <th width="20%">タイトル</th>
                                <th width="30%">感想</th>
                                <th>編集</th>
                                <th>お気に入り</th>
                                {{-- <th>削除</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $review)
                                <tr>
                                    <th>{{ $review->id }}</th>
                                    <td>
                                        <a href="{{ route('admin.review.detail', ['review' => $review]) }}"
                                            class="link-light">
                                            {{ Str::limit($review->title, 20) }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.review.detail', ['review' => $review]) }}"
                                            class="link-light">
                                            {{ Str::limit($review->content, 20) }}
                                        </a>
                                    </td>
                                    {{-- 編集を追加 --}}
                                    <td>
                                        <div>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.review.edit', ['review' => $review]) }}"
                                                style="text-decoration:none;">編集</a>
                                        </div>
                                    </td>
                                    {{-- お気に入りのボタン追加 --}}
                                    <td>
                                        <a href="{{ route('admin.review.favorite', ['review' => $review]) }}">
                                            {{-- @if ($review->is_favorite == 0) --}}
                                            @if ($review->is_favorite)
                                                <button type="button" class="btn btn-primary btn-sm">解除</button>
                                            @else
                                                <button type="button" class="btn btn-primary btn-sm">登録</button>
                                            @endif
                                        </a>
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
