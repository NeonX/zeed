<div class="h_line"></div>
<h1>M040 : CUSTOMER TYPE</h1>
<div style="float: right;"> <a class="customertype" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<link rel="stylesheet" href="../page/css/form.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../page/js/fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />

<script type="text/javascript" src="../page/js/fancyBox/source/jquery.fancybox.js"></script>
<script type="text/javascript">
    var self = this;

    self.table = 'customertype';
    self.caption = 'Goods Type List:';
    self.colNames = [
        'customertype_id', 'custtype_eng','custtype_th',
        'custtype_code', 'custtype_desc', 'deleteflag', 'action'
    ];
    self.colModel = [
        {name: 'customertype_id', index:'customertype_id', hidden: true},
        {name: 'custtype_eng', index: 'custtype_eng', width: 100, align: 'center'},
        {name: 'custtype_th', index: 'custtype_th', width: 100, align: 'center'},
        {name: 'custtype_code', index: 'custtype_code', width: 110, align: 'center'},
        {name: 'custtype_desc', index: 'custtype_desc', width: 110, align: 'center'},
        {name: 'deleteflag', index: 'deleteflag', width: 110, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_"<?php echo time(); ?>></script>

<table id="list-customertype"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset>
            <h1>0M40 : CUSTOMER TYPE</h1>
            <p>
                <label for="custtype_code">Customer Type (ENG): </label>
                <input id="custtype_code" name="custtype_code" type="text" />
                <span id="custtype_code_info">Customer Type (ENG) is require!</span>
            </p>
            <p>
                <label for="custtype_eng">Customer Type (ENG): </label>
                <input id="custtype_eng" name="custtype_eng" type="text" />
                <span id="custtype_eng_info">Customer Type (ENG) is require!</span>
            </p>
            <p>
                <label for="custtype_th">Customer Type (TH): </label>
                <input id="custtype_th" name="custtype_th" type="text" />
                <span id="custtype_th_info">Customer Type (TH) is require!</span>
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
                <label for="custtype_desc">custtype_desc: </label>
                <textarea id="custtype_desc" name="custtype_desc" cols="" rows=""></textarea>
            </p>
            <p class="btn">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="customertype" />
                <input id="customertype_id" name="customertype_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />
                <input id="save" name="save" type="submit" value="Save" />
                <input id="cancle" name="cancle" type="reset" value="Cancle" />
                <input id="delete" name="delete" type="button" value="Delete" />
                <input id="recovery" name="recovery" type="button" value="Recovery" />
            </p>
        </fieldset>
    </form>
</div>