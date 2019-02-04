@extends('layouts.admin-navbar')

@section('content')
<h2 > Transaction Details </h2>
    <form action="{{route('transaction.detail', [$row->transaction_id])}}" method="post">
        <table class="table table-bordered" style="margin-top: 1%">
            <tr> 
                <td class="label-detail" align="right" width="30%">Transaction ID: </td>
                <td align="left" width="70%"> {{$row->transaction_id}} </td>
            </tr>
            <tr> 
                <td class="label-detail" align="right">Product Name: </td>
                <td align="left"> {{$row->product_name}} </td>
            </tr>
            <tr> 
                <td class="label-detail" align="right">Price: </td>
                <td align="left"> Rp {{number_format($row->unique_price)}} </td>
            </tr>
            <tr> 
                <td class="label-detail" align="right">Name: </td>
                <td align="left"> {{$row->cust_name}} </td>
            </tr>
            <tr> 
                <td class="label-detail" align="right">Email: </td>
                <td align="left"> {{$row->cust_email}} </td>
            </tr>
            <tr> 
                <td class="label-detail" align="right">Phone Number: </td>
                <td align="left"> {{$row->cust_phone}} </td>
            </tr>
            <tr> 
                <td class="label-detail" align="right">Address: </td>
                <td align="left"> {{$row->cust_address}} </td>
            </tr>
            <tr> 
                <td class="label-detail" align="right">City: </td>
                <td align="left"> {{$row->cust_city}} </td>
            </tr>
            <tr> 
                <td class="label-detail" align="right">State: </td>
                <td align="left"> {{$row->cust_state}} </td>
            </tr>
            <tr> 
                <td class="label-detail" align="right">Zipcode: </td>
                <td align="left"> {{$row->cust_zipcode}} </td>
            </tr>
            <tr> 
                <td class="label-detail" align="right">Order Date: </td>
                <td align="left"> {{ date('d/m/Y H:i', strtotime($row->created_at)) }} </td>
            </tr>
            <tr> 
                <td class="label-detail" align="right">Status: </td>
                <td align="left">
        
                <select id="select-status" name="status" class="status-dropdown">
                    @foreach (array("Unpaid", "Packaging", "Sending", "Completed") as $status)
                        <option value="{{$status}}"
                        @if ($status == $row->status)
                            selected="selected"
                        @endif
                        >{{$status}}</option>
                    @endforeach
                </select>

            </td>
            </tr>
        </table>
        <button id="conf-modal-button" type="button" class="btn btn-primary transaction-detail-button" data-toggle="modal" data-target="#confirmationModal" disabled="disabled">Save</button>
        <!--  -->

        <!-- Modal -->
        <div class="modal fade" id="confirmationModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                </div>

                <div class="modal-body">
                    <p>A notification email will be sent to the customer. Are you sure want to change the status?</p>
                </div>

                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-danger modal-button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary modal-button" value="OK" width="20%"/>
                        {{csrf_field()}}
                    <input type="hidden" name="_method" value="put"/>
                </div>
            </div>
            
            </div>
        </div>

    </form>

    <script> 
        $('#select-status').change(function() {
            var curr_status = '{{$row->status}}';
            if (curr_status == $('#select-status option:selected').text() ) {
                $('#conf-modal-button').prop('disabled', true);
            } else {
                $('#conf-modal-button').prop('disabled', false);
            }
        });
    </script>
    
@endsection