<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;

class ContractController extends Controller
{

    public function index()
    {
        $activecontracts = Contract::paginate();

        return view('admintab.activecontract.index', compact('activecontracts'));
    }

}
