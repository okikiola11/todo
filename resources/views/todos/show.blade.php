@extends('layouts.dashboard')

@section('dashcontent')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create A Todos Page') }}</div>

                    {{-- <div class="card-body"> --}}

                        <!-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif -->


                        <div class="card-body table-responsive">
                            <h6 class="card-title">Todo Status</h6>
                            <div class="table-responsive">
                            <table class="table overflow-scroll table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Task</th>
                                    <th>Todos</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                    <input class="form-check-input" type="checkbox" />
                                    </td>
                                    <td class="d-flex align-items-center">
                                    <span class="nameInitial">JD</span>&nbsp;&nbsp;John
                                    Doe
                                    </td>
                                    <td>{{$todo -> title}}</td>
                                    <td>{{$todo -> description}}</td>
                                    <!-- <td>
                                    <div class="badge badge-outline-success">
                                        Approved
                                    </div>
                                    </td> -->
                                </tr>

                                </tbody>
                            </table>
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
        

    </div>
@endsection
