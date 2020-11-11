@include('layouts.header')
<style>
  .disc_prcnt .input-group-prepend{
  display: inline-block;
}
.disc_prcnt .form-white{
  width: 90px;
    display: inline-block;
    float: none;
}
.disc_prcnt .input-group-append{
  display: inline-block;
}
</style>
<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('home')}}">Dashboard</a></li>
                                    <li class="active">Add advertisement</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
            </div>
        </div>
  

                 @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif



<!-----Start gallery upload -->

                     <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Add Advertisement</h4>
                                   
                                </div>
                              </div>
                            </div>
                          </div>


                      </div>
                        <section class="form">
  <div class="container">
   <form method="POST" action="{{url('add_advertisement')}}" enctype="multipart/form-data">
     {{ csrf_field() }}
    <div class="row">
     <div class="form-group col-md-8">
       <label class="control-label">Selected Page</label>
     <select class="form-control form-white" name="page_id" required="" > 
            <option value="">Seleted please</option>
            <option value="1">Home</option>
            <option value="2">Our Team</option>
            <option value="3">Boat Listing</option>
            <option value="4">Boat Detail</option>
            <option value="5">Diving Courses</option>
            <option value="6">Diving Courses Detail</option>
            <option value="7">Tour Listing</option>
            <option value="8">Tour Detail</option>
            <option value="9">Store Listing</option>
            <option value="10">Store Detail</option>
            <option value="11">Contact us</option>
      </select>
       @if (Session::has('alert'))
       <div style="color: red;">{{ Session::get('alert') }}</div>
    @endif

    </div> 

    <div class="form-group col-md-8">
       <label class="control-label">Title</label>
       <input class="form-control form-white" placeholder="Enter Name" type="text" name="title" required="" />
    </div>
 <div class="form-group col-md-12">
    <p><b>Note:</b> Fill only one input between price and Discount Percentage</p>
  </div>

     <div class="form-group col-md-6 disc_prcnt pri">
       <label class="control-label">price</label>
       <input class="form-control form-white" value="0" type="number" name="price"/>
    </div>

    <div class="form-group col-md-6 disc_prcnt disc_p">
       <label class="control-label">Discount Percentage</label>
       <input class="form-control form-white" value="0" type="number" name="discount_percentage" />
    </div>

    <div class="form-group col-md-8">
       <label class="control-label">Short Description</label>
      <textarea rows="1" cols="10" class="form-control" placeholder="Enter description" type="text" name="short_description" required="" ></textarea> 
    </div> 

  

 </div>
<div class="form-group col-md-6">
  <button type="submit" class="btn btn-lg btn-primary">Submit</button>
</div>
    </form>

  </div>

</section>
</div>
</div>
  </div>
    @include('layouts.footer')    


