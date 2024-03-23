@extends("layouts.layout")

@section("content")
<form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Enviar</button>
</form>
