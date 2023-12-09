@extends('layouts.app')
@section('style')
<style type="text/css">
</style>
@endsection
@section('content')
<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="mb-0"><span class="text-danger">{{ $getStudent->name}} {{$getStudent->last_name}}</span> Fees</h3>
                </div>
                <div class="col-sm-12" style="text-align: right;">
                    <button type="button" class="btn btn-primary" id="AddFees">Add Payment</button>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Payment Details</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Class Name</th>
                                        <th>Total Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Remaining Amount</th>
                                        <th>Payment Type</th>
                                        <th>Remark</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($getFees))
                                    @forelse($getFees as $value)
                                    <tr>
                                        <td>{{$value->class_name}}</td>
                                        <td>${{number_format(($value->total_amount),2) }}</td>
                                        <td>${{number_format(($value->paid_amount),2) }}</td>
                                        <td>${{number_format(($value->remaining_amount),2) }}</td>
                                        <td>{{$value->payment_type}}</td>
                                        <td>{{$value->remark}}</td>
                                        <td>{{$value->created_by_name}}</td>
                                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                        <td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="100%">Record Not Found.</td>
                                    </tr>
                                    @endforelse
                                    @else
                                    <tr>
                                        <td colspan="100%">Record Not Found.</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Vertically centered modal -->
    <div class="modal fade" id="payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        {{csrf_field()}}
        <div class="mb-3">
            <label class="col-form-label">Class Name : {{$getStudent->class_name}}</label>
          </div>
        <div class="mb-3">
            <label class="col-form-label">Total Amount : ${{number_format($getStudent->amount,2) }}</label>
          </div>
          <div class="mb-3">paid_amount
            <label class="col-form-label">Paid Amount : ${{number_format($paid_amount,2) }}</label>
          </div>
          <div class="mb-3">
            @php 
            $remaining_mount = $getStudent->amount - $paid_amount;
            @endphp
            <label class="col-form-label">Remaining Amount : ${{number_format($remaining_mount,2) }}</label>
          </div>
          <div class="mb-3">
            <label class="col-form-label">Enter Amount: <span class="text-danger">*</span></label>
            <input type="number" class="form-control"  name="amount">
          </div>
          <div class="mb-3">
            <label  class="col-form-label">Payment Type: <span class="text-danger">*</span></label>
           <select class="form-control" name="payment_type" required>
            <option value="">Select</option>
            <option value="Paypal">Paypal</option>
            <option value="Stripe">Stripe</option>
           </select>
          </div>
          <div class="mb-3">
            <label class="col-form-label">Remark</label>
            <textarea name="remark" class="form-control"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
</main>
@endsection
@section('script')
<script type="text/javascript">

$('#AddFees').click(function(){
        $('#payment').modal('show');
});
</script>
@endsection