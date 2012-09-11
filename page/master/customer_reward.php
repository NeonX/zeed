<?php
$ref = $_SERVER['HTTP_REFERER'] == 'http://' . $_SERVER['HTTP_HOST'] . '/zeed/page/master/';
?>

<div class="h_line"></div>
<h1>M043 : CUSTOMER REWARD</h1>

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
        self.table = { main: 'customer', sub: 'customerreward' };
        self.caption = { main: 'Customer List:', sub: 'Customer Reward List:' } ;

        self.columns = {
            main: [
                'customer_id', 'customertype_id', 'cust_code', 'cust_nameeng', 'cust_nameth', 
                'cust_phone', 'cust_fax', 'cust_email' , 'isperson', 'contact_name',
                'contact_phone', 'contact_email' , 'contact_dob','deleteflag', 'action'
            ], 
            sub: [
                'customerreward_id', 'customer_id','get_date', 'get_goodsid', 'get_goodsqty',
                'get_unitid', 'get_byuserid',  'deleteflag', 'table', 'action'
            ]
        };

        self.colNames = {
            main: [
                'Customer ID', 'Customer Type ID', 'Customer Code', 'Customer Name (ENG)', 'Customer Name (TH)',
                'Customer Phone', 'Customer FAX', 'Customer Email', 'Is Person', 'Ccontact Name',
                'Contact Phone', 'Contact Email', 'Contact Dob', 'Status', 'Action'
            ], 
            sub: [
                'Customer Reward ID', 'Customer ID','Get Date', 'Get Goods Id', 'Get Goods QTY',
                'Get Unitid', 'Get By User Id', 'Status', 'Table', 'Mode'
            ]
        };

        self.colModel = {
            main: [
                {name: 'customer_id', index:'customer_id', hidden: true},
                {name: 'customertype_id', index:'customertype_id', hidden: true},
                {name: 'cust_code', index:'cust_code', width:150},
                {name: 'cust_nameeng', index: 'cust_nameeng', width: 175, align: 'center'},
                {name: 'cust_nameth', index: 'cust_nameth', width: 175, align: 'center'},
                {name: 'cust_phone', index: 'cust_phone', align: 'center', hidden: true},
                {name: 'cust_fax', index:'cust_fax', hidden: true},
                {name: 'cust_email', index:'cust_email', hidden: true},
                {name: 'isperson', index:'isperson', hidden: true},
                {name: 'contact_name', index:'contact_name', hidden: true},
                {name: 'contact_phone', index:'contact_phone', hidden: true},                
                {name: 'cust_email', index:'cust_email', hidden: true},
                {name: 'contact_dob', index:'contact_dob', hidden: true,  sorttype:"date"},
                {name: 'deleteflag', index: 'deleteflag', width: 60, align: 'center'},
                {name: 'action',index: 'action', width:80, align: 'center'}
            ],
            sub: [
                {name: 'customerreward_id', index:'customerreward_id', hidden: true},
                {name: 'customer_id', index:'customer_id', editable: true, hidden: true,
                    editoptions: {
                        dataInit: function(element) {
                            $(element).val(formData.goods_id);
                        }
                    }
                },
                {name: 'unit_id', index:'unit_id', width: 145, editable: true, edittype:"select", editoptions: {},editrules: { required: true }, align: 'center'},
                {name: 'unitside', index: 'unitside', width: 145, editable: true, align: 'center' },
                {name: 'use_instock', index: 'use_instock', width: 150, align: 'center', editable: true, edittype:"select", editoptions: {value: "0:Use;1:Not use"}},
                {name: 'use_inorder', index: 'use_inorder', width: 150, align: 'center', editable: true, edittype:"select", editoptions: {value: "0:Use;1:Not use"}},
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
                },
                {name: 'action',index: 'action', width:90, align: 'center'}
            ]
        };
    });

</script>
<script type="text/javascript" src="../<?php echo!$ref ? 'page/' : ''; ?>js/com_type2.js?_=<?php echo time(); ?>"></script>
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
            <h3 class="modal-title">M043 : CUSTOMER REWARD (ADD &amp; EDIT)</h1>
        </fieldset>
        <fieldset class="modal-body col1">
            <p>
                <label for="cust_code">Customer Code: </label>
                <input id="customer_code" name="cust_code" type="text" />
            </p>
            <p>
                <label for="cust_nameeng">Customer Name(ENG): </label>
                <input id="customer_name_eng" name="cust_nameeng" type="text" />
            </p>
        </fieldset>
        <fieldset class="modal-body col2">
            <p>
                <label for="customer_type">Customer Type: </label>
                <input id="customer_type" name="customer_type" type="text" />
            </p>
            <p>
                <label for="cust_nameth">Customer Name (TH): </label>
                <input id="customer_name_th" name="cust_nameth" type="text" />
            </p>
            <p>
                <label for="cust_bonut">Current Bonus Point: </label>
                <input id="cust_bonut" name="cust_bonut" type="text" />
            </p>
        </fieldset>
        <fieldset class="modal-body grid">
            <div style="float: right;"><input style="height:24px;width:24px;" id="record_add" type="image" src="../page/images/icons/record-add-24x24.png" /></div>
            <div style="clear:both;"></div>
            <table id="list-customerreward"></table>
        </fieldset>
        <fieldset class="modal-footer" style="clear:both;"></fieldset>
    </form>
</div>