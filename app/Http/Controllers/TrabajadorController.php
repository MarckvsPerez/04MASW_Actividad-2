<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;
use App\Http\Responses\ResultResponse;
use Illuminate\Validation\ValidationException;

class TrabajadorController extends Controller
{
    public function index(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $query = Trabajador::query();

            if ($request->filled('nombre')) {
                $query->where('nombre', 'like', '%' . $request->input('nombre') . '%');
            }

            if ($request->filled('dni')) {
                $query->where('dni', 'like', '%' . $request->input('dni') . '%');
            }

            if ($request->filled('direccion')) {
                $query->where('direccion', 'like', '%' . $request->input('direccion') . '%');
            }

            if ($request->filled('numero_telefono')) {
                $query->where('numero_telefono', 'like', '%' . $request->input('numero_telefono') . '%');
            }

            if ($request->filled('cif')) {
                $query->where('cif', 'like', '%' . $request->input('cif') . '%');
            }

            $perPage = $request->input('per_page', 10);
            $trabajadors = $query->paginate($perPage);

            $resultResponse->setData($trabajadors);
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
                'dni' => 'required|string|max:9|unique:trabajador,dni',
                'nombre' => 'required|string|max:80',
                'direccion' => 'required|string|max:80',
                'numero_telefono' => 'required|integer',
                'cif' => 'required|string|max:9',
            ]);

            $trabajador = Trabajador::create($validated);

            $resultResponse->setData($trabajador);
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
            $trabajador = Trabajador::findOrFail($id);
            $resultResponse->setData($trabajador);
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
                'numero_telefono' => 'sometimes|required|integer',
                'cif' => 'sometimes|required|string|max:9',
            ]);

            $trabajador = Trabajador::findOrFail($id);
            $trabajador->update($validated);

            $resultResponse->setData($trabajador);
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
            $trabajador = Trabajador::findOrFail($id);
            $trabajador->delete();
            $resultResponse->setData($trabajador);
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
