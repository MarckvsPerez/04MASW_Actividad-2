<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Responses\ResultResponse;
use Illuminate\Validation\ValidationException;

class EmpresaController extends Controller
{
    public function index(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $query = Empresa::query();

            if ($request->filled('representante_legal')) {
                $query->where('representante_legal', 'like', '%' . $request->input('representante_legal') . '%');
            }

            if ($request->filled('dni_representante_legal')) {
                $query->where('dni_representante_legal', 'like', '%' . $request->input('dni_representante_legal') . '%');
            }

            if ($request->filled('sector')) {
                $query->where('sector', 'like', '%' . $request->input('sector') . '%');
            }

            if ($request->filled('actividad')) {
                $query->where('actividad', 'like', '%' . $request->input('actividad') . '%');
            }

            if ($request->filled('cnae')) {
                $query->where('cnae', 'like', '%' . $request->input('cnae') . '%');
            }

            if ($request->filled('numero_trabajadores')) {
                $query->where('numero_trabajadores', 'like', '%' . $request->input('numero_trabajadores') . '%');
            }

            if ($request->filled('id_empresa')) {
                $query->where('id_empresa', 'like', '%' . $request->input('id_empresa') . '%');
            }

            if ($request->filled('cif')) {
                $query->where('cif', 'like', '%' . $request->input('cif') . '%');
            }

            $perPage = $request->input('per_page', 10);
            $empresas = $query->paginate($perPage);

            $resultResponse->setData($empresas);
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
                'id_empresa' => 'required|uuid|unique:empresa,id_empresa',
                'representante_legal' => 'required|string|max:80',
                'dni_representante_legal' => 'required|string|max:9',
                'sector' => 'required|string|max:80',
                'actividad' => 'required|string|max:80',
                'cnae' => 'required|integer',
                'numero_trabajadores' => 'required|integer',
                'cif' => 'required|string|max:9',
            ]);

            $empresa = Empresa::create($validated);

            $resultResponse->setData($empresa);
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
            $empresa = Empresa::findOrFail($id);
            $resultResponse->setData($empresa);
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
                'representante_legal' => 'sometimes|required|string|max:80',
                'dni_representante_legal' => 'sometimes|required|string|max:9',
                'sector' => 'sometimes|required|string|max:80',
                'actividad' => 'sometimes|required|string|max:80',
                'cnae' => 'sometimes|required|integer',
                'numero_trabajadores' => 'sometimes|required|integer',
                'cif' => 'sometimes|required|string|max:9',
            ]);

            $empresa = Empresa::findOrFail($id);
            $empresa->update($validated);

            $resultResponse->setData($empresa);
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
            $empresa = Empresa::findOrFail($id);
            $empresa->delete();
            $resultResponse->setData($empresa);
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
