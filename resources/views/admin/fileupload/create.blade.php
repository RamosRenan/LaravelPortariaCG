@extends('layouts.modal')

@section('content_header')
    <h1><i class="fa fa-file-upload"></i> @lang('global.app_file_upload_title')</h1>
@stop

@section('js')
<script>
    $(document).ready(function(){
        $('#uploadFileAjax').ajaxForm({
            beforeSend:function() {
                $('#message').empty();
            },
            uploadProgress:function(event, position, total, percentComplete) {
                $('.progress-bar').text(percentComplete + '%');
                $('.progress-bar').css('width', percentComplete + '%');
            },
            success:function(data) {
                if(data.errors) {
                    $('.progress-bar').text('0%');
                    $('.progress-bar').css('width', '0%');
                    $('#message').html('<div class="alert alert-error alert-dismissible">'+data.errors+'</div>');
                }
                if(data.success) {
                    $('.progress-bar').text('@lang('global.app_file_upload_success')');
                    $('.progress-bar').css('width', '100%');
                    $('#message').html('<div class="alert alert-success alert-dismissible">'+data.success+'</div>');
                }
            }
        });

        document.getElementById('fileUpload').addEventListener('change', function(){
            document.getElementById('file-name').textContent = this.value;
        });
    });
</script>
@stop

@section('content')
    {!! Form::open(['id' => 'uploadFileAjax', 'method' => 'POST', 'route' => $store, 'enctype' => 'multipart/form-data']) !!}
        {!! Form::hidden('route_id', $id) !!}
        {!! Form::label('title', __('global.app_file_title').'*', ['class' => 'control-label']) !!}
        {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
        <br />
        <div class="progress">
            <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
        </div>
        {!! Form::label('fileUpload', __('global.app_file_select'), ['class' => 'btn btn-warning btn-sm mt-2']) !!}
        {!! Form::file('fileUpload', ['style' => 'display: none']) !!}
        <span id='file-name'></span>
        {!! Form::submit(__('global.app_create'), ['class' => 'btn btn-primary btn-sm float-right mt-2']) !!}
    {!! Form::close() !!}
@stop