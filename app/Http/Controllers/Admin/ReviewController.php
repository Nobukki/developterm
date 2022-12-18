<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Review\CreateRequest as ReviewCreateRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    public function add()
    {
        return view('admin.review.create');
    }

    public function store(ReviewCreateRequest $request)
    {
        // dd(__METHOD__);
        $review = new Review;
        $form = $request->all();

         // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $review->image_path = basename($path);
        } else {
            $review->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $review->fill($form);
        $review->user_id = Auth::id();
        $review->save();

        return redirect(route('admin.review.create'));

    }


}
