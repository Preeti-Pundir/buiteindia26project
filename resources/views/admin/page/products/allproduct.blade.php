<div class="content-wrapper" style="min-height: 578px;">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
          <div class="row">

            <div class="col-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title">All Products</h4>
                    {{-- <div class="box-controls pull-right">
                      <div class="lookup lookup-circle lookup-right">
                        <input type="text" name="s">
                      </div>
                    </div> --}}
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                      <div class="table-responsive">
                        <table class="table table-hover">
                           
                          <tbody><tr>
                            <th><span class="text-muted">ID</span></th>
                            <th><span class="text-muted">Name</span></th>
                            <th><span class="text-muted">Store_id</span></th>
                            <th><span class="text-muted">Disc</span></th>
                            <th><span class="text-muted">Price</span></th>
                            <th><span class="text-muted">User_price</span></th>
                            <th><span class="text-muted">created_at</span></th>
                            <th><span class="text-muted">Action</span></th>
                          </tr>
                          @foreach ($all_product as $item)
                          <tr>
                            <td><span class="text-muted">{{ $item->id }}</span></td>
                            <td><span class="text-muted">{{ $item->name }}</span></td>
                            {{-- <td><span class="text-muted">$ {{$item->Store_id}}</span></td>
                            <td><span class="text-muted">$ {{$item->Disc}}</span></td> 
                            <td><span class="text-muted">$ {{$item->Price}}</span></td>
                            <td><span class="text-muted">$ {{$item->User_price}}</span></td>
                             --}}
                             <td><span class="text-muted"> {{$item->Store_id}}</span></td>
                             <td><span class="text-muted"> {{$item->Disc}}</span></td> 
                             <td><span class="text-muted"> {{$item->Price}}</span></td>
                             <td><span class="text-muted"> {{$item->User_price}}</span></td>
                             
                            <td><span class="text-muted"><i class="fa fa-clock-o"></i>{{ $item->created_at->diffForHumans() }}</span> </td>
                            <td><span class="text-muted">$ {{$item->Action}}</span></td> 
                            {{-- <td><span class="badge badge-pill badge-danger">Pending</span></td>
                            <td><span class="text-muted"><a class="btn btn-app btn-info" href="{{ route('get.product',['id'=>$item->id])}}">
                                <i class="fa fa-edit"></i> Edit
                              </a></span></td> --}}
                          </tr>
                          @endforeach
                        </tbody></table>
                      </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>

        </div>
    </section>
    <!-- /.content -->
  </div>
</div>
