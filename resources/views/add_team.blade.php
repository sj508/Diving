@include('layouts.header')
<style>
.form{
  padding-top: 40px;
  margin-left: 20px;
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
                                    <li class="active">add team</li>
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
                                    <h4>Add Team</h4>
                                   
                                </div>
                              </div>
                            </div>
                          </div>


                      </div>
                        <section class="form">
  <div class="container">
   <form method="POST" action="{{url('add_team')}}" id="team_id" enctype="multipart/form-data">
     {{ csrf_field() }}
    <div class="row">
   
    <div class="form-group col-md-8">
     <label class="control-label">Image</label>
     <input required class="form-control form-white" type="file" name="img" placeholder="select image" />
        
   </div>

    <div class="form-group col-md-8">
       <label class="control-label">Name</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="ti-user"></i></span>
       <input class="form-control form-white" placeholder="Enter Name" type="text" name="name" required="" />
     </div>
      <span class="text-danger">{{ $errors->first('name') }}</span>
    </div>
 
   <div class="form-group col-md-8">
       <label class="control-label">Designation</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="ti-support"></i></span>
       <input class="form-control form-white" placeholder="Enter designation" type="text" name="designation" required="" />
     </div>
      <span class="text-danger">{{ $errors->first('designation') }}</span>
    </div>

     <div class="form-group col-md-8">
       <label class="control-label">Linkdin</label>
       <div class="input-group">
        <span class="input-group-addon"><i class="ti-linkedin"></i></span>
       <input class="form-control form-white" placeholder="Enter url" id="linkdin" type="url" name="linkdin"/>
     </div>
    </div>

     <div class="form-group col-md-8">
       <label class="control-label">Facebook</label>
       <div class="input-group">
        <span class="input-group-addon"><i class="ti-facebook"></i></span>
       <input class="form-control form-white" placeholder="Enter url" type="url" name="facebook"/>
     </div>
    </div>

      <div class="form-group col-md-8">
       <label class="control-label">Twitter</label>
       <div class="input-group">
        <span class="input-group-addon"><i class="ti-twitter-alt"></i></span>
       <input class="form-control form-white" placeholder="Enter url" type="url" name="twitter"/>
     </div>
    </div>

     <div class="form-group col-md-8">
       <label class="control-label">Email</label>
       <div class="input-group">
        <span class="input-group-addon"><i class="ti-email"></i></span>
       <input class="form-control form-white" placeholder="Enter email" id="email" type="email" name="email"/>
     </div>
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


