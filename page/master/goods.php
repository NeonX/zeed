<div class="h_line"></div>
<h1>M031 : GOODS</h1>
<div style="float: right;"> <a class="goods" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<script type="text/javascript">
    var self = this;

    self.table = 'goods';
    self.caption = 'Goods Type List:';
    self.columns = [
        'goods_id', 'goodstype_id','goodscode', 'goodsname_eng', 
        'goodsname_th', 'goodsdesc', 'goodspicture', 'deleteflag', 'action'
    ]
    self.colNames = [
        'Goods ID', 'Goods Type ID','Goods Code', 'Goods Name (ENG)', 
        'Goods Name (TH)', 'Description', 'Picture', 'Status', 'Action'
    ],
    self.colModel = [
        {name: 'goods_id', index:'goods_id', hidden: true},
        {name: 'goodstype_id', index:'goodstype_id', hidden: true},
        {name: 'goodscode', index: 'goodscode', width: 100, align: 'center'},
        {name: 'goodsname_eng', index: 'goodsname_eng', width: 200, align: 'center'},
        {name: 'goodsname_th', index: 'goodsname_th', width:200, align: 'center'},
        {name: 'goodsdesc', index:'goodsdesc', hidden: true},
        {name: 'goodspicture', index:'goodspicture', hidden: true},
        {name: 'deleteflag', index: 'deleteflag', width: 60, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ]
</script>
<!--<script type="text/javascript" src="../js/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../js/jquery/jquery-ui-1.8.21.custom.min.js"></script>
<script type="text/javascript" src="../js/jqgrid/i18n/grid.locale-th.js"></script>
<script type="text/javascript" src="../js/jqgrid/jquery.jqGrid.min.js"></script>
<script type="text/javascript" src="../js/fancyBox/source/jquery.fancybox.js"></script>-->

<!-- Form -->
<!--<link rel="stylesheet" href="../css/form.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../js/fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />

<link href="../css/default.css" rel="stylesheet" type="text/css" />
<link href="../css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet" type="text/css" />
<link href="../css/jqgrid/ui.jqgrid.css" rel="stylesheet" type="text/css" />
<link href="../css/leftmenu_orange.css" rel="stylesheet" type="text/css" />-->

<script type="text/javascript" src="../page/js/com_type1.js?_=<?php echo time(); ?>"></script>
</script>
<style type="text/css">
.col1 {
    width: 400px;
    float: left;
}
.col2 {
    margin-top: 20px;
    width: 380px;
    float: left;
}
.picture {
    border: 1px solid red;
    clear: both;
    width: 300px;
    height: 250px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 15px;
}

div.fileinputs {
    position: relative;
}

div.fakefile {
    position: absolute;
    top: 0px;
    left: 0px;
    z-index: 1;
    width: 240px;
    margin-left: 135px;
}

input.file {
    position: relative;
    text-align: right;
    -moz-opacity:0 ;
    filter:alpha(opacity: 0);
    opacity: 0;
    z-index: 2;
    cursor: pointer;
}
input.ffile {
    width:160px;
}
</style>
<table id="list-goods"></table>
<div id="pager"></div>

<div id="container" style="display:none">
        <form id="customForm" action="../page/fileTransfer.php?action=upload" method="post" enctype="multipart/form-data" target="uploadtarget">
             <fieldset class="modal-header">
                <h3 class="modal-title">M031 : GOODS</h1>
            </fieldset>
            <fieldset class="modal-body col1">
                <p>
                    <label for="goodscode">Goods Code: </label>
                    <input id="goodscode" name="goodscode" type="text" />
                </p>
                <p>
                    <label for="goodsname_eng">Goods Name (ENG): </label>
                    <input id="goodsname_eng" name="goodsname_eng" type="text" />
                </p>
                <p>
                    <label for="goodsname_th">Goods Name (TH): </label>
                    <input id="goodsname_th" name="goodsname_th" type="text" />
                </p>
                <p>
                    <label for="goodstype_id">Good Type ID: </label>
                    <select id="goodstype_id" name="goodstype_id">
                        <option value="-1"> -- Please Select -- </option>
                    </select>
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
                    <label for="goodsdesc">Description: </label>
                    <textarea id="goodsdesc" name="goodsdesc" cols="" rows=""></textarea>
                </p>
            </fieldset>
            <fieldset class="col2">
                    <label for="picture" style="min-width: 115px;">Picture: </label>
                    <div class="fileinputs">
                        <input type="file" class="file" name="file" id="file" />
                        <div class="fakefile">
                            <input id="ffile" class="ffile" type="text"/>
                            <img src="../page/images/brows.png" style="vertical-align: middle;" class="brows"/>
                            <!--<button type="submit" id="upload" name="upload" value="upload" class="btn btn-success" style="margin-left: 10px;">
                                <i class="icon-plus icon-white"></i>
                                <span>Upload</span>
                            </button>-->
                        </div>
                    </div>
                    <div class="picture"><!--<img src="../page/images/no_image.jpg" alt="no image" />--></div>
            </fieldset>
            <fieldset class="modal-footer" style="clear: both;">
                 <p style="float: right;">
                    <iframe id="uploadtarget" name="uploadtarget" src="" style="width:0px;height:0px;border:0"></iframe>
                    <input id="table" name="table" type="hidden" value="goods" />
                    <input id="goods_id" name="goods_id" type="hidden" value="0" />
                    <input id="mode" name="mode" type="hidden" value="insert" />
                    <button type="submit" id="save" name="save" value="save" class="btn btn-success">
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