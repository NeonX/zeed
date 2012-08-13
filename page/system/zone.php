<div class="h_line"></div>
<h1>S020 : ZONE</h1>
<div style="float: right;"> <a class="zone" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<script type="text/javascript">
    var self = this;

    self.table = 'zone';
    self.caption = 'Zone List:';
    self.columns = [
        'zone_id', 'zone_code','zonename_eng', 'zonename_th',
        'zone_desc', 'deleteflag', 'action'
    ];
    self.colNames = [
        'Zone ID', 'Zone Code','Zone (ENG)', 'Zone (TH)',
        'Description', 'Status', 'Action'
    ];
    self.colModel = [
        {name: 'zone_id', index:'zone_id', hidden: true},
        {name: 'zone_code', index: 'zone_code', width: 100, align: 'center'},
        {name: 'zonename_eng', index: 'zonename_eng', width: 200, align: 'center'},
        {name: 'zonename_th', index: 'zonename_th', width: 130, align: 'center'},
        {name: 'zone_desc', index: 'zone_desc', hidden: true},
        {name: 'deleteflag', index: 'deleteflag', width: 130, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_=<?php echo time(); ?>"></script>

<table id="list-zone"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">S020 : ZONE</h1>
        </fieldset>
        <fieldset class="modal-body">
            <p>
                <label for="zone_code">Zone Code: </label>
                <input id="zone_code" name="zone_code" type="text" />
            </p>
            <p>
                <label for="zonename_eng">Zone (ENG): </label>
                <input id="zonename_eng" name="zonename_eng" type="text" />
            </p>
            <p>
                <label for="zonename_th">Zone (TH): </label>
                <input id="zonename_th" name="zonename_th" type="text" />
            </p>
            <p>
                <label for="deleteflag">Use Status: </label>
                <select id="deleteflag" name="deleteflag">
                    <option value="-1"> -- Please Select -- </option>
                    <option value="0">Used</option>
                    <option value="1">Unuse</option>
                </select>
            </p>
            <p>
                <label for="zone_desc">Description: </label>
                <textarea id="zone_desc" name="zone_desc" cols="" rows=""></textarea>
            </p>
        </fieldset>
        <fieldset class="modal-footer">
            <p style="float: right;">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="zone" />
                <input id="zone_id" name="zone_id" type="hidden" value="0" />
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