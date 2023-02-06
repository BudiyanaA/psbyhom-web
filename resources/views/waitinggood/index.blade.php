@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Home</a></li>
  
                <li class="active">List of PO Waiting Goodies</li>
            </ol>

            <h1>Waiting Goodies</h1>
            <div class="options">
                
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-14">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                            <h4>Waiting Goodies</h4>
                            <div class="options">   
                                <a href="javascript:;"><i class="fa fa-cog"></i></a>
                                <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="panel-body collapse in">
													<form action="https://psbyhom.com/incoming_item_controller/validate_update.html" class="form-horizontal row-border "  data-validate="parsley" id="validate-form"  method="post" accept-charset="utf-8" enctype="multipart/form-data" >
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
										<tr>
											<th>PO ID</th>
											<th>Price($)</th>
											<th>Qty</th>
											<th>URL</th>
											<th>Name</th>
											<th>Customer Name</th>
											<th>Batch ID</th>
											<th>Status/Keterangan</th>
					
										</tr>
									</thead>
                                <tbody>
                                 
														
														<tr >
														
															<input type="hidden" value="37b03956-a363-4117-af35-d730ab5aa3f5" class='PODtlUUID' name="PODtlUUID1">
															<input type="hidden" value="1" name="qty_po1">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/50ef9c8b-0469-46f9-b14d-ecf9afa456e4.html', '_blank');">FE23020149</a>															</td>
															<td>12.95															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.amazon.com/Young-Nails-Nail-Protein-Primer/dp/B00EF4BBPA/ref=sr_1_1?keywords=young+nails+protein+bond&qid=1675482622&sprefix=young+nails+pri%2Caps%2C464&sr=8-1">LINK</a></p></td>
															<td  style="width:20%">Young Nails Protein Bond. Nail Prep + Fast Drying. Anchor for Gel, Polish + Acrylic Keratin Bonder, </td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/5c8ea8b6-529c-4c08-9060-8af097995acd.html', '_blank');">Rachel Valerie</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
																														</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='261704'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="b72a975d-4437-4b63-b84f-f1d7d2fd79a2" class='PODtlUUID' name="PODtlUUID2">
															<input type="hidden" value="1" name="qty_po2">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>FE23020149</p>															</td>
															<td>9.95															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.amazon.com/Mia-Secret-XTRABOND-No-Burn-Acid-free/dp/B00B8M43SY/ref=sr_1_2?keywords=young+nails+protein+bond&qid=1675482622&sprefix=young+nails+pri%2Caps%2C464&sr=8-2">LINK</a></p></td>
															<td  style="width:20%">Mia Secret XTRABOND No-Burn Acid-free Primer 1/2 oz. for Acrylic and UV Gels</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/5c8ea8b6-529c-4c08-9060-8af097995acd.html', '_blank');">Rachel Valerie</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
																														</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='210344'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="8f345ea7-0370-4ab9-98c0-a7d3faa8745f" class='PODtlUUID' name="PODtlUUID3">
															<input type="hidden" value="1" name="qty_po3">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/9c6b094b-58e6-436a-bd6c-550d2bc17d68.html', '_blank');">TH23020148</a>															</td>
															<td>62.40															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://byrosiejane.com/products/home-and-away-set">LINK</a></p></td>
															<td  style="width:20%">HOME + AWAY SET | FULL SIZE EAU DE PARFUM + TRAVEL SPRAY </td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/4ea29c73-8401-48bf-b683-1a406335cd9d.html', '_blank');">Valmayria Pavita </a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
																														</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1228288'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="e7b5f1d6-e89d-4be2-bb78-f38df593ea7a" class='PODtlUUID' name="PODtlUUID4">
															<input type="hidden" value="1" name="qty_po4">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/076d2b7d-4cb4-4ff5-b1ea-bb0f6bed5676.html', '_blank');">MV23020147</a>															</td>
															<td>26.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/makeup-by-mario-master-crystal-reflector-tm-P33257988?skuId=2389591&icid2=products%20grid:p33257988:product">LINK</a></p></td>
															<td  style="width:20%">MAKEUP BY MARIO Master Crystal Reflector™</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/54ae2bfb-ae56-428e-a56e-7be947d55f0b.html', '_blank');">Ananda Putri Absari</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora14															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='495120'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="ee3bcd66-29e2-453e-8812-7b2ce391bfe3" class='PODtlUUID' name="PODtlUUID5">
															<input type="hidden" value="1" name="qty_po5">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/ab3d1cdc-22c6-4b1b-8000-474d2d5011a5.html', '_blank');">JM23020144</a>															</td>
															<td>18.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.bdelliumtools.com/products/golden-triangle-788-bdhd-phase-iii?_pos=5&_sid=01d0a9cf7&_ss=r">LINK</a></p></td>
															<td  style="width:20%">GOLDEN TRIANGLE 788 BDHD PHASE III</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/3125743d-b9cc-4e97-9fdd-e3e1bb25d411.html', '_blank');">Gaby kwandy</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															bdellium92 4.95$															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='348160'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="e6620e67-9264-4a6a-a864-c67e7544cb28" class='PODtlUUID' name="PODtlUUID6">
															<input type="hidden" value="1" name="qty_po6">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/c2cd85e0-45c7-4723-9b1a-1795c7685555.html', '_blank');">GH23010135</a>															</td>
															<td>44.95															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.ebay.com/itm/266103195992?mkcid=16&mkevt=1&mkrid=711-127632-2357-0&ssspo=9-56vtZvQw6&sssrc=2349624&ssuid=c9o0tmlfriw&var=&widget_ver=artemis&media=COPY">LINK</a></p></td>
															<td  style="width:20%">New Era Las Vegas Raiders 9Fifty Snapback Cap Denim High Crown Hat Rare</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/dd2dff9c-9d4f-47ff-b94b-66c5a7f962e7.html', '_blank');">Enriko Abadi</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															ebay93															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='919544'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="511bc5f7-8c5b-41c1-83da-a05baa9c78da" class='PODtlUUID' name="PODtlUUID7">
															<input type="hidden" value="1" name="qty_po7">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/496f86ea-0962-4298-a6f2-9765fd270e6a.html', '_blank');">VF23010114</a>															</td>
															<td>148.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://shop.lululemon.com/p/skirts-and-dresses-dresses/Align-Bodysuit-25/_/prod10980020?color=0001&sz=12">LINK</a></p></td>
															<td  style="width:20%">lululemon Align™ Bodysuit 25"</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/48473d26-face-43c2-8fee-225de81a8d7b.html', '_blank');">Zuyina Faza</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															lulu92															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='2683760'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="189e9d57-5c7a-4401-b5be-71c7c82e2ec6" class='PODtlUUID' name="PODtlUUID8">
															<input type="hidden" value="1" name="qty_po8">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/2592a760-7318-493b-b8e6-68ff54be9ee3.html', '_blank');">AJ23010056</a>															</td>
															<td>10.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://sonnyangelusa.com/collections/mini-figure-regular-series/products/minifigure-vegetable-series-2019">LINK</a></p></td>
															<td  style="width:20%">Sonny Angel Mini Figure vegetable (1 Piece)</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/e09effe2-4bc5-4cf5-a02b-394eaf0e30a2.html', '_blank');">tyvla abidin</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sonny92 7.9$															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='223340'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="6627e5a5-7c5c-4f5b-bbc2-d9b4b814a71b" class='PODtlUUID' name="PODtlUUID9">
															<input type="hidden" value="6" name="qty_po9">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/38d1b8cd-33f6-4f05-9267-1a9af632129b.html', '_blank');">UL23010105</a>															</td>
															<td>12.99															<td style="width:8%" class="incoming_qty2" >6</td>
															<td><p id="price"><a href="https://www.target.com/p/physician-s-formula-murumuru-butter-bronzer-0-38oz/-/A-78313911?preselect=49113360#lnk=sametab">LINK</a></p></td>
															<td  style="width:20%">Butter bronzer</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/fe4f56f7-0a7a-4b45-b348-fdb1186d00e2.html', '_blank');">Angela julio</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															target92															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='6'>
															<input type='hidden' class='incoming' value='6'>
															<input type='hidden' class='harga' value='275169'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="8d252833-747c-4d22-bcc2-543155696980" class='PODtlUUID' name="PODtlUUID10">
															<input type="hidden" value="1" name="qty_po10">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/63e42ab6-4afb-46c1-a0ca-f5f110d8daa7.html', '_blank');">YR23010079</a>															</td>
															<td>38.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/patrick-ta-major-sculpt-creme-contour-powder-bronzer-duo-P471059?skuId=2419349&icid2=products%20grid:p471059:product">LINK</a></p></td>
															<td  style="width:20%">PATRICK TA Major Sculpt Creme Contour & Powder Bronzer Duo</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/b059cbe6-c167-402f-9406-d18b94027b4e.html', '_blank');">Graciela Theresia</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora12															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='708692'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="572ec313-9b65-4085-a180-e3851d0878ca" class='PODtlUUID' name="PODtlUUID11">
															<input type="hidden" value="1" name="qty_po11">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>YR23010079</p>															</td>
															<td>38.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/patrick-ta-major-sculpt-creme-contour-powder-bronzer-duo-P471059?skuId=2419349&icid2=products%20grid:p471059:product">LINK</a></p></td>
															<td  style="width:20%">PATRICK TA Major Sculpt Creme Contour & Powder Bronzer Duo</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/b059cbe6-c167-402f-9406-d18b94027b4e.html', '_blank');">Graciela Theresia</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora12															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='708692'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="569564ec-2cff-43c9-8780-fd0f6887a5ee" class='PODtlUUID' name="PODtlUUID12">
															<input type="hidden" value="1" name="qty_po12">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/f64ebe55-f2f2-44c0-920a-d6c5d87433e4.html', '_blank');">QQ23010075</a>															</td>
															<td>149.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.toryburch.com/en-us/shoes/sandals/miller-cloud/83402.html?color=200">LINK</a></p></td>
															<td  style="width:20%">Miller Cloud</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/e1bab9f6-fb7d-425c-be9b-d4ab41fba110.html', '_blank');">hanjani nuli astari</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															tb90															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='3082766'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="18ea9ac1-db18-4d60-9fe5-07b2b624854f" class='PODtlUUID' name="PODtlUUID13">
															<input type="hidden" value="1" name="qty_po13">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>QQ23010075</p>															</td>
															<td>22.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/kvd-vegan-beauty-everlasting-hyperlight-vegan-transfer-resistant-liquid-lipstick-P501592?skuId=2599371&icid2=products%20grid:p501592:product">LINK</a></p></td>
															<td  style="width:20%">Everlasting Hyperlight Vegan Transfer-Proof Liquid Lipstick</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/e1bab9f6-fb7d-425c-be9b-d4ab41fba110.html', '_blank');">hanjani nuli astari</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora12															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='421348'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="545decd6-bc8d-40d2-8f9a-7f7a57115baf" class='PODtlUUID' name="PODtlUUID14">
															<input type="hidden" value="1" name="qty_po14">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>QQ23010075</p>															</td>
															<td>21.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/huda-beauty-liquid-matte-ultra-comfort-transfer-proof-lipstick-P479843?skuId=2549152&icid2=products%20grid:p479843:product">LINK</a></p></td>
															<td  style="width:20%">Liquid Matte Ultra-Comfort Transfer-proof Lipstick</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/e1bab9f6-fb7d-425c-be9b-d4ab41fba110.html', '_blank');">hanjani nuli astari</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora12															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='404014'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="4b0b6ba1-1b2b-4a35-957d-63800cc5f8bb" class='PODtlUUID' name="PODtlUUID15">
															<input type="hidden" value="1" name="qty_po15">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/70d54fa9-2fb1-420a-934b-ab8501e93fed.html', '_blank');">PG23010077</a>															</td>
															<td>265.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.ssense.com/en-id/men/product/alexander-mcqueen/black-rib-cage-bifold-wallet/8416921">LINK</a></p></td>
															<td  style="width:20%">Black Rib Cage Wallet</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/2c17e2ea-3cd6-4e29-b0b1-0dcba0108d83.html', '_blank');">Tabitha Azalea Khelkal Rahman</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															ssense90 5623															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='4793510'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="5795e289-20f9-4d88-974f-ef13de32745c" class='PODtlUUID' name="PODtlUUID16">
															<input type="hidden" value="1" name="qty_po16">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/d28acf6e-1fac-4fb8-946a-0a72cbad88e6.html', '_blank');">EZ23010070</a>															</td>
															<td>15.79															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.target.com/p/dove-men-care-0-aluminum-clean-touch-refillable-deodorant-stainless-steel-case-1-refill-1-13oz/-/A-83278476#lnk=sametab">LINK</a></p></td>
															<td  style="width:20%">Dove man deodorants refillable </td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/b1bb08c4-3988-41ea-bd2f-b73dffcb79c9.html', '_blank');">shella</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															target91															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='343704'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="e8787aa2-4301-44f9-8ee8-b989d62652a4" class='PODtlUUID' name="PODtlUUID17">
															<input type="hidden" value="1" name="qty_po17">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>EZ23010070</p>															</td>
															<td>15.79															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.target.com/p/dove-men-care-0-aluminum-fresh-feel-refillable-deodorant-stainless-steel-case-1-refill-1-13oz/-/A-83278468">LINK</a></p></td>
															<td  style="width:20%">Dove man deodorant </td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/b1bb08c4-3988-41ea-bd2f-b73dffcb79c9.html', '_blank');">shella</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															target91															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='343704'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="37ca2a09-b2ee-453e-a13e-1dde82ace896" class='PODtlUUID' name="PODtlUUID18">
															<input type="hidden" value="1" name="qty_po18">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/5be7eef6-55d3-4671-94ef-d93fec7b4e55.html', '_blank');">YU23010058</a>															</td>
															<td>24.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/phd-hybrid-lip-oil-P500283?skuId=2571941">LINK</a></p></td>
															<td  style="width:20%">Haus Labs Phd Lip Oil</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/c4067eb3-e11a-4c91-9b9b-f996ae960d81.html', '_blank');">Christina (ina)</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora12															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='456016'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="dbb0c830-ecf0-43f7-990e-af1855173c1a" class='PODtlUUID' name="PODtlUUID19">
															<input type="hidden" value="1" name="qty_po19">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/37f6d26d-1016-4028-a8b4-8e84e479fb25.html', '_blank');">SV23010035</a>															</td>
															<td>34.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.target.com/p/disney-encanto-ultimate-madrigal-family-gift-set--no-aasa/-/A-82250995">LINK</a></p></td>
															<td  style="width:20%">Disney Encanto Ultimate Madrigal Family Gift Set</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/defe95cf-56ac-4233-8f49-2555b7f5e583.html', '_blank');">astrid hendrianti</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															target90															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='806517'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="f2d17577-7ea4-436a-9833-a882f22c01ae" class='PODtlUUID' name="PODtlUUID20">
															<input type="hidden" value="1" name="qty_po20">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/e941c52f-dd7c-412c-bad5-fde47e601023.html', '_blank');">HC23010061</a>															</td>
															<td>180.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://realisationpar.com/the-alba-mystic/#om">LINK</a></p></td>
															<td  style="width:20%">The Alba</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/e09effe2-4bc5-4cf5-a02b-394eaf0e30a2.html', '_blank');">tyvla abidin</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															realisation90 10$															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='3370120'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="8f3a73a5-c21d-4ce5-9c11-caf2b359f78d" class='PODtlUUID' name="PODtlUUID21">
															<input type="hidden" value="1" name="qty_po21">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/1d2b96a1-4bb9-49f3-a101-17275e31d1f2.html', '_blank');">XY23010060</a>															</td>
															<td>58.50															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://snif.co/products/suganami">LINK</a></p></td>
															<td  style="width:20%">Suganami </td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/4ea29c73-8401-48bf-b683-1a406335cd9d.html', '_blank');">Valmayria Pavita </a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															snif90															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1114039'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="f5fd3df4-2e02-438a-9279-17209032ba86" class='PODtlUUID' name="PODtlUUID22">
															<input type="hidden" value="1" name="qty_po22">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/72474b17-6c62-4e10-9500-c68031813e51.html', '_blank');">KN23010029</a>															</td>
															<td>75.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.perfumesloewe.com/int/en_US/gifts/all-gifts/loewe-001-woman-eau-de-parfum-LW136.html">LINK</a></p></td>
															<td  style="width:20%">Loewe 001 Woman Eau de Perfume </td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/4e8d3fc3-2b89-45d4-ab71-c68e675c12d3.html', '_blank');">Aldila Oey (Harry)</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															loewe90															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1400050'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="08d109eb-75bb-41cb-aa45-f9b66c860ec1" class='PODtlUUID' name="PODtlUUID23">
															<input type="hidden" value="1" name="qty_po23">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>KN23010029</p>															</td>
															<td>77.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.perfumesloewe.com/int/en_US/gifts/all-gifts/loewe-aura-pink-magnolia-LWLWAURAPINKMAGNOLIA.html">LINK</a></p></td>
															<td  style="width:20%">Loewe Aura Pink Magnolia</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/4e8d3fc3-2b89-45d4-ab71-c68e675c12d3.html', '_blank');">Aldila Oey (Harry)</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															loewe90															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1434718'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="bb0de0df-8487-4c34-a57d-ed4d77454650" class='PODtlUUID' name="PODtlUUID24">
															<input type="hidden" value="1" name="qty_po24">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>KN23010029</p>															</td>
															<td>75.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.perfumesloewe.com/int/en_US/women/loewe-aura-white-magnolia-LWLWAURAWHITEMAGNOLIA.html">LINK</a></p></td>
															<td  style="width:20%">Loewe Aura White Magnolia</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/4e8d3fc3-2b89-45d4-ab71-c68e675c12d3.html', '_blank');">Aldila Oey (Harry)</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															loewe90															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1400050'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="9bc741f3-64b1-4009-9028-8b300eb36e35" class='PODtlUUID' name="PODtlUUID25">
															<input type="hidden" value="1" name="qty_po25">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>KN23010029</p>															</td>
															<td>64.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.perfumesloewe.com/int/en_US/gifts/all-gifts/loewe-001-woman-eau-de-toilette-LW181.html">LINK</a></p></td>
															<td  style="width:20%">Loewe 001 Woman Eau de Toilette </td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/4e8d3fc3-2b89-45d4-ab71-c68e675c12d3.html', '_blank');">Aldila Oey (Harry)</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															loewe90															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1209376'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="5730c9d6-a46f-459c-8657-59115352c082" class='PODtlUUID' name="PODtlUUID26">
															<input type="hidden" value="1" name="qty_po26">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/e4a523f8-6d90-4acd-8204-dedada1db22a.html', '_blank');">JV22112601</a>															</td>
															<td>390.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://eng.polene-paris.com/products/numero-neuf-mini-taupe">LINK</a></p></td>
															<td  style="width:20%">Polene neuf (no 9)  mini</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/e5e9e2b9-030b-4c0c-b4ee-986c9f86b1d6.html', '_blank');">Billy Joshua</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															hgl 13 jan															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='7260260'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="b5da485c-1186-429f-b5e4-02e3bd9da009" class='PODtlUUID' name="PODtlUUID27">
															<input type="hidden" value="2" name="qty_po27">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/a01fe51b-f3ff-442f-8968-0ec377eaf7a2.html', '_blank');">ON23010004</a>															</td>
															<td>72.00															<td style="width:8%" class="incoming_qty2" >2</td>
															<td><p id="price"><a href="https://www.skinceuticals.com/serum-10-aoxplus-S72.html">LINK</a></p></td>
															<td  style="width:20%">SERUM 10 AOX+</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/d89b486a-9bb3-41d0-9991-43714cc2c986.html', '_blank');">Jemmy</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															skinstore90															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='2'>
															<input type='hidden' class='incoming' value='2'>
															<input type='hidden' class='harga' value='1308048'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="b439a68b-044c-41c9-bb5f-e9fd06bee4b3" class='PODtlUUID' name="PODtlUUID28">
															<input type="hidden" value="1" name="qty_po28">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/f07e7744-94d6-4af0-aa38-0787dd106182.html', '_blank');">VD23010012</a>															</td>
															<td>55.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://undefeated.com/collections/headwear/products/undefeated-x-la-kings-official-ne-lp-snapback-black?variant=39576792105221">LINK</a></p></td>
															<td  style="width:20%">UNDEFEATED X LA KINGS OFFICIAL NE LOW PROFILE SNAPBACK</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/dd2dff9c-9d4f-47ff-b94b-66c5a7f962e7.html', '_blank');">Enriko Abadi</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															undefeated90 12$															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1053370'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="fba5049e-7767-4778-87ab-c5f08a61c072" class='PODtlUUID' name="PODtlUUID29">
															<input type="hidden" value="1" name="qty_po29">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/00d4a23a-4f68-44df-8865-2cdc0ebd9d94.html', '_blank');">QE22123129</a>															</td>
															<td>19.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.victoriassecret.com/us/vs/bras-catalog/5000008468?productId=fab890a2-45a6-4c23-bb38-70a42df20986&collectionId=">LINK</a></p></td>
															<td  style="width:20%">LOVE CLOUD Smooth Lightly Lined Demi Bra</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/defe95cf-56ac-4233-8f49-2555b7f5e583.html', '_blank');">astrid hendrianti</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															vs89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='416507'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="9e9f2dbf-e0ee-49c1-a054-248803ec00ae" class='PODtlUUID' name="PODtlUUID30">
															<input type="hidden" value="1" name="qty_po30">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>QE22123129</p>															</td>
															<td>18.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.victoriassecret.com/us/vs/bras-catalog/5000004045?productId=a832ce93-9e31-4fe6-949b-1605f84548b8&collectionId=">LINK</a></p></td>
															<td  style="width:20%">THE T-SHIRT Lightly-Lined Demi Bra</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/defe95cf-56ac-4233-8f49-2555b7f5e583.html', '_blank');">astrid hendrianti</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															vs89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='399173'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="4fd6a076-05c1-465d-83c3-de83279357fd" class='PODtlUUID' name="PODtlUUID31">
															<input type="hidden" value="1" name="qty_po31">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>QE22123129</p>															</td>
															<td>19.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.victoriassecret.com/us/vs/bras-catalog/5000008682?productId=17900cb9-90ff-479c-851c-d6ca1173bf69&collectionId=">LINK</a></p></td>
															<td  style="width:20%">VICTORIA'S SECRET BARE Infinity Flex Full Coverage Bra</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/defe95cf-56ac-4233-8f49-2555b7f5e583.html', '_blank');">astrid hendrianti</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															vs89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='416507'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="a15cb7d6-38b3-42fb-bbb3-f968ff33789e" class='PODtlUUID' name="PODtlUUID32">
															<input type="hidden" value="1" name="qty_po32">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/27384464-6d73-4696-86d1-3aca9e868176.html', '_blank');">TC22123127</a>															</td>
															<td>28.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/sephora-favorites-perfect-pout-lip-set-P504033">LINK</a></p></td>
															<td  style="width:20%">Sephora Favorites Perfect Pout Lip Set</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/defe95cf-56ac-4233-8f49-2555b7f5e583.html', '_blank');">astrid hendrianti</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															drstock															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='585352'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="43df8f5a-2cc8-4c6d-9bfe-38c78093dfd3" class='PODtlUUID' name="PODtlUUID33">
															<input type="hidden" value="1" name="qty_po33">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>TC22123127</p>															</td>
															<td>12.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/color-wow-mini-dream-coat-supernatural-spray-anti-frizz-treatment-P469067">LINK</a></p></td>
															<td  style="width:20%">COLOR WOW Mini Dream Coat Supernatural Spray Anti-Frizz Treatment</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/defe95cf-56ac-4233-8f49-2555b7f5e583.html', '_blank');">astrid hendrianti</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															drstock															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='268008'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="c30a4e2c-a179-4cc3-8c70-be993c2d06c2" class='PODtlUUID' name="PODtlUUID34">
															<input type="hidden" value="1" name="qty_po34">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/c18af784-a842-40b0-8652-125a45e03408.html', '_blank');">DC22123105</a>															</td>
															<td>46.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/hourglass-vanish-trade-blush-stick-P471550?skuId=2449189&icid2=products%20grid:p471550:product">LINK</a></p></td>
															<td  style="width:20%">Hourglass Vanish™ Blush Stick</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/c65e0e2b-aeef-40c5-8f2f-5d393f5261bb.html', '_blank');">Bella Mathew</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora10															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='847364'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="ac94febb-9cba-4535-bf34-214ae49d73a8" class='PODtlUUID' name="PODtlUUID35">
															<input type="hidden" value="1" name="qty_po35">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/fb808278-9776-41d3-b6b4-3dfd490036f6.html', '_blank');">WJ22123099</a>															</td>
															<td>3.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.victoriassecret.com/us/vs/panties-catalog/5000000024?brand=vs&collectionId=1bd30fc8-5f70-47f6-ae98-d976a035c249&filter=size%3AM&limit=180&orderBy=LTH&priceType=clearance&productId=e2634432-6cea-4d5e-b521-380f90064198&size1=M&size2=&stackId=7af87aa4-c363-4de0-9de8-39190c752576&genericId=11160870&choice=5Q1I&product_position=66&stack_position=1&dataSource=manual-collection">LINK</a></p></td>
															<td  style="width:20%">Stretch Cotton String Bikini Panty</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/40f12205-2727-4a2f-9417-f8a40da333ce.html', '_blank');">Marsha Santoso</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															vs89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='109163'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="e0c0a35c-d38c-48f2-8dc3-9240c5bfdafe" class='PODtlUUID' name="PODtlUUID36">
															<input type="hidden" value="1" name="qty_po36">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>WJ22123099</p>															</td>
															<td>3.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.victoriassecret.com/us/vs/panties-catalog/5000000008?brand=vs&collectionId=1bd30fc8-5f70-47f6-ae98-d976a035c249&filter=size%3AM&limit=180&orderBy=LTH&priceType=clearance&productId=119aabc4-5851-4ed0-a959-3f297d27a7e4&size1=M&size2=&stackId=7af87aa4-c363-4de0-9de8-39190c752576&genericId=11215323&choice=5PJ0&product_position=77&stack_position=1&dataSource=manual-collection">LINK</a></p></td>
															<td  style="width:20%">Stretch Cotton Bikini Panty</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/40f12205-2727-4a2f-9417-f8a40da333ce.html', '_blank');">Marsha Santoso</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															vs89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='109163'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="d20c8b64-e4a8-4f17-8006-173f56606d6d" class='PODtlUUID' name="PODtlUUID37">
															<input type="hidden" value="1" name="qty_po37">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>WJ22123099</p>															</td>
															<td>3.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.victoriassecret.com/us/vs/panties-catalog/5000000027?brand=vs&collectionId=1bd30fc8-5f70-47f6-ae98-d976a035c249&filter=size%3AM&limit=180&orderBy=LTH&priceType=clearance&productId=8658780b-8fbf-4997-9c11-f35a2e52f934&size1=M&size2=&stackId=7af87aa4-c363-4de0-9de8-39190c752576&genericId=11211807&choice=5PUC&product_position=39&stack_position=1&dataSource=manual-collection">LINK</a></p></td>
															<td  style="width:20%">Stretch Cotton Strappy Hiphugger Panty</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/40f12205-2727-4a2f-9417-f8a40da333ce.html', '_blank');">Marsha Santoso</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															vs89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='109163'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="1651470f-a115-4b98-a7c7-381ece1013b5" class='PODtlUUID' name="PODtlUUID38">
															<input type="hidden" value="1" name="qty_po38">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>WJ22123099</p>															</td>
															<td>3.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.victoriassecret.com/us/vs/panties-catalog/5000005331?brand=vs&collectionId=1bd30fc8-5f70-47f6-ae98-d976a035c249&filter=size%3AM%2Csubclass%3ACheekies%20%26%20Cheeksters&limit=180&priceType=clearance&productId=65752339-969a-473b-afbf-6e1b9d96821e&size1=M&size2=&stackId=7af87aa4-c363-4de0-9de8-39190c752576&genericId=11210013&choice=5O9U&product_position=11&stack_position=1&dataSource=manual-collection">LINK</a></p></td>
															<td  style="width:20%">No-Show Cheeky Panty</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/40f12205-2727-4a2f-9417-f8a40da333ce.html', '_blank');">Marsha Santoso</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															vs89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='109163'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="f6cd4d17-e80a-4917-842c-631c6d7bccc8" class='PODtlUUID' name="PODtlUUID39">
															<input type="hidden" value="1" name="qty_po39">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>WJ22123099</p>															</td>
															<td>7.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.victoriassecret.com/us/vs/panties-catalog/5000000018?brand=vs&collectionId=1bd30fc8-5f70-47f6-ae98-d976a035c249&filter=subclass%3ACheekies%20%26%20Cheeksters%2Csize%3AM&limit=180&priceType=clearance&productId=1f3fee73-bb1c-49be-934a-59373d6c230a&size1=M&size2=&stackId=7af87aa4-c363-4de0-9de8-39190c752576&genericId=11207169&choice=14P2&product_position=2&stack_position=1&dataSource=manual-collection">LINK</a></p></td>
															<td  style="width:20%">Lace String Cheekini Panty</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/40f12205-2727-4a2f-9417-f8a40da333ce.html', '_blank');">Marsha Santoso</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															vs89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='178499'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="21976a17-bd7f-4baf-bac6-e8a4b01e91cf" class='PODtlUUID' name="PODtlUUID40">
															<input type="hidden" value="1" name="qty_po40">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>WJ22123099</p>															</td>
															<td>7.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.victoriassecret.com/us/vs/panties-catalog/5000000206?brand=vs&collectionId=02bbfb11-4ff7-42b8-92fb-88f54874dbf4&filter=category%3APanties%2Csize%3AM&limit=180&orderBy=LTH&priceType=clearance&productId=9e2eb6a4-4799-4e13-b23f-bc8b87e4eceb&size1=M&size2=&stackId=24066dee-8b87-4915-a722-9d64576fc2dc&genericId=11207635&choice=5LSU&product_position=36&stack_position=1&dataSource=manual-collection">LINK</a></p></td>
															<td  style="width:20%">Flocked Dot Ruffled Mesh Cheekini Panty	</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/40f12205-2727-4a2f-9417-f8a40da333ce.html', '_blank');">Marsha Santoso</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															vs89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='178499'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="84cf99a2-9746-4fb3-9b36-f9c1ca38c1f6" class='PODtlUUID' name="PODtlUUID41">
															<input type="hidden" value="1" name="qty_po41">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>WJ22123099</p>															</td>
															<td>17.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.victoriassecret.com/id/pink/bras-catalog/5000005968?brand=pink&collectionId=128587e6-0ae6-424c-830c-9060e735d29f&filter=structure_ch%3AWireless&limit=180&priceType=clearance&productId=258b9b2a-afa4-435b-aeaf-710824ac40cf&size1=32&size2=D&stackId=51169275-591e-4f88-90b0-5803a3f6b642&genericId=11199791&choice=2OG2&product_position=3&stack_position=1&dataSource=manual-collection">LINK</a></p></td>
															<td  style="width:20%">PINK WEAR EVERYWHERE WIRELESS PUSH-UP BRA</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/40f12205-2727-4a2f-9417-f8a40da333ce.html', '_blank');">Marsha Santoso</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															vs89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='381839'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="1cf3fb54-4caf-44e0-a1c5-d456ddf29322" class='PODtlUUID' name="PODtlUUID42">
															<input type="hidden" value="1" name="qty_po42">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/529cb1ee-be9b-484e-8f5e-cdda9e58d429.html', '_blank');">YQ22123093</a>															</td>
															<td>14.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.victoriassecret.com/us/vs/bras-catalog/5000000067?brand=vs&choice=28M5&genericId=11200923&rrec=true&recommendedProductType=matchback">LINK</a></p></td>
															<td  style="width:20%">Sexy Tee Lace Push-Up T-Back Bra</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/1ab41bf4-5613-4525-9969-c366ea605193.html', '_blank');">Endar Yunitasari</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															vs89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='329837'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="b67fe2b0-ada6-43eb-86ab-3d0646c6b72a" class='PODtlUUID' name="PODtlUUID43">
															<input type="hidden" value="1" name="qty_po43">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/4e3a7e98-7ed4-45e5-89dd-e583b6576b70.html', '_blank');">ED22123070</a>															</td>
															<td>200.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.footjoy.com/men/golf-shoes/spiked/premiere-series---tarlow/004DPS.html?dwvar_004DPS_color=53905">LINK</a></p></td>
															<td  style="width:20%">Premiere Series - Tarlow</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/c00f816e-a386-42a0-b34d-5a27b4b38e29.html', '_blank');">Adenia Gita Dianty</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															footjoy89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='4216800'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="1e94d45a-ec13-432c-bb13-c94535a23967" class='PODtlUUID' name="PODtlUUID44">
															<input type="hidden" value="1" name="qty_po44">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/d4adcf1d-38ec-4b9c-962e-21b62dba0ed2.html', '_blank');">CA22123064</a>															</td>
															<td>60.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.casetify.com/product/cinderella-stickermania/samsung-galaxy-s22-plus/impact-case-with-black-camera-ring?color=deep-purple#/16004184">LINK</a></p></td>
															<td  style="width:20%">Cinderella Stickermania</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/d547e85c-a3dd-48e7-8333-2e1b26c07b74.html', '_blank');">Derika Puspitayu</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															casetify90 sg															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1140040'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="f165f042-a1eb-41b4-b4f2-8b35f1513000" class='PODtlUUID' name="PODtlUUID45">
															<input type="hidden" value="1" name="qty_po45">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>CA22123064</p>															</td>
															<td>15.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://mobyfox.shop/collections/disney/products/little-mermaid-ariel-smartwatch-band">LINK</a></p></td>
															<td  style="width:20%">Little Mermaid-Ariel Smartwatch Band</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/d547e85c-a3dd-48e7-8333-2e1b26c07b74.html', '_blank');">Derika Puspitayu</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
																														</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='360010'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="364d5bda-82b2-461c-a024-1e308fb97b5a" class='PODtlUUID' name="PODtlUUID46">
															<input type="hidden" value="1" name="qty_po46">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>CA22123064</p>															</td>
															<td>45.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.casetify.com/product/sticker-mania-laptop-sleeve/laptop-sleeve-small/laptop-sleeve#/16004822">LINK</a></p></td>
															<td  style="width:20%">Sticker Mania Laptop Sleeve</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/d547e85c-a3dd-48e7-8333-2e1b26c07b74.html', '_blank');">Derika Puspitayu</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															casetify90 sg															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1030030'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="f6f3d431-be69-4fb4-9ec1-ae2641262152" class='PODtlUUID' name="PODtlUUID47">
															<input type="hidden" value="1" name="qty_po47">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>CA22123064</p>															</td>
															<td>40.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.amazon.com/ghd-Styler-Carry-Case-Heat/dp/B08W4D1441/ref=sr_1_5?crid=311PK20TUARMO&keywords=ghd+flat+iron+case&qid=1672036700&sprefix=ghd+flat+iron+case%2Caps%2C1416&sr=8-5">LINK</a></p></td>
															<td  style="width:20%">ghd Styler Carry Case with Heat Mat, ghd platinum+ styler carry case, ghd gold styler carry case, ghd classic original styler carry case, 1 Count (Pac</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/d547e85c-a3dd-48e7-8333-2e1b26c07b74.html', '_blank');">Derika Puspitayu</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															amazon89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='893360'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="ecec3f35-afd7-4941-ba1a-1bc0662c4fbe" class='PODtlUUID' name="PODtlUUID48">
															<input type="hidden" value="1" name="qty_po48">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>CA22123064</p>															</td>
															<td>9.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.amazon.com/Secbolt-Compatible-Replacement-Wristband-Stainless/dp/B07BLXWQF1?ref_=ast_sto_dp&th=1&psc=1">LINK</a></p></td>
															<td  style="width:20%">Secbolt Leather Bands Compatible Apple Watch Band 38mm 40mm 41mm 42mm 44mm 45mm Slim Replacement Wristband Sport Strap for Iwatch SE Series 8 7 6 5 4 </td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/d547e85c-a3dd-48e7-8333-2e1b26c07b74.html', '_blank');">Derika Puspitayu</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															amazon89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='273167'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="11499663-b2c9-4ec2-a0d1-fb3adf3bd162" class='PODtlUUID' name="PODtlUUID49">
															<input type="hidden" value="1" name="qty_po49">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>CA22123064</p>															</td>
															<td>15.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://mobyfox.shop/collections/disney/products/little-mermaid-ariel-and-flounder-smartwatch-band">LINK</a></p></td>
															<td  style="width:20%">Little Mermaid-Ariel and Flounder Smartwatch Band</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/d547e85c-a3dd-48e7-8333-2e1b26c07b74.html', '_blank');">Derika Puspitayu</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															moby89 5.95$															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='360010'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="aca70c18-e63c-46e8-9da1-087e28bd9ea7" class='PODtlUUID' name="PODtlUUID50">
															<input type="hidden" value="1" name="qty_po50">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/a9dafbca-c96a-46f2-a6f4-1c7ddedc9b82.html', '_blank');">JH22123056</a>															</td>
															<td>29.50															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.victoriassecret.com/us/vs/bras-catalog/5000000067?productId=7d7b2ed5-6751-42ef-8674-f88e4aa5994b&collectionId=">LINK</a></p></td>
															<td  style="width:20%">VICTORIA'S SECRET Sexy Tee Push-Up Bra</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/b5934354-1f0d-47bc-8443-3e39257145e9.html', '_blank');">mutia saraswati</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															vs89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='581353'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="3fbcb563-c394-4af5-a085-b68ea8e5314e" class='PODtlUUID' name="PODtlUUID51">
															<input type="hidden" value="1" name="qty_po51">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>JH22123056</p>															</td>
															<td>69.95															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.victoriassecret.com/us/vs/bras-catalog/5000000022?productId=8aae06af-944a-49ce-93c6-f3fcc9188df4&collectionId=">LINK</a></p></td>
															<td  style="width:20%">VERY SEXY Shine Strap Push-Up Bra</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/b5934354-1f0d-47bc-8443-3e39257145e9.html', '_blank');">mutia saraswati</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															vs89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1282513'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="661beeb0-b5c0-4fe7-8aca-5a8c5aae49c2" class='PODtlUUID' name="PODtlUUID52">
															<input type="hidden" value="1" name="qty_po52">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>JH22123056</p>															</td>
															<td>29.50															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.victoriassecret.com/us/vs/bras-catalog/5000000067?productId=7d7b2ed5-6751-42ef-8674-f88e4aa5994b&collectionId=">LINK</a></p></td>
															<td  style="width:20%">VICTORIA'S SECRET Sexy Tee Push-Up Bra</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/b5934354-1f0d-47bc-8443-3e39257145e9.html', '_blank');">mutia saraswati</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															vs89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='581353'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="c61180a6-a511-4325-8bda-c35b141680b3" class='PODtlUUID' name="PODtlUUID53">
															<input type="hidden" value="1" name="qty_po53">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/f164fef8-428c-4ed2-9153-c67d71f5b94a.html', '_blank');">WR22123013</a>															</td>
															<td>15.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.amazon.com/Australian-Gold-Botanical-Sunscreen-Resistant/dp/B07YZQTKDJ?ref_=ast_sto_dp&th=1&psc=1">LINK</a></p></td>
															<td  style="width:20%">Australian Gold Botanical Sunscreen Tinted Face BB Cream SPF 50</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/bbeef0b5-eb01-4973-8de5-50e15841bad4.html', '_blank');">Christine suherman</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															amazon89															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='357171'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="fdff13db-2dd2-44b8-9ef1-79d08faaedbf" class='PODtlUUID' name="PODtlUUID54">
															<input type="hidden" value="1" name="qty_po54">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/bfc83747-6862-4229-8af6-a06fe583657b.html', '_blank');">EV22123006</a>															</td>
															<td>112.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/fenty-eau-de-parfum-P503757?skuId=2650307&icid2=products%20grid:p503757:product">LINK</a></p></td>
															<td  style="width:20%">Fenty Eau de Parfum</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/05b1a73e-91b8-46a3-a6cf-cb73879f2723.html', '_blank');">Farah Fatihah</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora6															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='2101408'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="1d556883-0838-4774-beb0-552c2f67097e" class='PODtlUUID' name="PODtlUUID55">
															<input type="hidden" value="1" name="qty_po55">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/319b5be9-fa2e-4d30-887f-fc8fb03cd0e7.html', '_blank');">AG22123002</a>															</td>
															<td>34.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.braceability.com/products/knee-brace-for-large-legs">LINK</a></p></td>
															<td  style="width:20%">Big Knee Brace for Large Legs | Plus Size Patella Support Sleeve with Adjustable Thigh & Calf Straps</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/f45c3171-d54b-4584-a1a5-9963c125d303.html', '_blank');">Ati Fatimah</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															brace89 tmbh 1 806rb DP tmbh 500															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='806517'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="d699c5fb-f8da-4856-aba5-f80f3f14276e" class='PODtlUUID' name="PODtlUUID56">
															<input type="hidden" value="1" name="qty_po56">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/96da0e33-4c60-4552-852f-00ce40650c0c.html', '_blank');">PQ22122982</a>															</td>
															<td>112.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/fenty-eau-de-parfum-P503757?skuId=2650307&icid2=products%20grid:p503757:product">LINK</a></p></td>
															<td  style="width:20%">Fenty Eau de Parfum by Fenty Beauty</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/05b1a73e-91b8-46a3-a6cf-cb73879f2723.html', '_blank');">Farah Fatihah</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora6															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='2051408'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="71eb1350-ee4d-493c-a452-fe9251d88a11" class='PODtlUUID' name="PODtlUUID57">
															<input type="hidden" value="2" name="qty_po57">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>PQ22122982</p>															</td>
															<td>20.00															<td style="width:8%" class="incoming_qty2" >2</td>
															<td><p id="price"><a href="https://www.sephora.com/product/discovery-sampler-set-P503601?skuId=2599926&icid2=products%20grid:p503601:product">LINK</a></p></td>
															<td  style="width:20%">Kayali Discovery Sample Set</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/05b1a73e-91b8-46a3-a6cf-cb73879f2723.html', '_blank');">Farah Fatihah</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora7 br1															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='2'>
															<input type='hidden' class='incoming' value='2'>
															<input type='hidden' class='harga' value='456680'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="0d951a93-6de2-462b-be25-51fa5aab2e50" class='PODtlUUID' name="PODtlUUID58">
															<input type="hidden" value="1" name="qty_po58">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/a1fd4775-7e93-4b0d-a648-05ae51f2a263.html', '_blank');">WO22122952</a>															</td>
															<td>72.80															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.katespade.com/products/morgan-bouquet-toss-embossed-small-compact-wallet/K9781-1.html?frp=K9781%20UMK">LINK</a></p></td>
															<td  style="width:20%">Kate Spade Morgan Bouquet Small Wallet </td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/a2dff4be-fafb-424d-90e3-b770b8fe4a2a.html', '_blank');">Rori</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															ks81															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1461915'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="af1b917b-8739-4c4c-af9d-ce387d98c7cb" class='PODtlUUID' name="PODtlUUID59">
															<input type="hidden" value="2" name="qty_po59">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/f2b41d96-0342-4bea-b2c3-7f791b6ac9fa.html', '_blank');">FQ22112450</a>															</td>
															<td>53.99															<td style="width:8%" class="incoming_qty2" >2</td>
															<td><p id="price"><a href="https://www.frendsbeauty.com/smooth-on-dragon-skin-f-x-pro-kit.html">LINK</a></p></td>
															<td  style="width:20%">VIEWS  Smooth-On Dragon Skin F/X Pro Kit SMOOTH-ON DRAGON SKIN F/X PRO KIT</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/8d31f42e-4416-40be-ab5a-9de947c5a1f8.html', '_blank');">susanti tedja</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															frends92															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='2'>
															<input type='hidden' class='incoming' value='2'>
															<input type='hidden' class='harga' value='1435862.5'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="abdc2e3c-17fb-4ddd-88c5-ed0dae435895" class='PODtlUUID' name="PODtlUUID60">
															<input type="hidden" value="1" name="qty_po60">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/0d66eac9-e527-4d02-812a-9121c1e84f3c.html', '_blank');">LP22112874</a>															</td>
															<td>36.80															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/airbrush-flawless-finish-setting-powder-P433526?skuId=2606085&icid2=products%20grid:p433526:product">LINK</a></p></td>
															<td  style="width:20%">Charlotte Tilbury Airbrush Flawless Finish Setting Powder</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/75233290-95b0-4144-9faf-c5844d4cdee9.html', '_blank');">Yulius Steven</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora3															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='697891'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="e04982a4-419f-4756-ad7e-a377ee9f3cac" class='PODtlUUID' name="PODtlUUID61">
															<input type="hidden" value="1" name="qty_po61">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>LP22112874</p>															</td>
															<td>8.79															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/retinol-serum-P443842?skuId=2211498&icid2=products%20grid:p443842:product">LINK</a></p></td>
															<td  style="width:20%">The INKEY List Retinol Anti-Aging Serum</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/75233290-95b0-4144-9faf-c5844d4cdee9.html', '_blank');">Yulius Steven</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															drstock															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='222401'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="9435de37-ff0b-48ea-8837-ddc4b0c543f0" class='PODtlUUID' name="PODtlUUID62">
															<input type="hidden" value="1" name="qty_po62">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/ef44175e-f94b-4368-a85f-c408408628af.html', '_blank');">WP22112882</a>															</td>
															<td>36.80															<td style="width:8%" class="incoming_qty2" >0</td>
															<td><p id="price"><a href="https://www.sephora.com/product/airbrush-flawless-longwear-foundation-P448869?skuId=2244671">LINK</a></p></td>
															<td  style="width:20%">Charlotte Tilbury Airbrush Flawless Longwear Foundation</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/05b1a73e-91b8-46a3-a6cf-cb73879f2723.html', '_blank');">Farah Fatihah</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora3															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Reject															</a>
															<span class="tambahan">
															 / <a href="#" class="keterangan_item" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="keterangan_item"> </a>
															
															</span>
															<input type='hidden' class='stat' value='02'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='0'>
															<input type='hidden' class='harga' value='697891'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="a6b4a1d0-c2b9-4f64-9a41-de47f5dc7210" class='PODtlUUID' name="PODtlUUID63">
															<input type="hidden" value="1" name="qty_po63">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>WP22112882</p>															</td>
															<td>54.40															<td style="width:8%" class="incoming_qty2" >0</td>
															<td><p id="price"><a href="https://www.sephora.com/product/maison-margiela-replica-mini-coffret-set-P470042?skuId=2551364&icid2=products%20grid:p470042:product">LINK</a></p></td>
															<td  style="width:20%">Maison Margiela Replica Mini Coffret Set</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/05b1a73e-91b8-46a3-a6cf-cb73879f2723.html', '_blank');">Farah Fatihah</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora3															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Reject															</a>
															<span class="tambahan">
															 / <a href="#" class="keterangan_item" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="keterangan_item"> </a>
															
															</span>
															<input type='hidden' class='stat' value='02'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='0'>
															<input type='hidden' class='harga' value='1102970'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="10986d65-7b5d-4b21-bb35-ff9c3f1b4304" class='PODtlUUID' name="PODtlUUID64">
															<input type="hidden" value="1" name="qty_po64">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/41fc724c-654d-4826-9dab-350787b407db.html', '_blank');">MQ22112886</a>															</td>
															<td>33.60															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/tartelette-in-bloom-clay-eyeshadow-palette-P403812?skuId=1775006&icid2=products%20grid:p403812:product">LINK</a></p></td>
															<td  style="width:20%">Tartelette™ In Bloom Clay Eyeshadow Palette</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/6504052c-0a6f-45df-b4b0-38b135a4b9b1.html', '_blank');">Jessica Djaja</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora3															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='662422'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="f294d739-c672-46c7-a4b3-a61969cb8e9b" class='PODtlUUID' name="PODtlUUID65">
															<input type="hidden" value="1" name="qty_po65">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/6971ff46-ad9a-4356-b62f-60d32f569e2a.html', '_blank');">KR22112878</a>															</td>
															<td>3.60															<td style="width:8%" class="incoming_qty2" >0</td>
															<td><p id="price"><a href="https://www.sephora.com/product/nudestix-mini-nudefix-cream-concealer-P482056?skuId=2570216&icid2=products%20grid:p482056:product">LINK</a></p></td>
															<td  style="width:20%">NUDESTIX Nudefix Cream Concealer</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/915372f6-e9c3-4be4-b90d-a1f7d09a8938.html', '_blank');">Angela Febyanti</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora3															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Reject															</a>
															<span class="tambahan">
															 / <a href="#" class="keterangan_item" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="keterangan_item"> oos</a>
															
															</span>
															<input type='hidden' class='stat' value='02'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='0'>
															<input type='hidden' class='harga' value='112402'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="13c7074f-d2e0-4e7b-8072-b1e65adb7fc2" class='PODtlUUID' name="PODtlUUID66">
															<input type="hidden" value="1" name="qty_po66">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>KR22112878</p>															</td>
															<td>14.40															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/nudies-tinted-cover-foundation-P448152?skuId=2272292&icid2=products%20grid:p448152:product">LINK</a></p></td>
															<td  style="width:20%">NUDESTIX Tinted Cover Skin Tint Foundation</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/915372f6-e9c3-4be4-b90d-a1f7d09a8938.html', '_blank');">Angela Febyanti</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora3															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='309610'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="9f59f2e7-5229-42d4-b8d3-3b652fd9f21c" class='PODtlUUID' name="PODtlUUID67">
															<input type="hidden" value="1" name="qty_po67">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/9ecbbf0a-6a63-4c7f-ab0b-bb0fd6f3bcb7.html', '_blank');">FA22112880</a>															</td>
															<td>54.40															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/patrick-ta-major-dimension-eyeshadow-palette-P473145?skuId=2464006&icid2=products%20grid:p473145:product">LINK</a></p></td>
															<td  style="width:20%">Patrick ta major dimensions palette</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/501248e0-bed9-43b0-a532-81835a14aeaa.html', '_blank');">Naqy</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora3															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1052970'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="8e9da98c-1e49-4b9b-81fa-42e50805d38c" class='PODtlUUID' name="PODtlUUID68">
															<input type="hidden" value="1" name="qty_po68">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>FA22112880</p>															</td>
															<td>54.40															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/patrick-ta-major-dimension-2-rose-eyeshadow-palette-P483484?skuId=2518736&icid2=products%20grid:p483484:product">LINK</a></p></td>
															<td  style="width:20%">Patrick ta major dimensions rose palette</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/501248e0-bed9-43b0-a532-81835a14aeaa.html', '_blank');">Naqy</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora3															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1052970'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="ce1cebfb-1e45-4aca-8eb5-0e4ea156bbfe" class='PODtlUUID' name="PODtlUUID69">
															<input type="hidden" value="1" name="qty_po69">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>FA22112880</p>															</td>
															<td>25.60															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/monochrome-moment-velvet-blush-P451940?skuId=2281780&icid2=products%20grid:p451940:product">LINK</a></p></td>
															<td  style="width:20%">Patrick ta she’s sincere blush</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/501248e0-bed9-43b0-a532-81835a14aeaa.html', '_blank');">Naqy</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora3															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='503750'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="bb93b8e5-fe58-46b1-b869-2d7f84929370" class='PODtlUUID' name="PODtlUUID70">
															<input type="hidden" value="1" name="qty_po70">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/fc39dadd-df77-4b3b-aad5-ef7d3b7a024e.html', '_blank');">LN22112859</a>															</td>
															<td>13.99															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.hollywoodfashionsecrets.com/hfs-silicone-coverupsr-light-skin-tone.html">LINK</a></p></td>
															<td  style="width:20%">Silicon coverups, light skin tone</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/3125743d-b9cc-4e97-9fdd-e3e1bb25d411.html', '_blank');">Gaby kwandy</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															hollywood92 12.98$															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='292503'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="0d5fe75f-e6fe-4537-a9d5-eef32dce0c82" class='PODtlUUID' name="PODtlUUID71">
															<input type="hidden" value="1" name="qty_po71">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/2a27cc8e-f83f-41f6-9c76-53134b91b1d9.html', '_blank');">RR22112877</a>															</td>
															<td>36.80															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/veil-translucent-setting-powder-P430240?skuId=2071769&icid2=products%20grid:p430240:product">LINK</a></p></td>
															<td  style="width:20%">Veil™ Translucent Setting Powder - Talc Free</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/8ba989e9-d0fb-4b61-8f4e-efdffb9d58cc.html', '_blank');">Marcella Harjanto</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora3															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='697891'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="a5da9c1b-4db9-4432-b59f-def1b7b7508c" class='PODtlUUID' name="PODtlUUID72">
															<input type="hidden" value="1" name="qty_po72">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/5101a002-c189-424c-a52a-51d0ecab7cea.html', '_blank');">WB22112845</a>															</td>
															<td>28.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://soldejaneiro.com/collections/fragrances/products/brazilian-crush-cheirosa-62-hair-body-fragrance-mist">LINK</a></p></td>
															<td  style="width:20%">sol 62</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/defe95cf-56ac-4233-8f49-2555b7f5e583.html', '_blank');">astrid hendrianti</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sol79															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='635352'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="64c82cc0-0c39-42a5-877e-bc94fd7604e4" class='PODtlUUID' name="PODtlUUID73">
															<input type="hidden" value="1" name="qty_po73">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>WB22112845</p>															</td>
															<td>28.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://soldejaneiro.com/collections/fragrances/products/cheirosa-71-body-fragrance-mist">LINK</a></p></td>
															<td  style="width:20%">sol 71</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/defe95cf-56ac-4233-8f49-2555b7f5e583.html', '_blank');">astrid hendrianti</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sol79															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='635352'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="14745f64-9e6c-45c6-803d-c340cb56f42e" class='PODtlUUID' name="PODtlUUID74">
															<input type="hidden" value="1" name="qty_po74">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/0c6c4b95-264c-427b-b287-5e454e138d15.html', '_blank');">VV22112829</a>															</td>
															<td>100.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/false-madagascar-vanilla-perfume-oil-set-P502931">LINK</a></p></td>
															<td  style="width:20%">Madagascar Vanilla Nest set</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/c00f816e-a386-42a0-b34d-5a27b4b38e29.html', '_blank');">Adenia Gita Dianty</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora3															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1853400'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="cef4f534-9904-456f-82f5-9c37c28829e5" class='PODtlUUID' name="PODtlUUID75">
															<input type="hidden" value="1" name="qty_po75">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/021ea410-312b-4f52-85d8-8c291260816a.html', '_blank');">KV22112819</a>															</td>
															<td>118.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/kayali-vanilla-P439406?skuId=2163970">LINK</a></p></td>
															<td  style="width:20%">KAYALI VANILLA | 28</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/c00f816e-a386-42a0-b34d-5a27b4b38e29.html', '_blank');">Adenia Gita Dianty</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora3															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='2195412'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="e18fc16e-ab66-4ecd-9c4b-7073b3eef28d" class='PODtlUUID' name="PODtlUUID76">
															<input type="hidden" value="1" name="qty_po76">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/ed219d44-084a-48a4-ad72-676190cba4c8.html', '_blank');">SD22112821</a>															</td>
															<td>20.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/rare-beauty-by-selena-gomez-soft-pinch-liquid-blush-P97989778?skuId=2518959&icid2=products%20grid:p97989778:product">LINK</a></p></td>
															<td  style="width:20%">Rare Beauty Liquid Blush</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/84b06186-96b5-4454-9668-aff04bd3beef.html', '_blank');">Sabrina Rafli Sjahputra</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora3															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='396680'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="c390755b-f14f-4ff4-9db4-278bf30eab91" class='PODtlUUID' name="PODtlUUID77">
															<input type="hidden" value="1" name="qty_po77">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>SD22112821</p>															</td>
															<td>24.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.sephora.com/product/makeup-by-mario-moisture-glow-tm-plumping-lip-serum-P481114?skuId=2605343">LINK</a></p></td>
															<td  style="width:20%">Makeup by Mario High Shine Finish</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/84b06186-96b5-4454-9668-aff04bd3beef.html', '_blank');">Sabrina Rafli Sjahputra</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															sephora3															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='456016'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="ea4bd23f-73d2-4560-a8c3-30b88557552c" class='PODtlUUID' name="PODtlUUID78">
															<input type="hidden" value="1" name="qty_po78">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/09181f8e-ff56-46e6-86c2-985133daee46.html', '_blank');">ZZ22112737</a>															</td>
															<td>10.80															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://kyliecosmetics.com/en-us/kylie-cosmetics/products/lip-blush-butterfly-kc281">LINK</a></p></td>
															<td  style="width:20%">Kylie cosmetics </td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/0068bd9c-9700-4be6-b1ee-f669db1ecd90.html', '_blank');">Ibu utami/Indry</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															kylie78															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='227207'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="7fd85a73-56f1-4ef1-b4f9-6287bb904cc8" class='PODtlUUID' name="PODtlUUID79">
															<input type="hidden" value="1" name="qty_po79">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>ZZ22112737</p>															</td>
															<td>10.80															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://kyliecosmetics.com/en-us/kylie-cosmetics/products/matte-liquid-lipstick-kc151">LINK</a></p></td>
															<td  style="width:20%">Kylie cosmetics</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/0068bd9c-9700-4be6-b1ee-f669db1ecd90.html', '_blank');">Ibu utami/Indry</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															kylie78															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='227207'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="850714ed-809e-4011-9d81-a49aee328e48" class='PODtlUUID' name="PODtlUUID80">
															<input type="hidden" value="1" name="qty_po80">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>ZZ22112737</p>															</td>
															<td>10.80															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://kyliecosmetics.com/en-us/kylie-cosmetics/products/matte-liquid-lipstick-kc566">LINK</a></p></td>
															<td  style="width:20%">Kylie cosmetics </td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/0068bd9c-9700-4be6-b1ee-f669db1ecd90.html', '_blank');">Ibu utami/Indry</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															kylie78															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='227207'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="bed0381d-003a-49d4-8242-7af7b6138963" class='PODtlUUID' name="PODtlUUID81">
															<input type="hidden" value="1" name="qty_po81">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>ZZ22112737</p>															</td>
															<td>10.80															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://kyliecosmetics.com/en-us/kylie-cosmetics/products/matte-liquid-lipstick-kc187">LINK</a></p></td>
															<td  style="width:20%">Kylie cosmetics</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/0068bd9c-9700-4be6-b1ee-f669db1ecd90.html', '_blank');">Ibu utami/Indry</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															kylie78															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='227207'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="bd537fba-e14c-493b-8670-ccae1fa5e5c9" class='PODtlUUID' name="PODtlUUID82">
															<input type="hidden" value="1" name="qty_po82">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/1402c06a-3261-458a-8c51-2d4ba26badfb.html', '_blank');">XA22112692</a>															</td>
															<td>33.75															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://kjaerweis.com/products/tinted-moisturizer-iconic-edition-m2">LINK</a></p></td>
															<td  style="width:20%">Beautiful tint</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/20278493-fddc-4892-8449-f645cdc88fe5.html', '_blank');">Chewy Dilmy</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															kjaer78															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='645023'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="5318c028-fa21-4fa7-bdbb-5057348f99ac" class='PODtlUUID' name="PODtlUUID83">
															<input type="hidden" value="1" name="qty_po83">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>XA22112692</p>															</td>
															<td>20.80															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.narscosmetics.com/USA/%2310-radiant-creamy-concealer-brush/0194251005164.html">LINK</a></p></td>
															<td  style="width:20%">#10 radiant concealer brush</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/20278493-fddc-4892-8449-f645cdc88fe5.html', '_blank');">Chewy Dilmy</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															nars78															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='410547'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="05769cc3-51b5-441a-8377-31dfc05f6f23" class='PODtlUUID' name="PODtlUUID84">
															<input type="hidden" value="1" name="qty_po84">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>XA22112692</p>															</td>
															<td>12.60															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.glossier.com/products/brow-flick">LINK</a></p></td>
															<td  style="width:20%">Brow flick</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/20278493-fddc-4892-8449-f645cdc88fe5.html', '_blank');">Chewy Dilmy</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															g78															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															OK															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='01'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='258408'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="6eb1603e-4353-449b-bba6-363c75eec606" class='PODtlUUID' name="PODtlUUID85">
															<input type="hidden" value="1" name="qty_po85">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/191f24dd-339c-4556-a153-422ef19cf925.html', '_blank');">XL22112653</a>															</td>
															<td>23.40															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.toofaced.com/product/23483/73023/eye-makeup/eye-shadow-palettes/born-this-way-the-natural-nudes-eye-shadow-palette/high-pigment-complexion-inspired-neutral-shades">LINK</a></p></td>
															<td  style="width:20%">Born This Way The Natural Nudes Eye Shadow Palette</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/da49fd4d-9457-4a11-8f49-fbbea2361044.html', '_blank');">Verona Audrey</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															toofaced78															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='515616'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="040d31df-9fb2-479c-9f8b-cfc15e675e55" class='PODtlUUID' name="PODtlUUID86">
															<input type="hidden" value="1" name="qty_po86">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>XL22112653</p>															</td>
															<td>22.05															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.toofaced.com/product/23478/59099/face-makeup/bronzer/chocolate-soleil-matte-bronzer/long-lasting-buildable-bronzer">LINK</a></p></td>
															<td  style="width:20%">Chocolate Soleil Matte Bronzer</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/da49fd4d-9457-4a11-8f49-fbbea2361044.html', '_blank');">Verona Audrey</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															toofaced78															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='442215'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="af6ba971-7d26-46dd-97f5-e1d87b85a372" class='PODtlUUID' name="PODtlUUID87">
															<input type="hidden" value="1" name="qty_po87">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/efc1506e-d595-49b0-9753-bf76007b3d64.html', '_blank');">XK22112644</a>															</td>
															<td>245.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.toryburch.com/en-us/handbags/crossbody-bags/fleming-diamond-perforated-double-zip-mini-bag/88048.html?color=734">LINK</a></p></td>
															<td  style="width:20%">FLEMING DIAMOND PERFORATED DOUBLE-ZIP MINI BAG</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/defe95cf-56ac-4233-8f49-2555b7f5e583.html', '_blank');">astrid hendrianti</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															tb77															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='4546830'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="bdf0e03f-bcf8-4157-a4d6-bff461331447" class='PODtlUUID' name="PODtlUUID88">
															<input type="hidden" value="1" name="qty_po88">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/34b7261f-6a0f-4997-ad4b-2ebc82daf746.html', '_blank');">YF22112622</a>															</td>
															<td>16.79															<td style="width:8%" class="incoming_qty2" >0</td>
															<td><p id="price"><a href="https://www.shopdisney.com/turning-red-water-bottle-and-plush-carrier-464027326657.html">LINK</a></p></td>
															<td  style="width:20%">Turning Red Water Bottle and Plush Carrier</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/b5934354-1f0d-47bc-8443-3e39257145e9.html', '_blank');">mutia saraswati</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															disney78															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Reject															</a>
															<span class="tambahan">
															 / <a href="#" class="keterangan_item" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="keterangan_item"> </a>
															
															</span>
															<input type='hidden' class='stat' value='02'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='0'>
															<input type='hidden' class='harga' value='541038'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="fba24203-cdb5-4a2a-ba96-fa00045fcb84" class='PODtlUUID' name="PODtlUUID89">
															<input type="hidden" value="1" name="qty_po89">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>YF22112622</p>															</td>
															<td>19.99															<td style="width:8%" class="incoming_qty2" >0</td>
															<td><p id="price"><a href="https://www.shopdisney.com/turning-red-stainless-steel-water-bottle-with-built-in-straw-464022637697.html">LINK</a></p></td>
															<td  style="width:20%">Turning Red Stainless Steel Water Bottle with Built-In Straw</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/b5934354-1f0d-47bc-8443-3e39257145e9.html', '_blank');">mutia saraswati</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															disney78															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Reject															</a>
															<span class="tambahan">
															 / <a href="#" class="keterangan_item" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="keterangan_item"> </a>
															
															</span>
															<input type='hidden' class='stat' value='02'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='0'>
															<input type='hidden' class='harga' value='596507'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="129076e1-1342-4ad9-824c-c767c69cec11" class='PODtlUUID' name="PODtlUUID90">
															<input type="hidden" value="1" name="qty_po90">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/f9f8d5a4-8b4a-4aec-8970-e66660a6fff4.html', '_blank');">OS22112602</a>															</td>
															<td>59.95															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://pelacase.com/products/powder-blue-fin-eco-friendly-iphone-13-case">LINK</a></p></td>
															<td  style="width:20%">Powder blue fin Iphone 13 case </td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/551b7920-8057-4757-b8ec-8bb50c81e723.html', '_blank');">Fransisca Devita</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															pela77															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='1239173'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="b4adce42-ae7a-466b-8436-fee5ad5bf0fb" class='PODtlUUID' name="PODtlUUID91">
															<input type="hidden" value="1" name="qty_po91">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>OS22112602</p>															</td>
															<td>0.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://pelacase.com/products/sage-green-tiny-turtles-eco-friendly-iphone-13-case">LINK</a></p></td>
															<td  style="width:20%">Sage green tiny turtles iphone 13 case</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/551b7920-8057-4757-b8ec-8bb50c81e723.html', '_blank');">Fransisca Devita</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															pela77															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='0'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="da4fc42e-025e-4efb-a0b9-0c48aed70318" class='PODtlUUID' name="PODtlUUID92">
															<input type="hidden" value="1" name="qty_po92">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/f58734f4-442f-45fc-92bd-98a5e20dce0a.html', '_blank');">HZ22112525</a>															</td>
															<td>15.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.gymshark.com/products/gymshark-vital-seamless-2-0-light-tank-apricot-orange-marl-ss22">LINK</a></p></td>
															<td  style="width:20%">VITAL SEAMLESS 2.0 LIGHT TANK</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/6d0b2d7a-0d1e-4c8a-ad44-553cab897918.html', '_blank');">Natasha santoso</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															gymshark77															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='360010'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="cd8cf49f-896f-4601-9450-ee0c8823a08c" class='PODtlUUID' name="PODtlUUID93">
															<input type="hidden" value="1" name="qty_po93">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>HZ22112525</p>															</td>
															<td>30.40															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.gymshark.com/products/gymshark-elevate-asymmetric-tank-cement-brown-aw22">LINK</a></p></td>
															<td  style="width:20%">Elevate asymmetric tank</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/6d0b2d7a-0d1e-4c8a-ad44-553cab897918.html', '_blank');">Natasha santoso</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															gymshark77															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='626954'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="f0116302-8ae0-4a5c-999d-6af95db1af93" class='PODtlUUID' name="PODtlUUID94">
															<input type="hidden" value="1" name="qty_po94">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>HZ22112525</p>															</td>
															<td>13.50															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.gymshark.com/products/gymshark-adapt-animal-seamless-sports-bra-black-white">LINK</a></p></td>
															<td  style="width:20%">ADAPT ANIMAL SEAMLESS SPORTS BRA</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/6d0b2d7a-0d1e-4c8a-ad44-553cab897918.html', '_blank');">Natasha santoso</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															gymshark77															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='304009'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="d5354c64-5ebf-4742-bac5-bc2c91587740" class='PODtlUUID' name="PODtlUUID95">
															<input type="hidden" value="1" name="qty_po95">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>HZ22112525</p>															</td>
															<td>20.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.gymshark.com/products/gymshark-flex-high-waisted-leggings-burgundy-marl-aw21">LINK</a></p></td>
															<td  style="width:20%">FLEX HIGH WAISTED LEGGINGS</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/6d0b2d7a-0d1e-4c8a-ad44-553cab897918.html', '_blank');">Natasha santoso</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															gymshark77															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='496680'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="103348a0-a54e-4b6c-861e-3724e114d089" class='PODtlUUID' name="PODtlUUID96">
															<input type="hidden" value="1" name="qty_po96">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>HZ22112525</p>															</td>
															<td>32.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.gymshark.com/products/gymshark-vital-seamless-2-0-shorts-baked-maroon-marl-aw22">LINK</a></p></td>
															<td  style="width:20%">Vital seamless 2.0 short</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/6d0b2d7a-0d1e-4c8a-ad44-553cab897918.html', '_blank');">Natasha santoso</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															gymshark77															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='654688'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="4a26807d-75c6-4c1b-891f-7d3748f59ead" class='PODtlUUID' name="PODtlUUID97">
															<input type="hidden" value="1" name="qty_po97">
															<td rowspan='' valign='top'>
															<p style='color: white;font-size: 1px;'>HZ22112525</p>															</td>
															<td>17.00															<td style="width:8%" class="incoming_qty2" >0</td>
															<td><p id="price"><a href="https://www.gymshark.com/products/gymshark-v-neck-sports-bra-black-ss22">LINK</a></p></td>
															<td  style="width:20%">V neck sport bra</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/6d0b2d7a-0d1e-4c8a-ad44-553cab897918.html', '_blank');">Natasha santoso</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															gymshark77															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Reject															</a>
															<span class="tambahan">
															 / <a href="#" class="keterangan_item" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="keterangan_item"> OOS</a>
															
															</span>
															<input type='hidden' class='stat' value='02'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='0'>
															<input type='hidden' class='harga' value='364678'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="2f285940-4d08-416e-b5d6-ccd139ed4977" class='PODtlUUID' name="PODtlUUID98">
															<input type="hidden" value="1" name="qty_po98">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/c86e1811-5e1d-4609-a680-8b4c3b407210.html', '_blank');">HJ22101980</a>															</td>
															<td>149.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.bose.com/en_us/products/headphones/earbuds/bose-sport-earbuds.html#v=sport_earbuds_glacier_white">LINK</a></p></td>
															<td  style="width:20%">bose sport earbuds</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/15d2f150-10cf-484d-b063-b85ef43db37e.html', '_blank');">sari saparwadi</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															bestbuy73															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='2850880'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="76c11319-8b2f-417b-bf8d-a666405ccee3" class='PODtlUUID' name="PODtlUUID99">
															<input type="hidden" value="1" name="qty_po99">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/33e51ed4-4789-490c-a07e-e375ad33ab0c.html', '_blank');">JX21124073</a>															</td>
															<td>3.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.morphe.com/products/gloss-pop-face-eye-gloss">LINK</a></p></td>
															<td  style="width:20%">GLOSS POP FACE & EYE GLOSS</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/13cbd675-a4c0-4eb3-b892-4c500ee71157.html', '_blank');">Jasmine Mazaya Imanamayra</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															DOUBLE															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='88150'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="fde5e673-5e1d-455a-8fe7-f3eec3f78f85" class='PODtlUUID' name="PODtlUUID100">
															<input type="hidden" value="1" name="qty_po100">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/0c3af79e-91e7-47ed-8506-f72dd568aabe.html', '_blank');">PH21113602</a>															</td>
															<td>46.00															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.aloyoga.com/products/w6145r-high-waist-biker-short-black">LINK</a></p></td>
															<td  style="width:20%">High-Waist Biker Short</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/aa35ee1a-8d90-4630-b9b5-517f72107eaa.html', '_blank');">Zita Okarina</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															DOUBLE															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='848300'>
															</td>
															
															
															</td>
														</tr>
														  
														
														<tr >
														
															<input type="hidden" value="de31d2d4-1a6c-4a42-85ba-010f6efd331b" class='PODtlUUID' name="PODtlUUID101">
															<input type="hidden" value="1" name="qty_po101">
															<td rowspan='' valign='top'>
															<a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/po_invoice_controller/view_po_invoice/ae437dd1-48b1-4525-a5ad-563dc3cdb883.html', '_blank');">ZT21113097</a>															</td>
															<td>125.30															<td style="width:8%" class="incoming_qty2" >1</td>
															<td><p id="price"><a href="https://www.foreo.com/ufo-collection#ecommerce">LINK</a></p></td>
															<td  style="width:20%">UFO mini 2</td>
															<td  style="width:20%"><a href='javascript:void(0);' onclick="window.open('https://psbyhom.com/isms_customer_management/view_customer/1039ca1b-c32d-4816-99a9-5da705b8ac05.html', '_blank');">Cika Anisa</a></td>
															
															<td  style="width:18%" valign='top'>
													
															<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															DOUBLE															</a>
															
															</td>
													
														
															
															
															
															
															
														
														
															
															<td style="width:20%">
															
															<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
															Not Arrived															</a>
															<span class="tambahan">
															
															
															</span>
															<input type='hidden' class='stat' value='00'>
															<input type='hidden' class='qty_real' value='1'>
															<input type='hidden' class='incoming' value='1'>
															<input type='hidden' class='harga' value='2161065'>
															</td>
															
															
															</td>
														</tr>
														                                </tbody>
                            </table>
															<input type='hidden' name="total_row" id='total_row' value='101'>
	            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
					                        <div class="btn-toolbar">
						
								
                        </div>
					                    </div>
                </div>
            </div>
			</FORM>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection