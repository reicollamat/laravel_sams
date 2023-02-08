<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;

class ContractController extends Controller
{

    public function index()
    {
        $tabactivecontracts = Contract::paginate();

        return view('tabactivecontract.index', compact('tabactivecontracts'));
    }

}
