define([
    'uiComponent'
], function (Component) {
    'use strict';

    return Component.extend({
        initialize: function () {
            this._super();
            console.log('Conesa_ScheduleDelivery: shipping-method-list JS loaded');
        }
    });
});