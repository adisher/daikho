@extends('layouts.base')

@section('title', 'Marketing URLs')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Urls</div>

                    <div class="card-body">
                        <a href="{{ route('marketing-urls.create') }}" class="btn btn-primary my-2">Create Url</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Slug</th>
                                    <th>Callback ID</th>
                                    <th>Source ID</th>
                                    <th>Free Signups</th>
                                    <th>Callbacks</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($urls as $url)
                                    <tr>
                                        <td>{{ $url->slug }}</td>
                                        <td>{{ $url->callback_id }}</td>
                                        <td>{{ $url->source_id }}</td>
                                        <td>{{ $url->freeSignup? 'Yes' : 'No' }}</td>
                                        <td>{{ $url->callbacks? 'Yes' : 'No' }}</td>
                                        <td>{{ $url->visible ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            {{-- <a href="{{ route('marketing-urls.show', $url) }}" class="btn btn-sm btn-primary">View</a> --}}
                                            <a href="{{ route('marketing-urls.edit', $url) }}" class="btn btn-sm btn-secondary">Edit</a>
                                            <form action="{{ route('marketing-urls.destroy', $url) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
