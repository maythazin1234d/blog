<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
 {
    $data = Article::latest()->paginate(5);

        return view('articles.index', [
        'articles' => $data
        ]);
       
 }
 public function detail($id)
 {
    
        $data = Article::find($id);
        return view('articles.detail', [
        'article' => $data
        ]);
       
 }



 public function add()
{
 $data = [
 [ "id" => 1, "name" => "News" ],
 [ "id" => 2, "name" => "Tech" ],
 ];
 return view('articles.add', [
 'categories' => $data
 ]);
}

public function create()
{
 $validator = validator(request()->all(), [
 'title' => 'required',
 'body' => 'required',
 'category_id' => 'required',
 ]);

 if($validator->fails()) {
    return back()->withErrors($validator);
    }
    $article = new Article;
    $article->title = request()->title;
    $article->body = request()->body;
    $article->category_id = request()->category_id;
    $article->save();
    return redirect('/articles');
   }
   
   public function edit($id)
   {
    $data = [
    [ "id" => 1, "name" => "News" ],
    [ "id" => 2, "name" => "Tech" ],
    ];
    return view('articles.edit', [
    'categories' => $data
    ]);
   }
   
   public function updateArticle($id)
   {
    $validator = validator(request()->all(), [
    'title' => 'required',
    'body' => 'required',
    'category_id' => 'required',
    ]);
   
    if($validator->fails()) {
       return back()->withErrors($validator);
       }
       $article = Article::find($id);
       $article->title = request()->title;
       $article->body = request()->body;
       $article->category_id = request()->category_id;
       $article->update();
       return redirect('/articles');
      }





   public function delete($id)
   {
    $article = Article::find($id);
    $article->delete();
    return redirect('/articles')->with('info', 'Article deleted');
   }










   
   // public function edit($id)
   // {

   //  $validator = validator(request()->all(), [
   //  'title' => 'required',
   //  'body' => 'required',
   //  'category_id' => 'required',
   //  ]);





   //   $article = Article::find($id);
   //   $article->update();

   //   return redirect ('/articles');
   //       ->with('success', 'Post updated successfully.');





   //  $validator = validator(request()->all(), [
   //  'title' => 'required',
   //  'body' => 'required',
   //  'category_id' => 'required',
   //  ]);
   
   //  if($validator->fails()) {
   //     return back()->withErrors($validator);
   //     }
   //     $article = Article::find($id);
   //     $article->title = request()->title;
   //     $article->body = request()->body;
   //     $article->category_id = request()->category_id;
   //     $article->update();
   //     return redirect('/articles');





   // $data = Article::latest()->paginate(5);

   // return view('articles.index', [
   // 'articles' => $data
   // ]);
      // }

}
