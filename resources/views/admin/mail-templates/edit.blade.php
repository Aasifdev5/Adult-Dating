@extends('admin.Master')
@section('title')
Mail Templates
@endsection
@section('content')

<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col">
               <div class="page-header-left">
                  <h3>Sky Forecasting</h3>
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="dashboard"><i
                              data-feather="home"></i></a></li>
                     <li class="breadcrumb-item">Mail Templates</li>
                    
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
            @if(Session::has('success'))
                  <div class="alert alert-success">
                     <p>{{session::get('success')}}</p>
                  </div>
                  @endif
                  @if(Session::has('fail'))
                  <div class="alert alert-danger">
                     <p>{{session::get('fail')}}</p>
                  </div>
                  @endif
               
               <form id="vironeer-submited-form" action="{{ url('admin/mail-templates/update', $mailTemplate->id) }}"
        method="POST">
        @csrf
        <div class="card">
            <div class="card-header bg-lg-3 text-white">Template</div>
               <div class="card-body">
               <div class="row g-3 mb-4">
                    <div class="{{ $mailTemplate->isDefault() ? 'col-lg-12' : 'col-lg-8' }}">
                        <label class="form-label">Subject </label>
                        <input type="text" name="subject" class="form-control" value="{{ $mailTemplate->subject }}"
                            required>
                    </div>
                    @if (!$mailTemplate->isDefault())
                        <div class="col-lg-4">
                            <label class="form-label">Status </label>
                            <input type="checkbox" name="status" data-toggle="toggle"
                                {{ $mailTemplate->status ? 'checked' : '' }}>
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Body </label>
                    <textarea name="body" class="ckeditor">{{ $mailTemplate->body }}</textarea>
                </div>
                <div class="alert alert-secondary mb-0">
                    <p class="mb-0"><strong>Short Codes</strong></p>
                    @foreach ($mailTemplate->shortcodes as $key => $value)
                        <li class="mt-2"><strong>@php echo "{{". $key ."}}"  @endphp</strong> : {{ $value }}</li>
                    @endforeach
                </div>
                <br>
                <div class="row g-2">
                     <div class="col-sm-4">
                        <button class="btn btn-primary" type="submit">Update</button>
                     </div>

                  </div>
               </div>
           
         <!-- DOM / jQuery  Ends-->

         </div>
    </form>
      </div>
   </div>


   <!-- Container-fluid Ends-->
   <!-- Container-fluid Ends-->
</div>


@endsection