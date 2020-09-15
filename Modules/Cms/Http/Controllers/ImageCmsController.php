<?php

namespace Modules\Cms\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Cms\Http\Requests\CreateImageCmsRequest;
use Modules\Cms\Http\Requests\UpdateImageCmsRequest;
use Modules\Cms\Repositories\Contracts\ImageCmsRepositoryInterface;
use Modules\Cms\Services\Contracts\ImageCmsServiceInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;

class ImageCmsController extends Controller
{
    /**
     * @var ImageCmsRepositoryInterface
     */
    private $imageCmsRepository;
    /**
     * @var ImageCmsServiceInterface
     */
    private $imageCmsService;

    /**
     * ImageCmsController constructor.
     * @param ImageCmsServiceInterface $imageCmsService
     * @param ImageCmsRepositoryInterface $imageCmsRepository
     */
    public function __construct(ImageCmsServiceInterface $imageCmsService,
                                ImageCmsRepositoryInterface $imageCmsRepository)
    {
        $this->imageCmsService = $imageCmsService;
        $this->imageCmsRepository = $imageCmsRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $imageCms = $this->imageCmsRepository->getAll($request->get('filter'));

        return view('cms::image_cms.index', compact('imageCms'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('cms::image_cms.create', $this->imageCmsService->dataForm());
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateImageCmsRequest $request
     * @return RedirectResponse
     */
    public function store(CreateImageCmsRequest $request)
    {
        $this->imageCmsService->create($request->except(['_token', '_method']));

        return redirect()->route('image-cms.index')
            ->with(config('core.session_success'), __('cms::labels.image') . ' ' . __('core::labels.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $data['imageCms'] = $this->imageCmsRepository->findById($id);
        $data = $this->imageCmsService->dataForm($data['imageCms']);

        return view('cms::image_cms.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateImageCmsRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateImageCmsRequest $request, $id)
    {
        $this->imageCmsService->updateById($id, $request->except(['_token', '_method']));

        return redirect()->route('image-cms.index')
            ->with(config('core.session_success'), __('cms::labels.image') . ' ' . __('core::labels.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->imageCmsRepository->deleteById($id);

        return redirect()->route('image-cms.index')
            ->with(config('core.session_success'), __('cms::labels.image') . ' ' . __('core::labels.delete_success'));
    }
}
