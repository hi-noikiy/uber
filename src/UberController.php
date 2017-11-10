<?php

namespace Packages\Uber;

use App\Http\Controllers\Controller;

class UberController extends Controller
{

    /**
     * get single contact details.
     *  
     * @param  $id: integer contact id.
     * @return html view.
     */
    public function index()
    {
    	echo "Hello Uber Controller.";
    }
}
