@extends('errors::illustrated-layout')

@section('title', __('Servicio no disponible'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'El servicio no está disponible actualmente'))
