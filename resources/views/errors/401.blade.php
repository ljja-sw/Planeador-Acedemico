@extends('errors::illustrated-layout')

@section('title', __('No Autorizado'))
@section('code', '401')
@section('message', __('No tienes permiso para acceder este recurso'))
