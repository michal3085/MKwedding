@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                        </li>
                    </ul>
                    <div>
                        <div class="btn-wrapper">
                            <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                            <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                            <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="statistics-details d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="statistics-title">Bounce Rate</p>
                                        <h3 class="rate-percentage">32.53%</h3>
                                        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                                    </div>
                                    <div>
                                        <p class="statistics-title">Page Views</p>
                                        <h3 class="rate-percentage">7,682</h3>
                                        <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                                    </div>
                                    <div>
                                        <p class="statistics-title">New Sessions</p>
                                        <h3 class="rate-percentage">68.8</h3>
                                        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title">Avg. Time on Site</p>
                                        <h3 class="rate-percentage">2m:35s</h3>
                                        <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title">New Sessions</p>
                                        <h3 class="rate-percentage">68.8</h3>
                                        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title">Avg. Time on Site</p>
                                        <h3 class="rate-percentage">2m:35s</h3>
                                        <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <form action="{{ route('guest.confirm') }}" class="form-inline" method="POST">
                                            @csrf
                                            <div class="col-md-4 col-sm-4" style="float: left">
                                                <div class="form-group">
                                                    <label for="name" class="sr-only">Imię</label>
                                                    <input  class="form-control" id="name" name="name" placeholder="Imię" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4" style="float: left">
                                                <div class="form-group">
                                                    <label for="surname" class="sr-only">Nazwisko</label>
                                                    <input  class="form-control" id="surname" name="surname" placeholder="Nazwisko" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4" >
                                                <button type="submit" class="btn btn-primary btn-lg text-white mb-0 me-0"><i class="mdi mdi-account-plus"></i>Dodaj gościa</button>
                                            </div>
                                        </form>
                                        <hr>
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="card-title card-title-dash">Pending Requests</h4>
                                                <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p>
                                            </div>
                                        </div>
                                        <div class="table-responsive  mt-1">
                                            <table class="table select-table">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check form-check-flat mt-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                        </div>
                                                    </th>
                                                    <th>Imię i Nazwisko</th>
                                                    <th>Hotel</th>
                                                    <th>Transport</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-flat mt-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex ">
                                                            <img src="images/faces/face1.jpg" alt="">
                                                            <div>
                                                                <h6>Brandon Washington</h6>
                                                                <p>Head admin</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6>Company name 1</h6>
                                                        <p>company type</p>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                <p class="text-success">79%</p>
                                                                <p>85/162</p>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><div class="badge badge-opacity-warning">In progress</div></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-flat mt-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                        </div>
                                                    </td>
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <div class="d-flex">--}}
                                                {{--                                                                                <img src="images/faces/face2.jpg" alt="">--}}
                                                {{--                                                                                <div>--}}
                                                {{--                                                                                    <h6>Laura Brooks</h6>--}}
                                                {{--                                                                                    <p>Head admin</p>--}}
                                                {{--                                                                                </div>--}}
                                                {{--                                                                            </div>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <h6>Company name 1</h6>--}}
                                                {{--                                                                            <p>company type</p>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <div>--}}
                                                {{--                                                                                <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">--}}
                                                {{--                                                                                    <p class="text-success">65%</p>--}}
                                                {{--                                                                                    <p>85/162</p>--}}
                                                {{--                                                                                </div>--}}
                                                {{--                                                                                <div class="progress progress-md">--}}
                                                {{--                                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                                {{--                                                                                </div>--}}
                                                {{--                                                                            </div>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td><div class="badge badge-opacity-warning">In progress</div></td>--}}
                                                {{--                                                                    </tr>--}}
                                                {{--                                                                    <tr>--}}
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <div class="form-check form-check-flat mt-0">--}}
                                                {{--                                                                                <label class="form-check-label">--}}
                                                {{--                                                                                    <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>--}}
                                                {{--                                                                            </div>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <div class="d-flex">--}}
                                                {{--                                                                                <img src="images/faces/face3.jpg" alt="">--}}
                                                {{--                                                                                <div>--}}
                                                {{--                                                                                    <h6>Wayne Murphy</h6>--}}
                                                {{--                                                                                    <p>Head admin</p>--}}
                                                {{--                                                                                </div>--}}
                                                {{--                                                                            </div>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <h6>Company name 1</h6>--}}
                                                {{--                                                                            <p>company type</p>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <div>--}}
                                                {{--                                                                                <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">--}}
                                                {{--                                                                                    <p class="text-success">65%</p>--}}
                                                {{--                                                                                    <p>85/162</p>--}}
                                                {{--                                                                                </div>--}}
                                                {{--                                                                                <div class="progress progress-md">--}}
                                                {{--                                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 38%" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                                {{--                                                                                </div>--}}
                                                {{--                                                                            </div>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td><div class="badge badge-opacity-warning">In progress</div></td>--}}
                                                {{--                                                                    </tr>--}}
                                                {{--                                                                    <tr>--}}
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <div class="form-check form-check-flat mt-0">--}}
                                                {{--                                                                                <label class="form-check-label">--}}
                                                {{--                                                                                    <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>--}}
                                                {{--                                                                            </div>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <div class="d-flex">--}}
                                                {{--                                                                                <img src="images/faces/face4.jpg" alt="">--}}
                                                {{--                                                                                <div>--}}
                                                {{--                                                                                    <h6>Matthew Bailey</h6>--}}
                                                {{--                                                                                    <p>Head admin</p>--}}
                                                {{--                                                                                </div>--}}
                                                {{--                                                                            </div>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <h6>Company name 1</h6>--}}
                                                {{--                                                                            <p>company type</p>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <div>--}}
                                                {{--                                                                                <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">--}}
                                                {{--                                                                                    <p class="text-success">65%</p>--}}
                                                {{--                                                                                    <p>85/162</p>--}}
                                                {{--                                                                                </div>--}}
                                                {{--                                                                                <div class="progress progress-md">--}}
                                                {{--                                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                                {{--                                                                                </div>--}}
                                                {{--                                                                            </div>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td><div class="badge badge-opacity-danger">Pending</div></td>--}}
                                                {{--                                                                    </tr>--}}
                                                {{--                                                                    <tr>--}}
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <div class="form-check form-check-flat mt-0">--}}
                                                {{--                                                                                <label class="form-check-label">--}}
                                                {{--                                                                                    <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>--}}
                                                {{--                                                                            </div>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <div class="d-flex">--}}
                                                {{--                                                                                <img src="images/faces/face5.jpg" alt="">--}}
                                                {{--                                                                                <div>--}}
                                                {{--                                                                                    <h6>Katherine Butler</h6>--}}
                                                {{--                                                                                    <p>Head admin</p>--}}
                                                {{--                                                                                </div>--}}
                                                {{--                                                                            </div>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <h6>Company name 1</h6>--}}
                                                {{--                                                                            <p>company type</p>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td>--}}
                                                {{--                                                                            <div>--}}
                                                {{--                                                                                <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">--}}
                                                {{--                                                                                    <p class="text-success">65%</p>--}}
                                                {{--                                                                                    <p>85/162</p>--}}
                                                {{--                                                                                </div>--}}
                                                {{--                                                                                <div class="progress progress-md">--}}
                                                {{--                                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                                {{--                                                                                </div>--}}
                                                {{--                                                                            </div>--}}
                                                {{--                                                                        </td>--}}
                                                {{--                                                                        <td><div class="badge badge-opacity-success">Completed</div></td>--}}
                                                {{--                                                                    </tr>--}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row flex-grow">
                            <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body card-rounded">
                                        <h4 class="card-title  card-title-dash">Recent Events</h4>
                                        <div class="list align-items-center border-bottom py-2">
                                            <div class="wrapper w-100">
                                                <p class="mb-2 font-weight-medium">
                                                    Change in Directors
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list align-items-center border-bottom py-2">
                                            <div class="wrapper w-100">
                                                <p class="mb-2 font-weight-medium">
                                                    Other Events
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list align-items-center border-bottom py-2">
                                            <div class="wrapper w-100">
                                                <p class="mb-2 font-weight-medium">
                                                    Quarterly Report
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list align-items-center border-bottom py-2">
                                            <div class="wrapper w-100">
                                                <p class="mb-2 font-weight-medium">
                                                    Change in Directors
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="list align-items-center pt-3">
                                            <div class="wrapper w-100">
                                                <p class="mb-0">
                                                    <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h4 class="card-title card-title-dash">Activities</h4>
                                            <p class="mb-0">20 finished, 5 remaining</p>
                                        </div>
                                        <ul class="bullet-line-list">
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                                    <p>Just now</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">Oliver Noah</span> assign you a task</div>
                                                    <p>1h</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">Jack William</span> assign you a task</div>
                                                    <p>1h</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">Leo Lucas</span> assign you a task</div>
                                                    <p>1h</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">Thomas Henry</span> assign you a task</div>
                                                    <p>1h</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                                    <p>1h</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                                    <p>1h</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list align-items-center pt-3">
                                            <div class="wrapper w-100">
                                                <p class="mb-0">
                                                    <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
