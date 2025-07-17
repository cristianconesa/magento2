define([
    'uiComponent',
    'ko',
    'Magento_Checkout/js/model/shipping-service',
    'Magento_Checkout/js/model/quote'
], function (Component, ko, shippingService, quote) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Conesa_ScheduleDelivery/shipping-method-list'
        },

        // Observable to show/hide button
        isButtonVisible: ko.observable(false),

        initialize: function () {
            this._super();

            // Observe shipping methods and toggle button
            this.shippingMethods = shippingService.getShippingRates();
            this.isButtonVisible = ko.computed(function () {
                return this.shippingMethods() && this.shippingMethods().length > 0;
            }, this);

            return this;
        },

        // Handler for button click
        scheduleDelivery: function () {
            // Ejemplo: mostrar un alert, puedes cambiar por modal, action, etc.
            alert('¡Funcionalidad: Programar Entrega!');
            // Aquí puedes disparar lógica adicional, abrir modal, etc.
        }
    });
});