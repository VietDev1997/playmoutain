@extends('admin.master')
@section('content')
    <div class="row col-lg-12">
        <div class="col-lg-10 offset-1 container-fluid">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h2 class="h1 display">Basic Settings</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody><tr>
                            <td style="border-top: none;">Username</td>
                            <td style="border-top: none;">admin</td>
                        </tr>
                        <tr>
                            <td style="border-top: none;">Last logged</td>
                            <td style="border-top: none;">2018年05月17日 14:02:10</td>
                        </tr>
                        </tbody></table>
                    <form class="button_to" method="post" action="/en/change_password"><input class="btn btn-primary" type="submit" value="Change Password"><input type="hidden" name="authenticity_token" value="dYyMynBVjzz8cVFQzloKsmPaxClEHV+H1X4NrmtJXkDPqsGiwG1M8VCO0J2zNPhzbQOyNec9B7PfOZmMnMl00A=="></form>
                </div>
            </div>
        </div>
    </div>
@endsection