<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\Http\Responses\ResultResponse;
use Illuminate\Validation\ValidationException;

class FacturaController extends Controller
{
    public function index(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $query = Factura::query();

            if ($request->filled('codigo_factura')) {
                $query->where('codigo_factura', 'like', '%' . $request->input('codigo_factura') . '%');
            }

            if ($request->filled('iva')) {
                $query->where('iva', $request->input('iva'));
            }

            if ($request->filled('pagado')) {
                $query->where('pagado', $request->input('pagado'));
            }

            if ($request->filled('irpf')) {
                $query->where('irpf', $request->input('irpf'));
            }

            if ($request->filled('re')) {
                $query->where('re', $request->input('re'));
            }

            if ($request->filled('rectificativa')) {
                $query->where('rectificativa', $request->input('rectificativa'));
            }

            if ($request->filled('dni')) {
                $query->where('dni', 'like', '%' . $request->input('dni') . '%');
            }

            $perPage = $request->input('per_page', 10);
            $facturas = $query->paginate($perPage);

            $resultResponse->setData($facturas);
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
                'codigo_factura' => 'required|integer|unique:factura,codigo_factura',
                'iva' => 'required|boolean',
                'pagado' => 'required|boolean',
                'irpf' => 'required|boolean',
                're' => 'required|boolean',
                'rectificativa' => 'required|boolean',
                'dni' => 'required|string|max:9|exists:administrativo,dni',
            ]);

            $factura = Factura::create($validated);

            $resultResponse->setData($factura);
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
            $factura = Factura::findOrFail($id);
            $resultResponse->setData($factura);
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
                'iva' => 'sometimes|required|boolean',
                'pagado' => 'sometimes|required|boolean',
                'irpf' => 'sometimes|required|boolean',
                're' => 'sometimes|required|boolean',
                'rectificativa' => 'sometimes|required|boolean',
                'dni' => 'sometimes|required|string|max:9|exists:administrativo,dni',
            ]);

            $factura = Factura::findOrFail($id);
            $factura->update($validated);

            $resultResponse->setData($factura);
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
            $factura = Factura::findOrFail($id);
            $factura->delete();
            $resultResponse->setData($factura);
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
