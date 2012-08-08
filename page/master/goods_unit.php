<div class="h_line"></div>
<h1>M060 : GOODS PRICE</h1>
<div style="float: right;"> <a class="goodsprice" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<link rel="stylesheet" href="../page/css/form.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../page/js/fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />

<script type="text/javascript" src="../page/js/fancyBox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="../page/js/goods_price.js"></script>

<table id="list-goodsprice"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset>
            <h1>M060 : GOODS PRICE</h1>
            <p>
                <label for="goods_id">Good ID: </label>
                <select id="goods_id" name="goods_id">
                    <option value="-1"> -- Please Select -- </option>
                </select>
                <span id="goods_id_info">Good ID Code is require!</span>
            </p>
            <p>
                <label for="unit_id">Unit ID: </label>
                <select id="unit_id" name="unit_id">
                    <option value="-1"> -- Please Select -- </option>
                </select>
                <span id="unit_id_info">Unit ID is require!</span>
            </p>
            <p>
                <label for="currency_id">Currency ID: </label>
                <select id="currency_id" name="currency_id">
                    <option value="-1"> -- Please Select -- </option>
                </select>
                <span id="currency_id_info">Currency ID is require!</span>
            </p>
            </p>
            <p>
                <label for="cost">Cost: </label>
                <input id="cost" name="cost" type="text" />
                <span id="cost_info">Cost is require!</span>
            </p>
            </p>
            <p>
                <label for="price">Price: </label>
                <input id="price" name="price" type="text" />
                <span id="price_info">Price (TH) is require!</span>
            </p>
            </p>
            <p>
                <label for="discount">Discount: </label>
                <input id="discount" name="discount" type="text" />
                <span id="discount_info">Discount is require!</span>
            </p>
            </p>
            <p>
                <label for="effective_date">Effective Date: </label>
                <input id="effective_date" name="effective_date" type="text" />
                <span id="effective_info">Effective Date is require!</span>
            </p>
            <p>
                <label for="deleteflag">Use Status: </label>
                <select id="deleteflag" name="deleteflag">
                    <option value="-1"> -- Please Select -- </option>
                    <option value="0">Used</option>
                    <option value="1">Unuse</option>
                </select>
                <span id="deleteflag_info">Use Status is require!</span>
            </p>
            <p class="btn">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="goodsprice" />
                <input id="goodsprice_id" name="goodsprice_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />
                <input id="save" name="save" type="submit" value="Save" />
                <input id="cancle" name="cancle" type="reset" value="Cancle" />
                <input id="delete" name="delete" type="button" value="Delete" />
                <input id="recovery" name="recovery" type="button" value="Recovery" />
            </p>
        </fieldset>
    </form>
</div>