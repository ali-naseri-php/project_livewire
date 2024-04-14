<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\articleApiStoreRequest;
use App\Models\Mesige;

use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Artisan;
use App\Models\Article;
use function Pest\Laravel\json;

class articleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //برای این که روی دستا بیس فشار نیاد اگ 1000 تا artcle داشتیم
        return Article::paginate(2);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(articleApiStoreRequest $request)
    {

        $article_new = new Article();
        $article_new->title = $request->title;
        $article_new->body = $request->body;

        $article_new->user_id = $request->user_id;
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images_post/'), $image);
        $article_new->image = $image;
        $article_new->save();
        return response()->json(['msg' => 'add new article'], 201);


    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
//        dd(Mesige::with('user')->where('interface',"$article->id")->get());
        $masigAndUser = Mesige::with('user')->where('interface',"$article->id")->get();
        return response()->json($masigAndUser);
//        foreach ($ali->all() as $item) {
//            dd($item->user->name);
//        }
        $ali = Mesige::with('user')->get();

//        $msgs = Mesige::where('interface', '=', $article->id)->get()->with('user');
//        foreach ($msgs as $msg) {
//            $msg->user_id=$msg->user()->first()->name;
//            dd($msg);
//        }
//            $msg->user()->first()->name;


        return response()->json(['data' => $article], 200);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
//        dd($article);

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:255|'

        ]);
        $article->update($request->all());

        return response()->json($article, 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Article::delete();
        return response()->json(['msg' => 'delete ok!'], 200);
    }
}
