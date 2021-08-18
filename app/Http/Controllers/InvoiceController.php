<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\UserProduct;

class InvoiceController extends Controller
{
    //
    public function index()
    {
        return view("admin.invoiceList")->with("invoices", Invoice::get());   
    }

    public function view( Invoice $invoice )
    {
        $user_product = UserProduct::where("id", $invoice->user_product_id)->first();
        return view("user.invoice")->with("user_product", $user_product);    
    }

    public function delete( Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->back();
    }
}
