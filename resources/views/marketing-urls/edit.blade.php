@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Marketing URL</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('marketing-urls.update', $url) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-md-12 mb-3">
                            <label for="slug" class="col-md-4 col-form-label">{{ __('SLUG') }}</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $url->slug) }}" autocomplete="slug" autofocus>

                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="callback_id" class="col-md-4 col-form-label">{{ __('Callback ID') }}</label>

                            <div class="col-md-6">
                                <input id="callback_id" type="text" class="form-control @error('callback_id') is-invalid @enderror" name="callback_id" value="{{ old('callback_id', $url->callback_id) }}" autocomplete="callback_id" autofocus>

                                @error('callback_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="source_id" class="col-md-4 col-form-label">{{ __('Source ID') }}</label>

                            <div class="col-md-6">
                                <input id="source_id" type="text" class="form-control @error('source_id') is-invalid @enderror" name="source_id" value="{{ old('source_id', $url->source_id) }}" autocomplete="source_id" autofocus>

                                @error('source_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label for="status" class="col-md-4 col-form-label">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select id="status" class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option value="active" @if(old('status', $url->visible) == true) selected @endif>Active</option>
                                    <option value="inactive" @if(old('status', $url->visible) == false) selected @endif>Inactive</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="callbacks" class="col-md-4 col-form-label">{{ __('Callbacks') }}</label>

                            <div class="col-md-6">
                                <input id="callbacks" type="checkbox" class="form-inline @error('callbacks') is-invalid @enderror" name="callbacks" @if(old('callbacks', $url->callbacks) == true) checked @endif autocomplete="callbacks" autofocus>

                                @error('callbacks')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="freeSignup" class="col-md-4 col-form-label">{{ __('Free Signup') }}</label>

                            <div class="col-md-6">
                                <input id="freeSignup" type="checkbox" class="form-inline @error('freeSignup') is-invalid @enderror" name="freeSignup" @if(old('freeSignup', $url->freeSignup) == true) checked @endif autocomplete="freeSignup" autofocus>

                                @error('freeSignup')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-6 mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                                <a href="{{ route('marketing-urls.index') }}" class="btn btn-secondary">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
