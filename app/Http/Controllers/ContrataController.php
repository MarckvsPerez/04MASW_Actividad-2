<?php

namespace App\Http\Controllers;

use App\Models\Contrata;
use Illuminate\Http\Request;
use App\Http\Responses\ResultResponse;
use Illuminate\Validation\ValidationException;

class ContrataController extends Controller
{
    public function index(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $query = Contrata::query();

            if ($request->filled('fecha')) {
                $query->where('fecha', 'like', '%' . $request->input('fecha') . '%');
            }

            if ($request->filled('id_servicio')) {
                $query->where('id_servicio', 'like', '%' . $request->input('id_servicio') . '%');
            }

            if ($request->filled('cif')) {
                $query->where('cif', 'like', '%' . $request->input('cif') . '%');
            }

            $perPage = $request->input('per_page', 10);
            $contratas = $query->paginate($perPage);

            $resultResponse->setData($contratas);
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
                'fecha' => 'required|date',
                'id_servicio' => 'required|uuid|exists:servicio,id_servicio',
                'cif' => 'required|string|max:9|exists:institucion,cif',
            ]);

            $contrata = Contrata::create($validated);

            $resultResponse->setData($contrata);
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
            $contrata = Contrata::where('id_servicio', $id_servicio)->where('cif', $cif)->firstOrFail();
            $resultResponse->setData($contrata);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        } catch (\Exception $e) {
            $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
            $resultResponse->setData(['error' => $e->getMessage()]);
        }

        return response()->json($resultResponse);
    }

    public function update(Request $request, $id_servicio, $cif)
    {
        $resultResponse = new ResultResponse();

        try {
            $validated = $request->validate([
                'fecha' => 'sometimes|required|date',
                'id_servicio' => 'sometimes|required|uuid|exists:servicio,id_servicio',
                'cif' => 'sometimes|required|string|max:9|exists:institucion,cif',
            ]);

            $contrata = Contrata::where('id_servicio', $id_servicio)->where('cif', $cif)->firstOrFail();

            // Actualizamos solo el campo 'fecha'
            if (isset($validated['fecha'])) {
                $contrata->fecha = $validated['fecha'];
            }

            $contrata->save();

            $resultResponse->setData($contrata);
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

    public function destroy($id_servicio, $cif)
    {
        $resultResponse = new ResultResponse();

        try {
            $contrata = Contrata::where('id_servicio', $id_servicio)->where('cif', $cif)->firstOrFail();
            $contrata->delete();
            $resultResponse->setData($contrata);
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
