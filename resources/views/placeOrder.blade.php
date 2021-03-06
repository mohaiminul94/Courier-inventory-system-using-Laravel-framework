@extends('userPanel')


@section('content')


<div class="formBox" style="min-height: 50px; width: 70%; margin: 0 auto;">
  

<h1 style="text-align: center; padding: 15px;">ADD NEW ORDER</h1>


<div class="box-content">


<!--
          <div class="lol" style="min-height: 50px; width: 100%;">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 17%; width: 60%; margin: 30px 0 30px 17%;">
                SELECT COMPANY NAME
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-left: 17%; width: 60%;">
                <ul>

                  @foreach($allCompanyName as $showCompanyName)

                  <li style="list-style: none">

                    <a class="dropdown-item" href="{{ URL::to('view_company/'.$showCompanyName->id) }}">
                      {{ $showCompanyName->company_name }}
                    </a>
                  </li>

                  @endforeach
                  
                </ul>   
              </div>
            </div>
          </div>
-->



            <form class="form-horizontal" action="{{ url('insert_order') }}" method="POST"> @csrf  
              <fieldset>
                <div class="control-group">
                <label class="control-label" for="focusedInput" readonly>Company Name</label>
                <div class="controls">
                  <select name = "agent_id">
                    <option>---</option>
                    
                    @foreach($allCompanyName as $showCompanyName)
                      @if($showCompanyName->company_type == "Agent")
                        <option value=" {{ $showCompanyName->id }}"> {{ $showCompanyName->company_name }}</option>
                       @endif 
                    @endforeach
                    
                  </select>
                </div>
                </div>

                <div class="control-group">
                <label class="control-label" for="focusedInput">ORDER ID</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="order_id">
                </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="focusedInput">ORDER DATE</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="date" name="order_date">
                </div>
                </div>  
                <div class="control-group">
                <label class="control-label" for="focusedInput">PARCEL DESCRIPTION</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="parcel_desc">
                </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="focusedInput">WIGHT</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="weight">
                  </div>
                </div>
                 <div class="control-group">
                <label class="control-label" for="focusedInput">BOOKING AMOUNT</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="booking_amount">
                 </div>
                </div> 
                <div class="control-group">
                <label class="control-label" for="focusedInput">PAYMENT TYPE</label>
                <div class="controls">
                  <select name="payment_type">
                    <option value="CASH">Cash</option>
                    <option value="DUE">Due</option>
                  </select>
                 </div>
                </div>  
                <div class="control-group">
                <label class="control-label" for="focusedInput" readonly>Vendor Name</label>
                <div class="controls">
                  <select name = "vendor_id">
                    <option>---</option>

                    @foreach($allCompanyName as $showCompanyName)
                      @if($showCompanyName->company_type == "Vendor")
                        <option value=" {{ $showCompanyName->id }}"> {{ $showCompanyName->company_name }}</option>
                       @endif 
                    @endforeach
                  </select>
                </div>
                </div>



                <div class="form-actions">
                <button type="submit" class="btn btn-primary">Place Order</button>
                  
                </div>
              </fieldset>
              </form>
          
          </div>
</div>


@endsection