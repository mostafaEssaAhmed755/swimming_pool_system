<style>
    /*!
* Datepicker v1.0.10
* https://fengyuanchen.github.io/datepicker
*
* Copyright 2014-present Chen Fengyuan
* Released under the MIT license
*
* Date: 2020-09-29T14:46:09.037Z
*/

.datepicker-container {
background-color: #fff;
direction: ltr;
font-size: 12px;
left: 0;
line-height: 30px;
position: fixed;
-webkit-tap-highlight-color: transparent;
top: 0;
-ms-touch-action: none;
touch-action: none;
-webkit-touch-callout: none;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
width: 210px;
z-index: -1;
}

.datepicker-container::before,
.datepicker-container::after {
border: 5px solid transparent;
content: " ";
display: block;
height: 0;
position: absolute;
width: 0;
}

.datepicker-dropdown {
border: 1px solid #ccc;
-webkit-box-shadow: 0 3px 6px #ccc;
box-shadow: 0 3px 6px #ccc;
-webkit-box-sizing: content-box;
box-sizing: content-box;
position: absolute;
z-index: 1;
}

.datepicker-inline {
position: static;
}

.datepicker-top-left,
.datepicker-top-right {
border-top-color: #39f;
}

.datepicker-top-left::before,
.datepicker-top-left::after,
.datepicker-top-right::before,
.datepicker-top-right::after {
border-top: 0;
left: 10px;
top: -5px;
}

.datepicker-top-left::before,
.datepicker-top-right::before {
border-bottom-color: #39f;
}

.datepicker-top-left::after,
.datepicker-top-right::after {
border-bottom-color: #fff;
top: -4px;
}

.datepicker-bottom-left,
.datepicker-bottom-right {
border-bottom-color: #39f;
}

.datepicker-bottom-left::before,
.datepicker-bottom-left::after,
.datepicker-bottom-right::before,
.datepicker-bottom-right::after {
border-bottom: 0;
bottom: -5px;
left: 10px;
}

.datepicker-bottom-left::before,
.datepicker-bottom-right::before {
border-top-color: #39f;
}

.datepicker-bottom-left::after,
.datepicker-bottom-right::after {
border-top-color: #fff;
bottom: -4px;
}

.datepicker-top-right::before,
.datepicker-top-right::after,
.datepicker-bottom-right::before,
.datepicker-bottom-right::after {
left: auto;
right: 10px;
}

.datepicker-panel > ul {
margin: 0;
padding: 0;
width: 102%;
}

.datepicker-panel > ul::before,
.datepicker-panel > ul::after {
content: " ";
display: table;
}

.datepicker-panel > ul::after {
clear: both;
}

.datepicker-panel > ul > li {
background-color: #fff;
cursor: pointer;
float: left;
height: 30px;
list-style: none;
margin: 0;
padding: 0;
text-align: center;
width: 30px;
}

.datepicker-panel > ul > li:hover {
background-color: rgb(229, 242, 255);
}

.datepicker-panel > ul > li.muted,
.datepicker-panel > ul > li.muted:hover {
color: #999;
}

.datepicker-panel > ul > li.highlighted {
background-color: rgb(229, 242, 255);
}

.datepicker-panel > ul > li.highlighted:hover {
background-color: rgb(204, 229, 255);
}

.datepicker-panel > ul > li.picked,
.datepicker-panel > ul > li.picked:hover {
color: #39f;
}

.datepicker-panel > ul > li.disabled,
.datepicker-panel > ul > li.disabled:hover {
background-color: #fff;
color: #ccc;
cursor: default;
}

.datepicker-panel > ul > li.disabled.highlighted,
.datepicker-panel > ul > li.disabled:hover.highlighted {
background-color: rgb(229, 242, 255);
}

.datepicker-panel > ul > li[data-view="years prev"],
.datepicker-panel > ul > li[data-view="year prev"],
.datepicker-panel > ul > li[data-view="month prev"],
.datepicker-panel > ul > li[data-view="years next"],
.datepicker-panel > ul > li[data-view="year next"],
.datepicker-panel > ul > li[data-view="month next"],
.datepicker-panel > ul > li[data-view="next"] {
font-size: 18px;
}

.datepicker-panel > ul > li[data-view="years current"],
.datepicker-panel > ul > li[data-view="year current"],
.datepicker-panel > ul > li[data-view="month current"] {
width: 150px;
}

.datepicker-panel > ul[data-view="years"] > li,
.datepicker-panel > ul[data-view="months"] > li {
height: 52.5px;
line-height: 52.5px;
width: 52.5px;
}

.datepicker-panel > ul[data-view="week"] > li,
.datepicker-panel > ul[data-view="week"] > li:hover {
background-color: #fff;
cursor: default;
}

.datepicker-hide {
display: none;
}
.loader {
    animation: spin 1s infinite linear;
    border: solid 2vmin transparent;
    border-radius: 50%;
    border-right-color: #09f;
    border-top-color: #09f;
    box-sizing: border-box;
    height: 15vmin;
    left: calc(40% - 10vmin);
    position: fixed;
    top: calc(84% - 10vmin);
    width: 15vmin;
    z-index: 1;
    opacity:1 !important;

    
  }
  .loader:before {
    animation: spin 2s infinite linear;
    border: solid 2vmin transparent;
    border-radius: 50%;
    border-right-color: #3cf;
    border-top-color: #3cf;
    box-sizing: border-box;
    content: "";
    height: 11vmin;
    left: 0;
    position: absolute;
    top: 0;
    width: 11vmin;
  }
  .loader:after {
    animation: spin 3s infinite linear;
    border: solid 2vmin transparent;
    border-radius: 50%;
    border-right-color: #6ff;
    border-top-color: #6ff;
    box-sizing: border-box;
    content: "";
    height: 7vmin;
    left: 2vmin;
    position: absolute;
    top: 2vmin;
    width: 7vmin;
  }

  @keyframes spin {
    100% {
      transform: rotate(360deg);
    }
  }
th
{
  text-align: center;
  border-left-width: 2px;
}
td
{
  text-align: center;
}
</style>