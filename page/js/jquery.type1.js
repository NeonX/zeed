/**
 * jQuery type1 Plugin
 * Narong Rammanee
 * ranarong@gmail.com
 *
 * Latest Release: Aug 2012
 * 
 */

(function ($) {
    // type1 methods.
    T1 = {
        getAllUrl  : '../page/common/getDataAll.php',
        getByIdUrl : '../page/common/getDataById.php',
        saveUrl    : '../page/common/saveData.php',

        tpl : {
            input  : $('<input />')
        },

        // Initialize
        init : function (options) {
            return this.each(function () {                      // For each query element
                var settings;

                settings = $.extend({
                    table      : '',
                    colNames   : null,
                    colModel   : null,
                    mode       : null,
                    recovery   : null,
                    del        : null,
                    date       : null,
                    by         : null
                }, options);

                T1.form     = $(this); 
                T1.table    = settings.table; 
                T1.colNames = settings.colNames;
                T1.colModel = settings.colModel;
                T1.colId    = settings.table + '_id';
                T1.mode     = settings.mode,
                T1.grid     = $('#list-' + settings.table);
                T1.anchor   = $('a[class^="' + settings.table + '"]');
                T1.recovery = settings.recovery;
                T1.del      = settings.del;
                T1.date     = settings.date;
                T1.by       = settings.by;

                // Initialize
                T1.initGrid();
                T1.initFancybox();
                T1.initSubmit();
                T1.initDelete();
                T1.initRecovery();
            });
        },

        initGrid: function () {
            T1.grid.jqGrid({
                url         : T1.getAllUrl,
                datatype    : 'json',
                postData    : { columns : function () { return T1.colNames }, table: function () { return T1.table } },
                height      : 350,
                colNames    : T1.colNames,
                colModel    : T1.colModel,
                rowNum      : 15,
                autowidth   : true,
                shrinkToFit : false,
                rowList     : [10, 20, 30],
                pager       : $('#pager'),
                sortname    : T1.colId,
                viewrecords : true,
                sortorder   : 'desc',
                caption     : 'Good Type List:'
            })
            .navGrid('#pager', { edit: false, add:false, del: false, search: false, refresh: true });
        },

        initFancybox: function  () {
            T1.anchor.fancybox({
                title: 'Registration process',
                helpers:  {
                    title:  null
                },
                beforeLoad: function () {
                    var self = this,
                        mode = $(self.element.innerHTML).get(0).getAttribute('title'),
                        buttons = ['save', 'cancle', 'delete', 'recovery'];

                    switch (mode) {
                        case 'new':
                        case 'edit':
                            $.each(buttons, function (index, value) {
                                $('#' + value).show();
                            });

                            if (mode == 'new') {
                                T1.mode.val('insert');
                                T1.del.hide();
                                T1.recovery.hide();
                            } else {
                                T1.mode.val('update');
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

                    if (mode == 'new') {
                        T1.setElementValue(mode);
                    } else {
                        $.ajax({
                            type        : 'GET',
                            cache       : false,
                            datatype    : 'json',
                            url         : T1.getByIdUrl,
                            data        : { table: T1.table, goodstype_id: $(self.element.innerHTML).get(0).getAttribute('value') },
                            success     : function (data) {
                                T1.setElementValue(mode, data);
                            }
                        });
                    }
                },
                afterClose: function () {
                    T1.form.clearForm();
                }
            });
        },

        initSubmit: function () {
            T1.form.submit(function () {
                console.debug('submit');
                $.ajax({
                    type        : 'POST',
                    cache       : false,
                    url         : T1.saveUrl,
                    data        : $(this).serializeArray(),
                    success     : function (data) {
                        $.fancybox(data);
                        T1.grid.trigger('reloadGrid');
                    }
                });

                return false;
            });
        },
 
        initDelete: function () {
            console.debug(['T1.del:', T1.del]);
            T1.del.click(function () {
                $.ajax({
                    type        : 'POST',
                    cache       : false,
                    url         : T1.saveURL,
                    data        : {table: T1.table, goodstype_id: $('#' + T1.colId).val(), mode: 'delete', deleteflag: 1 },
                    success     : function (data) {
//                         console.debug(data);
//                         $.fancybox(data);
                        
//                         T1.grid.trigger('reloadGrid');
                    }
                });
            });
        },

        initRecovery: function (mode, data) {
            T1.recovery.bind('click', function () {
                $.ajax({
                    type        : 'POST',
                    cache       : false,
                    url         : T1.saveURL,
                    data        : {table: T1.table, goodstype_id: $('#' + T1.colId).val(), mode: 'delete', deleteflag: 0 },
                    success     : function (data) {
                        $.fancybox(data);
                        T1.grid.trigger('reloadGrid');
                    }
                });
            });
        },

        setElementValue: function (mode, data) {
            var style, text;
            if (mode == 'new') {
                $('#deleteflag').show();
                $('#delflag').remove();
            } else {
                $.each(T1.colNames, function (index, column) {
                    if (T1.colId ==  column) {
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
                            T1.tpl.input.attr({id: 'delflag',type: 'text', value: text, style: style, readonly: 'readonly'}).insertAfter('#deleteflag');
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
        }
    };

    $.fn.type1 = function () {
        return T1.init.apply(this, arguments);
    };

} (jQuery));

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