<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Invoice;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Filters\V1\InvoicesFilter;

use App\Http\Controllers\Controller;

use App\Http\Resources\V1\InvoiceResource;
use App\Http\Resources\V1\InvoiceCollection;
use App\Http\Requests\V1\StoreInvoiceRequest;
use App\Http\Requests\V1\UpdateInvoiceRequest;

use App\Http\Requests\V1\BulkStoreInvoiceRequest    ;


class InvoiceController extends Controller
{

    public function index(Request $request)
    {
        $filter = new InvoicesFilter();
        $QueryItems = $filter->transform($request);

        if (count($QueryItems) == 0) {
            return new InvoiceCollection(Invoice::paginate());
        } else {
            $invoices = Invoice::where($QueryItems)->paginate();
            return new InvoiceCollection($invoices->appends($request->query()));
        }
    }


    public function create(){
        //
    }


    public function store(){
        //
    }

    
    public function bulkStore(BulkStoreInvoiceRequest $request){ // add multi invoice together
        $bulk = collect($request->all())->map(function($arr){
            return Arr::except($arr, ['customerId', 'billedDate', 'paidDate']);
        });
        // dd($bulk->toArray());
        
        Invoice::insert($bulk->toArray());
    }
    // example : post method : http://127.0.0.1:8000/api/v1/invoices/bulk . send json :         
    // [
    //     {
    //         "customerId": "1",
    //         "amount": "8888",
    //         "status": "B",
    //         "billedDate": "2018-12-25 13:49:09",
    //         "paidDate": "2019-12-25 13:49:10"
    //     },
    //     {
    //         "customerId": "1",
    //         "amount": "8888",
    //         "status": "P",
    //         "billedDate": "2018-12-25 13:49:09",
    //         "paidDate": "2015-12-25 13:49:22"
    //     }
    // ]


    public function show(Invoice $invoice){
        return new InvoiceResource($invoice);
    }


    public function edit(Invoice $invoice){
        //
    }


    
    public function update(UpdateInvoiceRequest $request, Invoice $invoice){
        //
    }


    
    public function destroy(Invoice $invoice)
    {
        //
    }
}
