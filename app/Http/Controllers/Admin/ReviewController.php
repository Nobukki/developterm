<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Review\CreateRequest as ReviewCreateRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Review\UpdateRequest as ReviewUpdateRequest;

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
        $review = Review::find($request->id);
        $review_form = $request->all();
        if ($request->remove == 'true') {
            $review_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $review_form['image_path'] = basename($path);
        } else {
            $review_form['image_path'] = $review->image_path;
        }

        unset($review_form['image']);
        unset($review_form['remove']);
        unset($review_form['_token']);

        $review->fill($review_form)->save();

        return redirect('admin/review');
    }


    public function favorite($review)
    {
        // dd($review);
        $is_favorite = Review::find($review)->is_favorite;
        Review::find($review)->fill(['is_favorite' => !$is_favorite])->save();
        return redirect('admin/review');
    }


    public function favoriteIndex(Request $request)
    {
        $cond_title = $request->cond_title;
        $posts = Review::where('is_favorite', '=', 1)->get();
        return view('admin.review.favorites', ['posts' => $posts, 'cond_title' => $cond_title]);

    }


    public function detail(Request $request, $review)
    {
        $review_info = Review::find($review);
        if (empty($review_info)) {
            abort(404);
        }
        return view('admin.review.detail', ['review' => $review_info]);
    }



}
