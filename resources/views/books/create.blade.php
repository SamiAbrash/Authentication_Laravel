@extends('layouts.app')

@section('content')
    <h1>Create New Book</h1>
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" required>
        </div>
        <div>
            <label for="publisher">Publisher:</label>
            <input type="text" name="publisher" id="publisher" required>
        </div>
        <div>
            <label for="firstPubDate">First Publication Date:</label>
            <input type="date" name="firstPubDate" id="firstPubDate" required>
        </div>
        <div>
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" id="isbn" required>
        </div>
        <div>
            <label for="pages">Pages:</label>
            <input type="number" name="pages" id="pages" required>
        </div>
        <div>
            <label for="cover">Cover Image:</label>
            <input type="file" name="cover" id="cover">
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
