@extends('user.layouts.master')

@section('title','Order Detail')

@section('main-content')
    <div class="card">

        <h5 class="card-header">Job</h5>
        <div class="card-body">
            @if($job)
                <table class="table table-striped table-hover">
                    <!-- Your table contents go here -->

                    <section class="confirmation_part section_padding">
                        <div class="order_boxes">
                            <div class="row">
                                <div class="col-lg-6 col-lx-4">
                                    <div class="order-info">
                                        <h4 class="text-center pb-4">Job INFORMATION</h4>
                                        <table class="table">
                    <tr class="">
                        <td>job S.N.</td>
                        <td> : {{$job->id}}</td>
                    </tr>
                    <tr>
                        <td>Apply Date</td>
                        <td> : {{$job->created_at->format('D d M, Y')}} at {{$job->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td> : {{$job->name}}</td>
                    </tr>
                    <tr>
                        <td>Job Status</td>
                        <td> : {{$job->status}}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td> :{{$job->gender}}</td>
                    </tr>
                    <tr>
                      <td>Nationality</td>
                      <td> :{{$job->nationality}}</td>
                    </tr>
                    <tr>
                        <td>Current Location</td>
                        <td> : {{$job->current_location}}</td>
                    </tr>
                    <tr>
                        <td>Education</td>
                        <td> :{{$job->education}}</td>
                    </tr>career_level
                    <tr>
                        <td>Career Job</td>
                        <td> :{{$job->career_level}}</td>
                    </tr>
                    <tr>
                        <td>Experience Level</td>
                        <td> :{{$job->experience}}</td>
                    </tr>
                    <tr>
                        <td>Position</td>
                        <td> :{{$job->position}}</td>
                    </tr>
                    <tr>
                        <td>Salary Expectation</td>
                        <td> :{{$job->salary_expectation}}</td>
                    </tr>
                    <tr>
                        <td>Commitment Level</td>
                        <td> :{{$job->commitment_level}}</td>
                    </tr>
                    <tr>
                      <td>Visa Status</td>
                      <td> :{{$job->visa_status}}</td>
                    </tr>
                    <!-- Display Video -->
                    <tr>
                    <td>Recorded Video</td>
                    <td>
                    @if($job->record_video)
                    <video width="320" height="240" controls>
                         <source src="{{ asset('video/' . $job->record_video) }}" type="video/mp4">
                         Your browser does not support the video tag.
                         </video>
                    @else
                     No recorded video available.
                                   @endif
                                      </td>
                                        </tr>


                                        <!-- Display PDF -->
<tr>
    <td>Uploaded CV</td>
    <td>
        @if($job->cv_path)
            <a href="{{ asset('pdfcv/' . $job->cv_path) }}" target="_blank">View CV</a>
        @else
            No CV uploaded.
        @endif
    </td>
</tr>

              
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </table>
            @else
                <p>No job information available.</p>
            @endif

        </div>
    </div>
@endsection

@push('styles')
    <style>
        .order-info, .shipping-info {
            background: #ECECEC;
            padding: 20px;
        }

        .order-info h4, .shipping-info h4 {
            text-decoration: underline;
        }
    </style>
@endpush
