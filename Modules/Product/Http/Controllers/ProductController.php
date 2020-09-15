<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;
use Modules\Product\Http\Requests\CreateProductRequest;
use Modules\Product\Http\Requests\UpdateProductRequest;
use Modules\Product\Repositories\Contracts\ProductRepositoryInterface;
use Modules\Product\Services\Contracts\ProductServiceInterface;

class ProductController extends Controller
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * @var ProductServiceInterface
     */
    private $productService;

    /**
     * ProductController constructor.
     * @param ProductServiceInterface $productService
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductServiceInterface $productService,
                                ProductRepositoryInterface $productRepository)
    {
        $this->productService = $productService;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $products = $this->genPagination($request, $this->productRepository);

        return view('product::products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('product::products.create', $this->productService->dataForm());
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateProductRequest $request
     * @return void
     */
    public function store(CreateProductRequest $request)
    {
        $this->productService->create($request->except('_token'));

        return redirect()->route('products.index')
            ->with(config('core.session_success'), __('product::labels.product') . ' ' . __('core::labels.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $data['product'] = $this->productRepository->findById($id);
        $data = $this->productService->dataForm($data['product']);

        return view('product::products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateProductRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $this->productService->updateById($id, $request->except(['_token', '_method']));

        return redirect()->route('products.index')
            ->with(config('core.session_success'), __('product::labels.product') . ' ' . __('core::labels.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->productRepository->deleteById($id);

        return redirect()->route('products.index')
            ->with(config('core.session_success'), __('product::labels.product') . ' ' . __('core::labels.delete_success'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function findFree(Request $request)
    {
        return response()->json($this->findFree($request->all()));
    }
}
