<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Review\CreateRequest as ReviewCreateRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewUpdateRequest;

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

        return redirect(route('admin.review.index'));

    }

    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Review::where('title', $cond_title)->get();
        } else {
            $posts = Review::all();
        }
        return view('admin.review.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }


    public function edit(Request $request, $review)
    {
        $review_info = Review::find($review);
        if (empty($review_info)) {
            abort(404);
        }
        return view('admin.review.edit', ['review' => $review_info]);
    }


    public function update(ReviewUpdateRequest $request)
    {

    }



}
