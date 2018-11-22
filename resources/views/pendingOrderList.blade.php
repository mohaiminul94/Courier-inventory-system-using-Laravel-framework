
@extends('userPanel')


@section('content')

<div class="formBox" style="min-height: 700px; width: 70%; margin: 0 auto;">
  

<h1 style="text-align: center; padding: 15px;">ALL PENDING ORDERS HERE</h1>


  <div class="box-content" style="width: 118%;">

    <table class="table table-striped display" id="datatable">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Agent Name</th>
          <th scope="col">Parcel Description</th>
          <th scope="col">Weight</th>
          <th scope="col">Order Date</th>
          <th scope="col">Booking Amount</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach($viewAllOrders as $showOrdersDetails)

        <tr>
          <th scope="row" id="id_{{ $showOrdersDetails->id }}">{{ $showOrdersDetails->id }}</th>
          <td id="company_name_{{ $showOrdersDetails->id }}">{{ $showOrdersDetails->company_name }}</td>
          <td id="parcel_desc_{{ $showOrdersDetails->id }}">{{ $showOrdersDetails->parcel_desc }}</td>
          <td id="weight_{{ $showOrdersDetails->id }}">{{ $showOrdersDetails->weight }}</td>
          <td id="order_date_{{ $showOrdersDetails->id }}">{{ $showOrdersDetails->order_date }}</td>
          <td id="booking_amount_{{ $showOrdersDetails->id }}">{{ $showOrdersDetails->booking_amount }}</td>
          


          <td>
          <a href="">
            <button class="btn btn-primary" onclick="processOrders({{ $showOrdersDetails->id }}, {{ $showOrdersDetails->agent_id}})" data-toggle="modal" data-target="#exampleModal">EDIT</button>
          </a>
          <a href="">
            <button class="btn btn-danger">DELETE</button>
          </a>
          
        </td>


        </tr>


        @endforeach

        
      </tbody>
    </table>
            
            
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          

  <form class="form-horizontal"> @csrf  
              <fieldset>
                <div class="control-group">
                <label class="control-label" for="focusedInput">Company Name</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="edit_company_name" type="text" name="company_name">
                </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="focusedInput">Parcel Description</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="edit_parcel_desc" type="text" name="parcel_desc">
                </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="focusedInput">Weight</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="edit_weight" type="text" name="weight">
                </div>
                </div>  
                <div class="control-group">
                <label class="control-label" for="focusedInput">Order Date</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="edit_order_date" type="date" name="order_date" style="height: 25px;">
                </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="focusedInput">Booking Amount</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="edit_booking_amount" type="text" name="booking_amount">
                  </div>
                </div>
                 <div class="control-group">
                <label class="control-label" for="edit_address">Processing Amount</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="edit_processing_amount" type="text" name="processing_amount">
                 </div>
                </div>  
                <div class="control-group">
                <label class="control-label" for="edit_address">Processing Date</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="edit_processing_date" type="date" name="processing_date" style="height: 25px;">
                 </div>
                </div> 
               <!-- <div class="control-group">
                <label class="control-label" for="edit_address">Net Profit</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="edit_net_profit" type="text" name="net_profit">
                 </div>
                </div> -->
              
                  <input id="id" type="hidden" name="id">
              </fieldset>
              </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="updateOrder(0,{{ $showOrdersDetails->id }}, {{ $showOrdersDetails->agent_id }})" class="btn btn-primary">Save changes</button>
        <button type="button" onclick="updateOrder(1,{{ $showOrdersDetails->id }}, {{ $showOrdersDetails->agent_id }})" class="btn btn-success" data-dismiss="modal">Process</button>
      </div>
    </div>
  </div>
</div>







<script type="text/javascript">

  
function processOrders(id, agent_id) {


   
  
  
  $("#edit_company_name").val($("#company_name_"+id).html());
  $("#edit_parcel_desc").val($("#parcel_desc_"+id).html());
  $("#edit_weight").val($("#weight_"+id).html());
  $("#edit_order_date").val($("#order_date_"+id).html());
  $("#edit_booking_amount").val($("#booking_amount_"+id).html());
  $("#edit_processing_amount").val($("#processing_amount_"+id).html());
  $("#edit_processing_date").val($("#processing_date_"+id).html());
  //$("#edit_net_profit").val($("#net_profit_"+id).html());
  //$("#edit_is_processed").val($("#is_processed_"+id).html());
  
} 



 function updateOrder(is_processing, id, agent_id) {


  
   company_name = $("#edit_company_name").val();
   parcel_desc = $("#edit_parcel_desc").val();
   weight = $("#edit_weight").val();
   order_date = $("#edit_order_date").val();
   booking_amount = $("#edit_booking_amount").val();
   processing_amount = $("#edit_processing_amount").val();
   processing_date = $("#edit_processing_date").val();
   net_profit = $("#edit_net_profit").val();
   id = id;
   agentId = agent_id;

  

   $.ajax({
               type:'POST',
               url:'/courier/update_order',
               data:{
                      company_name: company_name,
                      parcel_desc: parcel_desc,
                      weight: weight,
                      order_date: order_date,
                      booking_amount: booking_amount,
                      processing_amount: processing_amount,
                      processing_date: processing_date,
                      net_profit: net_profit,
                      id: id,
                      agent_id: agentId,
                      is_processed:is_processing,
                      _token : '<?php echo csrf_token() ?>',
                  },


              success:function(data){

                  location.reload(); 
                }
            });
 


 }




</script>



@endsection