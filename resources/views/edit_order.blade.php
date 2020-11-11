@include('layouts.header')
   <style>
       .img-1{
        width: 100px;
        margin: 0 auto;
       }
       .text-centerr{
        margin: 20px 0px;
       }
   </style>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                       <!--  <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div> -->
                    </div>

                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('home')}}">Dashboard</a></li>
                                    <li class="active">edit order</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                 @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                <!-- /# row -->
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Edit Order</h4>
                                   
                                </div>


            
                                <div class="card-body">
                                    <div class="menu-upload-form">
                            <form class="form-horizontal" method="POST" action="{{url('post_edit_order')}}" enctype="multipart/form-data">
                                 {{ csrf_field() }}

                                 <input type="hidden" name="id" value="{{$product->id}}">
                                         
                                            <div class="row">
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Order No.</label>
                                                <div class="col-sm-10">
                                <input type="text" name="order_no" class="form-control" value="{{$product->order_no}}" disabled>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-sm-2 control-label">Customer Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="customer_name" class="form-control" value="{{$product->customer_name}}" disabled>
                                                </div>
                                            </div> 


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Product Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" value="{{$product->name}}" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Price</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="price" class="form-control" value="{{$product->price}}" disabled>
                                                </div>
                                            </div>


                                              <div class="form-group">
                                                <label class="col-sm-2 control-label">Quantity</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="quantity" class="form-control" value="{{$product->quantity}}" disabled>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="address" class="form-control" value="{{$product->address}}" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">City</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="city" class="form-control" value="{{$product->city}}" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">State</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="state" class="form-control" value="{{$product->state}}" disabled>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-sm-2 control-label">Pin code</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="zip_code" class="form-control" value="{{$product->zip_code}}" disabled>
                                                </div>
                                            </div>

                                           <div class="form-group">
                                                <label class="col-sm-2 control-label">Status </label>
                                                <div class="col-sm-10">
                                             <select name="status" class="form-control">
                                            <option value="{{$product->status}}">Please Select</option>
                                             <option value="1">Cancel</option>
                                             <option value="2">Confirm</option>
                                             <option value="3">Pickup</option>
                                            <option value="4">In-Process</option>
                                            <option value="5">Shipped</option>
                                            <option value="6">Delivered</option>
                                             </select>

                                                </div>
                                            </div>

                                                 </div>                                  
                                            </div>

                                          

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                </div>
                                            </div>
                            </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                </div>
                <!-- /# main content -->
            </div>
            <!-- /# container-fluid -->
        </div>
        <!-- /# main -->
    </div>
    <!-- /# content wrap -->

@include('layouts.footer')
       