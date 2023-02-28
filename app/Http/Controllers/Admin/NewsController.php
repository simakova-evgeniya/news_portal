<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\News;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;

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
    public function store(CreateRequest $request): RedirectResponse
    {
            
        $news = News::create($request->validated());

        if ($news->save()) {
            $news->categories()->attach($request->getCategoryIds());
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
     * @param  EditRequest  $request
     * @param  News $news
     * @return Response
     */
    public function update(EditRequest $request,News $news): RedirectResponse
    {
        $news = $news->fill($request->validated());
        if ($news->save()) {
            $news->categories()->sync($request->getCategoryIds());
            return redirect()->route('admin.news.index')->with('success',__('messages.admin.news.success'));
        }
        return \back()->with('error',__('messages.admin.news.fail'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return Response
     */
    public function destroy(News $news): JsonResponse
    {
        try
        {
            $news->delete();
            return response()->json('ok');

        } catch (Exception $exception) {
            Log::error($exception->getMessage(),[$exception]);
            return response()->json('error',400);
        }
    }
}
