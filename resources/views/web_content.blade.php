@include('layouts.header')
<style>
  .Editor-editor{
        border: 1px solid #cccccc;
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
                      <li class="active">content</li>
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
              <h4>Content</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="form">
      <div class="container">
        <form method="POST" action="{{url('post_content')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row">
            <div class="form-group col-md-8">
              <label class="control-label">Selected Page</label>
              <!--  id="page_id" -->
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
                  <option value="12">About Us</option>
                  <option value="13">Term & Condition</option>
                  <option value="14">Privacy & Policy</option>
              </select>
            </div> 
            <div class="form-group col-md-11">
              <label class="control-label">Short Description</label>
             <!--  <div id="move_edit"> -->
                <textarea id="txtEditor" name="description"></textarea> 
             <!--  </div> -->
            </div> 
          </div>
          <div class="form-group col-md-6">
            <button type="submit" class="btn btn-lg btn-primary">update</button>
          </div>
        </form>
      </div>
    </section>
  </div>
</div>
</div>
 @include('layouts.footer')    


