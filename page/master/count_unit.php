<div class="h_line"></div>
<h1>M010 : COUNT UNIT</h1>
<div style="float: right;"> <a class="unit" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<script type="text/javascript">
    var self = this;

    self.table = 'unit';
    self.caption = 'Count Unit List:';
    self.columns = [
        'unit_id', 'unitcode','unitnameeng', 'unitnameth',
        'unitdesc', 'deleteflag', 'action'
    ];
    self.colNames = [
        'Count Unit ID', 'Count Unit Code','Count Unit (ENG)', 'Count Unit (TH)',
        'Description', 'Status', 'Action'
    ];
    self.colModel = [
        {name: 'unit_id', index:'unit_id', hidden: true},
        {name: 'unitcode', index: 'unitcode', width: 100, align: 'center'},
        {name: 'unitnameeng', index: 'unitnameeng', width: 200, align: 'center'},
        {name: 'unitnameth', index: 'unitnameth', width: 200, align: 'center'},
        {name: 'unitdesc', index: 'unitdesc', hidden: true},
        {name: 'deleteflag', index: 'deleteflag', width: 60, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_=<?php echo time(); ?>"></script>

<table id="list-unit"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
       <fieldset class="modal-header">
            <h3 class="modal-title">M010 : COUNT UNIT</h1>
        </fieldset>
        <fieldset class="modal-body">
            <p>
                <label for="unitcode">Count Unit Code: </label>
                <input id="unitcode" name="unitcode" type="text" />
            </p>
            <p>
                <label for="unitnameeng">Count Unit (ENG): </label>
                <input id="unitnameeng" name="unitnameeng" type="text" />
            </p>
            <p>
                <label for="unitnameth">Count Unit (TH): </label>
                <input id="unitnameth" name="unitnameth" type="text" />
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
                <label for="unitdesc">Description: </label>
                <textarea id="unitdesc" name="unitdesc" cols="" rows=""></textarea>
            </p>
        </fieldset>
        <fieldset class="modal-footer">
            <p style="float: right;">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="unit" />
                <input id="unit_id" name="unit_id" type="hidden" value="0" />
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