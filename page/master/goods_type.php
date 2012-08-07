<div class="h_line"></div>
<h1>M030 : GOODS TYPE</h1>
<div style="float: right;"> <a class="goodstype" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<link rel="stylesheet" href="../page/css/form.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../page/js/fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />

<script type="text/javascript" src="../page/js/fancyBox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="../page/js/goods_type.js"></script>

<table id="list-goodstype"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset>
            <h1>0M10 : COUNT UNIT</h1>
            <p>
                <label for="goodstype_id">Goods Type ID: </label>
                <input id="goodstype_id" name="goodstype_id" type="text" readonly="readonly" />
                <span id="goodstype_eng_info">Goods Type ID is require!</span>
            </p>
            <p>
                <label for="goodstype_eng">Goods Type (ENG): </label>
                <input id="goodstype_eng" name="goodstype_eng" type="text" />
                <span id="goodstype_eng_info">Goods Type (ENG) is require!</span>
            </p>
            <p>
                <label for="goodstype_th">Goods Type (TH): </label>
                <input id="goodstype_th" name="goodstype_th" type="text" />
                <span id="goodstype_th_info">Goods Type (TH) is require!</span>
            <p>
                <label for="deleteflag">Use Status: </label>
                <select id="deleteflag" name="deleteflag">
                    <option value="-1"> -- Please Select -- </option>
                    <option value="0">Used</option>
                    <option value="1">Unuse</option>
                </select>
                <span id="deleteflag_info">Use Status is require!</span>
            </p>
            <p>
                <label for="goodstype_desc">goodstype_desc: </label>
                <textarea id="goodstype_desc" name="goodstype_desc" cols="" rows=""></textarea>
            </p>
            <p class="btn">
                <input id="table" name="table" type="hidden" value="goodstype" />
<!--                 <input id="goodstype_id" name="goodstype_id" type="hidden" value="0" /> -->
                <input id="mode" name="mode" type="hidden" value="insert" />
                <input id="save" name="save" type="submit" value="Save" />
                <input id="cancle" name="cancle" type="reset" value="Cancle" />
                <input id="delete" name="delete" type="button" value="Delete" />
                <input id="recovery" name="recovery" type="button" value="Recovery" />
            </p>
        </fieldset>
    </form>
</div>