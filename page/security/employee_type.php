<div class="h_line"></div>
<h1>P030 : EMPLOYEE TYPE</h1>
<div style="float: right;"> <a class="employeetype" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<link rel="stylesheet" href="../page/css/form.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../page/js/fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />

<script type="text/javascript" src="../page/js/fancyBox/source/jquery.fancybox.js"></script>
<script type="text/javascript">
    var self = this;

    self.table = 'employeetype';
    self.caption = 'Goods Type List:';
    self.colNames = [
        'employeetype_id', 'emptype_code', 'emptype_th','emptype_eng', 'deleteflag', 'action'
    ];
    self.colModel = [
        {name: 'employeetype_id', index:'employeetype_id', hidden: true},
        {name: 'emptype_code', index: 'emptype_code', width: 115, align: 'center'},
        {name: 'emptype_th', index: 'emptype_th', width: 165, align: 'center'},
        {name: 'emptype_eng', index: 'emptype_eng', width: 165, align: 'center'},
        {name: 'deleteflag', index: 'deleteflag', width: 115, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_"<?php echo time(); ?>></script>

<table id="list-employeetype"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset>
            <h1>P030 : EMPLOYEE TYPE</h1>
             <p>
                <label for="emptype_code">Employee Type Code: </label>
                <input id="emptype_code" name="emptype_code" type="text" />
                <span id="emptype_code_info">Employee Type Code is require!</span>
            </p>
            <p>
                <label for="emptype_th">Employee Type Name (ENG): </label>
                <input id="emptype_th" name="emptype_th" type="text" />
                <span id="emptype_th_info">Employee Type Name (ENG) is require!</span>
            </p>
            <p>
                <label for="emptype_eng">Employee Type Name (ENG): </label>
                <input id="emptype_eng" name="emptype_eng" type="text" />
                <span id="emptype_eng_info">Employee Type Name (ENG) is require!</span>
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
                <input id="table" name="table" type="hidden" value="employeetype" />
                <input id="employeetype_id" name="employeetype_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />
                <input id="save" name="save" type="submit" value="Save" />
                <input id="cancle" name="cancle" type="reset" value="Cancle" />
                <input id="delete" name="delete" type="button" value="Delete" />
                <input id="recovery" name="recovery" type="button" value="Recovery" />
            </p>
        </fieldset>
    </form>
</div>