/* ====== Index ======

1. JEKYLL INSTANT SEARCH
2. TOOLTIPS AND POPOVER
3. MULTIPLE SELECT
4. LOADING BUTTON
5. TOASTER
6. PROGRESS BAR
7. CIRCLE PROGRESS

====== End ======*/

$(document).ready(function () {
  "use strict";

  /*======== 2. TOOLTIPS AND POPOVER ========*/
  var tooltip = $('[data-toggle="tooltip"]');
  if (tooltip.length != 0) {
    tooltip.tooltip({
      container: "body",
      template:
        '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
    });
  }

  var popover = $('[data-toggle="popover"]');

  if (popover.length != 0) {
    popover.popover();
  }

  /*======== 3. MULTIPLE SELECT ========*/
  var multipleSelect = $(".js-example-basic-multiple");
  if (multipleSelect.length != 0) {
    multipleSelect.select2();
  }

  /*======== 4. LOADING BUTTON ========*/

  var laddaButton = $(".ladda-button");

  if (laddaButton.length != 0) {
    Ladda.bind(".ladda-button", {
      timeout: 5000,
    });

    Ladda.bind(".progress-demo button", {
      callback: function (instance) {
        var progress = 0;
        var interval = setInterval(function () {
          progress = Math.min(progress + Math.random() * 0.1, 1);
          instance.setProgress(progress);

          if (progress === 1) {
            instance.stop();
            clearInterval(interval);
          }
        }, 200);
      },
    });
  }
});
