<?php

namespace App\Http\Controllers;

use App\Models\Brinda;
use Illuminate\Http\Request;
use App\Http\Responses\ResultResponse;
use Illuminate\Validation\ValidationException;

class BrindaController extends Controller
{
    public function index(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $query = Brinda::query();

            if ($request->filled('id_servicio')) {
                $query->where('id_servicio', 'like', '%' . $request->input('id_servicio') . '%');
            }

            if ($request->filled('cif')) {
                $query->where('cif', 'like', '%' . $request->input('cif') . '%');
            }

            $perPage = $request->input('per_page', 10);
            $brindas = $query->paginate($perPage);

            $resultResponse->setData($brindas);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        } catch (\Exception $e) {
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE);
            $resultResponse->setMessage($e->getMessage());
            $resultResponse->setData(['error' => $e->getMessage()]);
        }

        return response()->json($resultResponse);
    }

    public function store(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $validated = $request->validate([
                'id_servicio' => 'required|uuid|exists:servicio,id_servicio',
                'cif' => 'required|string|max:9|exists:consultoria_integral,cif',
            ]);

            $brinda = Brinda::create($validated);

            $resultResponse->setData($brinda);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        } catch (ValidationException $e) {
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE);
            $resultResponse->setMessage('Validation Error');
            $resultResponse->setData($e->errors());
        } catch (\Exception $e) {
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE);
            $resultResponse->setMessage($e->getMessage());
            $resultResponse->setData(['error' => $e->getMessage()]);
        }

        return response()->json($resultResponse);
    }

    public function show($id_servicio, $cif)
    {
        $resultResponse = new ResultResponse();

        try {
            $brinda = Brinda::where('id_servicio', $id_servicio)->where('cif', $cif)->firstOrFail();
            $resultResponse->setData($brinda);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        } catch (\Exception $e) {
            $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
            $resultResponse->setData(['error' => $e->getMessage()]);
        }

        return response()->json($resultResponse);
    }

    public function destroy($id_servicio, $cif)
    {
        $resultResponse = new ResultResponse();

        try {
            $brinda = Brinda::where('id_servicio', $id_servicio)->where('cif', $cif)->firstOrFail();
            $brinda->delete();
            $resultResponse->setData($brinda);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        } catch (\Exception $e) {
            $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
            $resultResponse->setData(['error' => $e->getMessage()]);
        }

        return response()->json($resultResponse);
    }
}
