@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>Publisher:</strong> {{ $book->publisher }}</p>
    <p><strong>First Publication Date:</strong> {{ $book->firstPubDate }}</p>
    <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
    <p><strong>Pages:</strong> {{ $book->pages }}</p>
    @if ($book->cover)
        <img src="{{ Storage::url($book->cover) }}" alt="{{ $book->title }}" style="max-width: 100px;">
    @endif
    <a href="{{ route('books.index') }}">Back to List</a>
@endsection
