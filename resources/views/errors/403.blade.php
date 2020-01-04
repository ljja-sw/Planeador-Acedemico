@extends('errors::illustrated-layout')

@section('title', __('Prohibido'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Acceso denegado No tiene permiso para acceder
'))
