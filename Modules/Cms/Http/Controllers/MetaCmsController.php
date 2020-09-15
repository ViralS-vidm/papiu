<?php

namespace Modules\Cms\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Cms\Http\Requests\UpdateMetaCmsRequest;
use Modules\Cms\Repositories\Contracts\MetaCmsRepositoryInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;

class MetaCmsController extends Controller
{
    /**
     * @var MetaCmsRepositoryInterface
     */
    private $metaCmsRepository;

    /**
     * MetaCmsController constructor.
     * @param MetaCmsRepositoryInterface $metaCmsRepository
     */
    public function __construct(MetaCmsRepositoryInterface $metaCmsRepository)
    {
        $this->metaCmsRepository = $metaCmsRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $metaCms = $this->genPagination($request, $this->metaCmsRepository);
        return view('cms::meta_cms.index', compact('metaCms'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $data['metaCms'] = $this->metaCmsRepository->findById($id);

        return view('cms::meta_cms.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateMetaCmsRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateMetaCmsRequest $request, $id)
    {
        $this->metaCmsRepository->updateById($id, $request->except(['_token', '_method']));

        return redirect()->route('meta-cms.index')
            ->with(config('core.session_success'), __('cms::labels.service') . ' ' . __('core::labels.update_success'));
    }

}
