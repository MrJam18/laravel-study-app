<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Exceptions\DBRecordNotFoundException;
use App\Http\Controllers\AbstractControllers\ActionController;
use App\Models\News\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoriesActionsController extends ActionController
{
    private string $listRoute = 'admin/categories/list';
       public function create(Request $request): RedirectResponse
    {
        try{
            $data = $request->except(['__token']);
            $category = new Category($data);
            $category->save();
            return $this->redirectWithAlert('admin/categories/list', 'Категория успешно создана');
        }
        catch (\Exception $exception)
        {
           return $this->backWithError($exception, $request);
        }
    }

    public function edit(Category $category, Request $request): RedirectResponse
    {
        try {
            if(!$category->id) throw new \Exception('Категория не найдена.');
            $data = $request->except('__token');
            $category->update($data);
            return $this->redirectWithAlert('admin/categories/list', 'Категория успешно изменена');
        }
        catch (\Exception $e) {
            return $this->backWithError($e, $request);
        }
    }


    public function destroy(Category $category): RedirectResponse
    {
        try {
            $result = $category->delete();
            if(!$result) throw new DBRecordNotFoundException('запись не найдена для удаления.');
            return $this->redirectWithAlert($this->listRoute, 'Категория успешно удалена');
        } catch (\Exception $e) {
            return $this->redirectWithError($this->listRoute, $e);
        }
    }
}
