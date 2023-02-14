<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $model = new News();
        $newsList = $model->getNews();
        $join = \DB::table('news')
            ->join('category_has_news as chn', 'news.id', '=', 'chn.news_id')
            ->leftJoin('categories', 'chn.category_id', '=', 'categories.id')
            ->select("news.*", 'chn.category_id', 'categories.title as ctitle')
            ->get();
            
        return \view('admin.news.index',[
            'newsList'=>$newsList ,       
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
      return \view('admin.news.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        //валидация в контроллере плохо
        $request->validate([
            'title' => 'required',
        ]);
       return response() -> json($request -> only(['title','short_description','full_description']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
