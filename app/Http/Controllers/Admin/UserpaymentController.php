<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Userpayment;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserpaymentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('userpayment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userpayment.index');
    }

    public function create()
    {
        abort_if(Gate::denies('userpayment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userpayment.create');
    }

    public function edit(Userpayment $userpayment)
    {
        abort_if(Gate::denies('userpayment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userpayment.edit', compact('userpayment'));
    }

    public function show(Userpayment $userpayment)
    {
        abort_if(Gate::denies('userpayment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userpayment->load('user', 'paymentType');

        return view('admin.userpayment.show', compact('userpayment'));
    }
}
