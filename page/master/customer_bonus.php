<?php 
$ref = $_SERVER['HTTP_REFERER'] == 'http://' . $_SERVER['HTTP_HOST'] . '/zeed/page/master/';
?>

<div class="h_line"></div>
<h1>M042 : CUSTOMER BONUS</h1>

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
    self.table = { main: 'customer', sub: 'customerbonus' };
    self.caption = { main: 'Customer List::', sub: 'Customer Bonus List:' } ;

    self.columns = {
        main: [
            'customer_id', 'customertype_id', 'cust_code', 'cust_nameeng', 'cust_nameth', 'deleteflag', 'action'
        ], 
        sub: [
            'customerbonus_id', 'customer_id','order_no', 'order_date', 
            'got_point', 'use_point',  'deleteflag', 'table', 'action'
        ]
    };

    self.colNames = {
        main: [
            'Customer ID', 'Customer Type ID', 'Customer Code', 'Customer Name (ENG)', 
            'Customer Name (TH)', 'Status', 'Action'
        ], 
        sub: [
            'Customer Bonus ID', 'Customer ID','Order No', 'Order Date',
            'Got Bonus Point', 'Use Point', 'Table', 'Mode'
        ]
    };

    self.colModel = {
        main: [
            {name: 'customer_id', index:'customer_id', hidden: true},
            {name: 'customertype_id', index:'customertype_id', hidden: true},
            {name: 'cust_code', index:'cust_code', width: 150, align: 'center'},
            {name: 'cust_nameeng', index: 'cust_nameeng', width: 180, align: 'center'},
            {name: 'cust_nameth', index: 'cust_nameth', width: 180, align: 'center'},
            {name: 'deleteflag', index: 'deleteflag', width: 60, align: 'center'},
            {name: 'action',index: 'action', width:60, align: 'center'}
        ],
        sub: [
            {name: 'customerbonus_id', index:'customerbonus_id', hidden: true},
            {name: 'customer_id', index:'customer_id', editable: true, hidden: true,
                editoptions: {
                  dataInit: function(element) {
                    $(element).val(formData.customer_id);
                  }
                }
            },
            {name: 'order_no', index: 'order_no', width: 200, editable: true, align: 'center' },
            {name: 'order_date', index: 'order_date', width: 200, editable: true, align: 'center' },
            {name: 'got_point', index: 'got_point', width: 200, editable: true, align: 'center' },
            {name: 'use_point', index: 'use_point', width: 180, editable: true, align: 'center' },
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

<table id="list-customer"></table>
<div id="pager"></div>

<div id="container" style="display:<?php echo $display; ?>">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">M042 : CUSTOMER BONUS (ADD &amp; EDIT)</h1>
        </fieldset>
        <fieldset class="modal-body col1">
            <p>
                <label for="customer_code">Customer Code: </label>
                <input id="customer_code" name="customer_code" type="text" />
            </p>
            <p>
                <label for="customer_name_eng">Customer Name (ENG): </label>
                <input id="customer_name_eng" name="customer_name_eng" type="text" />
            </p>
            </fieldset>
            <fieldset class="modal-body col2">
            <p>
                <label for="customer_type">Customer Type: </label>
                <input id="customer_type" name="customer_type" type="text" />
            </p>
            <p>
                <label for="customer_name_th">Customer Name (TH): </label>
                <input id="customer_name_th" name="customer_name_th" type="text" />
            </p>
        </fieldset>
        <fieldset class="modal-body grid">
            <div style="float: right;"><input style="height:24px;width:24px;" id="record_add" type="image" src="../page/images/icons/record-add-24x24.png" /></div>
            <div style="clear:both;"></div>
            <table id="list-customerbonus"></table>
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