@extends('body.master')
@section('page-level-css')
@endsection()

@section('master')
        <div class="row">

            <div class="col-md-6">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                    <h2>Thank You</h2>
                    <p>
                        We have successfully received your information

                        <a href="{{route("task-one-examine-list")}}" class="btn btn-outline-light" type="button">Examine Keyword Destiny</a>
                    </p>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{asset('assets/thanks.png')}}" alt="">
            </div>
        </div>

@endsection()
@section('page-level-script')
    <script>
        $("body").on("keyup", ".form-control", function (e) {
            let input = $(this);
            let str = e.target.value;
            console.log(str)
            if (str.length > 2) {
                console.log("büyük")
                input.hasClass("is-invalid") ? input.removeClass("is-invalid") : "";
                input.addClass("is-valid");
            } else {
                console.log("küçük")
                input.hasClass("is-valid") ? input.removeClass("is-valid") : "";
            }

        })
    </script>
@endsection()

