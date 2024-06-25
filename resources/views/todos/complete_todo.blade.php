@extends('layouts.dashboard')

@section('dashcontent')
    <div class="container">
        <div class="row">
            <div class="offset-1 col-md-10 ">
                <div class="row">
                    @if(!$get_completed_todo->isEmpty())
                        @foreach($get_completed_todo as $item)
                            <div class="col-md-4 justify-center mb-4" id="item-{{ $item->id }}">
                                <div class="d-flex justify-content-center flex-column pb-4"
                                style="background-color: white; z-index:5; border-radius: 20px; position: relative; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                    <div class="" style="  ">
                                        <button type="button" class="btn btn-danger" style="position: absolute; top:10px; right: 10px;">Delete</button>
                                        <button type="button" class="btn btn-secondary" style="position: absolute; top:10px; left: 10px;"   onclick="changeStatus({{ $item->id }})">Change status</button>
                                    </div>
                                    <div class="" style="width:100%;
                                    ">
                                        <img src="{{ asset('image/image1.avif') }}" alt="default image" style="width:100%; height:250px; " />
                                    </div>

                                    <div class="text-center" style="padding: 10px 20px;">
                                        <p class="fs-5">{{ $item->title }}</p>
                                        @if ($item->deadline !== null)
                                            <small class="fs-6">Deadline: {{ $item->deadline }}</small>
                                        @else
                                        <small class="fs-6">Deadline:</small>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row justify-content-center">
                            <span class="fs-5">There are no completed todos</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    function changeStatus(id) {
        // let formData = $(this).serialize();
        $.ajax({
            type: "post",
            url: "/change-status/" + id,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                is_completed: 0,
            },
            dataType: "dataType",
            success: function (response) {
                // console.log(response);
                if (response.success) {
                    $("#item-" + id).fadeOut();
                } else {
                    console.error('Failed to update status:', response.message);
                }
            }
        });
    }
</script>
