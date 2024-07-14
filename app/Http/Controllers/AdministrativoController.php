<?php

namespace App\Http\Controllers;

use App\Models\Administrativo;
use Illuminate\Http\Request;
use App\Http\Responses\ResultResponse;
use Illuminate\Validation\ValidationException;

class AdministrativoController extends Controller
{
    public function index(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $query = Administrativo::query();

            if ($request->filled('id_administrativo')) {
                $query->where('id_administrativo', 'like', '%' . $request->input('id_administrativo') . '%');
            }

            if ($request->filled('dni')) {
                $query->where('dni', 'like', '%' . $request->input('dni') . '%');
            }

            $perPage = $request->input('per_page', 10);
            $administrativos = $query->paginate($perPage);

            $resultResponse->setData($administrativos);
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
                'id_administrativo' => 'required|uuid|unique:administrativo,id_administrativo',
                'dni' => 'required|string|max:9|unique:administrativo,dni',
            ]);

            $administrativo = Administrativo::create($validated);

            $resultResponse->setData($administrativo);
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
            $administrativo = Administrativo::findOrFail($id);
            $resultResponse->setData($administrativo);
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
                'dni' => 'sometimes|required|string|max:9|unique:administrativo,dni,' . $id . ',id_administrativo',
            ]);

            $administrativo = Administrativo::findOrFail($id);
            $administrativo->update($validated);

            $resultResponse->setData($administrativo);
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
            $administrativo = Administrativo::findOrFail($id);
            $administrativo->delete();
            $resultResponse->setData($administrativo);
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
