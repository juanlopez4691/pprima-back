<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();

        if (! $documents) {
            throw new HttpException(
                400,
                "Invalid data"
            );
        }

        return response()->json(
            $documents,
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $document              = new Document();
        $document->title       = $request->input('document');
        $document->description = $request->input('description');
        $document->content     = $request->input('content');

        if ($document->save()) {
            return response()->json(
                $document,
                200
            );
        }

        throw new HttpException(
            400,
            "Invalid data"
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);

        if (! $document) {
            throw new HttpException(
                404,
                "Document not found"
            );
        }

        return response()->json(
            $document,
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);

        if (! $document) {
            throw new HttpException(
                404,
                "Document not found"
            );
        }

        $document->delete();

        return response()->json([
            'message' => 'Document deleted',
        ], 200);
    }
}
