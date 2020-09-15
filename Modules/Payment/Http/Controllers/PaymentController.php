<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Core\Http\Controllers\Controller;
use Modules\Payment\Http\Requests\CreatePaymentRequest;
use Modules\Payment\Http\Requests\UpdatePaymentRequest;
use Modules\Payment\Repositories\Contracts\PaymentRepositoryInterface;
use Modules\Payment\Services\Contracts\PaymentServiceInterface;

class PaymentController extends Controller
{
    /**
     * @var PaymentRepositoryInterface
     */
    private $paymentRepository;
    /**
     * @var PaymentServiceInterface
     */
    private $paymentService;

    public function __construct(PaymentRepositoryInterface $paymentRepository,
                                PaymentServiceInterface $paymentService)
    {
        $this->paymentRepository = $paymentRepository;
        $this->paymentService = $paymentService;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $payments = $this->genPagination($request, $this->paymentRepository);

        return view('payment::payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function create(Request $request)
    {
        $payment = new \stdClass();
        if ($request->has('booking')) {
            $payment->booking_id = $request->get('booking');
        }

        if ($request->has('amount')) {
            $payment->price = $request->get('amount');
        }

        return view('payment::payments.create', $this->paymentService->dataForm())->withPayment($payment);
    }

    /**
     * Store a newly created resource in storage.
     * @param CreatePaymentRequest $request
     * @return void
     */
    public function store(CreatePaymentRequest $request)
    {
        $this->paymentService->create($request->all());

        return redirect()->route('payments.index')
            ->with(config('core.session_success'), __('payment::labels.payment') . ' ' . __('core::labels.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $data['payment'] = $this->paymentRepository->findById($id);
        $data = $this->paymentService->dataForm($data['payment']);

        return view('payment::payments.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdatePaymentRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdatePaymentRequest $request, $id)
    {
        $this->paymentService->updateById($id, $request->all());

        return redirect()->route('payments.index')
            ->with(config('core.session_success'), __('payment::labels.payment') . ' ' . __('core::labels.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->paymentService->deleteById($id);

        return redirect()->route('payments.index')
            ->with(config('core.session_success'), __('payment::labels.payment') . ' ' . __('core::labels.delete_success'));
    }
}
