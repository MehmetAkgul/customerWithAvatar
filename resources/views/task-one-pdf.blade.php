@extends('body.master')
@section('page-level-css')
@endsection()

@section('master')

        <div class="p-5 mb-4 bg-light rounded-3">
            <form action="{{route("task-one-pdf-store")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class=" p-3 col-sm-6 ">
                        <label for="title" class="col-sm-2 col-form-label">Title </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('title') is-invalid  @enderror" name="title" id="title" value="{{ old('title') }}" >
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
                    <div class=" p-3 col-sm-6 ">
                        <label for="pdf" class="col-sm-2 col-form-label">Choose PDF </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control @error('pdf') is-invalid @enderror" name="pdf" id="pdf" value="{{ old('pdf') }}" accept="application/pdf">
                        </div>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                    <h2>
                        Please suggest why it takes so long and what solution(s) can be applied to reduce the waiting time?
                    </h2>
                    <p>
                        The user uploads a PDF file ( Case Study) through our system and waits for quite a while until this is successfully uploaded. Meanwhile, the process in the backend
                        looks like this:
                        The file has been uploaded > it is stored in our database > the system decodes the PDF file and analyzes the text > sends it to a special service (neural network) to
                        analyze the keyword density > receives the result and sends it along with a report to our manager for further evaluation.
                        Only after the last step the user sees that his file has been uploaded, thus the waiting time is quite long.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>
                        My Solution : divide the process into steps
                    </h2>
                    <p>
                        The process in the backend was requested like this
                        (1) File uploaded > stored in our database > (2) system decodes the PDF file and analyzes the text > sends it to a special service (neural network) to analyze keyword
                        density > receives the result and sends it along with a report to our administrator for further evaluation.
                        I divided the process into two parts as above.
                    </p>
                    <p>
                        In part (1), the user loads the file and goes to the page where the files are listed.
                        In part (2), the user clicks to open the desired file from the file list and the analysis is done at that time.
                        This dual action creates a feeling of reduction in cooldown.
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
                input.hasClass("is-invalid") ? input.removeClass("is-invalid"):"";
                input.addClass("is-valid");
            } else {
                console.log("küçük")
                input.hasClass("is-valid") ? input.removeClass("is-valid"):"";
            }

        })
    </script>
@endsection()

