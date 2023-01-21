@extends('layouts.admin')
@section('title', '投稿の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>投稿の編集</h2>
                <form action="{{ route('admin.review.update', ['review' => $review]) }}" method="post"
                    enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {{-- タイトルを編集 --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $review->title }}">
                        </div>
                    </div>

                    {{-- 評価を編集 --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="score">評価（10点満点中）</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" name="score" id="score"
                                value="{{ $review->score }}" min="1" max="10">
                        </div>
                    </div>

                    {{-- 出版会社を編集 --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="publisher">出版会社</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="publisher" id="publisher"
                                value="{{ $review->publisher }}">
                        </div>
                    </div>

                    {{-- 表紙を編集 --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="image">表紙</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image" id="image">
                            <div class="form-text text-info">
                                設定中: {{ $review->image_path }}
                            </div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                            </label>
                        </div>
                    </div>

                    {{-- 感想を編集 --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="content">感想</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="content" id="content" rows="5">{{ $review->content }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $review->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
