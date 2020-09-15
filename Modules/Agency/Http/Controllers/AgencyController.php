<?php

namespace Modules\Agency\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Agency\Http\Requests\UpdateStatusRequest;
use Modules\Agency\Repositories\Contracts\AgencyRepositoryInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;


class AgencyController extends Controller
{
    private $agencyRepository;

    /**
     * FeedbackController constructor.
     * @param AgencyRepositoryInterface $agencyRepository
     */
    public function __construct(AgencyRepositoryInterface $agencyRepository)
    {
        $this->agencyRepository = $agencyRepository;
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $agencies = $this->genPagination($request, $this->agencyRepository);

        return view('agency::agencies.index', compact('agencies'));
    }

    /**
     * @param UpdateStatusRequest $request
     * @return JsonResponse
     * @throws RepositoryException
     */
    public function updateStatus(UpdateStatusRequest $request)
    {
        if ($request->ajax()) {
            $booking = $this->agencyRepository->findById($request->id);
            $this->agencyRepository->update($booking, ['status' => $request->status]);

            return response()->json([
                'message' => __('agency::labels.agency') . ' ' . __('core::labels.update_success'),
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
        $this->agencyRepository->deleteById($id);

        return redirect()->route('agencies.index')
            ->with(config('core.session_success'), __('agency::labels.agency') . ' ' . __('core::labels.delete_success'));
    }
}
