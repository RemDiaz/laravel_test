@extends('layouts.app')

@section('title','Галерея')

@section('content')

    <img src="{{URL::asset('/images/'.$image)}}" alt="">

@endsection