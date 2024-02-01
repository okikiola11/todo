@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Todos Form') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('todos.update') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="todo_id" value="{{ $todo -> id}}" />
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="title"
                            value="{{ $todo->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" cols="5" rows="5"
                            >{{ $todo->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="is_completed" class="form-control">
                                <option disabled selected> Select Option </option>
                                <option value="1">Complete</option>
                                <option value="1">In omplete</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
