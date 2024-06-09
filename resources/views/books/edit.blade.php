@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ $book->title }}" required>
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" value="{{ $book->author }}" required>
        </div>
        <div>
            <label for="publisher">Publisher:</label>
            <input type="text" name="publisher" id="publisher" value="{{ $book->publisher }}" required>
        </div>
        <div>
            <label for="firstPubDate">First Publication Date:</label>
            <input type="date" name="firstPubDate" id="firstPubDate" value="{{ $book->firstPubDate }}" required>
        </div>
        <div>
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" id="isbn" value="{{ $book->isbn }}" required>
        </div>
        <div>
            <label for="pages">Pages:</label>
            <input type="number" name="pages" id="pages" value="{{ $book->pages }}" required>
        </div>
        <div>
            <label for="cover">Cover Image:</label>
            <input type="file" name="cover" id="cover">
            @if ($book->cover)
                <img src="{{ Storage::url($book->cover) }}" alt="{{ $book->title }}" style="max-width: 100px;">
            @endif
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
