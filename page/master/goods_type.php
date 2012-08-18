<div class="h_line"></div>
<h1>M030 : GOODS TYPE</h1>
<div style="float: right;"> <a class="goodstype" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>
<div class="cleaner"></div>
<script type="text/javascript">
    var self = this;

    self.table = 'goodstype';
    self.caption = 'Goods Type List:';
    self.columns = [
        'goodstype_id', 'goodstype_eng','goodstype_th',
        'goodstype_desc', 'deleteflag', 'action'
    ];
    self.colNames = [
        'Goods Type ID', 'Goods Type (ENG)','Goods Type (TH)',
        'Description', 'Status', 'Action'
    ];

    self.colModel = [
        {name: 'goodstype_id', index:'goodstype_id', hidden: true},
        {name: 'goodstype_eng', index: 'goodstype_eng', width: 150, align: 'center'},
        {name: 'goodstype_th', index: 'goodstype_th', width: 150, align: 'center'},
        {name: 'goodstype_desc', index: 'goodstype_desc', width: 200, align: 'center'},
        {name: 'deleteflag', index: 'deleteflag', width: 60, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ];
</script>
<script type="text/javascript" src="../page/js/com_type1.js?_=<?php echo time(); ?>"></script>

<table id="list-goodstype"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">M030 : GOODS TYP</h1>
        </fieldset>
        <fieldset class="modal-body">
            <p>
                <label for="goodstype_eng">Goods Type (ENG): </label>
                <input id="goodstype_eng" name="goodstype_eng" type="text" />
            </p>
            <p>
                <label for="goodstype_th">Goods Type (TH): </label>
                <input id="goodstype_th" name="goodstype_th" type="text" />
            <p>
                <label for="deleteflag">Use Status: </label>
                <select id="deleteflag" name="deleteflag">
                    <option value="-1"> -- Please Select -- </option>
                    <option value="0">Used</option>
                    <option value="1">Unuse</option>
                </select>
            </p>
            <p>
                <label for="goodstype_desc">Description: </label>
                <textarea id="goodstype_desc" name="goodstype_desc" cols="" rows=""></textarea>
            </p>
        </fieldset>
        <fieldset class="modal-footer">
            <p style="float: right; height: 20px;">
                <input id="table" name="table" type="hidden" value="goodstype" />
                <input id="goodstype_id" name="goodstype_id" type="hidden" value="0" />
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
