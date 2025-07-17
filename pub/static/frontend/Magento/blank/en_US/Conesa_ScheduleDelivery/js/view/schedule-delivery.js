/**
 * Conesa/ScheduleDelivery/view/frontend/web/js/view/schedule-delivery.js
 */
define([
    'jquery',
    'ko',
    'uiComponent',
    'Magento_Checkout/js/model/quote',
    'Conesa_ScheduleDelivery/js/action/save-schedule'
], function ($, ko, Component, quote, saveScheduleAction) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Conesa_ScheduleDelivery/schedule-delivery'
        },
        
        // Propiedades observables para el estado y los valores
        showSelectors: ko.observable(false),
        selectedDate: ko.observable(quote.shippingAddress() ? quote.shippingAddress().schedule_delivery_date : ''),
        selectedTimeSlot: ko.observable(quote.shippingAddress() ? quote.shippingAddress().schedule_delivery_time_slot : ''),
        
        // Rangos horarios disponibles (puedes hacer esto configurable desde el admin más adelante)
        timeSlots: ko.observableArray([
            { value: '09:00-12:00', label: '09:00 - 12:00' },
            { value: '12:00-15:00', label: '12:00 - 15:00' },
            { value: '15:00-18:00', label: '15:00 - 18:00' }
        ]),

        initialize: function () {
            this._super();
            var self = this;

            // Suscribirse a los cambios para guardar los datos
            this.selectedDate.subscribe(function (value) {
                self.saveSchedule();
            });

            this.selectedTimeSlot.subscribe(function (value) {
                self.saveSchedule();
            });
            
            // Inicializar el datepicker de jQuery UI
            // Usamos un 'afterRender' o similar en el template para asegurarnos que el elemento exista
        },

        /**
         * Alterna la visibilidad de los selectores de fecha y hora.
         */
        toggleSelectors: function () {
            this.showSelectors(!this.showSelectors());
            // Si se ocultan los selectores, limpiar los valores
            if (!this.showSelectors()) {
                this.selectedDate('');
                this.selectedTimeSlot('');
            }
        },

        /**
         * Guarda la información de la entrega programada.
         */
        saveSchedule: function() {
            if (this.showSelectors()) {
                var scheduleData = {
                    'schedule_delivery_date': this.selectedDate(),
                    'schedule_delivery_time_slot': this.selectedTimeSlot()
                };
                saveScheduleAction(scheduleData);
            } else {
                 var scheduleData = {
                    'schedule_delivery_date': null,
                    'schedule_delivery_time_slot': null
                };
                saveScheduleAction(scheduleData);
            }
        },
        
        /**
         * Inicializa el datepicker en el input de fecha.
         * Esta función se llamará desde el template HTML.
         */
        initDatepicker: function() {
            $('#schedule_delivery_date').datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 1, // No se puede seleccionar el día de hoy ni anteriores
                maxDate: "+1M" // Máximo un mes hacia adelante
            });
        }
    });
});
