<?php

namespace Modules\Cms\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Cms\Http\Requests\UpdateVideoCmsRequest;
use Modules\Cms\Repositories\Contracts\VideoCmsRepositoryInterface;
use Modules\Cms\Services\Contracts\VideoCmsServiceInterface;
use Modules\Core\Http\Controllers\Controller;

class VideoCmsController extends Controller
{
    /**
     * @var VideoCmsRepositoryInterface
     */
    private $videoCmsRepository;
    /**
     * @var VideoCmsServiceInterface
     */
    private $videoCmsService;

    /**
     * VideoCmsController constructor.
     * @param VideoCmsServiceInterface $videoCmsService
     * @param VideoCmsRepositoryInterface $videoCmsRepository
     */
    public function __construct(VideoCmsServiceInterface $videoCmsService,
                                VideoCmsRepositoryInterface $videoCmsRepository)
    {
        $this->videoCmsService = $videoCmsService;
        $this->videoCmsRepository = $videoCmsRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $videoCms = $this->genPagination($request, $this->videoCmsRepository);
        return view('cms::video_cms.index', compact('videoCms'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('cms::video_cms.create', $this->videoCmsService->dataForm());
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $data['videoCms'] = $this->videoCmsRepository->findById($id);
        $data = $this->videoCmsService->dataForm($data['videoCms']);

        return view('cms::video_cms.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateVideoCmsRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateVideoCmsRequest $request, $id)
    {
        $this->videoCmsService->updateById($id, $request->except(['_token', '_method']));

        return redirect()->route('video-cms.index')
            ->with(config('core.session_success'), __('cms::labels.image') . ' ' . __('core::labels.update_success'));
    }
}
