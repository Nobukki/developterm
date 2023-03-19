@extends('layouts.admin')
@section('title', '投稿の詳細')

@section('content')
    <div class="container">
        <h2>投稿詳細</h2>
        <form action="{{ route('admin.review.update', ['review' => $review]) }}" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif

            {{-- 表紙を編集 --}}
            <div class="form-group">
                <label class="h3 text-nowrap col-md-2" for="image">表紙</label>
                <div class="col-md-10">
                    @if ($review->image_path)
                        <img style="max-width:100%" src="{{ asset('storage/image/' . $review->image_path) }}">
                    @endif
                </div>
                {{-- <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                        </label>
                                    </div> --}}
            </div>



            {{-- タイトルを編集 --}}
            <div class="form-group">
                <label class="h3 text-nowrap col-md-2" for="title">タイトル</label>
                <div class="col-md-10 bg-white text-dark p-1">
                    {{ $review->title }}
                </div>
            </div>

            {{-- 評価を編集 --}}
            <div class="form-group">
                <label class="h3 text-nowrap col-xs-2" for="score">評価（10点満点中）</label>
                <div class="col-md-10 bg-white text-dark">
                    {{ $review->score }}
                </div>
            </div>

            {{-- 出版会社を編集 --}}
            <div class="form-group">
                <label class="h3 text-nowrap col-md-2" for="publisher">出版会社</label>
                <div class="col-md-10 bg-white text-dark">
                    {{ $review->publisher }}
                </div>
            </div>


            {{-- 感想を編集 --}}
            <div class="form-group">
                <label class="h3 col-md-2" for="content">感想</label>
                <div class="col-md-10 bg-white text-dark">
                    {!! nl2br(e($review->content)) !!}
                </div>
            </div>
            {{-- <div class="text-right"> --}}
            <div class="form-group row">
                <div class="col-md-10">
                    <input type="hidden" name="id" value="{{ $review->id }}">
                    {{ csrf_field() }}
                    <a class="mt-5 btn btn-primary" href="{{ route('admin.review.edit', ['review' => $review]) }}"
                        style="text-decoration:none;">編集</a>
                </div>
            </div>
            {{-- </div> --}}
            <div class="form-group row">
                <div class="col-md-10">
                    <input type="hidden" name="id" value="{{ $review->id }}">
                    {{ csrf_field() }}
                    <a class="mt-3 btn btn-primary" href="javascript:history.back();" style="text-decoration:none;">戻る</a>
                </div>
                <div>
                    <a class="mt-3 btn btn-danger" href="javascript:void(0);"
                        onclick="var ok=confirm('本当に削除しますか');
                    if (ok) location.href='{{ route('admin.review.delete', ['review' => $review]) }}'; return false;">削除</a>
                </div>
            </div>
        </form>
    </div>
@endsection
