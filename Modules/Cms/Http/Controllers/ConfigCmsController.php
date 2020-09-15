<?php

namespace Modules\Cms\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Cms\Http\Requests\UpdateConfigCmsRequest;
use Modules\Cms\Repositories\Contracts\ConfigCmsRepositoryInterface;
use Modules\Cms\Services\Contracts\ConfigCmsServiceInterface;
use Modules\Core\Http\Controllers\Controller;

class ConfigCmsController extends Controller
{
    /**
     * @var ConfigCmsRepositoryInterface
     */
    private $configCmsRepository;
    /**
     * @var ConfigCmsServiceInterface
     */
    private $configCmsService;

    /**
     * ConfigCmsController constructor.
     * @param ConfigCmsServiceInterface $configCmsService
     * @param ConfigCmsRepositoryInterface $configCmsRepository
     */
    public function __construct(ConfigCmsServiceInterface $configCmsService,
                                ConfigCmsRepositoryInterface $configCmsRepository)
    {
        $this->configCmsService = $configCmsService;
        $this->configCmsRepository = $configCmsRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $configCms = $this->configCmsRepository->getAll($request->get('filter'));
        return view('cms::config_cms.index', compact('configCms'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $data['configCms'] = $this->configCmsRepository->findById($id);
        $data = $this->configCmsService->dataForm($data['configCms']);

        return view('cms::config_cms.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateConfigCmsRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateConfigCmsRequest $request, $id)
    {
        $this->configCmsService->updateById($id, $request->except(['_token', '_method']));

        return redirect()->route('config-cms.index')
            ->with(config('core.session_success'), __('cms::labels.service') . ' ' . __('core::labels.update_success'));
    }
}
