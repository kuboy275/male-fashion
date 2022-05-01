@extends('back-end.master')

@section('title')
    <title>Trang chu</title>
@endsection

@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('back-end.components.content-header', ['name' => 'Home', 'key' => '','route_redirect' => route('admin.home')])
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3> {{ $count_order }}</h3>
  
                  <p>Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('order-management.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3> {{ $count_product }} </h3>
  
                  <p>Product</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $count_user }}</h3>
  
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>
  
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
  
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-7">
  
              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Latest Orders</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Full name</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Date order</th>
                      </tr>
                      </thead>
                      <tbody>
                        @php
                          $stt = 1
                        @endphp
                        @foreach($order_new as $key => $value)
                        <tr>
                          <td><a href="{{ route('order-management.show',$value->id) }}">{{ $stt ++ }}</a></td>
                          <td><a class="text-primary" href="{{ route('order-management.show',$value->id) }}">{{ $value->customer->last_name }} {{ $value->customer->first_name }} </a></td>
                          <td><span class="badge badge-danger"> {{ $value->order_state }} </span></td>
                          <td> <span class="badge badge-info">${{ $value->total }}</span> </td>
                          <td>
                            {{ $value->date_order }}
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <a href="{{ route('order-management.index') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
  
            <div class="col-md-5">
              <!-- PRODUCT LIST -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Recently Added Products</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    @foreach($product_new as $key => $value)
                    <li class="item">
                      <div class="product-img">
                        <img src="{{ $value->image_path_master }}" alt="Product Image" class="img-size-50">
                      </div>
                      <div class="product-info">
                        <a href="{{ route('product.show',$value->id) }}" class="product-title"> {{ $value->name }}
                          <span class="badge badge-primary float-right">${{ $value->price }}</span></a>
                          <span class="product-description">
                            Category: {{ $value->category->name }}
                          </span>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="{{ route('product.index') }}" class="uppercase">View All Products</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

