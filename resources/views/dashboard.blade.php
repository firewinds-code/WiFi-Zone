@extends('include.master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>
                                <p>{{ __('Data Left') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44<sup style="font-size: 20px">%</sup></h3>
                                <p>{{ __('Data Used') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header border-0">
                      <h3 class="card-title">Subscription Packages</h3>
                      <div class="card-tools">
                        
                      </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                      <table class="table table-striped table-valign-middle">
                        <thead>
                        <tr>
                          <th>Packages</th>
                          <th>Price</th>
                          <th>Data</th>
                          <th>Duration</th>
                          <th>More</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            {{-- <td>{{ $result['vin_no'] }}</td>
                            <td>{{ $result['customer_name'] }}</td>
                            <td>{{ $result['contact_no'] }}</td>
                            <td>{{ $result['usage_category'] }}</td> --}}
                            <td>
                                <a onclick="#" href="#"
                                    class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#editModal"><i class="fa fa-eye"
                                        style="padding: 2px"></i></a>
                            </td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection
