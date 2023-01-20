<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lists\NewsLists\AllNewsList;
use App\Providers\news\FakeNewsProvider;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsHandlerController extends Controller
{
    private AllNewsList $list;

    public function __construct()
    {
        parent::__construct();
        $provider = new FakeNewsProvider();
        $this->list = $provider->getList();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index(): View
//    {
//        return \view('admin.index');
//    }

    public function create(): View
    {
        $categoriesNames = $this->list->getCategoriesNames();
        return \view('admin.news.createNews', ['categoriesNames' => $categoriesNames]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
