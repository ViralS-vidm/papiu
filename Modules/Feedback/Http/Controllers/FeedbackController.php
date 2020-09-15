<?php

namespace Modules\Feedback\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;
use Modules\Feedback\Http\Requests\UpdateStatusRequest;
use Modules\Feedback\Repositories\Contracts\FeedbackRepositoryInterface;

class FeedbackController extends Controller
{
    /**
     * @var FeedbackRepositoryInterface
     */
    private $feedbackRepository;

    /**
     * FeedbackController constructor.
     * @param FeedbackRepositoryInterface $feedbackRepository
     */
    public function __construct(FeedbackRepositoryInterface $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $feedbacks = $this->genPagination($request, $this->feedbackRepository);

        return view('feedback::feedbacks.index', compact('feedbacks'));
    }

    /**
     * @param UpdateStatusRequest $request
     * @return JsonResponse
     * @throws RepositoryException
     */
    public function updateStatus(UpdateStatusRequest $request)
    {
        if ($request->ajax()) {
            $booking = $this->feedbackRepository->findById($request->id);
            $this->feedbackRepository->update($booking, ['status' => $request->status]);

            return response()->json([
                'message' => __('feedback::labels.feedback') . ' ' . __('core::labels.update_success'),
                'data' => []
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->feedbackRepository->deleteById($id);

        return redirect()->route('feedbacks.index')
            ->with(config('core.session_success'), __('feedback::labels.feedback') . ' ' . __('core::labels.delete_success'));
    }
}
