<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Http\Responses\ResultResponse;

class ServicioController extends Controller
{
    // Obtener todos los servicios con paginación
    public function index(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $query = Servicio::query();

            if ($request->filled('nombre')) {
                $query->where('nombre', 'like', '%' . $request->input('nombre') . '%');
            }

            if ($request->filled('id_servicio')) {
                $query->where('id_servicio', $request->input('id_servicio'));
            }

            $perPage = $request->input('per_page', 10);
            $servicios = $query->paginate($perPage);

            $resultResponse->setData($servicios);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        } catch (\Exception $e) {
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }

        return response()->json($resultResponse);
    }

    // Crear un nuevo servicio
    public function store(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $validated = $request->validate([
                'nombre' => 'required|string|max:80',
                'id_servicio' => 'required|uuid|unique:servicio,id_servicio',
            ]);

            $servicio = Servicio::create($validated);
            $resultResponse->setData($servicio);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        } catch (\Exception $e) {
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }

        return response()->json($resultResponse);
    }

    // Obtener un servicio específico
    public function show($id)
    {
        $resultResponse = new ResultResponse();

        try {
            $servicio = Servicio::findOrFail($id);
            $resultResponse->setData($servicio);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        } catch (\Exception $e) {
            $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
        }

        return response()->json($resultResponse);
    }

    // Actualizar un servicio
    public function update(Request $request, $id)
    {
        $resultResponse = new ResultResponse();

        try {
            $validated = $request->validate([
                'nombre' => 'sometimes|required|string|max:80',
            ]);

            $servicio = Servicio::findOrFail($id);
            $servicio->update($validated);
            $resultResponse->setData($servicio);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        } catch (\Exception $e) {
            $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
        }

        return response()->json($resultResponse);
    }

    // Eliminar un servicio
    public function destroy($id)
    {
        $resultResponse = new ResultResponse();

        try {
            $servicio = Servicio::findOrFail($id);
            $servicio->delete();
            $resultResponse->setData($servicio);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        } catch (\Exception $e) {
            $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
        }

        return response()->json($resultResponse);
    }

    public function search(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $query = Servicio::query();

            if ($request->filled('nombre')) {
                $query->where('nombre', 'like', '%' . $request->input('nombre') . '%');
            }

            if ($request->filled('id_servicio')) {
                $query->where('id_servicio', $request->input('id_servicio'));
            }

            $perPage = $request->input('per_page', 10);
            $servicios = $query->paginate($perPage);

            $resultResponse->setData($servicios);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        } catch (\Exception $e) {
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }

        return response()->json($resultResponse);
    }
}
