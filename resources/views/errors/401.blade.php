@extends('errors::illustrated-layout')

@section('title', __('custom.global.messages.dont_have_permission'))
@section('code', '401')
@section('message', __('custom.global.messages.dont_have_permission_message'))
