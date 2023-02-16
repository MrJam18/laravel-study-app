<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Exceptions\DBRecordNotFoundException;
use App\Http\Controllers\AbstractControllers\ActionController;
use App\Http\Requests\Admin\Setters\CategoriesSetterRequest;
use App\Models\News\Category;
use Illuminate\Http\RedirectResponse;

class CategoriesActionsController extends ActionController
{
    private string $listRoute = 'admin/categories/list';
       public function create(CategoriesSetterRequest $request): RedirectResponse
    {
        try{
            $data = $request->validated();
            $category = new Category($data);
            $category->save();
            return $this->redirectWithAlert('admin/categories/list', 'Категория успешно создана');
        }
        catch (\Exception $exception)
        {
           return $this->backWithError($exception, $request);
        }
    }

    public function edit(Category $category, CategoriesSetterRequest $request): RedirectResponse
    {
        try {
            if(!$category->exists) throw new DBRecordNotFoundException('Категория не найдена.');
            $data = $request->validated();
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
