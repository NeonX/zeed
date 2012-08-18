<div class="h_line"></div>
<h1>M040 : CUSTOMER TYPE</h1>
<div style="float: right;"> <a class="customertype" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<script type="text/javascript">
    var self = this;

    self.table = 'customertype';
    self.caption = 'Customer Type List:';
    self.columns = [
        'customertype_id','custtype_code', 'custtype_eng','custtype_th',
        'custtype_desc', 'deleteflag', 'action'
    ];
    self.colNames = [
        'Customer Type ID', 'Code (ENG Only)', 'Customer Type (ENG)','Customer Type (TH)',
        'Description', 'Status', 'Action'
    ];
    self.colModel = [
        {name: 'customertype_id', index:'customertype_id', hidden: true},
        {name: 'custtype_code', index: 'custtype_code', width: 100, align: 'center'},
        {name: 'custtype_eng', index: 'custtype_eng', width: 200, align: 'center'},
        {name: 'custtype_th', index: 'custtype_th', width: 200, align: 'center'},
        {name: 'custtype_desc', index: 'custtype_desc', hidden: true},
        {name: 'deleteflag', index: 'deleteflag', width:60, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_=<?php echo time(); ?>"></script>

<table id="list-customertype"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">0M40 : CUSTOMER TYPE</h1>
        </fieldset>
        <fieldset class="modal-body">
            <p>
                <label for="custtype_code">Code (ENG Only): </label>
                <input id="custtype_code" name="custtype_code" type="text" />
            </p>
            <p>
                <label for="custtype_eng">Customer Type (ENG): </label>
                <input id="custtype_eng" name="custtype_eng" type="text" />
            </p>
            <p>
                <label for="custtype_th">Customer Type (TH): </label>
                <input id="custtype_th" name="custtype_th" type="text" />
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
                <label for="custtype_desc">Description: </label>
                <textarea id="custtype_desc" name="custtype_desc" cols="" rows=""></textarea>
            </p>
        </fieldset>
        <fieldset class="modal-footer">
            <p style="float: right;">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="customertype" />
                <input id="customertype_id" name="customertype_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />

                <button type="submit" id="save" name="save" class="btn btn-success">
                    <i class="icon-plus-sign icon-white"></i>
                    <span>Save</span>
                </button>
                <button type="reset" id="cancel" name="cancel" class="btn btn-warning cancel">
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
