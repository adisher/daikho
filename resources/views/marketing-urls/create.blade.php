('@extends('layouts.base')')

@section('title', 'Create Marketing URL')

@section('content')
    <div class="container">
        <div class="my-5">
            <h3>Create Marketing URL</h3>
        </div>
        <div class="flex flex-row mb-3">
            <form action="{{ route('marketing-urls.store') }}" method="POST">
                @csrf
                <div class="col-md-6">

                    {{-- <div class="form-group col-md-12">
                        <label for="url">URL</label>
                        <input type="text" name="url" id="url" autocomplete="off" class="form-control @error('url') is-invalid @enderror"
                            value="{{ old('url') }}">
                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    <div class=" col-md-12 form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" autocomplete="off"
                            class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group col-md-12">
                        <label for="callback_id">Callback ID</label>
                        <input type="text" name="callback_id" id="callback_id" autocomplete="off" class="form-control @error('callback_id') is-invalid @enderror"
                            value="{{ old('callback_id') }}">
                        @error('callback_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class=" col-md-12 form-group">
                        <label for="source_id">Source ID</label>
                        <input type="text" name="source_id" id="source_id" autocomplete="off"
                            class="form-control @error('source_id') is-invalid @enderror" value="">
                        @error('source_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                            >
                            <option value="">Select status</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="freeSignup">Free Signup</label>
                        <input type="hidden" name="freeSignup" value="0"/>
                        <input type="checkbox" name="freeSignup" value="1" {{ old('freeSignup' == 1 ? 1 : 0) }}
                        id="freeSignup" autocomplete="off" class="form-inline @error('freeSignup') is-invalid @enderror"/>
                        @error('freeSignup')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="callbacks">Callbacks</label>
                        <input type="hidden" name="callbacks" value="0"/>
                        <input type="checkbox" name="callbacks" value="1" {{ old('callbacks' == 1 ? 1 : 0) }}
                        id="callbacks" autocomplete="off" class="form-inline @error('callbacks') is-invalid @enderror"/>
                        @error('callbacks')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>

        </div>

    </div>
@endsection
