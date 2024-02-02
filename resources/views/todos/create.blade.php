@extends('layouts.dashboard')

@section('dashcontent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create A Todos Page') }}</div>

                <div class="card-body">

                    <!-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif -->


                    <!-- method="post" action="{{ route('todos.store') }}" -->
                    <form  id="submitForm">
                        <!-- helps with cross site attacks  -->
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input 
                                type="text" class="@error('title') is-invalid @enderror form-control" name="title" id="title" aria-describedby="title"
                            />
                        
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="descr" name="description" class="form-control @error('description') is-invalid @enderror" cols="5" rows="5">
                            </textarea>

                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
                    </form>
                    <span id="output"></span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $("#submitForm").submit(function(event) {
                event.preventDefault();

                var form = $("#submitForm")[0];
                var data = new FormData(form);

                $("#btnSubmit").prop("disabled", false);

                $.ajax({
                    type: "POST",
                    url: "{{ route('todos.store') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 'success') {
                            // Redirect to another page
                            window.location.href = data.redirect_url;

                            swal({  
                                title: "Successful",  
                                text: " Todo submitted successfully",  
                                icon: "success",  
                                button: "ok",  
                            });
                            // console.log(data.redirect_url)
                        };

                        // console.log(data)
                        // alert(data.res)
                    },
                    error: function(e) {
                        console.log(e.responseText)
                    }
                })
            })
        });
    </script>
</div>
@endsection
