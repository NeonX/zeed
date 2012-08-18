<div class="h_line"></div>
<h1>M020 : CURRENCY &amp; EXCHANGE RATE</h1>
<div style="float: right;"> <a class="currency" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<link rel="stylesheet" href="../page/css/form.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../page/js/fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />

<script type="text/javascript" src="../page/js/fancyBox/source/jquery.fancybox.js"></script>
<script type="text/javascript">
    var self = this;
    self.colNames = [
        'customertype_id', 'custtype_eng','custtype_th',
        'custtype_code', 'custtype_desc', 'deleteflag', 'action'
    ],
    self.colModel = [
        {name: 'customertype_id', index:'customertype_id', hidden: true},
        {name: 'custtype_eng', index: 'custtype_eng', width: 100, align: 'center'},
        {name: 'custtype_th', index: 'custtype_th', width: 100, align: 'center'},
        {name: 'custtype_code', index: 'custtype_code', width: 110, align: 'center'},
        {name: 'custtype_desc', index: 'custtype_desc', width: 110, align: 'center'},
        {name: 'deleteflag', index: 'deleteflag', width: 110, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ]
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_=<?php echo time(); ?>"></script>

<table id="list-currency"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset>
            <h1>M020 : CURRENCY &amp; EXCHANGE RATE</h1>
            <p>
                <label for="currcode">Currency Code: </label>
                <input id="currcode" name="currcode" type="text" />
                <span id="currcode_info">Currency Code is require!</span>
            </p>
            <p>
                <label for="currdesceng">Currency Description (ENG): </label>
                <input id="currdesceng" name="currdesceng" type="text" />
                <span id="currdesceng_info">Currency Description (ENG) is require!</span>
            </p>
            <p>
                <label for="currdescth">Currency Description (TH): </label>
                <input id="currdescth" name="currdescth" type="text" />
                <span id="currdescth_info">Currency Description (TH) is require!</span>
            </p>
            <p>
                <label for="currabbveng">Currency abbv (ENG): </label>
                <input id="currabbveng" name="currabbveng" type="text" />
                <span id="currabbveng_info">Currency abbv (ENG) is require!</span>
            </p>
            <p>
                <label for="currabbvth">Currency abbv (TH): </label>
                <input id="currabbvth" name="currabbvth" type="text" />
                <span id="currabbvth_info">Currency abbv (TH) is require!</span>
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
                <input id="table" name="table" type="hidden" value="currency" />
                <input id="currency_id" name="currency_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />
                <input id="save" name="save" type="submit" value="Save" />
                <input id="cancel" name="cancel" type="reset" value="Cancle" />
                <input id="delete" name="delete" type="button" value="Delete" />
                <input id="recovery" name="recovery" type="button" value="Recovery" />
            </p>
        </fieldset>
    </form>
</div>
