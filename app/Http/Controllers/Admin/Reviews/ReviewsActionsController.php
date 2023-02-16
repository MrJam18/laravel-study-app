<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Reviews;

use App\Http\Controllers\AbstractControllers\ActionController;
use App\Http\Requests\Admin\Setters\ReviewsSetterRequest;
use App\Models\Review;
use Exception;
use Illuminate\Http\RedirectResponse;

class ReviewsActionsController extends ActionController
{
    private string $listRoute = 'admin/reviews/list';
    function create(ReviewsSetterRequest $request): RedirectResponse
    {
        try{
            $data = $request->except('__token');
            $review = new Review($data);
            $review->save();
            return $this->redirectWithAlert($this->listRoute, 'Отзыв успешно создан');
        }
        catch (Exception $exception) {
            return $this->backWithError($exception, $request);
        }
    }
    function destroy(Review $review): RedirectResponse
    {
        try{
            $review->delete();
            return $this->redirectWithAlert($this->listRoute, 'Отзыв успешно удален');
        } catch (Exception $exception) {
            return $this->redirectWithAlert($this->listRoute, 'Ошибка: ' . $exception->getMessage(), 'danger');
        }
    }
    function edit(Review $review, ReviewsSetterRequest $request): RedirectResponse
    {
        try {
            $data = $this->getAllFromRequest($request);
            $review->update($data);
            return $this->redirectWithAlert($this->listRoute, 'Отзыв успешно изменен');
        } catch (Exception $exception) {
            return $this->backWithError($exception, $request);
        }
    }

}
