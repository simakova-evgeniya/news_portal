<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;


use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\News;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use App\Enums\NewsStatus;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index( NewsQueryBuilder $newsQueryBuilder): View
    {

            
        return \view('admin.news.index',[

            'newsList'=>$newsQueryBuilder->getNewsWithPagination() ,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
       
      return \view('admin.news.create',[
              'categories' => $categoriesQueryBuilder->getAll(),
              'statuses' => NewsStatus::all(),
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //валидация в контроллере плохо
        $request->validate([
            'title' => 'required',
        ]);

        $news = new News($request->except('_token', 'category_id'));

        if ($news->save()) {
            return redirect()->route('admin.news.index')->with('success','Новость успешно добавлена');
        }
        return \back()->with('error','Не удалось сохранить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id):Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @param  CategoriesQueryBuilder $categoriesQueryBuilder
     * @return Response
     */
    public function edit(News $news,CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.news.edit',[
            'news' => $news,
            'categories' => $categoriesQueryBuilder->getAll(),
            'statuses' => NewsStatus::all(),
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,News $news): RedirectResponse
    {
        $news = $news->fill($request->except('_token', 'category_ids'));
        if ($news->save()) {
            $news->categories()->sync((array) $request->input('category_ids'));
            return redirect()->route('admin.news.index')->with('success','Новость успешно обновлена');
        }
        return \back()->with('error','Не удалось сохранить запись');

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
