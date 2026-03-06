<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Rent Bill</title>

<style>

body{
    font-family: DejaVu Sans, sans-serif;
    font-size:12px;
    background:#f4f6f9;
    color:#333;
}

.container{
    width:100%;
}

/* Header */

.header{
    background:#f3f4f6;
    border-bottom:2px solid #e5e7eb;
    padding:18px;
}

.title{
    font-size:26px;
    font-weight:bold;
    color:#222;
}

.date{
    text-align:right;
    font-size:13px;
    color:#555;
}

/* Tenant */
td,th{
    font-size: 14px;
}

.tenant{
    background:white;
    border:1px solid #ddd;
    padding:12px;
    margin-top:15px;
}

/* Section */

.section-title{
    background:#f8f9fa;
    border:1px solid #e5e7eb;
    padding:8px 10px;
    font-weight:bold;
    margin-top:20px;
    color:#444;
}

/* Table */

.table{
    width:100%;
    border-collapse:collapse;
}

.table th{
    text-align:left;
    padding:9px;
    border:1px solid #e5e5e5;
    background:#fafafa;
}

.table td{
    padding:9px;
    border:1px solid #e5e5e5;
}

/* Highlight rows */

.highlight{
    background:#f5f9ff;
}

/* Total */

.total{
    background:#2c7be5;
    color:white;
    font-weight:bold;
    font-size:14px;
}

/* Footer */

.footer{
    margin-top:35px;
    text-align:center;
    font-size:11px;
    color:#777;
}

</style>

</head>
<body>

<div class="container">

<!-- HEADER -->
<div class="header">
    <table style="width:100%">
        <tr>
            <td class="title">Bill</td>
            <td class="date">
                <strong>Date:</strong> {{ $bill_date }}
            </td>
        </tr>
    </table>
</div>


<!-- TENANT -->
<div class="tenant">
    <strong>Bill To</strong><br>
    Mr. Simranjeet Singh
</div>


<!-- RENT SECTION -->
<div class="section-title">Rent & Electricity Details</div>

<table class="table">
<tr>
    <th width="50%">Base Rent</th>
    <td>₹ {{ number_format($base_charge,2) }}</td>
</tr>

<tr class="highlight">
    <th>Previous Meter Units</th>
    <td>{{ $prev_units }}</td>
</tr>

<tr>
    <th>Current Meter Units</th>
    <td>{{ $new_units }}</td>
</tr>

<tr class="highlight">
    <th>Electricity Charge</th>
    <td>₹ {{ number_format($charge,2) }}</td>
</tr>
</table>


<!-- OTHER CHARGES -->
<div class="section-title">Other Charges</div>

<table class="table">
<tr>
    <th width="50%">Type of Charge</th>
    <td>{{ $type_of_charge }}</td>
</tr>

<tr class="highlight">
    <th>Amount</th>
    <td>₹ {{ number_format($price_of_other,2) }}</td>
</tr>
</table>


<!-- SUMMARY -->
<div class="section-title">Summary</div>

<table class="table">
<tr>
    <th width="50%">Previous Due</th>
    <td style="text-align:right;">
        ₹ {{ number_format($previous_due,2) }}
    </td>
</tr>
</table>

<table style="width:100%; margin-top:10px;">
<tr>
<td style="
    text-align:right;
    padding:14px;
    border:1px solid #e5e7eb;
    background:#f9fafb;
">

<span style="font-size:12px; color:#666;">
Total Payable Amount
</span><br>

<span style="font-size:20px; font-weight:bold; color:#111;">
₹ {{ number_format($total,2) }}
</span>

</td>
</tr>
</table>


<div class="footer">
    This is a computer generated rent bill.
</div>

</div>

</body>
</html>