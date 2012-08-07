var self = this;
$(function () {
    self.colNames = [
        'goods_id', 'goodstype_id','goodscode', 'goodsname_eng',
        'goodsname_th', 'goodsdesc', 'goodspicture', 'deleteflag'
    ],
    self.colModel = [
        {name: 'goods_id', index:'goods_id', hidden: true},
        {name: 'goodstype_id', index: 'goodstype_id', width: 80, align: 'center'},
        {name: 'goodscode', index: 'goodscode', width: 80, align: 'center'},
        {name: 'goodsname_eng', index: 'goodsname_eng', width: 100, align: 'center'},
        {name: 'goodsdesc', index: 'goodsdesc', width: 110, align: 'center'},
        {name: 'goodsname_th', index: 'goodsname_th', width:100, align: 'center'},
        {name: 'deleteflag', index: 'deleteflag', width: 80, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ],
    self.getAllURL  =  '../page/common/getDataAll.php',
    self.getByIdURL =  '../page/common/getDataById.php',
    self.saveURL    =  '../page/common/saveData.php',
    self.table      = 'goods',
    self.colId      = self.table + '_id',
    self.mode       = $('#mode'),
    self.grid       = $('#list-' + self.table),
    self.anchor     = $('a[class^="' + self.table + '"]'),
    self.custom     = $('#customForm'),
    self.recovery   = $('#recovery'),
    self.del        = $('#delete');
    self.goodstype  = $('#goodstype_id'),
    self.options    = $('<option />');

    self.grid.jqGrid({
        url         : self.getAllURL,
        datatype    : 'json',
        postData    : { columns : function () { return self.colNames }, table: function () { return self.table } },
        height      : 350,
        colNames    : self.colNames,
        colModel    : self.colModel,
        rowNum      : 15,
        autowidth   : true,
        shrinkToFit : false,
        rowList     : [10, 20, 30],
        pager       : $('#pager'),
        sortname    : self.colId,
        viewrecords : true,
        sortorder   : 'desc',
        caption     : 'Goods List:'
    })
    .navGrid('#pager', { edit: false, add:false, del: false, search: false, refresh: true });

    self.anchor.fancybox({

        title: 'Registration process',
        helpers:  {
            title:  null
        },
        beforeLoad: function () {
            var _self = this,
                mode = $(_self.element.innerHTML).get(0).getAttribute('title'),
                buttons = ['save', 'cancle', 'delete', 'recovery'];

            switch (mode) {
                case 'new':
                case 'edit':
                    $.each(buttons, function (index, value) {
                        $('#' + value).show();
                    });

                    if (mode == 'new') {
                        self.mode.val('insert');
                        self.del.hide();
                        self.recovery.hide();
                    } else {
                        self.mode.val('update');
                    }
                break;

                case 'view':
                    $.each(buttons, function (index, value) {
                        $('#' + value).hide();
                    });
                break;

                default:
                    console.debug('MODE NOT FOUND!!!');
            }

            $.ajax({
                type        : 'GET',
                cache       : false,
                datatype    : 'json',
                url         : self.getByIdURL,
                data        : { table: self.table, goods_id: $(_self.element.innerHTML).get(0).getAttribute('value') },
                success     : function (data) {
                    self.setElementValue(mode, data);
                }
            });
        },
        afterClose: function () {
            self.custom.clearForm();
        }
    });

    self.custom.bind('submit', function () {
        $.ajax({
            type        : 'POST',
            cache       : false,
            url         : self.saveURL,
            data        : $(this).serializeArray(),
            success     : function (data) {
                $.fancybox(data);
                self.grid.trigger('reloadGrid');
            }
        });

        return false;
    });

     self.del.bind('click', function () {
        $.ajax({
            type        : 'POST',
            cache       : false,
            url         : self.saveURL,
            data        : {table: self.table, goods_id: $('#' + self.colId).val(), mode: 'delete', deleteflag: 1 },
            success     : function (data) {
                $.fancybox(data);
                self.grid.trigger('reloadGrid');
            }
        });
    });

    self.recovery.bind('click', function () {
        $.ajax({
            type        : 'POST',
            cache       : false,
            url         : self.saveURL,
            data        : {table: self.table, goods_id: $('#' + self.colId).val(), mode: 'delete', deleteflag: 0 },
            success     : function (data) {
                $.fancybox(data);
                self.grid.trigger('reloadGrid');
            }
        });
    });
});

self.setElementValue = function (mode, data) {
//     console.debug([self.colNames, mode, data]);
    var style, text;
    console.debug(mode);
    if (mode == 'new') {
        $('#deleteflag').show();
        $('#delflag').remove();

        self.goodstype.empty();
        self.goodstype.append(self.options.clone().val(-1).text('-- Please Select --'));
        $.each(data.goodstype, function(k, obj) {
            self.goodstype.append(self.options.clone().val(obj.goodstype_id).text(obj.goodstype_eng));
        });
    } else {
        $.each(self.colNames, function (index, column) {
            console.debug([column == 'goodstype_id']);
            if (self.colId ==  column) {
                $('#' + column).val(data[column]);
            } else {
                if (column == 'deleteflag') {
                    if (data[column] == 1) {
                        style = 'color:red;font-weight:bold';
                        text  = 'Unuse';
                    } else {
                        style = 'color:green;font-weight:bold';
                        text  = 'Used';
                    }
                    $('#' + column).hide();
                    $('#delflag').remove();
                    $('<input />').attr({id: 'delflag',type: 'text', value: text, style: style, readonly: 'readonly'}).insertAfter('#deleteflag');
                } else {
                    if (mode == 'view') {
                        $('#' + column).val(data[column]).attr('readonly','readonly');
                    } else {
                        $('#' + column).val(data[column]).removeAttr('readonly');
                    }
                }
            }
        });
    }
};

$.fn.clearForm = function () {
    return this.each(function () {
        var type = this.type, tag = this.tagName.toLowerCase();
        if (tag == 'form') {
            return $(':input',this).clearForm();
        }

        if (type == 'text' || type == 'password' || tag == 'textarea') {
            this.value = '';
        } else if (type == 'checkbox' || type == 'radio') {
            this.checked = false;
        } else if (tag == 'select') {
            this.selectedIndex = -1;
        }
    });
};