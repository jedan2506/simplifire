<<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Checkboxes</title>
  <style>
    @charset "UTF-8";

    .toggler-wrapper {
      display: block;
      width: 45px;
      height: 25px;
      cursor: pointer;
      position: relative;
    }

    .toggler-wrapper input[type="checkbox"] {
      display: none;
    }

    .toggler-wrapper input[type="checkbox"]:checked+.toggler-slider {
      background-color: #44cc66;
    }

    .toggler-wrapper .toggler-slider {
      background-color: #ccc;
      position: absolute;
      border-radius: 100px;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      -webkit-transition: all 300ms ease;
      transition: all 300ms ease;
    }

    .toggler-wrapper .toggler-knob {
      position: absolute;
      -webkit-transition: all 300ms ease;
      transition: all 300ms ease;
    }

    .toggler-wrapper.style-1 input[type="checkbox"]:checked+.toggler-slider .toggler-knob {
      left: calc(100% - 19px - 3px);
    }

    .toggler-wrapper.style-1 .toggler-knob {
      width: calc(25px - 6px);
      height: calc(25px - 6px);
      border-radius: 50%;
      left: 3px;
      top: 3px;
      background-color: #fff;
    }
  </style>
</head>
<body>
    <div>
    <label class="toggler-wrapper style-1">
      <input type="checkbox">
      <div class="toggler-slider">
        <div class="toggler-knob"></div>
      </div>
    </label>
    <div class="badge">Style 1</div>
  </div>

</body>
</html>
