@extends('layouts.admin')

@section('title', 'Category Add | Admin Dashboard | Fenris')


@section('form_style')
    <style>
        .page-content {
            padding: 10px;
        }

        .ibox {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .ibox-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            padding: 20px;
            border-bottom: 1px solid #eee;
            background-color: #f5f5f5;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .ibox-body {
            background-color: #f99999;
            color: white

        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .form-control {
            width: calc(100% - 40px);
            padding: 10px;
            font-size: 14px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #80bdff;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border: 1px solid #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border: 1px solid #bd2130;
        }

        .btn-success {
            color: #fff;
            background-color: #28a745;
            border: 1px solid #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border: 1px solid #1e7e34;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
        }

        .img-preview {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
@endsection

@section('scripts')
    <script>
        if (window.$('#is_parent').is(':checked')) {
            window.$('#parent_div').hide();
        }
        window.$('#is_parent').change(function() {
            window.$('#parent_div').slideToggle();
        })
    </script>
@endsection

@section('main-content')
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">{{ isset($category_list) ? 'Update' : 'Add' }} New Category</div>
                    <div class="ibox-body">
                        @if (isset($category_list))
                            {{ Form::open(['url' => route('category.update', $category_list->id), 'class' => 'form form-container', 'files' => true]) }}
                            @method('put')
                        @else
                            {{ Form::open(['url' => route('category.store'), 'class' => 'form form-container', 'files' => true]) }}
                        @endif
                        <div class="form-group row mb-4">
                            {{ Form::label('title', 'Title:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::text('title', @$category_list->title, ['class' => 'form-control form-control-sm', 'id' => 'title', 'required' => true, 'placeholder' => 'Enter category title ']) }}
                                @error('title')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {{ Form::label('summary', 'Summary:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::textarea('summary', @$category_list->summary, ['class' => 'form-control form-control-sm', 'id' => 'summary', 'placeholder' => 'Enter category summary ', 'rows' => '5', 'style' => 'resize : none']) }}
                                @error('summary')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row mb-4">
                            {{ Form::label('is_parent', 'Is parent:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::checkbox('is_parent', 1, @$category_list->is_parent ?? true, ['id' => 'is_parent']) }}
                                Yes
                                @error('is_parent')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4" id="parent_div">
                            {{ Form::label('parent_id', 'Parent Category:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::select('parent_id', $parent_id, @$category_list->parent_id, ['class' => 'form-control form-control-sm', 'id' => 'parent_id', 'placeholder' => '--Select any one--']) }}
                                @error('parent_id')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group row mb-4">
                            {{ Form::label('status', 'Status:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::select('status', ['active' => 'Published', 'inactive' => 'Unpublished'], @$category_list->status, ['class' => 'form-control form-control-sm', 'id' => 'status', 'required' => true]) }}
                                @error('status')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {{ Form::label('image', 'Image:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-5">
                                {{ Form::file('image', ['id' => 'status', 'required' => isset($category_list) ? false : true, 'accept' => 'image/*']) }}
                                @error('error')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <img src={{ asset('uploads/category/Thumb-' . @$category_list->image) }} alt=""
                                    class="img img-fluid img-responsive" style="max-width: 10rem">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {{ Form::label('', '', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::button('<i class = "fa fa-trash"></i> Reset', ['class' => 'btn btn-sm btn-danger', 'id' => 'reset', 'type' => 'reset']) }}
                                {{ Form::button('<i class = "fa fa-paper-plane"></i> Submit', ['class' => 'btn btn-sm btn-success', 'id' => 'submit', 'type' => 'submit']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
