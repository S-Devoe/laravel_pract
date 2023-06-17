<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\CustomersFilter;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\V1\StoreCustomerRequest as V1StoreCustomerRequest;
use App\Http\Requests\V1\UpdateCustomerRequest;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new CustomersFilter();
        $queryItems = $filter->transform($request);

        $includeInvoices = $request->query('includeInvoices');

        $customers = Customer::where($queryItems);
        if($includeInvoices){
            $customers = $customers->with('invoices');
        }

        return new CustomerCollection($customers->paginate()->appends($request->query()));

        // if(count($queryItems) == 0){
        //      return new CustomerCollection(Customer::paginate());
        // } else{
        //     $customers = Customer::where($queryItems)->paginate();
        //     return new CustomerCollection($customers->appends($request->query()));
        // }
       
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
        
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(V1StoreCustomerRequest $request)
    {
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $includeInvoices = $customer->query('includeInvoices');

        if($includeInvoices){
            return new CustomerResource($customer->loadMissing('invoices'));
        }

        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
