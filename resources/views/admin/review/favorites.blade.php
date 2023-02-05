@extends('layouts.admin')
@section('title', 'お気に入り投稿の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>お気に入りのレビュー一覧</h2>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="5%">番号</th>
                                <th width="30%">タイトル</th>
                                <th width="65%">感想</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $review)
                                <tr>
                                    <th>{{ $review->id }}</th>
                                    <td>{{ Str::limit($review->title, 100) }}</td>
                                    <td>{{ Str::limit($review->content, 250) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
