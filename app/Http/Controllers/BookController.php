<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index','show');
    }

    public function index()
    {
        return Book::all();
    }
    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'publisher' => 'required|string|max:255',
                'firstPubDate' => 'required|date',
                'ifTranslator' => 'required|string|max:255',
                'description' => 'required|string',
                'isbn' => 'required|string|unique:books|max:13',
                'pages' => 'required|integer',
                'ifChapters' => 'string|max:255',
                'cover' => 'nullable|string'
            ]);
    
            // Create the book
            $book = Book::create($request->all());
    
            return response()->json($book, 201);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Database Error',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An unexpected error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }
        

    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json($book);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'author' => 'sometimes|string|max:255',
            'publisher' => 'sometimes|string|max:255',
            'first_publish_date' => 'sometimes|date',
            'ifTranslator' => 'sometimes|boolean',
            'description' => 'sometimes|string',
            'isbn' => 'sometimes|string|unique:books,isbn,' . $id . '|max:13',
            'pages' => 'sometimes|integer',
            'ifChapters' => 'sometimes|boolean',
            'cover' => 'nullable|string'
        ]);

        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->update($request->all());

        return response()->json(['message' => 'Book updated successfully']);
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }
}
