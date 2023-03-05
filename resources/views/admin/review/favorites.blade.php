@extends('layouts.admin')
@section('title', 'お気に入り投稿の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>お気に入りのレビュー一覧</h2>
        </div>
        <div class="col-6">
            <a href="{{ route('admin.review.index') }}" role="button" class="btn btn-primary">投稿一覧へ戻る</a>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>番号</th>
                                <th width="30%">タイトル</th>
                                <th width="60%">感想</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $review)
                                <tr>
                                    <th>{{ $review->id }}</th>
                                    <td>
                                        <a href="{{ route('admin.review.detail', ['review' => $review]) }}"
                                            class="link-light">
                                            {{ Str::limit($review->title, 100) }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.review.detail', ['review' => $review]) }}"
                                            class="link-light">
                                            {{ Str::limit($review->content, 250) }}
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
