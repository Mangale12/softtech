var TreeView = function () {

    return {
        //main function to initiate the module
        init: function () {

            var DataSourceTree = function (options) {
                this._data = options.data;
                this._delay = options.delay;
            };

            DataSourceTree.prototype = {

                data: function (options, callback) {
                    var self = this;

                    setTimeout(function () {
                        var data = $.extend(true, [], self._data);

                        if (options.additionalParameters && options.additionalParameters.children) {
                            data = options.additionalParameters.children;
                        }

                        callback({ data: data });

                    }, this._delay);
                }
            };

            // Tree data with nested children
            var treeDataSource = new DataSourceTree({
                data: [
                    {
                        name: 'सम्पत्ति <div class="tree-actions"></div>',
                        type: 'folder',
                        additionalParameters: {
                            id: 'F2',
                            children: [
                                {
                                    name: 'Cash',
                                    type: 'folder',
                                    additionalParameters: {
                                        id: 'F2-1',
                                        children: [
                                            { name: 'Sub-Cash 1', type: 'item', additionalParameters: { id: 'F2-1-1' } },
                                            { name: 'Sub-Cash 2', type: 'item', additionalParameters: { id: 'F2-1-2' } }
                                        ]
                                    }
                                },
                                { name: 'Payment', type: 'item', additionalParameters: { id: 'F2-2' } },
                                { name: 'Bank', type: 'item', additionalParameters: { id: 'F2-3' } }
                            ]
                        }
                    },
                    {
                        name: 'इक्विटी/पुँजी <div class="tree-actions"></div>',
                        type: 'folder',
                        additionalParameters: {
                            id: 'F1',
                            children: [
                                {
                                    name: 'Shares',
                                    type: 'folder',
                                    additionalParameters: {
                                        id: 'F1-1',
                                        children: [
                                            { name: 'Preferred Shares', type: 'item', additionalParameters: { id: 'F1-1-1' } },
                                            { name: 'Common Shares', type: 'item', additionalParameters: { id: 'F1-1-2' } }
                                        ]
                                    }
                                },
                                { name: 'Retained Earnings', type: 'item', additionalParameters: { id: 'F1-2' } },
                                { name: 'Other Equity', type: 'item', additionalParameters: { id: 'F1-3' } }
                            ]
                        }
                    },
                    { name: 'खर्च <div class="tree-actions"></div>', type: 'folder', additionalParameters: { id: 'F13' } },
                    { name: 'आम्दानी <div class="tree-actions"></div>', type: 'folder', additionalParameters: { id: 'F14' } },
                    { name: 'दायित्व <div class="tree-actions"></div>', type: 'folder', additionalParameters: { id: 'F15' } }
                ],
                delay: 400
            });

            $('#FlatTree').tree({
                dataSource: treeDataSource,
                loadingHTML: `<img src="path/to/your/spinner.gif"/>`, // Path to your loading spinner
            });
        }
    };
}();

jQuery(document).ready(function() {
    TreeView.init();
});
