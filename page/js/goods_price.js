var self = this;
$(function () {
    self.colNames = [
        'goodsprice_id', 'goods_id', 'unit_id','currency_id', 'cost', 'price',
        'discount', 'effective_date', 'deleteflag','action',
    ],
    self.colModel = [
        {name: 'goodsprice_id', index:'goodsprice_id', hidden: true},
        {name: 'goods_id', index: 'goods_id',hidden: true,  align: 'center'},
        {name: 'unit_id', index: 'unit_id', hidden: true, align: 'center'},
        {name: 'currency_id', index: 'currency_id', hidden: true, align: 'center'},
        {name: 'cost', index: 'cost', width: 110, align: 'center'},
        {name: 'price', index: 'price', width: 110, align: 'center'},
        {name: 'discount', index: 'discount', width: 110, align: 'center'},
        {name: 'effective_date', index: 'effective_date', width: 110, align: 'center'},
        {name: 'deleteflag', index: 'deleteflag', width: 110, align: 'center'},
        {name: 'action',index: 'action', width:85, align: 'center'}
    ],
    self.getAllURL  =  '../page/common/getDataAll.php',
    self.getByIdURL =  '../page/common/getDataById.php',
    self.saveURL    =  '../page/common/saveData.php',
    self.table      = 'goodsprice',
    self.colId      = self.table + '_id',
    self.mode       = $('#mode'),
    self.grid       = $('#list-' + self.table),
    self.anchor     = $('a[class^="' + self.table + '"]'),
    self.custom     = $('#customForm'),
    self.recovery   = $('#recovery'),
    self.del        = $('#delete'),
    self.goodstype  = $('#goods_id'),
    self.unit       = $('#unit_id'),
    self.currency   = $('#currency_id'),
    self.eff_date   = $('#effective_date'),
    self.options    = $('<option />');

    self.grid.jqGrid({
        url         : self.getAllURL,
        datatype    : 'json',
        postData    : {
            columns: function() { return self.colNames },
            table: function() { return self.table } },
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
        caption     : 'Goods Price List:'
    })
    .navGrid('#pager', {
        edit    : false,
        add     :false,
        del     : false,
        search  : false,
        refresh : true
    });

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

                    self.eff_date.datepicker();
                break;

                case 'view':
                    $.each(buttons, function (index, value) {
                        $('#' + value).hide();
                        self.eff_date.datepicker('destroy');
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
                data        : {
                    table: self.table,
                    column: self.colId,
                    goodsprice_id: $(_self.element.innerHTML).get(0).getAttribute('value')
                },
                success     : function(data) {
                    self.setElementValue(data, mode);
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
            success     : function(data) {
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
            data        : {
                table: self.table,
                goodsprice_id: $('#' + self.colId).val(),
                mode: 'delete', deleteflag: 1
            },
            success     : function(data) {
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
            data        : {
                table: self.table,
                goodsprice_id: $('#' + self.colId).val(),
                mode: 'delete',
                deleteflag: 0
            },
            success     : function(data) {
                $.fancybox(data);
                self.grid.trigger('reloadGrid');
            }
        });
    });
});

self.setElementValue = function(data, mode) {
    var style, text;
    if (mode == 'new') {
        $('#deleteflag').show();
        $('#textbox_deleteflag').remove();

        self.goodstype.empty();
        self.goodstype.append(self.options.clone().val(-1).text('-- Please Select --'));
        $.each(data.goodstype, function(k, obj) {
            self.goodstype.append(self.options.clone().val(obj.goodstype_id).text(obj.goodstype_eng));
        });

        self.unit.empty();
        self.unit.append(self.options.clone().val(-1).text('-- Please Select --'));
        $.each(data.unit, function(k, obj) {
            self.unit.append(self.options.clone().val(obj.unit_id).text(obj.unitcode));
        });

        self.currency.empty();
        self.currency.append(self.options.clone().val(-1).text('-- Please Select --'));
        $.each(data.currency, function(k, obj) {
            self.currency.append(self.options.clone().val(obj.currency_id).text(obj.currcode));
        });
    } else {
        $.each(self.colNames, function (index, column) {
            if (self.colId ==  column) {
                $('#' + column).val(data[column]);
            } else {
                if (column == 'deleteflag' || column == 'goods_id' || column == 'unit_id'  || column == 'currency_id') {
                    if (column == 'deleteflag') {
                        if (data[column] == 1) {
                            style = 'color:red;font-weight:bold';
                            text  = 'Unuse';
                        } else {
                            style = 'color:green;font-weight:bold';
                            text  = 'Used';
                        }
                        $('#' + column).hide();
                        $('#textbox_' + column).remove();
                        $('<input />').attr({
                            id: 'textbox_' + column,
                            type: 'text',
                            value: text,
                            style: style,
                            readonly: 'readonly'
                        })
                        .insertAfter('#' + column);
                    } else {
                        if (mode == 'view') {
                            $('#' + column).hide();
                            $('#textbox_' + column).remove();
                            $('<input />').attr({
                                id: 'textbox_' + column,
                                type: 'text',
                                value: data[column],
                                readonly: 'readonly'
                            })
                            .insertAfter('#' + column);
                        } else {
                            $('#textbox_' + column).remove();
                            
                            if (column == 'goods_id') {
                                self.goodstype.empty();
                                self.goodstype.append(self.options.clone().val(-1).text('-- Please Select --'));
                                $.each(data.goodstype, function(k, obj) {
                                    self.goodstype.append(self.options.clone().val(obj.goodstype_id).text(obj.goodstype_eng));
                                });
                            } else if (column == 'unit_id') {
                                self.unit.empty();
                                self.unit.append(self.options.clone().val(-1).text('-- Please Select --'));
                                $.each(data.unit, function(k, obj) {
                                    self.unit.append(self.options.clone().val(obj.unit_id).text(obj.unitcode));
                                });
                            } else if (column == 'currency_id') {
                                self.currency.empty();
                                self.currency.append(self.options.clone().val(-1).text('-- Please Select --'));
                                $.each(data.currency, function(k, obj) {
                                    self.currency.append(self.options.clone().val(obj.currency_id).text(obj.currcode));
                                });
                            }

                            $('#' + column).val(data[column]).show();
                        }
                    }
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

$.fn.clearForm = function() {
    return this.each(function() {
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