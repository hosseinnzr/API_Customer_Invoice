<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\CustomersFilter;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\V1\StoreCustomerRequest;
use App\Http\Requests\V1\UpdateCustomerRequest;
use App\Http\Resources\V1\CustomerCollection;
use App\Http\Resources\V1\CustomerResource;

use App\Models\Customer;

class CustomerController extends Controller
{

    public function index(Request $request)
        {
        $filter = new CustomersFilter();
        $filterItems = $filter->transform($request);

        $includeInvoices = $request->query('includeInvoices');
        $customers = Customer::where($filterItems);

        if($includeInvoices){
            $customers = $customers->with('invoices');
        }


        return new CustomerCollection($customers->paginate()->appends($request->query()));

        }

    public function store(StoreCustomerRequest $request)
    {
        return new CustomerResource(Customer::create($request->all()));
    } 
    // example : post method : http://127.0.0.1:8000/api/v1/customers . send json :         
    // {
    //     "name": "Zulauf-Padberg",
    //     "type": "I",
    //     "email": "cole.chelsey@gmail.com",
    //     "address": "417 Bernardo Vista\nWest Shad, VA 94312-2055",
    //     "city": "West Nat",
    //     "state": "Missouri",
    //     "postal_code": "39709"
    // }


    public function show(Customer $customer, Request $request)
    {
        $includeInvoices = $request->query('includeInvoices');

        if($includeInvoices){
            return new CustomerResource($customer->loadMissing('invoices'));
        }

        return new CustomerResource($customer);
    } // example : http://127.0.0.1:8000/api/v1/customers/5?includeInvoices=true


    
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        // PUT method for update : must send all method
        // PATCh method for update : just send method that you want to change

        $customer->update($request->all());
        
        return $customer;
    }
    // example : post method : http://127.0.0.1:8000/api/v1/customers/182 . send json :         
    //{
    //     "id": 182,
    //     "name": "Zulauf-Padberg",
    //     "type": "I",
    //     "email": "cole.chelsey@gmail.com",
    //     "address": "417 Bernardo Vista\nWest Shad, VA 94312-2055",
    //     "city": "West Nat",
    //     "state": "Missouri",
    //     "postal_code": "39709"
    // }


    public function destroy(Customer $customer)
    {
        //
    }
}
