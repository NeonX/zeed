<div class="h_line"></div>
<h1>S050 : REPORT HEADER</h1>
<div style="float: right;"> <a class="screen" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<script type="text/javascript">
    var self = this;

    self.table = 'screen';
    self.caption = 'Report Header List:';
    self.columns = [
        'screen_id', 'scr_code','scrname_eng', 'scrname_th',
        'scr_type', 'deleteflag', 'action'
    ];
    self.colNames = [
        'Report Header ID', 'Report Header Code','Report Header (ENG)', 'Report Header (TH)',
        'Report Header Type', 'Status', 'Action'
    ];
    self.colModel = [
        {name: 'screen_id', index:'screen_id', hidden: true},
        {name: 'scr_code', index: 'scr_code', width: 100, align: 'center'},
        {name: 'scrname_eng', index: 'scrname_eng', width: 200, align: 'center'},
        {name: 'scrname_th', index: 'scrname_th', width: 130, align: 'center'},
        {name: 'scr_type', index: 'scr_type', hidden: true},
        {name: 'deleteflag', index: 'deleteflag', width: 130, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_=<?php echo time(); ?>"></script>

<table id="list-screen"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">S050 : REPORT HEADER</h1>
        </fieldset>
        <fieldset class="modal-body">
            <p>
                <label for="scr_code">Report Header Code: </label>
                <input id="scr_code" name="scr_code" type="text" />
            </p>
            <p>
                <label for="scrname_eng">Report Header (ENG): </label>
                <input id="scrname_eng" name="scrname_eng" type="text" />
            </p>
            <p>
                <label for="scrname_th">Report Header (TH): </label>
                <input id="scrname_th" name="scrname_th" type="text" />
            </p>
            <p>
                <label for="scr_type">Report Header Type: </label>
                <textarea id="scr_type" name="scr_type" cols="" rows=""></textarea>
            </p>
            <p>
                <label for="deleteflag">Use Status: </label>
                <select id="deleteflag" name="deleteflag">
                    <option value="-1"> -- Please Select -- </option>
                    <option value="0">Used</option>
                    <option value="1">Unuse</option>
                </select>
            </p>            
        </fieldset>
        <fieldset class="modal-footer">
            <p style="float: right;">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="screen" />
                <input id="screen_id" name="screen_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />

                <button type="submit" id="save" name="save" class="btn btn-success">
                    <i class="icon-plus-sign icon-white"></i>
                    <span>Save</span>
                </button>
                <button type="reset" id="cancle" name="cancle" class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Cancel</span>
                </button>
                <button type="button" id="delete" name="delete" class="btn btn-danger delete">
                    <i class="icon-minus-sign icon-white"></i>
                    <span>Delete</span>
                </button>
                <button type="button" id="recovery" name="recovery" class="btn btn-primary save">
                    <i class="icon-share-alt icon-white"></i>
                    <span>Recovery</span>
                </button>
            </p>
        </fieldset>
    </form>
</div>