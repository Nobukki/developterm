{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '新規投稿')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>新規投稿</h2>
                {{ Form::open(['route' => 'admin.review.store', 'files' => true]) }}

                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                {{-- タイトル --}}
                <div class="form-group row">
                    <label class="col-md-2" for="title">タイトル</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                    </div>
                </div>
                {{-- Score --}}
                <div class="form-group row">
                    <label class="col-md-2" for="score">評価（10点満点中）</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" name="score" id="score" value="{{ old('score') }}"
                            min="1" max="10">
                    </div>
                </div>
                {{-- 出版会社 --}}
                <div class="form-group row">
                    <label class="col-md-2" for="publisher">出版会社</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="publisher" id="publisher"
                            value="{{ old('publisher') }}">
                    </div>
                </div>
                {{-- 表紙 --}}
                <div class="form-group row">
                    <label class="col-md-2" for="image">表紙</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image" id="image">
                    </div>
                </div>
                {{-- 感想 --}}
                <div class="form-group row">
                    <label class="col-md-2" for="content">感想</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="content" id="content" rows="5">{{ old('body') }}</textarea>
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
@endsection
