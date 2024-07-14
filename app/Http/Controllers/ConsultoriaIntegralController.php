<?php

namespace App\Http\Controllers;

use App\Models\ConsultoriaIntegral;
use Illuminate\Http\Request;
use App\Http\Responses\ResultResponse;
use Illuminate\Validation\ValidationException;

class ConsultoriaIntegralController extends Controller
{
    public function index(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $query = ConsultoriaIntegral::query();

            if ($request->filled('cif')) {
                $query->where('cif', 'like', '%' . $request->input('cif') . '%');
            }

            $perPage = $request->input('per_page', 10);
            $consultoriaIntegrals = $query->paginate($perPage);

            $resultResponse->setData($consultoriaIntegrals);
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
                'cif' => 'required|string|max:9|unique:consultoria_integral,cif',
                'id_consultoria_integral' => 'required|uuid|unique:consultoria_integral,id_consultoria_integral',
            ]);

            $consultoriaIntegral = ConsultoriaIntegral::create($validated);

            $resultResponse->setData($consultoriaIntegral);
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

    public function show($id)
    {
        $resultResponse = new ResultResponse();

        try {
            $consultoriaIntegral = ConsultoriaIntegral::findOrFail($id);
            $resultResponse->setData($consultoriaIntegral);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        } catch (\Exception $e) {
            $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
            $resultResponse->setData(['error' => $e->getMessage()]);
        }

        return response()->json($resultResponse);
    }

    public function update(Request $request, $id)
    {
        $resultResponse = new ResultResponse();

        try {
            $validated = $request->validate([
                'cif' => 'sometimes|required|string|max:9|unique:consultoria_integral,cif,' . $id . ',id_consultoria_integral',
            ]);

            $consultoriaIntegral = ConsultoriaIntegral::findOrFail($id);
            $consultoriaIntegral->update($validated);

            $resultResponse->setData($consultoriaIntegral);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        } catch (ValidationException $e) {
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE);
            $resultResponse->setMessage('Validation Error');
            $resultResponse->setData($e->errors());
        } catch (\Exception $e) {
            if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE);
                $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
            } else {
                $resultResponse->setStatusCode(ResultResponse::ERROR_CODE);
                $resultResponse->setMessage($e->getMessage());
                $resultResponse->setData(['error' => $e->getMessage()]);
            }
        }

        return response()->json($resultResponse);
    }

    public function destroy($id)
    {
        $resultResponse = new ResultResponse();

        try {
            $consultoriaIntegral = ConsultoriaIntegral::findOrFail($id);
            $consultoriaIntegral->delete();
            $resultResponse->setData($consultoriaIntegral);
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
