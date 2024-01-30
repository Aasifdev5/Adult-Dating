@extends("admin.Master")
@section('title')
Edit Page
@endsection
@section("content")

<style type="text/css">
  .iframe-container {
    overflow: hidden;
    padding-top: 56.25% !important;
    position: relative;
  }

  .iframe-container iframe {
    border: 0;
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
  }
</style>
<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col">
          <div class="page-header-left">

            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="https://laravel.pixelstrap.com/endless" data-bs-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                  </svg></a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item">Page Edit</li>

            </ol>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Page Edit </h5>

            </a>
          </div>
          <div class="card-body">
            <div class="content-page">
              <div class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">


                      <form action="{{url('admin/pages/add_edit')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ isset($page_info->id) ? $page_info->id : null }}">


                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Page Title</label>
                          <div class="col-sm-8">
                            <input type="text" name="page_title" value="{{ isset($page_info->page_title) ? stripslashes($page_info->page_title) : null }}" class="form-control">
                          </div>
                        </div>
                        <br>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Page Description</label>
                          <div class="col-sm-8">
                            <textarea id="elm1" name="page_content" class="form-control">{{ isset($page_info->page_content) ? stripslashes($page_info->page_content) : null }}</textarea>

                          </div>
                        </div>
                        <br>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Page Order</label>
                          <div class="col-sm-8">
                            <input type="number" name="page_order" value="{{ isset($page_info->page_order) ? stripslashes($page_info->page_order) : null }}" class="form-control" min="0">
                          </div>
                        </div>
                        <br>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Status</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="status">
                              <option value="1" @if(isset($page_info->status) AND $page_info->status==1)
                                selected
                                @endif>Active</option>
                              <option value="0" @if(isset($page_info->status) AND $page_info->status==0)
                                selected
                                @endif>Inactive</option>
                            </select>
                          </div>
                        </div>
                        <br>
                        <div class="form-group">
                          <div class="offset-sm-3 col-sm-9 pl-1">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                              Save</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- DOM / jQuery  Ends-->


  </div>
</div>
<!-- Container-fluid Ends-->
<!-- Container-fluid Ends-->
</div>


@endsection
