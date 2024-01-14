
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col">
               <div class="page-header-left">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="dashboard" data-bs-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                              <polyline points="9 22 9 12 15 12 15 22"></polyline>
                           </svg></a></li>
                     <li class="breadcrumb-item">MultiLanguages</li>
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
               
               <div class="card-body">
                  <div class="card-box table-responsive">
                     <div class="content-page">
                        <div class="content">
                           <div class="container-fluid">
                              <div class="row">
                                 <div class="col-12">
                                    <div class="card-box">
                                       <meta name="csrf-token" content="{{ csrf_token() }}" />
                                       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />
                                       <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
                                       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
                                       </script>
                                       <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js">
                                       </script>
                                       <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js">
                                       </script>
                                       <style>
                                          .table {
                                             --mdb-table-font-size: 1.9rem;
                                             --mdb-table-divider-color: rgba(0, 0, 0, 0.1);
                                             font-size: var(--mdb-table-font-size);
                                          }
                                       </style>
                                       <div class="container">
                                          <h1>Multi Language Translation</h1>
                                          <form method="POST" action="{{ route('translations.create') }}">
                                             @csrf
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <label>Key:</label>
                                                   <input type="text" name="key" class="form-control" placeholder="Enter Key...">
                                                </div>
                                                <div class="col-md-4">
                                                   <label>Value:</label>
                                                   <input type="text" name="value" class="form-control" placeholder="Enter Value...">
                                                </div>
                                                <div class="col-md-4">
                                                   <button type="submit" class="btn btn-success" style="margin-top: 22px;">Add</button>
                                                </div>
                                             </div>
                                          </form>
                                          <br>
                                          <table class="table table-hover table-bordered">
                                             <thead>
                                                <tr>
                                                   <th>#</th>
                                                   <th>Key</th>
                                                   @if($languages->count() > 0)
                                                   @foreach($languages as $language)
                                                   <th>{{ $language->name }}({{ $language->code }})</th>
                                                   @endforeach
                                                   @endif
                                                   <th width="80px;">Action</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php $count = 1; ?>
                                                @if($columnsCount > 0)
                                                @foreach($columns[0] as $columnKey => $columnValue)
                                                
                                                <tr>
                                                   <td><?php echo $count++; ?></td>
                                                   <td>
                                                      <a href="#" class="translate-key" data-title="Enter Key" data-type="text" data-pk="{{ $columnKey }}" data-url="{{ route('translation.update.json.key') }}">{{ $columnKey }}</a>
                                                   </td>
                                                   @for($i=1; $i<=$columnsCount; ++$i) <td>
                                                      <a href="#" data-title="Enter Translate" class="translate" data-code="{{ $columns[$i]['lang'] }}" data-type="textarea" data-pk="{{ $columnKey }}" data-url="{{ route('translation.update.json') }}">{{ isset($columns[$i]['data'][$columnKey]) ? $columns[$i]['data'][$columnKey] : '' }}</a>
                                                      </td>
                                                      @endfor
                                                      <td>
                                                         <button data-action="{{ route('translations.destroy', $columnKey) }}" class="btn btn-danger btn-xs remove-key">Delete</button>
                                                      </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                             </tbody>
                                          </table>
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
      </div>
      <!-- DOM / jQuery  Ends-->
   </div>
</div>
<!-- Container-fluid Ends-->
<!-- Container-fluid Ends-->
<script type="text/javascript">
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });

   $('.translate').editable({
      params: function(params) {
         params.code = $(this).editable().data('code');
         return params;
      }
   });

   $('.translate-key').editable({
      validate: function(value) {
         if ($.trim(value) == '') {
            return 'Key is required';
         }
      }
   });

   $('.container').on('click', '.remove-key', function() {
      var cObj = $(this);

      if (confirm("Are you sure want to remove this item?")) {
         $.ajax({
            url: cObj.data('action'),
            method: 'DELETE',
            success: function(data) {
               cObj.parents("tr").remove();
               alert("Your imaginary file has been deleted.");
            }
         });
      }
   });
</script>
