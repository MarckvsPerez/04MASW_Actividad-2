<?php

namespace App\Http\Controllers;

use App\Models\Asesoria;
use Illuminate\Http\Request;
use App\Http\Responses\ResultResponse;
use Illuminate\Validation\ValidationException;

class AsesoriaController extends Controller
{
    public function index(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $query = Asesoria::query();

            if ($request->filled('id_asesoria')) {
                $query->where('id_asesoria', 'like', '%' . $request->input('id_asesoria') . '%');
            }

            if ($request->filled('cif')) {
                $query->where('cif', 'like', '%' . $request->input('cif') . '%');
            }

            $perPage = $request->input('per_page', 10);
            $asesorias = $query->paginate($perPage);

            $resultResponse->setData($asesorias);
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
                'id_asesoria' => 'required|uuid|unique:asesoria_,id_asesoria',
                'cif' => 'required|string|max:9',
            ]);

            $asesoria = Asesoria::create($validated);

            $resultResponse->setData($asesoria);
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
            $asesoria = Asesoria::findOrFail($id);
            $resultResponse->setData($asesoria);
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
                'cif' => 'sometimes|required|string|max:9',
            ]);

            $asesoria = Asesoria::findOrFail($id);
            $asesoria->update($validated);

            $resultResponse->setData($asesoria);
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
            $asesoria = Asesoria::findOrFail($id);
            $asesoria->delete();
            $resultResponse->setData($asesoria);
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
