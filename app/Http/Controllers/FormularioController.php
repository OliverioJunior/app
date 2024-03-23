<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FormularioController extends Controller
{
    public function upload(Request $request)
    {
        $readerFile = new ExcelReaderController();
        $jogoDoBichoFormatter = new JogoDoBichoFormatterController();


        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:xlsx,xls|max:2048',
            ]);

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $filePath = public_path('uploads') . '/' . $fileName;
            $file = $readerFile->readXlsx($filePath);
            $reportJogoDoBicho = $jogoDoBichoFormatter->formatter($file);



            dd($reportJogoDoBicho, $filePath);
            return response()->json(['success' => 'Arquivo importado com sucesso.', 'file' => $readerFile]);
        }

        return response()->json(['error' => 'Nenhum arquivo importado.'], 400);
    }
}
