<div class="h_line"></div>
<h1>M020 : USER GROUP</h1>
<div style="float: right;"> <a class="usergroup" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<link rel="stylesheet" href="../page/css/form.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../page/js/fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />

<script type="text/javascript" src="../page/js/fancyBox/source/jquery.fancybox.js"></script>
<script type="text/javascript">
    var self = this;

    self.table = 'usergroup';
    self.caption = 'Goods Type List:';
    self.colNames = [
        'usergroup_id', 'usergroup_code', 'usergroup_eng','usergroup_th', 'deleteflag', 'action'
    ];
    self.colModel = [
        {name: 'usergroup_id', index:'usergroup_id', hidden: true},
        {name: 'usergroup_code', index: 'usergroup_code', width: 115, align: 'center'},
        {name: 'usergroup_eng', index: 'usergroup_eng', width: 165, align: 'center'},
        {name: 'usergroup_th', index: 'usergroup_th', width: 165, align: 'center'},
        {name: 'deleteflag', index: 'deleteflag', width: 115, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_"<?php echo time(); ?>></script>

<table id="list-usergroup"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">M020 : USER GROUPE</h1>
        </fieldset>
        <fieldset class="modal-body">
             <p>
                <label for="usergroup_code">User Group Code: </label>
                <input id="usergroup_code" name="usergroup_code" type="text" />
            </p>
            <p>
                <label for="usergroup_eng">User Group Name (ENG): </label>
                <input id="usergroup_eng" name="usergroup_eng" type="text" />
            </p>
            <p>
                <label for="usergroup_th">User Group Name (ENG): </label>
                <input id="usergroup_th" name="usergroup_th" type="text" />
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
                <input id="table" name="table" type="hidden" value="usergroup" />
                <input id="usergroup_id" name="usergroup_id" type="hidden" value="0" />
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