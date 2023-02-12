<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Reviews;

use App\Http\Controllers\AbstractControllers\AdminListController;
use App\Models\Review;
use App\QueryBuilders\ReviewsQueryBuilder;
use App\View\ViewVars\AdminListViewVars;
use App\View\ViewVars\AdminSetterViewVars;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewsController extends AdminListController
{
    private string $setterPath = 'admin.setters.reviewsSetter';
    function getList(ReviewsQueryBuilder $builder, AdminListViewVars $viewVars): View
    {
        $list = $builder->getAdminList();
        $viewVars->list = $list;
        $viewVars->header = 'Список Отзывов';
        $viewVars->tableHeaders = [
            'Имя ревьювера',
            'Описание',
            'Запись создана',
            'Запись изменена'
        ];
        $viewVars->properties = [
            'username',
            'description',
            'created_at',
            'updated_at'
        ];
        $viewVars->routes = 'admin/reviews/';
        return $this->renderList($viewVars);
    }
    function change(Review $review, AdminSetterViewVars $viewVars): View
    {
        $viewVars->header = 'Изменение отзыва';
        $viewVars->actionRoute = \route('admin/reviews/actions/change', ['review' => $review->id]);
        $viewVars->model = $review;
        return $this->renderSetter($this->setterPath, $viewVars);
    }
    function create(Request $request, AdminSetterViewVars $viewVars): View
    {
        $viewVars->model = new Review($request->old());
        $viewVars->header = 'Создание отзыва';
        $viewVars->actionRoute = \route('admin/reviews/actions/create');
        return $this->renderSetter($this->setterPath, $viewVars);
    }
}
