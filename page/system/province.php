<div class="h_line"></div>
<h1>S021 : PROVINCE</h1>
<div style="float: right;"> <a class="province" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<script type="text/javascript">
    var self = this;

    self.table = 'province';
    self.caption = 'Province List:';
    self.columns = [
        'province_id', 'zone_id','province_no', 'province_eng',
        'province_th', 'deleteflag', 'action'
    ];
    self.colNames = [
        'Province ID', 'Zone Code','Province No', 'Province (EN)',
        'Province (TH)', 'Status', 'Action'
    ];
    self.colModel = [
        {name: 'province_id', index:'province_id', hidden: true},
        {name: 'zone_id', index: 'zone_id', hidden: true},
        {name: 'province_no', index: 'province_no', width: 100, align: 'center'},
        {name: 'province_eng', index: 'province_eng', width: 200, align: 'center'},
        {name: 'province_th', index: 'province_th', width: 130, align: 'center'},
        {name: 'deleteflag', index: 'deleteflag', width: 130, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_=<?php echo time(); ?>"></script>

<table id="list-province"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">S021 : PROVINCE</h1>
        </fieldset>
        <fieldset class="modal-body">
            <p>
                <label for="zone_id">zone Code: </label>
                <input id="zone_id" name="zone_id" type="text" />
            </p>
            <p>
                <label for="province_no">Province No: </label>
                <input id="province_no" name="province_no" type="text" />
            </p>
            <p>
                <label for="province_eng">Province (EN): </label>
                <input id="province_eng" name="province_eng" type="text" />
            </p>
            <p>
                <label for="province_th">Province (TH): </label>
                <input id="province_th" name="province_th" type="text" />
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
                <input id="table" name="table" type="hidden" value="province" />
                <input id="province_id" name="province_id" type="hidden" value="0" />
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