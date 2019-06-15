<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DatatableService;
use Illuminate\Http\Request;

class DatatableController extends Controller {
	
	public function list(Request $request, DatatableService $datatableService) {
		$query = $datatableService->query();
		return $query->paginate($request->input('per_page'));
	}
}
