@include('emails.layouts.headernotification')

<p>Dear,Admin </p>
<br>
<p>New Payment Confirmation from Customer for Invoice ID : {{ $invoice_id }}. Please check that payment confirmation .
  <br>Below is the link to direct access to that task<br>
  <a href="{{ url('/admin/po_invoice/view/' . $POUUID) }}">Check PO</a>
</p>
</div>
<br>
<br>

@include('emails.layouts.footernotification')