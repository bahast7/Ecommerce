<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentDetail;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentDetailController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-detail.index');
    }

    public function create()
    {
        abort_if(Gate::denies('payment_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-detail.create');
    }

    public function edit(PaymentDetail $paymentDetail)
    {
        abort_if(Gate::denies('payment_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-detail.edit', compact('paymentDetail'));
    }

    public function show(PaymentDetail $paymentDetail)
    {
        abort_if(Gate::denies('payment_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentDetail->load('paymentType');

        return view('admin.payment-detail.show', compact('paymentDetail'));
    }
}
