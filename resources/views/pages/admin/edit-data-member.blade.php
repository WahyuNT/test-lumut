@extends('layouts.master')
@section('content')
    @livewire('author-db', ['id' => $member->id])
@endsection
