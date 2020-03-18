<?php

namespace App\Http\Controllers;

use Auth;
use App\News;
use App\Program;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Validation
     */

    protected $validationRules = [
        'title'     => 'required:min:3',
        'content'   => 'required:min:8',
        'author'    => 'required:min:3'
    ];

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    {

        if(Auth::guest())
        {
            abort(403);
        }
        return view('news/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validData = $request->validate([
            'title'     => 'required',
            'content'   => 'required',
            'author'    => 'required'
        ]);

        $validData['user_id'] = Auth::id();

        $news = News::create($validData);

        return redirect('/home')->with('status', 'News created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {

        return view('/news/show',[
            'news'  => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('/news/edit', [
            'news'  => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validData = $request->validate($this->validationRules);
        $news->title = $validData['title'];
        $news->content = $validData['content'];
        $news->author = $validData['author'];

        $news->save();
        return redirect('/home')->with('status', 'News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {

        $news->delete();

        return redirect('/home')->with('status', 'News deleted successfully');
    }
}
