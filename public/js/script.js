// SIDEBAR DROPDOWN
const allDropdown = document.querySelectorAll("#sidebar .side-dropdown");
const sidebar = document.getElementById("sidebar");

allDropdown.forEach((item) => {
  const a = item.parentElement.querySelector("a:first-child");
  a.addEventListener("click", function (e) {
    e.preventDefault();

    if (!this.classList.contains("active")) {
      allDropdown.forEach((i) => {
        const aLink = i.parentElement.querySelector("a:first-child");

        aLink.classList.remove("active");
        i.classList.remove("show");
      });
    }

    this.classList.toggle("active");
    item.classList.toggle("show");
  });
});

//////////////////// to display sidebar in screen small than 1000px ////////////////////////////
let menu = document.getElementById("menubar");
let header = document.querySelector("header");
menu.addEventListener("click", () => {
  header.classList.toggle("show");
});

//////////////// to display navbar in screen small than 1000px ///////////////////////////////
let navbar = document.getElementById("navbar");
let bar = document.getElementById("bar");
// let Btnclose = document.getElementById("close");

if (bar) {
  bar.addEventListener("click", () => {
    navbar.classList.toggle("active");
    // console.log("dehec");
  });
}

////////////////////////// input file /////////////////////////////////////////
document.addEventListener("DOMContentLoaded", function () {
  const dropArea = document.getElementById("dropArea");
  dropArea.addEventListener("click", () => {
    fileInput.click();
  });
});

// Package Pricing Script
// ////////////// Hybrid,deep,diseases in pc /////////////////

function cal(display, select_class) {
  let total = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value = $(this).val();
    total = total + parseInt(value);
  });
  $("#" + display).html(100 + total);
}

function cal_2(display, select_class) {
  let total_2 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_2 = $(this).val();
    total_2 = total_2 + parseInt(value_2);
  });
  $("#" + display).html(140 + total_2);
}

function cal_3(display, select_class) {
  let total_3 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_3 = $(this).val();
    total_3 = total_3 + parseInt(value_3);
  });
  $("#" + display).html(200 + total_3);
}
// ////////////// Hybrid,deep,diseases in mobile /////////////////

function cal_4(display, select_class) {
  let total_4 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_4 = $(this).val();
    total_4 = total_4 + parseInt(value_4);
  });
  $("#" + display).html(100 + total_4);
}

function cal_5(display, select_class) {
  let total_5 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_5 = $(this).val();
    total_5 = total_5 + parseInt(value_5);
  });
  $("#" + display).html(140 + total_5);
}

function cal_6(display, select_class) {
  let total_6 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_6 = $(this).val();
    total_6 = total_6 + parseInt(value_6);
  });
  $("#" + display).html(200 + total_6);
}
// ////////////// Timeseries pc /////////////////
function cal_7(display, select_class) {
  let total_7 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_7 = $(this).val();
    total_7 = total_7 + parseInt(value_7);
  });
  $("#" + display).html(60 + total_7);
}

function cal_8(display, select_class) {
  let total_8 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_8 = $(this).val();
    total_8 = total_8 + parseInt(value_8);
  });
  $("#" + display).html(100 + total_8);
}

function cal_9(display, select_class) {
  let total_9 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_9 = $(this).val();
    total_9 = total_9 + parseInt(value_9);
  });
  $("#" + display).html(140 + total_9);
}
///////////////// time series in mopil /////////////////////
function cal_10(display, select_class) {
  let total_10 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_10 = $(this).val();
    total_10 = total_10 + parseInt(value_10);
  });
  $("#" + display).html(60 + total_10);
}

function cal_11(display, select_class) {
  let total_11 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_11 = $(this).val();
    total_11 = total_11 + parseInt(value_11);
  });
  $("#" + display).html(100 + total_11);
}

function cal_12(display, select_class) {
  let total_12 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_12 = $(this).val();
    total_12 = total_12 + parseInt(value_12);
  });
  $("#" + display).html(140 + total_12);
}
// ////////////// Machine Learning pc /////////////////
function cal_13(display, select_class) {
  let total_13 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_13 = $(this).val();
    total_13 = total_13 + parseInt(value_13);
  });
  $("#" + display).html(80 + total_13);
}

function cal_14(display, select_class) {
  let total_14 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_14 = $(this).val();
    total_14 = total_14 + parseInt(value_14);
  });
  $("#" + display).html(120 + total_14);
}

function cal_15(display, select_class) {
  let total_15 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_15 = $(this).val();
    total_15 = total_15 + parseInt(value_15);
  });
  $("#" + display).html(160 + total_15);
}
///////////////// Machine Learning in mopil /////////////////////
function cal_16(display, select_class) {
  let total_16 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_16 = $(this).val();
    total_16 = total_16 + parseInt(value_16);
  });
  $("#" + display).html(80 + total_16);
}

function cal_17(display, select_class) {
  let total_17 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_17 = $(this).val();
    total_17 = total_17 + parseInt(value_17);
  });
  $("#" + display).html(120 + total_17);
}

function cal_18(display, select_class) {
  let total_18 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_18 = $(this).val();
    total_18 = total_18 + parseInt(value_18);
  });
  $("#" + display).html(160 + total_18);
}

// ////////////// Data Analysis pc /////////////////
function cal_19(display, select_class) {
  let total_19 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_19 = $(this).val();
    total_19 = total_19 + parseInt(value_19);
  });
  $("#" + display).html(80 + total_19);
}

function cal_20(display, select_class) {
  let total_20 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_20 = $(this).val();
    total_20 = total_20 + parseInt(value_20);
  });
  $("#" + display).html(140 + total_20);
}

function cal_21(display, select_class) {
  let total_21 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_21 = $(this).val();
    total_21 = total_21 + parseInt(value_21);
  });
  $("#" + display).html(200 + total_21);
}
// ////////////// Data Analysis Mobile /////////////////
function cal_22(display, select_class) {
  let total_22 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_22 = $(this).val();
    total_22 = total_22 + parseInt(value_22);
  });
  $("#" + display).html(80 + total_22);
}

function cal_23(display, select_class) {
  let total_23 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_23 = $(this).val();
    total_23 = total_23 + parseInt(value_23);
  });
  $("#" + display).html(140 + total_23);
}

function cal_24(display, select_class) {
  let total_24 = 0;
  $("#" + display).html("");
  $("." + select_class).each(function () {
    let value_24 = $(this).val();
    total_24 = total_24 + parseInt(value_24);
  });
  $("#" + display).html(200 + total_24);
}