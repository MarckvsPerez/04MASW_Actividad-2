<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use Illuminate\Http\Request;
use App\Http\Responses\ResultResponse;
use Illuminate\Validation\ValidationException;

class InstitucionController extends Controller
{
    public function index(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $query = Institucion::query();

            if ($request->filled('nombre')) {
                $query->where('nombre', 'like', '%' . $request->input('nombre') . '%');
            }

            $perPage = $request->input('per_page', 10);
            $institucions = $query->paginate($perPage);

            $resultResponse->setData($institucions);
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
                'cif' => 'required|string|max:9|unique:institucion,cif',
                'nombre' => 'required|string|max:80',
                'direccion' => 'required|string|max:80',
                'codigo_postal' => 'required|integer',
                'provincia' => 'required|string|max:50',
                'telefono' => 'required|integer',
                'correo' => 'required|string|email|max:80',
                'poblacion' => 'required|string|max:50',
                'numero_cuenta_corriente' => 'required|string|max:20',
                'dni' => 'required|string|max:9',
            ]);

            $institucion = Institucion::create($validated);

            $resultResponse->setData($institucion);
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
            $institucion = Institucion::findOrFail($id);
            $resultResponse->setData($institucion);
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
                'nombre' => 'sometimes|required|string|max:80',
                'direccion' => 'sometimes|required|string|max:80',
                'codigo_postal' => 'sometimes|required|integer',
                'provincia' => 'sometimes|required|string|max:50',
                'telefono' => 'sometimes|required|integer',
                'correo' => 'sometimes|required|string|email|max:80',
                'poblacion' => 'sometimes|required|string|max:50',
                'numero_cuenta_corriente' => 'sometimes|required|string|max:20',
                'dni' => 'sometimes|required|string|max:9',
            ]);

            $institucion = Institucion::findOrFail($id);
            $institucion->update($validated);

            $resultResponse->setData($institucion);
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
            $institucion = Institucion::findOrFail($id);
            $institucion->delete();
            $resultResponse->setData($institucion);
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
