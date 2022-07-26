@extends('body.master')
@section('page-level-css')
@endsection()

@section('master')
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Task One</h1>
            <p>
                The user uploads a PDF file ( Case Study) through our system and waits for quite a while until this is successfully uploaded. Meanwhile, the process in the backend
                looks
                like this:
                The file has been uploaded > it is stored in our database > the system decodes the PDF file and analyzes the text > sends it to a special service (neural network) to
                analyze the keyword density > receives the result and sends it along with a report to our manager for further evaluation.
                Only after the last step the user sees that his file has been uploaded, thus the waiting time is quite long.
            </p>
            <p>
                Please suggest why it takes so long and what solution(s) can be applied to reduce the waiting time?
            </p>
            <a href="{{route("task-one-pdf")}}" class="btn btn-outline-primary " type="button">Send Pdf</a>
            <a href="{{route("task-one-examine-list")}}" class="btn btn-outline-primary" type="button">Examine Keyword Destiny</a>
        </div>
    </div>

    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 text-white bg-dark rounded-3">
                <h2>Task Two</h2>
                <p>
                    We have a table in CRM with 1.000 employees. Each of them has a picture (avatar). The page with employees is too big, so it loads very slowly.
                </p>
                <p>
                    How can we increase the speed?
                </p>
                <a href="{{route("task-two")}}" class="btn btn-outline-light" type="button">See</a>

            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Task Three</h2>
                <p>
                    You need to send several notification e mails to customers, which are initiated by certain events in the system. Some of the notifications will recur within
                    certain
                    time periods (e.g. 3, 7, 14, 18 days) if a specific condition is met (e.g. the user did not perform an action or did not unsubscribe from the notification).
                </p>
                <p>
                    Outline the components of such a system and how you would set it up.
                </p>
                <a href="{{route("task-three")}}" class="btn btn-outline-secondary" type="button">See</a>
            </div>
        </div>
    </div>

@endsection()
@section('page-level-script')

@endsection()
