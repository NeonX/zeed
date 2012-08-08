<div class="h_line"></div>
<h1>S040 : BANK ACCOUNT</h1>
<div style="float: right;"> <a class="unit" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<link rel="stylesheet" href="../page/css/form.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../page/js/fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />

<script type="text/javascript" src="../page/js/fancyBox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="../page/js/bank_account.js?_=<?php echo time(); ?>"></script>

<table id="list-bankaccount"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset>
            <h1>S040 : BANK ACCOUNT</h1>
            <p>
                <label for="unitcode">Count Unit Code: </label>
                <input id="unitcode" name="unitcode" type="text" />
                <span id="unitcode_info">Count Unit Code is require!</span>
            </p>
            <p>
                <label for="unitnameeng">Count Unit (ENG): </label>
                <input id="unitnameeng" name="unitnameeng" type="text" />
                <span id="unitnameeng_info">Count Unit (ENG) is require!</span>
            </p>
            <p>
                <label for="unitnameth">Count Unit (TH): </label>
                <input id="unitnameth" name="unitnameth" type="text" />
                <span id="unitnameth_info">Count Unit (TH) is require!</span>
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
            <p>
                <label for="unitdesc">Descrition: </label>
                <textarea id="unitdesc" name="unitdesc" cols="" rows=""></textarea>
            </p>
            <p class="btn">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="unit" />
                <input id="unit_id" name="unit_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />
                <input id="save" name="save" type="submit" value="Save" />
                <input id="cancle" name="cancle" type="reset" value="Cancle" />
                <input id="delete" name="delete" type="button" value="Delete" />
                <input id="recovery" name="recovery" type="button" value="Recovery" />
            </p>
        </fieldset>
    </form>
</div>