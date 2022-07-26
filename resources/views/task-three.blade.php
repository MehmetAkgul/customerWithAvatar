@extends('body.master')
@section('page-level-css')
@endsection()

@section('master')

    <div class="p-5 mb-4 bg-light rounded-3">
        <form action="{{route("task-three-new-subscribe")}}" method="POST">
            @csrf
            <div class="row">
                <h3>Subscribe to Our Newsletter</h3>
                <div class=" p-3 col-sm-6 ">
                    <label for="title" class="col-sm-2 col-form-label">Title </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('title') is-invalid  @enderror" name="title" id="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class=" p-3 col-sm-6 ">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class=" p-3 col-sm-6 ">
                    <label for="email" class="col-sm-2 col-form-label">Email </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">Be Subscribe</button>
        </form>
    </div>

    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 text-white bg-dark rounded-3">
                <h2>
                    Task Three: Outline the components of such a system and how you would set it up.
                </h2>
                <p>
                    You need to send several notification e mails to customers, which are initiated by certain events in the system. Some of the notifications will recur within certain time
                    periods (e.g. 3, 7, 14, 18 days) if a specific condition is met (e.g. the user did not perform an action or did not unsubscribe from the notification).
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>
                    Solution : Use DataTable And Yajra Query

                </h2>
                <p>
                <ol>
                    <li>
                        The customer becomes a member of the newsletter and receives a notification.
                        This part was made with https://laravel.com/docs/9.x/notifications.
                    </li>
                    <li>
                        Then it sends cronjob mail according to the days in the sending_days array
                        I used https://laravel.com/docs/9.x/mail class in mail.
                    </li>
                    <li>
                        Each client's is_subscribe setting can be managed.
                    </li>
                    <li>
                        If is_subscribe is 1, the client receives the newsletter mail.
                    </li>
                    <li>
                        I used sendinblue as mail server and ran it locally.
                    </li>
                </ol>

                </p>
            </div>
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

