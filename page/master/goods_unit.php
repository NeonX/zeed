<?php 
$ref = $_SERVER['HTTP_REFERER'] == 'http://' . $_SERVER['HTTP_HOST'] . '/zeed/page/master/';
?>

<div class="h_line"></div>
<h1>M032 : GOODS UNIT</h1>

<div class="cleaner"></div>
<?php
$display = 'none';
if ($ref) {
    echo '<script type="text/javascript" src="../../libs/jquery/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../../libs/jquery/jquery-ui-1.8.21.custom.min.js"></script>
    <script type="text/javascript" src="../../libs/jqgrid/i18n/grid.locale-th.js"></script>
    <script type="text/javascript" src="../../libs/jqgrid/jquery.jqGrid.min.js"></script>
    <script type="text/javascript" src="../../libs/fancyBox/source/jquery.fancybox.js"></script>


    <link rel="stylesheet" href="../../libs/fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../libs/bootstrap.min.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../libs/jquery/ui-lightness/jquery-ui-1.8.21.custom.css" type="text/css" />
    <link rel="stylesheet" href="../../libs/jqgrid/jqgrid/ui.jqgrid.css" type="text/css" />

    <link href="../css/default.css" rel="stylesheet" type="text/css" />
    <link href="../css/leftmenu_orange.css" rel="stylesheet" type="text/css" />
    <link href="../css/form.css" rel="stylesheet" type="text/css" media="screen" />';
    
    $display = 'block';

}
?>
<script type="text/javascript">
var self = this;
$(function () {
    self.table = { main: 'goods', sub: 'goodsunit' };
    self.caption = { main: 'Goods Type List:', sub: 'Goods Price List:' } ;

    self.columns = {
        main: [
            'goods_id', 'goodstype_id', 'goodstype_th', 'goodscode', 'goodsname_eng', 
            'goodsname_th', 'goodsdesc', 'goodspicture', 'deleteflag', 'action'
        ], 
        sub: [
            'goodsunit_id', 'goods_id','unit_id', 'unitside', 
            'use_instock', 'use_inorder',  'deleteflag', 'table', 'action'
        ]
    };

    self.colNames = {
        main: [
            'Goods ID', 'Goods Type ID', 'Goods Type Name', 'Goods Code', 'Goods Name (ENG)', 
            'Goods Name (TH)', 'Description', 'Picture', 'Status', 'Action'
        ], 
        sub: [
            'Goods Price ID', 'Goods ID','Count Unit', 'Unit Side',
            'Unit InStore', 'Unit InOrder', 'Status', 'Table', 'Mode'
        ]
    };

    self.colModel = {
        main: [
            {name: 'goods_id', index:'goods_id', hidden: true},
            {name: 'goodstype_id', index:'goodstype_id', hidden: true},
            {name: 'goodstype_th', index:'goodstype_th', hidden: true},
            {name: 'goodscode', index: 'goodscode', width: 100, align: 'center'},
            {name: 'goodsname_eng', index: 'goodsname_eng', width: 200, align: 'center'},
            {name: 'goodsname_th', index: 'goodsname_th', width:200, align: 'center'},
            {name: 'goodsdesc', index:'goodsdesc', hidden: true},
            {name: 'goodspicture', index:'goodspicture', hidden: true},
            {name: 'deleteflag', index: 'deleteflag', width: 60, align: 'center'},
            {name: 'action',index: 'action', width:80, align: 'center'}
        ],
        sub: [
            {name: 'goodsprice_id', index:'goodsprice_id', hidden: true},
            {name: 'goods_id', index:'goods_id', editable: true, hidden: true,
                editoptions: {
                  dataInit: function(element) {
                    $(element).val(formData.goods_id);
                  }
                }
            },
            {name: 'unit_id', index:'unit_id', width: 145, editable: true, edittype:"select", editoptions: {},editrules: { required: true }, align: 'center'},
            {name: 'unitside', index: 'unitside', width: 145, editable: true, align: 'center' },
            {name: 'use_instock', index: 'use_instock', width: 190, align: 'center', editable: true, edittype:"select", editoptions: {value: "0:Use;1:Not use"}},
            {name: 'use_inorder', index: 'use_inorder', width: 190, align: 'center', editable: true, edittype:"select", editoptions: {value: "0:Use;1:Not use"}},
            {name: 'deleteflag', index: 'deleteflag', width: 100, align: 'center', editable: true, edittype:"select", editoptions: {value: "0:Use;1:Not use"}},
            {name: 'table', index:'table', editable: true, hidden: true,
                editoptions: {
                  dataInit: function(element) {
                    $(element).val(self.table.sub);
                  }
                }
            },
            {name: 'mode', index:'mode', editable: true, hidden: true,
                editoptions: {
                  dataInit: function(element) {
                       $(element).val(self.smode);
                  }
                }
            }
        ]
    };
});

</script>
<script type="text/javascript" src="../<?php echo !$ref ? 'page/' : ''; ?>js/com_type2.js?_=<?php echo time(); ?>"></script>
<style type="text/css">

select.editable {
    width: 90px;
    margin: 4px;
}
input.editable {
    width: 80px;
}
.col1 {
    width: 400px;
    float: left;
}
.col2 {
    width: 400px;
    float: left;
}

.grid {
    clear: both;
    width: 820px;
    float: left;
    margin-top: -30px;
}
</style>

<table id="list-goods"></table>
<div id="pager"></div>

<div id="container" style="display:<?php echo $display; ?>">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">M032 : GOODS UNIT (ADD &amp; EDIT)</h1>
        </fieldset>
        <fieldset class="modal-body col1">
            <p>
                <label for="goods_code">Goods Code: </label>
                <input id="goods_code" name="goods_code" type="text" />
            </p>
            <p>
                <label for="goods_name_eng">Goods Name (ENG): </label>
                <input id="goods_name_eng" name="goods_name_eng" type="text" />
            </p>
            </fieldset>
            <fieldset class="modal-body col2">
            <p>
                <label for="goods_type">Goods Type: </label>
                <input id="goods_type" name="goods_type" type="text" />
            </p>
            <p>
                <label for="goods_name_th">Goods Name (TH): </label>
                <input id="goods_name_th" name="goods_name_th" type="text" />
            </p>
        </fieldset>
        <fieldset class="modal-body grid">
            <div style="float: right;"><input style="height:24px;width:24px;" id="record_add" type="image" src="../page/images/icons/record-add-24x24.png" /></div>
            <div style="clear:both;"></div>
            <table id="list-goodsunit"></table>
        </fieldset>
        <fieldset class="modal-footer" style="clear:both;">
            <p style="float: right;">
                <input id="date" name="create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
                <input id="by" name="create_by" type="hidden" value="1" />
                <input id="table" name="table" type="hidden" value="unit" />
                <input id="unit_id" name="unit_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />

                <button type="button" id="save" name="save" class="btn btn-success">
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