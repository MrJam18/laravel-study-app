<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractControllers\ActionController;
use App\Http\Requests\Admin\Setters\NewsSourcesRequestsRequest;
use App\Http\Requests\Admin\Setters\ReviewsSetterRequest;
use App\Models\NewsSourceRequest;
use App\Models\Review;
use Exception;
use Illuminate\Http\RedirectResponse;

class AboutActionsController extends ActionController
{
    private string $mainRoute = 'main';
    function createReview(ReviewsSetterRequest $request): RedirectResponse
    {
        try{
            $review = $request->except('__token');
            $review = new Review($review);
            $review->save();
            return $this->redirectWithAlert($this->mainRoute, 'Отзыв успешно отправлен');
        }
        catch (Exception $exception) {
            return $this->backWithError($exception, $request);
        }
    }
    function createNewsSourceRequest(NewsSourcesRequestsRequest $request): RedirectResponse
    {
        try{
            $newsSource = $request->except('__token');
            $newsSource = new NewsSourceRequest($newsSource);
            $newsSource->save();
            return $this->redirectWithAlert($this->mainRoute, 'Запрос источника успешно отправлен');
        }
        catch (Exception $exception) {
            return $this->backWithError($exception, $request);
        }
    }
}
