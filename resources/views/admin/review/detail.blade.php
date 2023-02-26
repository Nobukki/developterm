@extends('layouts.admin')
@section('title', '投稿の詳細')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>投稿詳細</h2>
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
                            {{ $review->title }}
                        </div>
                    </div>

                    {{-- 評価を編集 --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="score">評価（10点満点中）</label>
                        <div class="col-md-10">
                            {{ $review->score }}
                        </div>
                    </div>

                    {{-- 出版会社を編集 --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="publisher">出版会社</label>
                        <div class="col-md-10">
                            {{ $review->publisher }}
                        </div>
                    </div>

                    {{-- 表紙を編集 --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="image">表紙</label>
                        <div class="col-md-10">
                            @if ($review->image_path)
                                <img class="mw-100" src="{{ asset('storage/image/' . $review->image_path) }}">
                            @endif
                        </div>
                        {{-- <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                            </label>
                        </div> --}}
                    </div>

                    {{-- 感想を編集 --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="content">感想</label>
                        <div class="col-md-10">
                            {!! nl2br(e($review->content)) !!}
                        </div>
                    </div>
                    {{-- <div class="text-right"> --}}
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $review->id }}">
                            {{ csrf_field() }}
                            <a class="btn btn-primary" href="{{ route('admin.review.edit', ['review' => $review]) }}"
                                style="text-decoration:none;">編集</a>
                        </div>
                    </div>
                    {{-- </div> --}}
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $review->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="戻る">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
