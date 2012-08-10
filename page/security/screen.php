<div class="h_line"></div>
<h1>P010 : SCREEN</h1>
<div style="float: right;"> <a class="screen" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<link rel="stylesheet" href="../page/css/form.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../page/js/fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />

<script type="text/javascript" src="../page/js/fancyBox/source/jquery.fancybox.js"></script>
<script type="text/javascript">
    var self = this;

    self.table = 'screen';
    self.caption = 'Screen List:';
    self.colNames = [
        'screen_id', 'scr_code', 'scrname_eng','scrname_th', 'deleteflag', 'action'
    ];
    self.colModel = [
        {name: 'screen_id', index:'screen_id', hidden: true},
        {name: 'scr_code', index: 'scr_code', width: 115, align: 'center'},
        {name: 'scrname_eng', index: 'scrname_eng', width: 165, align: 'center'},
        {name: 'scrname_th', index: 'scrname_th', width: 165, align: 'center'},
        {name: 'deleteflag', index: 'deleteflag', width: 115, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_"<?php echo time(); ?>></script>

<table id="list-screen"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset>
            <h1>P010 : SCREEN</h1>
             <p>
                <label for="scr_code">Screen Code: </label>
                <input id="scr_code" name="scr_code" type="text" />
                <span id="scr_code_info">Screen Code is require!</span>
            </p>
            <p>
                <label for="scrname_eng">Screen Name (ENG): </label>
                <input id="scrname_eng" name="scrname_eng" type="text" />
                <span id="scrname_eng_info">Screen Name (ENG) is require!</span>
            </p>
            <p>
                <label for="scrname_th">Screen Name (ENG): </label>
                <input id="scrname_th" name="scrname_th" type="text" />
                <span id="scrname_th_info">Screen Name (ENG) is require!</span>
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
                <input id="table" name="table" type="hidden" value="screen" />
                <input id="screen_id" name="screen_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />
                <input id="save" name="save" type="submit" value="Save" />
                <input id="cancle" name="cancle" type="reset" value="Cancle" />
                <input id="delete" name="delete" type="button" value="Delete" />
                <input id="recovery" name="recovery" type="button" value="Recovery" />
            </p>
        </fieldset>
    </form>
</div>